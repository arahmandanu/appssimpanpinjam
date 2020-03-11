<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends MY_Controller {

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

	public function __construct() 

	{

		parent::__construct();


		
	}

	public function index()

	{
			
		if(!empty($_SESSION['id_user'])){
			// header('location:'.base_url());
			echo "<script>window.location.href='".base_url()."awal/main';</script>";
			exit;
			
		}
		else {

			echo $this->load->view("login");

		}
				
	}

	public function masuk()

	{

		$user = $_POST['username'];
		$pass = md5($_POST['password']);

			$cek = $this->db->query("SELECT * FROM sys_user where username='".$user."' AND pass_user='".$pass."' ");

		if($cek->num_rows() > 0 ){

			$session = $cek->row_array();

			$_SESSION['id_user'] = $session['id_user'];

			$_SESSION['username'] = $session['username'];

			$_SESSION['nama_user'] = $session['nama_user'];

			$_SESSION['email_user'] = $session['email_user'];

			$_SESSION['level'] = $session['previleg'];

			// print_r($_SESSION);


			echo "<script> window.location='".base_url()."awal/main'; </script>";	

		} else {

			$this->session->set_flashdata('gagal_login' , 'Password atau email Salah');

			redirect('login');
		}


		
	}

	public function logout(){

		session_destroy();

		header('location:'.base_url());
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */