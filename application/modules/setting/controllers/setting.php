<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting extends MY_Controller {

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

		$data['user'] = $this->db->query("SELECT * FROM sys_user"); 

			
			echo $this->load->view("v_setting" , $data , true );

	}

	public function tambahuser(){

		echo $this->load->view("v_tambah_user");

	}

	public function edituser($id){

			$data['user'] = $this->db->query("SELECT * FROM sys_user WHERE id_user = '".$id."'");

		echo $this->load->view("v_edit_user" , $data , true);

	}

	public function simpanedituser(){

		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$level = $_POST['level'];
		$id = $_POST['id_user'];

			
		// Cek UserName dulu bro
		$cekusername = $this->db->query("SELECT * FROM sys_user WHERE username = '".$username."' AND id_user <> '".$id."'");

			if($cekusername->num_rows() > 0 ){

				$data['status'] = "ada";

			} else {

				$this->db->trans_start();

					 $this->db->query("UPDATE sys_user SET username = '".$username."',nama_user = '".$nama."', email_user = '".$email."',pass_user = '".$password."',previleg ='".$level."' WHERE id_user = '".$id."' ");

				$this->db->trans_complete();

				if($this->db->trans_status() === false){

					$this->db->trans_rollback();

					$data['status']	= "error";

				} else {

					$data['status'] = "berhasil";
				}

			}

		echo json_encode($data);

	}

	public function addnew(){

		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$level = $_POST['level'];

		// Cek UserName Apa ada yang sama
		$cekusername = $this->db->query("SELECT * FROM sys_user WHERE username = '".$username."'");

			if($cekusername->num_rows() > 0 ){

				$data['status'] = "ada";

			} else {

				$this->db->trans_start();

				$this->db->query("INSERT INTO sys_user (username,nama_user,email_user,pass_user,previleg) VALUES ('".$username."' ,'".$nama."' , '".$email."','".$password."','".$level."')" );

				$this->db->trans_complete();

				if($this->db->trans_status() === false ){

					$this->db->trans_rollback();

					$data['status']	= "error";

				} else {

					$data['status'] = "berhasil";
				}

			}

		echo json_encode($data);
	}

	public function hapususer(){

		$data['iduser'] = $_POST['id_user'];

		echo json_encode($data);
	}

	public function resetpass(){

		$id_user = $_POST['iduser'];

		$newpass = md5(12345678);

		$this->db->trans_start();
			$this->db->query("UPDATE sys_user SET pass_user= '".$newpass."' WHERE id_user='".$id_user."' ");
		$this->db->trans_complete();

		if($this->db->trans_status() === false ){

			$data['error'] = 1;
			$this->db->trans_rollback();

		} else  {

			$data['error'] = 0;
		}

		echo json_encode($data);

	}

	public function settingnotif(){

		$data['email'] = $this->db->query("SELECT * FROM sys_notif");

	echo $this->load->view("v_email" , $data, true);

	}

	public function simpaneditemail(){

		$idemail = $_POST['idemail'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$status = $_POST['status'];
		$day = date("Y-m-d H-i-s");

		$this->db->trans_begin();
			$this->db->query("UPDATE sys_notif SET nama='".$nama."', email='".$email."' , status='".$status."' , date_created='".$day."' WHERE id='".$idemail."' ");
		$this->db->trans_complete();

			if($this->db->trans_status() === false){

				$this->db->trans_rollback();

				$data['error'] = 1;

			} else {

				$data['error'] = 0;
			}

		echo json_encode($data);

	}

	public function hapusemail(){

		$idemail = $_POST['idemail'];

		$this->db->trans_start();
			$this->db->query("DELETE FROM sys_notif WHERE id='".$idemail."'");
		$this->db->trans_complete();

			if($this->db->trans_status() === false){

				$this->db->trans_rollback();
				$data['error'] = 1;

			} else {

				$data['error'] = 0;
			}
		
		echo json_encode($data);

	}

	public function simpanbaruemail(){
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$status = $_POST['status'];
		$date = date("Y-m-d H-i-s");

		$this->db->trans_start();
			$this->db->query("INSERT INTO sys_notif (nama, email, status, date_created) VALUES ('".$nama."','".$email."','".$status."','".$date."')");
			$id = $this->db->insert_id();
		$this->db->trans_complete();

			if($this->db->trans_status() === false){

				$this->db->trans_rollback();
				$data['error']=1;

			} else {
				$data['idemail'] = $id;
				$data['error']=0;

			}

		echo json_encode($data);
	}

	public function Uploadmasterdata(){

		echo $this->load->view("v_upload_sql");
	}

	public function insertdatabaru(){

		// $tgl = $_POST['tgl'];

		// $pecah = explode("-", $tgl);

		// // Variabel Tinggal Pakai nanti buat query tanggal dan bulan
		// $tahun = substr($pecah[0],2);
		// $bulan = $pecah[1];
		// $tanggal = $pecah[2];

		// $tabel1 = 'V_CLD08762';

		// // DISINI Papa gabungin string sama variable php gak bisa ' + "

		$query = 'SELECT * FROM '.$tabel1.' where rc like "0624%" ';

		// echo $query;

		// exit;




		// Koneksi Ke ODBC
		$konek = odbc_connect("brgprod", "", "");


		if($konek){
			$resp['count'] = 0;

			$query = odbc_do($konek, "SELECT * FROM Debitur");

			// Fungsi Cek data di odb ke database
			while($key= odbc_fetch_array($query)) {


				// ini gabungin note_no,seq_no,no_ikat  Buat Dijadiin id unik di databaseku
				// $iddeb = $key['note_no'].$key['seq_no'] .$key['no_ikat'];

				$iddeb = $key['NOTE_NO'].$key['SEQ_NO'] .$key['NO_IKAT'];
				echo $iddeb;
				exit;




					// Query Data di Database
					$data = $this->db->query("SELECT * FROM master_data WHERE id_debitur='".$iddeb."' ");

					if($data->num_rows() == 0){
					
						$this->db->trans_begin();
							$insert = $this->db->query("INSERT INTO master_data (id_debitur,ctrl1,ctrl2,ctrl3,cif_no,note_no, pmlk_jmn,status, alamat_jmn,jenis_ikat,jen_dok_jm,no_dok_jmn,developer,draw_no,part_no,seq_no,rc,bi_code,bii_code,tgl_ikat, no_ikat,nm_notaris,nm_asrk,nopls_asrk,nilai_asrk,jttmpoasrk,bkclseasrk,sandi_wil,unit_jmn,luas_tanah, luas_bang,exp_date,nama_asj,polis_asl,nilai_asl,jt_tmp_asj,bk_cls_asj,no_apht,nilai_apht,tglapht) VALUES 
								('".$iddeb."','".$key['ctrl1']."', '".$key['ctrl2']."', '".$key['ctrl3']."', '".$key['cif_no']."', '".$key['note_no']."',  '".$key['pmlk_jmn']."', '".$key['status']."',  '".$key['alamat_jmn']."', '".$key['jenis_ikat']."','".$key['jen_dok_jm']."','".$key['no_dok_jmn']."','".$key['developer']."','".$key['draw_no']."','".$key['part_no']."','".$key['seq_no']."','".$key['rc']."','".$key['bi_code']."','".$key['bii_code']."','".$key['tgl_ikat']."', '".$key['no_ikat']."','".$key['nm_notaris']."','".$key['nm_asrk']."','".$key['nopls_asrk']."','".$key['nilai_asrk']."','".$key['jttmpoasrk']."','".$key['bkclseasrk']."','".$key['sandi_wil']."','".$key['unit_jmn']."','".$key['luas_tanah']."', '".$key['luas_bang']."','".$key['exp_date']."','".$key['nama_asj']."','".$key['polis_asl']."','".$key['nilai_asl']."','".$key['jt_tmp_asj']."','".$key['bk_cls_asj']."','".$key['no_apht']."','".$key['nilai_apht']."','".$key['tglapht']."')");
						$this->db->trans_complete();

						$resp['count']++;
					}
			
			}

							if($this->db->trans_status() === false){

								$resp['error'] = 1;
								$resp['respond'] = "Something Wrong";
								$this->db->trans_rollback();

							} else {

								$resp['error'] = 0;
								$resp['respond'] = "Succes";

							}

		} else {

		$resp['error'] = 2;
		$resp['respond'] = "!koneksi";

		}

		echo json_encode($resp);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */