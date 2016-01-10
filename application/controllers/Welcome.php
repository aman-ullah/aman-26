<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');


class Welcome extends REST_Controller {

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
		echo 'high';
		
		$this->load->library('rest', array('server' => 'http://twitter.com/'));
 
		$user = $this->rest->get('users/show', array('screen_name' => 'Aman Ullah Aman'));
		
		$this->load->library('rest', array(
		'server' => 'http://twitter.com/',
		'http_user' => 'aman_ullah_aman',
		'http_pass' => 'asdzxc1',
		'http_auth' => 'basic'
));

	$this->load->view('welcome_message');
	$user = $this->rest->post('statuses/update.json', array('status' => 'Using the REST client to do stuff'));	
		$this->load->view('welcome_message');
	}
	
	function user_get(){
	
	}
	
	function users_get(){
	
	}
}
