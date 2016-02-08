<?php

/**
 * ERunActionsHttpClient.php
 *
 * A simple Http request client based on
 * http://www.php.net/manual/de/function.fsockopen.php#101872
 *
 * Can send url requests without waiting for response
 * No support for https, proxies ...
 *
 * PHP version 5.2+
 *
 * @author Joe Blocher <yii@myticket.at>
 * @copyright 2011 myticket it-solutions gmbh
 * @license New BSD License
 * @package runactions
 * @version 1.1
 */
class ERunActionsHttpClient
{

	public $userAgent = 'Mozilla/5.0 Firefox/3.6.12';

	private $_touchOnly;

	public function __construct($touchOnly=false)
	{
	   $this->_touchOnly = $touchOnly;
	}

	/**
	 * Socked based http request
	 * Based on code from: http://www.php.net/manual/de/function.fsockopen.php#101872
	 * Added touchOnly feature, changed headers
	 *
	 * @param mixed $ip
	 * @param integer $port
	 * @param string $uri
	 * @param string $verb
	 * @param array $getdata
	 * @param array $postData
	 * @param array $cookie
	 * @param array $custom_headers
	 * @param integer $timeout
	 * @param mixed $req_hdr
	 * @param mixed $res_hdr
	 * @return
	 */
	public function request
	(
		$ip,                       /* Target IP/Hostname */
		$port = 80,                /* Target TCP port */
		$uri = '/',                /* Target URI */
		$verb = 'GET',             /* HTTP Request Method (GET and POST supported) */
		$getdata = array(),        /* HTTP GET Data ie. array('var1' => 'val1', 'var2' => 'val2') */
		$postData = null,          /* HTTP POST Data ie. array('var1' => 'val1', 'var2' => 'val2') */
		$contentType = null,
		$cookie = array(),         /* HTTP Cookie Data ie. array('var1' => 'val1', 'var2' => 'val2') */
		$custom_headers = array(), /* Custom HTTP headers ie. array('Referer: http://localhost/ */
		$timeout = 2000,           /* Socket timeout in milliseconds */
		$req_hdr = false,          /* Include HTTP request headers */
		$res_hdr = false           /* Include HTTP response headers */
	)
	{

		$isSSL = $port == 443;

		$ret = '';
		$verb = strtoupper($verb);
		$cookie_str = '';
		$getdata_str = count($getdata) ? '?' : '';
		$postdata_str = '';

		if (!empty($getdata))
		{
			foreach ($getdata as $k => $v)
				$getdata_str .= urlencode($k) .'='. urlencode($v) .'&';
			$getdata_str = substr($getdata_str, 0, -1);
		}

		/*if (isset($postData))
		{
			if (is_array($postData))
			{
				foreach ($postData as $k => $v)
					$postdata_str .= urlencode($k) .'='. urlencode($v) .'&';

				$postdata_str = substr($postdata_str, 0, -1);
			}
			else
				$postdata_str = is_string($postData) ? $postData : serialize($postData);
		}*/

		if (isset($postData))
		{
			if (is_array($postData))
			{
			    $postdata_str = http_build_query($postData);
			}
			else
			    $postdata_str = is_string($postData) ? $postData : serialize($postData);
		}

		foreach ($cookie as $k => $v)
			$cookie_str .= urlencode($k) .'='. urlencode($v) .'; ';

		$crlf = "\r\n";
		$req = $verb .' '. $uri . $getdata_str .' HTTP/1.1' . $crlf;
		$req .= 'Host: '. $ip . $crlf;
		$req .= 'User-Agent: ' . $this->userAgent . $crlf;
		$req .= "Cache-Control: no-store, no-cache, must-revalidate" . $crlf;
		$req .= "Cache-Control: post-check=0, pre-check=0" . $crlf;
		$req .= "Pragma: no-cache" . $crlf;

		foreach ($custom_headers as $k => $v)
			$req .= $k .': '. $v . $crlf;

		if (!empty($cookie_str))
			$req .= 'Cookie: '. substr($cookie_str, 0, -2) . $crlf;

		if ($verb == 'POST' && !empty($postdata_str))
		{
			if (is_array($postData))
			   $req .= 'Content-Type: application/x-www-form-urlencoded' . $crlf;
			else
			{
				if (empty($contentType))
				  $contentType = 'text/plain';

				$req .= 'Content-Type: '.$contentType . $crlf;
			}

			$req .= 'Content-Length: '. strlen($postdata_str) . $crlf;
			$req .= 'Connection: close' . $crlf . $crlf;
			$req .= $postdata_str;
		}
		else
		   $req .= 'Connection: close' . $crlf . $crlf;

		if ($req_hdr)
			$ret .= $req;


		$ip = $isSSL ? 'ssl://' . $ip : $ip;

		if (($fp = @fsockopen($ip, $port, $errno, $errstr)) == false)
		{
			$message = "Error $errno: $errstr";

			if ($this->_touchOnly) //log if touchOnly
			{
				ERunActions::logError($message);
				return null;
			}
			else
			    return $message;
		}

		stream_set_timeout($fp, 0, $timeout * 1000);

		fputs($fp, $req);

		if (!$this->_touchOnly)
		{

			while ($line = fgets($fp)) $ret .= $line;
			fclose($fp);

			if (!$res_hdr)
				$ret = substr($ret, strpos($ret, "\r\n\r\n") + 4);

			return $ret;
		}
		else
		{
		  fclose($fp);
		  return null;
		}
	}


}
?>
