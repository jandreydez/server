<?php
 
	/**
	*
	* @package FileCache - A simple file based cache
	* @author Erik Giberti
	* @copyright 2010 Erik Giberti, all rights reserved
	* @license http://opensource.org/licenses/gpl-license.php GNU Public License
	*
	* Class to implement a file based cache. This is useful for caching large objects such as
	* API/Curl responses or HTML results that aren't well suited to storing in small memory caches
	* or are infrequently accessed but are still expensive to generate.
	*
	* For security reasons, it's *strongly* recommended you set your cache directory to be outside
	* of your web root and on a drive independent of your operating system.
	*
	* Uses JSON to serialize the data object.
	*
	* Sample usage:
	*
	* $cache = new FileCache('/var/www/cache/');
	* $data = $cache->get('sampledata');
	* if(!$data){
	*	  $data = array('a'=>1,'b'=>2,'c'=>3);
	*	  $cache->set('sampledata', $data, 3600);
	* }
	* print $data['a'];
	*
	*/
 
 
// Requires the native JSON library
if (!function_exists('json_decode') || !function_exists('json_encode')) {
  throw new Exception('Cache needs the JSON PHP extensions.');
}
 
class FileCache {
 
	/**
	* Value is pre-pended to the cache, should be the full path to the directory
	*/
	protected $root = null;
 
	/**
	* For holding any error messages that may have been raised
	*/
	protected $error = null;
 
	/**
	* @param string $root The root of the file cache.
	*/
	function __construct($root = '/tmp/'){
		$this->root = $root;
	}
 
	/**
	* Saves data to the cache. Anything that evaluates to false, null, '', boolean false, 0 will
	* not be saved.
	* @param string $key An identifier for the data
	* @param mixed $data The data to save
	* @param int $ttl Seconds to store the data
	* @returns boolean True if the save was successful, false if it failed
	*/
	public function set($key, $data = false, $ttl = 3600){
		if(!$key) {
			$this->error = "Invalid key";
			return false;
		}
		if(!$data){
			$this->error = "Invalid data";
			return false;
		}
		$key = $this->_make_file_key($key);
		$store = array(
			'data' => $data,
			'ttl'  => time() + $ttl,
		);
		$status = false;
		try {
			$fh = fopen($key, "w+");
			if(flock($fh, LOCK_EX)){
				ftruncate($fh, 0);
				fwrite($fh, json_encode($store));
				flock($fh, LOCK_UN);
				$status = true;
			}
			fclose($fh);
		} catch (Exception $e) {
			$this->error = "Exception caught: " . $e->getMessage();
			return false;
		}
		return $status;
	}
 
	/**
	* Reads the data from the cache
	* @param string $key An identifier for the data
	* @returns mixed Data that was stored
	*/
	public function get($key){
		if(!$key) {
			$this->error = "Invalid key";
			return false;
		}
 
		$key = $this->_make_file_key($key);
		$file_content = null;
 
		// Get the data from the file
		try {
			$fh = fopen($key, "r");
			if(flock($fh, LOCK_SH)){
				$file_content = fread($fh, filesize($key));
			}
			fclose($fh);
		} catch (Exception $e) {
			$this->error = "Exception caught: " . $e->getMessage();
			return false;
		}
 
		// Assuming we got something back...
		if($file_content){
			$store = json_decode($file_content, true);
			if($store['ttl'] < time()){
				unlink($key);	// remove the file
				$this->error = "Data expired";
				return false;
			}
		}
		return $store['data'];
	}
 
	/**
	* Remove a key, regardless of it's expire time
	* @param string $key An identifier for the data
	*/
	public function delete($key){
		if(!$key) {
			$this->error = "Invalid key";
			return false;
		}
 
		$key = $this->_make_file_key($key);
 
		try {
			unlink($key);	// remove the file
		} catch (Exception $e) {
			$this->error = "Exception caught: " . $e->getMessage();
			return false;
		}
 
		return true;
	}
 
	/**
	* Reads and clears the internal error
	* @returns string Text of the error raised by the last process
	*/
	public function get_error(){
		$message = $this->error;
		$this->error = null;
		return $message;
	}
 
	/**
	* Can be used to inspect internal error
	* @returns boolean True if we have an error, false if we don't
	*/
	public function have_error(){
		return ($this->error !== null) ? true : false;
	}
 
	/**
	* Create a key for the cache
	* @todo Beef up the cleansing of the file.
	* @param string $key The key to create
	* @returns string The full path and filename to access
	*/
	private function _make_file_key($key){
		$safe_key = str_replace(array('.','/',':','\''), array('_','-','-','-'), trim($key));
		return $this->root . $safe_key;
	}
}

$cache = new FileCache('/var/www/cache/');
$data = $cache->get('sampledata');

if(!$data){
	$data = array('a'=>1,'b'=>2,'c'=>3);
	$cache->set('sampledata', $data, 3600);
}

print $data['a'];