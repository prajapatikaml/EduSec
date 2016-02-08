<?php

// Note that REAL cache should check for Last-Modified HTTP header at least;
// As I don't like idea of implementing the full-scaled HTTP protocol library
// and curl extension is very rare, this implementation of cache is very simple.
// Cache is cleared after the script finishes it work!

// Also, it can have problems with simultaneous access to the images.

// The class responsible for downloading and caching images
// as PHP does not support the static variables, we'll use a global variable
// containing all cached objects; note that cache consumes memory!
//
$GLOBALS['g_image_cache'] = array();

class Image {
  var $_handle;
  var $_filename;
  var $_type;

  function Image($handle, $filename, $type) {
    $this->_handle = $handle;
    $this->_filename = $filename;
    $this->_type = $type;
  }

  function get_filename() {
    return $this->_filename;
  }

  function get_handle() {
    return $this->_handle;
  }

  function get_type() {
    return $this->_type;
  }

  function sx() {
    if (!$this->_handle) {
      return 0;
    };

    return imagesx($this->_handle);
  }

  function sy() {
    if (!$this->_handle) {
      return 0;
    };

    return imagesy($this->_handle);
  }
}

class ImageFactory {
  // Static funcion; checks if given URL is already cached and either returns 
  // cached object or downloads the requested image
  //
  function get($url, &$pipeline) {
    global $g_config, $g_image_cache;
    if (!$g_config['renderimages']) { 
      return null; 
    };

    // Check if this URL have been cached
    //
    if (isset($g_image_cache[$url])) {
      //      return do_image_open($g_image_cache[$url]);
      return $g_image_cache[$url];
    };

    // Download image; we should do it before we call do_image_open,
    // as it tries to open image file twice: first to determine image type 
    // and second to actually create the image - PHP url wrappers do no caching 
    // at all
    //
    $filename = ImageFactory::make_cache_filename($url);

    // REQUIRES: PHP 4.3.0+
    // we suppress warning messages, as missing image files will cause 'copy' to print 
    // several warnings
    // 
    // @TODO: change to fetcher class call
    //

    // simplify our url by fetcher simlify functionality
    $url = FetcherUrl::_simplify_path($url);
    $data = $pipeline->fetch($url);

    if (is_null($data)) {
      trigger_error("Cannot fetch image: ".$url, E_USER_WARNING);
      return null; 
    };

    $file = fopen($filename, 'wb');
    fwrite($file, $data->content);
    fclose($file);
    $pipeline->pop_base_url();
    
    // register it in the cached objects array
    //
    $handle = do_image_open($filename, $type);
    if ($handle) {
      $g_image_cache[$url] =& new Image($handle,
                                        $filename,
                                        $type);
    } else {
      $g_image_cache[$url] = null;
    };
    // return image
    //
    // return do_image_open($filename);
    return $g_image_cache[$url];
  }

  // Makes the filename to contain the cached version of URL
  // 
  function make_cache_filename($url) {
    // We cannot use the $url as an cache image name as it could be longer than 
    // allowed file name length (especially after escaping specialy symbols)
    // thus, we generate long almost random 32-character name using the md5 hash function
    //
    return CACHE_DIR.md5(time() + $url + rand());
  }

  // Checks if cache directory is available
  //
  function check_cache_dir() {
    // TODO: some cool easily understandable error message for the case 
    // image cache directory cannot be created or accessed
    
    // Check if CACHE_DIR exists
    //
    if (!is_dir(CACHE_DIR)) { 
      // Cache directory does not exists; try to create it (with read/write rightss for the owner only)
      //
      if (!mkdir(CACHE_DIR, 0700)) { die("Cache directory cannot be created"); }
    };

    // Check if we can read and write to the CACHE_DIR
    //
    // Note that directory should have 'rwx' (7) permission, so the script will
    // be able to list directory contents; under Windows is_executable always returns false
    // for directories, so we need to drop this check in this case.
    //
    // A user's note for 'is_executable' function on PHP5:
    // "The change doesn't appear to be documented, so I thought I would mention it. 
    // In php5, as opposed to php4, you can no longer rely on is_executable to check the executable bit 
    // on a directory in 'nix. You can still use the first note's method to check if a directory is traversable:
    // @file_exists("adirectory/.");"
    // 
    if (!is_readable(CACHE_DIR) || 
        !is_writeable(CACHE_DIR) || 
        (!@file_exists(CACHE_DIR.'.'))) {
      // omg. Cache directory exists, but useless
      //
      die("Check cache directory permissions; cannot either read or write to directory cache");
    };
    
    return;
  }

  // Clears the image cache (as we're neither implemented checking of Last-Modified HTTP header nor 
  // provided the means of limiting the cache size
  //
  // TODO: Will cause problems with simultaneous access to the same images  
  //
  function clear_cache() {
    foreach ($GLOBALS['g_image_cache'] as $key => $value) {
      if (!is_null($value) && is_file($value->get_filename())) {
        unlink($value->get_filename());
      };
    };
    $g_image_cache = array();
  }
}
?>
