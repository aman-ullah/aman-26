<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require(APPPATH'.libraries/REST_Controller.php');


class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
	
		
		$oauth_hash = '';
	$oauth_hash .= 'oauth_consumer_key=hdX5063ycNalkRvVbNDDZdlSN&';
$oauth_hash .= 'oauth_nonce=' . time() . '&';
$oauth_hash .= 'oauth_signature_method=HMAC-SHA1&';
$oauth_hash .= 'oauth_timestamp=' . time() . '&';
$oauth_hash .= 'oauth_token=429053721-zPe5PTpLld6tLN6MSw2uNhG9fxtC38XBh1xFilzA&';
$oauth_hash .= 'oauth_version=1.0&';
$oauth_hash .= 'screen_name=premierleague';

$base = '';
$base .= 'GET';
$base .= '&';
$base .= rawurlencode('https://api.twitter.com/1.1/statuses/user_timeline.json');
$base .= '&';
$base .= rawurlencode($oauth_hash);
$key = '';
$key .= rawurlencode('TDMnKw2mnpFgRuMHW6tOaceXS0XbT0ciJ0VNK7dmHTaf3NFl56');
$key .= '&';
$key .= rawurlencode('xN5ZOEjLD6oyYpI8ezJxqdsOfTy0IF5DY7F5Tq2EZfOmC');
$signature = base64_encode(hash_hmac('sha1', $base, $key, true));
$signature = rawurlencode($signature);



$oauth_header = '';
$oauth_header .= 'oauth_consumer_key="hdX5063ycNalkRvVbNDDZdlSN", ';
$oauth_header .= 'oauth_nonce="' . time() . '", ';
$oauth_header .= 'oauth_signature="' . $signature . '", ';
$oauth_header .= 'oauth_signature_method="HMAC-SHA1", ';
$oauth_header .= 'oauth_timestamp="' . time() . '", ';
$oauth_header .= 'oauth_token="429053721-zPe5PTpLld6tLN6MSw2uNhG9fxtC38XBh1xFilzA", ';
$oauth_header .= 'oauth_version="1.0", ';
$oauth_header .= 'screen_name="premierleague"';

$curl_header = array("Authorization: Oauth {$oauth_header}", 'Expect:');


$curl_request = curl_init();
curl_setopt($curl_request, CURLOPT_HTTPHEADER, $curl_header);
curl_setopt($curl_request, CURLOPT_HEADER, false);
curl_setopt($curl_request, CURLOPT_URL, 'https://api.twitter.com/1.1/statuses/user_timeline.json');
curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_request, CURLOPT_URL, 'https://api.twitter.com/1.1/statuses/user_timeline.json?count=TOTAL_COUNT_YOU_WANT&screen_name=premierleague');

$json = curl_exec($curl_request);
//echo $json;
curl_close($curl_request);
echo $json;
		
		/*$this->load->library('rest', array('server' => 'http://twitter.com/'));
 
		$user = $this->rest->get('users/show', array('screen_name' => 'Aman Ullah Aman'));
		
		$this->load->library('rest', array(
		'server' => 'http://twitter.com/',
		'http_user' => 'aman_ullah_aman',
		'http_pass' => 'asdzxc1',
		'http_auth' => 'basic'
));
*/
	//$this->load->view('welcome_message');
//$user = $this->rest->post('statuses/update.json', array('status' => 'Using the REST client to do stuff'));	
		//$this->load->view('welcome_message');
	}
	
	function user_get(){
	
	}
	
	function users_get(){
	
	}
}
