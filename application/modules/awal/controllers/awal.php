<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class awal extends MY_Controller {

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

		if(empty($_SESSION['id_user'])){
			// header('location:'.base_url());
			echo "<script>window.location.href='".base_url()."';</script>";
			exit;
		}


	}

	public function main()

	{

			$data['ambil'] = "asd";
			$temp['content'] = $this->load->view("v_awal", $data, true);

		echo $this->load->view("main_view", $temp , true);
	}

	public function changepass(){

		$data['ambil'] = "asd";
		$temp['content'] = $this->load->view("v_ganti_password", $data, true);

		echo $this->load->view("main_view", $temp , true);
	}

	public function gantipass(){

		$newpass = md5($_POST['new']);
		$old = md5($_POST['old']);

		$cek = $this->db->query("SELECT * FROM sys_user WHERE pass_user='".$old."' AND id_user='".$_SESSION['id_user']."' ");

		if($cek->num_rows() > 0){

			$this->db->trans_start();
				$this->db->query("UPDATE sys_user SET pass_user='".$newpass."' WHERE id_user='".$_SESSION['id_user']."' ");
			$this->db->trans_complete();

				if($this->db->trans_status() === false){

					$this->db->trans_rollback();
					$data['error']= 1;

				} else {

					$data['error']= 0;

				}
		} else {

			$data['error']= 2 ;
		}

		echo json_encode($data);

	}

	public function maintenence(){
		echo $this->load->view("v_maintenence");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */