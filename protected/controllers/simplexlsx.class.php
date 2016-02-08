<?php

// SimpleXLSX php class v0.4
// MS Excel 2007 workbooks reader
// Example: 
//   $xlsx = new SimpleXLSX('book.xlsx');
//   print_r( $xlsx->rows() );
// Example 2: 
//   $xlsx = new SimpleXLSX('book.xlsx');
//   print_r( $xlsx->rowsEx() );
// Example 3: 
//   $xlsx = new SimpleXLSX('book.xlsx');
//   print_r( $xlsx->rows(2) ); // second worksheet
//
// 0.4 sheets(), sheetsCount(), unixstamp( $excelDateTime )
// 0.3 - fixed empty cells (Gonzo patch)

class SimpleXLSX {
	// Don't remove this string! Created by Sergey Schuchkin from http://www.sibvision.ru - professional php developers team 2010-2012
	private $sheets;
	private $hyperlinks;
	private $package;
	private $sharedstrings;
	// scheme
	const SCHEMA_OFFICEDOCUMENT  =  'http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument';
	const SCHEMA_RELATIONSHIP  =  'http://schemas.openxmlformats.org/package/2006/relationships';
	const SCHEMA_SHAREDSTRINGS =  'http://schemas.openxmlformats.org/officeDocument/2006/relationships/sharedStrings';
	const SCHEMA_WORKSHEETRELATION =  'http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet';
	
	function __construct( $filename ) 
	{
		$this->_unzip( $filename );
		$this->_parse();
	}
	function sheets() 
	{
		return $this->sheets;
	}
	function sheetsCount() 
	{
		return count($this->sheets);
	}
	function worksheet( $worksheet_id ) 
	{
		//echo $worksheet_id;exit;
		//echo $this->sheets[$worksheet_id];exit;
		if (isset($this->sheets[$worksheet_id])) 
		{
			$ws = $this->sheets[$worksheet_id];
			//echo $ws;exit;
			if (isset($ws->hyperlinks)) 
			{
				$this->hyperlinks = array();
				foreach( $ws->hyperlinks->hyperlink as $hyperlink ) 
				{
					$this->hyperlinks[ (string) $hyperlink['ref'] ] = (string) $hyperlink['display'];
				}
			}
			//print_r($ws);exit;
			return $ws;
		} else
			throw new Exception('Worksheet '.$worksheet_id.' not found.');
	}
	function dimension( $worksheet_id = 1 ) 
	{
		$ws = $this->worksheet($worksheet_id);
		$ref = (string) $ws->dimension['ref'];
		$d = explode(':', $ref);
		$index = $this->_columnIndex( $d[1] );		
		return array( $index[0]+1, $index[1]+1);
	}
	// sheets numeration: 1,2,3....
	function rows( $worksheet_id = 1 ) 
	{
		
		$ws = $this->worksheet($worksheet_id);
		
		$rows = array();
		$curR = 0;
				
		foreach ($ws->sheetData->row as $row) {
			
			foreach ($row->c as $c) {
				list($curC,) = $this->_columnIndex((string) $c['r']);
				$rows[ $curR ][ $curC ] = $this->value($c);
			}
			
			$curR++;
		}
		return $rows;
	}
	function rowsEx( $worksheet_id = 1 ) 
	{
		$rows = array();
		$curR = 0;
		if (($ws = $this->worksheet( $worksheet_id)) === false)
			return false;
		foreach ($ws->sheetData->row as $row) {
			
			foreach ($row->c as $c) {
				list($curC,) = $this->_columnIndex((string) $c['r']);
				$rows[ $curR ][ $curC ] = array(
					'name' => (string) $c['r'],
					'value' => $this->value($c),
					'href' => $this->href( $c ),
				);
			}
			$curR++;
		}
		return $rows;

	}
	// thx Gonzo
	function _columnIndex( $cell = 'A1' ) 
	{
		
		if (preg_match("/([A-Z]+)(\d+)/", $cell, $matches)) 
		{
			
			$col = $matches[1];
			$row = $matches[2];
			
			$colLen = strlen($col);
			$index = 0;

			for ($i = $colLen-1; $i >= 0; $i--)
				$index += (ord($col{$i}) - 64) * pow(26, $colLen-$i-1);

			return array($index-1, $row-1);
		} else
			throw new Exception("Invalid cell index.");
	}
	function value( $cell ) {
		// Determine data type
		$dataType = (string)$cell["t"];
		switch ($dataType) {
			case "s":
				// Value is a shared string
				if ((string)$cell->v != '') {
					$value = $this->sharedstrings[intval($cell->v)];
				} else {
					$value = '';
				}

				break;
				
			case "b":
				// Value is boolean
				$value = (string)$cell->v;
				if ($value == '0') {
					$value = false;
				} else if ($value == '1') {
					$value = true;
				} else {
					$value = (bool)$cell->v;
				}

				break;
				
			case "inlineStr":
				// Value is rich text inline
				$value = $this->_parseRichText($cell->is);
							
				break;
				
			case "e":
				// Value is an error message
				if ((string)$cell->v != '') {
					$value = (string)$cell->v;
				} else {
					$value = '';
				}

				break;

			default:
				// Value is a string
				$value = (string)$cell->v;

				// Check for numeric values
				if (is_numeric($value) && $dataType != 's') {
					if ($value == (int)$value) $value = (int)$value;
					elseif ($value == (float)$value) $value = (float)$value;
					elseif ($value == (double)$value) $value = (double)$value;
				}
		}
		return $value;
	}
	function href( $cell ) {
		return isset( $this->hyperlinks[ (string) $cell['r'] ] ) ? $this->hyperlinks[ (string) $cell['r'] ] : '';
	}
	function _unzip( $filename ) {
		// Clear current file
		$this->datasec = array();

		// Package information
		$this->package = array(
			'filename' => $filename,
			'mtime' => filemtime( $filename ),
			'size' => filesize( $filename ),
			'comment' => '',
			'entries' => array()
		);
        // Read file
		$oF = fopen($filename, 'rb');
		$vZ = fread($oF, $this->package['size']);
		fclose($oF);
		// Cut end of central directory
		$aE = explode("\x50\x4b\x05\x06", $vZ);

		// Normal way
		$aP = unpack('x16/v1CL', $aE[1]);
		$this->package['comment'] = substr($aE[1], 18, $aP['CL']);

		// Translates end of line from other operating systems
		$this->package['comment'] = strtr($this->package['comment'], array("\r\n" => "\n", "\r" => "\n"));

		// Cut the entries from the central directory
		$aE = explode("\x50\x4b\x01\x02", $vZ);
		// Explode to each part
		$aE = explode("\x50\x4b\x03\x04", $aE[0]);
		// Shift out spanning signature or empty entry
		array_shift($aE);

		// Loop through the entries
		foreach ($aE as $vZ) {
			$aI = array();
			$aI['E']  = 0;
			$aI['EM'] = '';
			// Retrieving local file header information
//			$aP = unpack('v1VN/v1GPF/v1CM/v1FT/v1FD/V1CRC/V1CS/V1UCS/v1FNL', $vZ);
			$aP = unpack('v1VN/v1GPF/v1CM/v1FT/v1FD/V1CRC/V1CS/V1UCS/v1FNL/v1EFL', $vZ);
			// Check if data is encrypted
//			$bE = ($aP['GPF'] && 0x0001) ? TRUE : FALSE;
			$bE = false;
			$nF = $aP['FNL'];
			$mF = $aP['EFL'];

			// Special case : value block after the compressed data
			if ($aP['GPF'] & 0x0008) {
				$aP1 = unpack('V1CRC/V1CS/V1UCS', substr($vZ, -12));

				$aP['CRC'] = $aP1['CRC'];
				$aP['CS']  = $aP1['CS'];
				$aP['UCS'] = $aP1['UCS'];

				$vZ = substr($vZ, 0, -12);
			}

			// Getting stored filename
			$aI['N'] = substr($vZ, 26, $nF);

			if (substr($aI['N'], -1) == '/') {
				// is a directory entry - will be skipped
				continue;
			}

			// Truncate full filename in path and filename
			$aI['P'] = dirname($aI['N']);
			$aI['P'] = $aI['P'] == '.' ? '' : $aI['P'];
			$aI['N'] = basename($aI['N']);

			$vZ = substr($vZ, 26 + $nF + $mF);

			if (strlen($vZ) != $aP['CS']) {
			  $aI['E']  = 1;
			  $aI['EM'] = 'Compressed size is not equal with the value in header information.';
			} else {
				if ($bE) {
					$aI['E']  = 5;
					$aI['EM'] = 'File is encrypted, which is not supported from this class.';
				} else {
					switch($aP['CM']) {
						case 0: // Stored
							// Here is nothing to do, the file ist flat.
							break;
						case 8: // Deflated
							$vZ = gzinflate($vZ);
							break;
						case 12: // BZIP2
							if (! extension_loaded('bz2')) {
								if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
								  @dl('php_bz2.dll');
								} else {
								  @dl('bz2.so');
								}
							}
							if (extension_loaded('bz2')) {
								$vZ = bzdecompress($vZ);
							} else {
								$aI['E']  = 7;
								$aI['EM'] = "PHP BZIP2 extension not available.";
							}
							break;
						default:
						  $aI['E']  = 6;
						  $aI['EM'] = "De-/Compression method {$aP['CM']} is not supported.";
					}
					if (! $aI['E']) {
						if ($vZ === FALSE) {
							$aI['E']  = 2;
							$aI['EM'] = 'Decompression of data failed.';
						} else {
							if (strlen($vZ) != $aP['UCS']) {
								$aI['E']  = 3;
								$aI['EM'] = 'Uncompressed size is not equal with the value in header information.';
							} else {
								if (crc32($vZ) != $aP['CRC']) {
									$aI['E']  = 4;
									$aI['EM'] = 'CRC32 checksum is not equal with the value in header information.';
								}
							}
						}
					}
				}
			}

			$aI['D'] = $vZ;

			// DOS to UNIX timestamp
			$aI['T'] = mktime(($aP['FT']  & 0xf800) >> 11,
							  ($aP['FT']  & 0x07e0) >>  5,
							  ($aP['FT']  & 0x001f) <<  1,
							  ($aP['FD']  & 0x01e0) >>  5,
							  ($aP['FD']  & 0x001f),
							  (($aP['FD'] & 0xfe00) >>  9) + 1980);

			//$this->Entries[] = &new SimpleUnzipEntry($aI);
			$this->package['entries'][] = array(
				'data' => $aI['D'],
				'error' => $aI['E'],
				'error_msg' => $aI['EM'],
				'name' => $aI['N'],
				'path' => $aI['P'],
				'time' => $aI['T']
			);

		} // end for each entries
	}
	function getPackage() {
		return $this->package;
	}
	function getEntryData( $name ) {
		$dir = dirname( $name );
		$name = basename( $name );
		foreach( $this->package['entries'] as $entry)
			if ( $entry['path'] == $dir && $entry['name'] == $name)
				return $entry['data'];
	}
	function unixstamp( $excelDateTime ) {
		$d = floor( $excelDateTime ); // seconds since 1900
		$t = $excelDateTime - $d;
		return ($d > 0) ? ( $d - 25569 ) * 86400 + $t * 86400 : $t * 86400;
	}
	function _parse() {
		// Document data holders
		$this->sharedstrings = array();
		$this->sheets = array();

		// Read relations and search for officeDocument
		$relations = simplexml_load_string( $this->getEntryData("_rels/.rels") );
		foreach ($relations->Relationship as $rel) {
			if ($rel["Type"] == SimpleXLSX::SCHEMA_OFFICEDOCUMENT) {
				// Found office document! Read relations for workbook...
				$workbookRelations = simplexml_load_string($this->getEntryData( dirname($rel["Target"]) . "/_rels/" . basename($rel["Target"]) . ".rels") );
				$workbookRelations->registerXPathNamespace("rel", SimpleXLSX::SCHEMA_RELATIONSHIP);
				
				// Read shared strings
				$sharedStringsPath = $workbookRelations->xpath("rel:Relationship[@Type='" . SimpleXLSX::SCHEMA_SHAREDSTRINGS . "']");
				$sharedStringsPath = (string)$sharedStringsPath[0]['Target'];              
				$xmlStrings = simplexml_load_string($this->getEntryData( dirname($rel["Target"]) . "/" . $sharedStringsPath) );            
				if (isset($xmlStrings) && isset($xmlStrings->si)) {
					foreach ($xmlStrings->si as $val) {
						if (isset($val->t)) {
							$this->sharedstrings[] = (string)$val->t;
						} elseif (isset($val->r)) {
							$this->sharedstrings[] = $this->_parseRichText($val);
						}
					}
				}

				// Loop relations for workbook and extract sheets...
				foreach ($workbookRelations->Relationship as $workbookRelation) {
					if ($workbookRelation["Type"] == SimpleXLSX::SCHEMA_WORKSHEETRELATION) {
						$this->sheets[ str_replace( 'rId', '', (string) $workbookRelation["Id"]) ] =
							simplexml_load_string( $this->getEntryData( dirname($rel["Target"]) . "/" . dirname($workbookRelation["Target"]) . "/" . basename($workbookRelation["Target"])) );
					}
				}
				
				break;
			}
		}
		
		// Sort sheets
		ksort($this->sheets);
	}
    private function _parseRichText($is = null) {
        $value = array();

        if (isset($is->t)) {
            $value[] = (string)$is->t;
        } else {
            foreach ($is->r as $run) {
                $value[] = (string)$run->t;
            }
        }

        return implode(' ', $value);
    }
}
?>
