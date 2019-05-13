<?php defined('BASEPATH') or exit('No direct script access allowed'); 
/**
 * CodeIgniter Google AJAX API Library
 *
 * A CodeIgniter library that interacts with the Google AJAX API.
 *
 * @package		CodeIgniter
 * @subpackage	Google
 * @author		Dan Horrigan <http://dhorrigan.com>
 * @license		Apache License v2.0
 * @copyright	2010 Dan Horrigan
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Google class
 *
 * @subpackage	Google
 */
class Google
{
	/**
	 * The global CI object
	 */
	private $_ci;
	
	/**
	 * The base API url
	 */
	private $_api_base = 'http://ajax.googleapis.com/ajax/services/search/';

	/**
	 * The API version to use
	 */
	private $_api_version = '1.0';
	
	/**
	 * Valid API calls
	 */
	private $_valid_calls = array('web','local','video','blogs','news','books','images','patent');
	
	/**
	 * The amount of results to return.
	 * NOTE: Google limits you to 8 per request.
	 */
	public $result_size = 8;
	
	/**
	 * Contruct
	 *
	 * Gets the global CI object
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		$this->_ci =& get_instance();
	}

	/**
	 * __Call overload
	 *
	 * Makes sure the function name is a valid API call, then makes the call.
	 * API calls takes 2 parameters:
	 * 1 - The search string
	 * 2 - An array of options
	 *
	 * Examples:
	 * $this->google->web('codeigniter');
	 * $this->google->images('cougar', array('safe' => 'active'));
	 *
	 * @access	public
	 * @param	string	$name
	 * @param	array	$args
	 * @return	object	The response data object
	 */
	public function __call($name, $args)
	{
		// Check if the function name is a valid API call.
		if(!in_array($name, $this->_valid_calls))
		{
			show_error(sprintf('"%s" is not a valid Google API function.', $name));
		}
		
		return $this->_api_call($name, $args[0], isset($args[1]) ? $args[1] : array());
	}
	
	/**
	 * API Call
	 *
	 * Makes the API call to Google.
	 *
	 * @access	private
	 * @param	string	$type
	 * @param	string	$q
	 * @return	object	The response data object
	 */
	private function _api_call($type, $q, $params = array())
	{
		$url = $this->_api_base . $type . '?v=' . $this->_api_version;
		$params['q'] = $q;
		(!isset($params['rsz'])) AND $params['rsz'] = $this->result_size;

		foreach($params as $name => $val)
		{
			$url .= '&' . $name . '=' . rawurlencode($val);
		}
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, $this->_ci->config->site_url($this->_ci->uri->uri_string()));
		$response = curl_exec($ch);
		curl_close($ch);

		$response = json_decode($response);

		if($response->responseStatus != 200)
		{
			show_error(sprintf('Google API Error (%s): %s', $response->responseStatus, $response->responseDetails));
		}
		return $response->responseData;
	}
}

/* End of file Google.php */