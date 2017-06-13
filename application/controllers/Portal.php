<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class Portal extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$this->load->view('global/top');
			$this->load->view('portal/switch');
			$this->load->view('global/bottom');	
		}
	}
	
	/*End of file portal.php*/
	/*Location:.application/controllers/Portal.php*/