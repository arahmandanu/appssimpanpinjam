<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class debitur extends MY_Controller {

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

		$data['debitur'] = $this->db->query("SELECT is_pinjam , pmlk_jmn , status , alamat_jmn , jenis_ikat , jen_dok_jm , no_dok_jmn , developer , is_approve , is_note , status_lunas  FROM master_data"); 

			
			echo $this->load->view("v_debitur" , $data , true );

		
	}

	public function listpinjaman()

	{

		echo $this->load->view("v_debitur_pinjam");

	}

	public function getnocover(){

		$userno_note = $this->db->query("SELECT a.*,b.nama_user FROM master_data a left join sys_user b on a.id_user=b.id_user where is_pinjam = 1 AND is_approve = 1 AND is_note = 0 AND jenis_trx='peminjaman'");
		$strHtml = '';

		if($userno_note->num_rows() > 0 ){
			$no=1;

			foreach ($userno_note->result() as $key => $value) {
				$strHtml .=	'<tr> 

								<td>'.$no.'</td>

								<td>'.$value->pmlk_jmn.'</td>

								<td>'.$value->nama_user.'</td>

								<td>'.$value->ket_pinjam.'</td>

								<td>'.$value->date_pinjam.'</td>

								<td>'.$value->date_kembali.'</td>

							</tr>';

				$no++;
			}

		} else {

			$strHtml ='';
			// $strHtml .='<tr><td colspan="6" class="dataTables_empty" > :: Semua Peminjaman Sudah Memasukkan Cover Note :: </td></tr>';

		}

		$data['isi'] = $strHtml;
		
		echo json_encode($data);
	}



	public function getlebihbataswaktu(){

		$datenow = date('y-m-d');

		$lebihwaktu = $this->db->query("SELECT a.*, b.nama_user FROM master_data a LEFT JOIN sys_user b ON a.id_user = b.id_user WHERE is_pinjam = 1 AND jenis_trx='peminjaman' AND ( SELECT DATEDIFF(CURDATE(), a.date_kembali)) > 0");

		$strHtml = '';

		if($lebihwaktu->num_rows() > 0 ){
			$no=1;

			foreach ($lebihwaktu->result() as $key => $value) {
				$strHtml .=	'<tr> 

								<td>'.$no.'</td>

								<td>'.$value->pmlk_jmn.'</td>

								<td>'.$value->nama_user.'</td>

								<td>'.$value->ket_pinjam.'</td>

								<td>'.$value->date_pinjam.'</td>

								<td>'.$value->date_kembali.'</td>

							</tr>';

				$no++;
			}

		} else {

			$strHtml ='';
			// $strHtml .='<tr> <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>	 </tr>';

		}

		$data['isi'] = $strHtml;
		
		echo json_encode($data);

	}

	public function allpinjam(){

		$semua = $this->db->query("SELECT a.*,b.nama_user FROM master_data a LEFT JOIN 
											sys_user b ON a.id_user=b.id_user WHERE is_pinjam=1 AND jenis_trx='peminjaman' ");

		$strHtml = '';

		if($semua->num_rows() > 0 ){
			$no=1;

			foreach ($semua->result() as $key => $value) {
				$strHtml .=	'<tr> 

								<td>'.$no.'</td>

								<td>'.$value->pmlk_jmn.'</td>

								<td>'.$value->nama_user.'</td>

								<td>'.$value->ket_pinjam.'</td>

								<td>'.$value->date_pinjam.'</td>

								<td>'.$value->date_kembali.'</td>

							</tr>';

				$no++;
			}

		} else {

			$strHtml ='';
			// $strHtml .='<tr> <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>
			// 				 <td> :: Tidak Ada Yang Melebihi Batas Peminjaman :: </td>	 </tr>';

		}

		$data['isi'] = $strHtml;
		
		echo json_encode($data);

	}

	public function printdata($jenis) {
		$datenow = date('y-m-d');

		switch ($jenis) {

			case 'nocover':
				$data['user'] = $this->db->query("SELECT a.*,b.nama_user FROM master_data a left join sys_user b on a.id_user=b.id_user where is_pinjam = 1 AND is_approve = 1 AND is_note = 0 AND jenis_trx='peminjaman' ");

				$data['judul'] = "Laporan Peminjaman Belum Ada Cover Note";
				header("Content-Disposition: attachment; filename=belumadacovernote.xls");
				break;

			case 'waktu':
				$data['user'] = $this->db->query("SELECT a.*, b.nama_user FROM master_data a LEFT JOIN sys_user b ON a.id_user = b.id_user WHERE is_pinjam = 1 AND jenis_trx='peminjaman' AND ( SELECT DATEDIFF(CURDATE(), a.date_kembali)) > 0");				

				$data['judul'] = "Laporan Peminjaman Yang Melebihi Tanggal Kembali";
				header("Content-Disposition: attachment; filename=waktupeminjaman.xls");
				break;

			case 'semua':
				$data['user'] = $this->db->query("SELECT a.*,b.nama_user FROM master_data a LEFT JOIN 
											sys_user b ON a.id_user=b.id_user WHERE is_pinjam=1 AND jenis_trx='peminjaman' ");

				$data['judul'] = "Laporan Peminjaman Yang Dilakukan";
				header("Content-Disposition: attachment; filename=datapeminjaman.xls");
				
				break;

			default:
				$data['user'] = NULL;
				break;
		}


		header("Content-type: application/vnd-ms-excel");
		

		echo $this->load->view("debitur/laporancetak" , $data , true);


	}

	public function cetaklistdebitur(){

		$data['debitur'] = $this->db->query("SELECT * FROM master_data");

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=daftardebitur.xls");

		echo $this->load->view("cetaklistdebitur" , $data , true);


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */