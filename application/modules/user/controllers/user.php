<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends MY_Controller {

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

		require 'vendors/vendor/autoload.php';

		if(empty($_SESSION['id_user'])){
			// header('location:'.base_url());
			echo "<script>window.location.href='".base_url()."';</script>";
			exit;
		}


	}

	public function main()

	{
			
			echo $this->load->view("v_user");

		
	}

	public function daftaruser(){

		$user = $this->db->query("SELECT  jenis_trx ,status_lunas , id_debitur , PMLK_JMN , ALAMAT_JMN , CIF_NO ,  NO_APHT , is_pinjam , is_approve FROM master_data ORDER BY status_lunas  ");
		$strHtml = '';

		if($user->num_rows() > 0){
			
			$no=1;

			foreach ($user->result() as $key => $value) {

				if($value->jenis_trx == "peminjaman"){

					$button	= ($value->is_pinjam == 0) ? "<button class='btn btn-custon-rounded-three btn-primary' type='button' onclick='ambiluser(this)'>Pilih</button> <button class='btn btn-custon-rounded-three btn-success' onclick='det(this)'><i class='glyphicon glyphicon-info-sign'></i></button>" : "<label id='status'>Sudah Dipinjam</label>" ;

				} else if($value->jenis_trx == "pelunasan"){

					$button = ($value->is_approve == 0) ? "<label id='status2'>Tahap Pelunasan</label>" : "<label id='status2'>Lunas</label>";

				} else {

					$button = "<button class='btn btn-custon-rounded-three btn-primary' type='button' onclick='ambiluser(this)'>Pilih</button> <button class='btn btn-custon-rounded-three btn-success' onclick='det(this)'><i class='glyphicon glyphicon-info-sign'></i></button>";
				}

				$strHtml .= "<tr>

								<td style='vertical-align:middle;'> <input type='hidden' name='id' value='$value->id_debitur'>$no</td>

								<td style='vertical-align:middle;'> <label id='namanyadebitur'>$value->PMLK_JMN</label> </td>

								<td style='vertical-align:middle;'> <label>$value->CIF_NO<label> </td>

								<td style='vertical-align:middle;'> <label>$value->NO_APHT</label> </td>

								<td style='vertical-align:middle;'> <label>$value->ALAMAT_JMN</label> </td>

								<td style='vertical-align:middle;'> $button</td>
 
							</tr>";

				$no++; 
			}

		} else {
			$strHtml ='';

			$strHtml .= '<tr style="vertical-align:middle;"> Data Kosong </tr>';
		}

		$data['user'] = $strHtml;

		echo json_encode($data);

	}

	public function pinjambaru(){

		$tglpinjam = $_POST['mulai'];
		$tglkembali = $_POST['selesai'];
		$iddebitur= $_POST['iddebitur'];
		$apa = $_POST['apa'];
		$alasan = $_POST['alasan'];


		// Insert untuk buat id peminjaman
		$this->db->trans_start();

			$this->db->query("UPDATE master_data SET jenis_trx='peminjaman',id_user='".$_SESSION['id_user']."' , ket_pinjam='".$apa."' , alasan_pinjam='".$alasan."' , date_pinjam='".$tglpinjam."' , date_kembali='".$tglkembali."' WHERE id_debitur='".$iddebitur."' ");
			$idpinjam = $this->db->insert_id();

		$this->db->trans_complete();	

		if($this->db->trans_status() === FALSE){

			$this->db->trans_rollback();
			$data['error'] = 1;

		} else {

			$query = $this->db->query("UPDATE master_data SET is_pinjam = 1 WHERE id_debitur='".$iddebitur."'");

			if($query){

				$data['error'] = 0;
				$data['pesan'] = "berhasil";
				$data['iddeb'] = $iddebitur;
				$data['alamat'] = base_url()."user/cetakpdfpeminjaman/".$iddebitur;

			} else {

				$data['error'] = 1;

			}

		}
			
			// print_r($data);
			// exit;
			
			// cari penerima Notifikasinya
			$notif = $this->db->query("SELECT email FROM sys_notif WHERE status=1");

			// Cari Nama Debitur Yang Dipinjam
			$nmdeb = $this->db->query("SELECT pmlk_jmn as nama FROM master_data WHERE id_debitur='".$iddebitur."'");

			// Pengiriman Email
			require("vendors/vendor/phpmailer/src/Exception.php");
			require("vendors/vendor/phpmailer/src/PHPMailer.php");
			require("vendors/vendor/phpmailer/src/SMTP.php");


			$mail = new PHPMailer\PHPMailer\PHPMailer(true);

			try {

				//Server settings
		    // $mail->SMTPDebug = 2;                                       // Enable verbose debug output
		    $mail->isSMTP();                                            // Set mailer to use SMTP
		    $mail->Host       = "tls://smtp.gmail.com";					// Specify main and backup SMTP servers
		    // $mail->Host       = "tls://outlook-dr.bankbii.com";	

		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

		    $mail->Username   = "syncore.adrian@gmail.com";                   // SMTP username
		    $mail->Password   = "syncore12345";                               // SMTP password

		    // $mail->Username   = "HR12741";
		    // $mail->Password   = "KCsolo*8";


		    $mail->SMTPSecure = "tls";                                  // Enable TLS encryption, `ssl` also accepted
		    $mail->Port       = 587;                                    // TCP port to connect to
		    // $mail->Port       = 25;
		    
			// $mail->Debugoutput = 'html';

		    //Recipients
    		$mail->setFrom('donotreply@gmail.com', 'donotreply');

    		// Penerima
    		foreach ($notif->result() as $key => $value) {
    		$mail->addAddress($value->email, "Penerima");			
    		}
    		
    		// ISI EMAIL
    		$kontenemail = '<table width="100%;">
    							<tr>
    								<td style="text-align:right;">Nama Peminjam : </td>
    								<td>'.$_SESSION['nama_user'].'</td>	
    							</tr>

    							<tr>
    								<td style="text-align:right;">Nama Debitur : </td>
    								<td>'.$nmdeb->first_row()->nama.'</td>
    							</tr>

    							<tr>
    								<td style="text-align:right;">Keterangan Pinjam : </td>
    								<td>'.$apa.'</td>
    							</tr>

    							<tr>
    								<td style="text-align:right;">Tanggal Pinjam : </td>
    								<td>'.$tglpinjam.'</td>
    							</tr>

    							<tr>
    								<td style="text-align:right;">Tanggal Balik : </td>
    								<td>'.$tglkembali.'</td>
    							</tr>

    						</table>';

    		// Content
		    $mail->isHTML(true);                                    // Set email format to HTML
		    $mail->Subject = 'Informasi Peminjaman';
		    $mail->Body    =  $kontenemail;

		    $mail->send();


			} catch (Exception $e) { 


			}

		
			echo json_encode($data);
	}


	public function kembalipinjaman(){

		$data['pinjam'] = $this->db->query("SELECT * FROM master_data WHERE is_pinjam=1 AND jenis_trx='peminjaman' AND id_user='".$_SESSION['id_user']."'");
		
		echo $this->load->view("v_user_balik" , $data , true);


	}

	public function selesaipinjaman(){

		$id_uniq = $_POST['id_uniq'];

		$this->db->trans_start();

			$query = $this->db->query("UPDATE master_data SET is_kembali = 1 WHERE id_debitur='".$id_uniq."'");

		$this->db->trans_complete();

		if($this->db->trans_status() === false){

			$data['error'] = 1 ;
			$data['pesan'] = "gagal" ;

			$this->db->trans_rollback();

		} else {

			$data['error'] = 0 ;
			$data['pesan'] = "berhasil" ;

		}

		echo json_encode($data);
	}


	public function historypeminjamanku(){

		$data['history'] = $this->db->query("SELECT a.*,b.nama_user FROM history_peminjaman a 
													LEFT JOIN sys_user b ON a.id_user = b.id_user WHERE a.id_user='".$_SESSION['id_user']."' ORDER BY id DESC ");

			echo $this->load->view("v_history_peminjaman_saya", $data , true);

	}

	public function lihatdetaildebitur(){

		$iddeb = $_POST['iddeb'];

		$detail = $this->db->query("SELECT * FROM master_data WHERE id_debitur='".$iddeb."'");

		$data['isi']= $detail->result_array();

		echo json_encode($data);

	}

	public function cetakpdfpeminjaman(){

		$iddeb = $_GET['iddeb'];
		
		$data['debitur']=$this->db->query("SELECT * FROM master_data WHERE id_debitur='".$iddeb."'");

		echo $this->load->view("cetak_peminjaman_dokumen_pdf" ,$data,true);



	}

	public function pelunasandebitur(){

		$tgl = $_POST['tgllunas'];
		$iddebitur = $_POST['iddeb'];

		$this->db->trans_begin();
			$this->db->query("UPDATE master_data SET jenis_trx='pelunasan',id_user='".$_SESSION['id_user']."',tgl_lunas='".$tgl."' WHERE id_debitur='".$iddebitur."' ");
		$this->db->trans_complete();
		
			if($this->db->trans_status() === false){
				$this->db->trans_rollback();
				$data['error']=1;
			} else {
				$data['error']=0;
			}

		echo json_encode($data)	;
	} 

	public function statuspelunasan(){

		$data['history'] = $this->db->query("SELECT a.* , b.nama_user FROM master_data a LEFT JOIN sys_user b ON a.id_user = b.id_user WHERE jenis_trx='pelunasan' AND a.id_user='".$_SESSION['id_user']."' ");

			echo $this->load->view("v_status_pelunasan", $data , true);

	}

	public function masukkandokumen(){

		echo $this->load->view("v_masuk_dokumen");

	}

	public function daftarusertgldokumen(){

		$user = $this->db->query("SELECT  jenis_trx ,status_lunas , id_debitur , PMLK_JMN , ALAMAT_JMN , CIF_NO ,  NO_APHT , is_pinjam , is_approve FROM master_data WHERE tgl_dokumen_masuk IS NULL");
		$strHtml ='';

		if($user->num_rows() > 0){
			
			$no=1;

			foreach ($user->result() as $key => $value) {

				if($value->jenis_trx == "peminjaman"){

					$button	= ($value->is_pinjam == 0) ? "<button class='btn btn-custon-rounded-three btn-primary' type='button' onclick='ambiluser(this)'>Pilih</button> <button class='btn btn-custon-rounded-three btn-success' onclick='det(this)'><i class='glyphicon glyphicon-info-sign'></i></button>" : "<label id='status'>Dipinjam</label> <br> <button class='btn btn-custon-rounded-three btn-primary' type='button' onclick='ambiluser(this)'>Pilih</button> <button class='btn btn-custon-rounded-three btn-success' onclick='det(this)'><i class='glyphicon glyphicon-info-sign'></i></button>" ;

				} else {

					$button = "<button class='btn btn-custon-rounded-three btn-primary' type='button' onclick='ambiluser(this)'>Pilih</button> <button class='btn btn-custon-rounded-three btn-success' onclick='det(this)'><i class='glyphicon glyphicon-info-sign'></i></button>";
				}

				$strHtml .= "<tr>

								<td style='vertical-align:middle;'> <input type='hidden' name='id' value='$value->id_debitur'>$no</td>

								<td style='vertical-align:middle;'> <label id='namanyadebitur'>$value->PMLK_JMN</label> </td>

								<td style='vertical-align:middle;'> <label>$value->CIF_NO<label> </td>

								<td style='vertical-align:middle;'> <label>$value->NO_APHT</label> </td>

								<td style='vertical-align:middle;'> <label>$value->ALAMAT_JMN</label> </td>

								<td style='vertical-align:middle;'> $button</td>
 
							</tr>";

				$no++; 
			}

		} else {
			$strHtml ='';

			$strHtml .= '<tr style="vertical-align:middle;"> Data Kosong </tr>';
		}

		$data['user'] = $strHtml;

		echo json_encode($data);

	}

	public function masukkantgldokumen(){

		$tglmasuk = $_POST['tglmasuk'];
		$iddeb    = $_POST['iddebitur'];

		$this->db->trans_start();
			$this->db->query("UPDATE master_data SET tgl_dokumen_masuk='".$tglmasuk."' WHERE id_debitur='".$iddeb."' ");
		$this->db->trans_complete();

		if($this->db->trans_status() === false){
			$this->trans_rollback();
			$data['error'] = 1;
		} else {
			$data['error'] = 0;
		}

	echo json_encode($data);

	}

	public function logtaksasi(){

		$data['taksasi'] = $this->db->query("SELECT status, id_order_taksasi, nasabah, alamat_lengkap, tgl_order, date_created FROM order_taksasi WHERE status IN ('Done','Reject') AND id_user='".$_SESSION['id_user']."' ORDER BY date_created ");

		$data['tatakota'] = $this->db->query("SELECT status, id_tatakota, nasabah, alamat_jaminan, date_order, date_created FROM order_tatakota WHERE status IN ('Done','Reject') AND id_user='".$_SESSION['id_user']."' ORDER BY date_created ");

		echo $this->load->view("v_history_taksasi", $data, true);

	}

	public function detailtaksasi(){
		$detail = $this->db->query("SELECT b.nama_user,a.* FROM order_taksasi a 
										LEFT JOIN sys_user b ON a.id_approval = b.id_user
										WHERE id_order_taksasi = '".$_POST['id_taksasi']."' ");


		$strHtml = '';

				$strHtml .= "<div clas='col-md-12'>

								<div class='col-md-12'>
									<h4>Detail Order Taksasi</h4>
								</div>

								<div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Divisi/BU/Cabang</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->divisi."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Segment Loan</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->segment."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Tgl Order</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->tgl_order."</label>
			                        </div>
			                    </div>
			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Jenis Penilaian</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->penilaian."</label>
			                        </div>
			                    </div>
			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Kondisi Aset</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->kondisi."</label>
			                        </div>
			                    </div>

			                    			<hr>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Nama Nasabah </label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->nasabah."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>No Rekening</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->no_rek."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Alamat Lengkap</label>
			                        </div>

			                        <div class='col-md-8'>

			                        	<label class='judul'>: ".$detail->row()->alamat_lengkap."</label>

			                        	<div class='row'>
			                        		<div class='col-md-12'>

			                        			<div class='col-md-6'>
			                        				<label class='judul'>Telpon :".$detail->row()->telpon."</label>			
			                        			 </div>

			                        			 <div class='col-md-6'>
			                        			 	<label>Hp :".$detail->row()->hp."</label>
			                        			 </div>

			                        		</div>
			                        	</div>
			                        	
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Alamat Jaminan</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->alamat_jaminan."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Kode Pos</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->kode_pos."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-6'>
			                            <label class='judul'>Nama Contact Debitur : ".$detail->row()->cp."</label>
			                        </div>

			                        <div class='col-md-6'>
			                            <label class='judul'>Telp/Hp :".$detail->row()->telp_debitur."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>

			                        <div class='col-md-3'>

			                            <table style='width:100%;' id='jenis'>
			                            	<tr>
			                            		<td colspan='2'>Tanah dan atau Bangunan<br>/ Property</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Dokumen</td>
			                            		<td>(&radic;)</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Sertifikat (M) <sup>1)</sup></td>
			                            		<td>";

			       	$detail->row()->sertifikat_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            	<tr>
			                            		<td>IMB <sup>1)</sup></td>
			                            		<td>";

			       	$detail->row()->imb_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            	<tr>
			                            		<td>SPPT PBB / terakhir <sup>1)</sup></td>
			                            		<td>";

			       	$detail->row()->sppt_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Site plan / Peta Situasi</td>
			                            		<td>";

			       	$detail->row()->site_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Denah Bangunan</td>
			                            		<td>";

			       	$detail->row()->denah_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Denah Bangunan</td>
			                            		<td>";

			       	$detail->row()->building_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            	<tr>
			                            		<td>RAB (on Progress)</td>
			                            		<td>";

			       	$detail->row()->rab_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Surat pesanan/ penawaran <sup>1)**</sup> (M)</td>
			                            		<td>";

			       	$detail->row()->surat_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            </table>

			                        </div>


			                        <div class='col-md-3'>
			                            <table style='width:100%;' id='jenis'>
			                            	<tr>
			                            		<td colspan='2'>Mesin / Peralatan</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Dokumen</td>
			                            		<td>(&radic;)</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Invoice / Faktur <sup>1)</sup></td>
			                            		<td>";

			       	$detail->row()->invoice_mesin == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            	<tr>
			                            		<td>Faktur Pajak <sup>1)</sup></td>
			                            		<td>";

			       	$detail->row()->pajak_mesin == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            	<tr>
			                            		<td>Kwitansi <sup>1)</sup></td>
			                            		<td>";

			       	$detail->row()->kwitansi_mesin == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Kartu Garansi</td>
			                            		<td>";

			       	$detail->row()->garansi_mesin == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Surat Pesanan / <br> Penawaran <sup>1)*</sup> (M)</td>
			                            		<td>";

			       	$detail->row()->surat_mesin == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            </table>
			                        </div>

			                        <div class='col-md-3'>
			                            <table style='width:100%;' id='jenis'>
			                            	<tr>
			                            		<td colspan='2'>Kendaraan Bermotor</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Dokumen</td>
			                            		<td>(&radic;)</td>
			                            	</tr>
			                            	<tr>
			                            		<td>BPKB <sup>1)</sup></td>
			                            		<td>";

			       	$detail->row()->bpkb_kendaraan == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            	<tr>
			                            		<td>Faktur <sup>1)</sup></td>
			                            		<td>";

			       	$detail->row()->faktur_kendaraan == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            	<tr>
			                            		<td>STNK <sup>1)</sup></td>
			                            		<td>";

			       	$detail->row()->stnk_kendaraan == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Surat Pesanan / <br> Penawaran <sup>1)*</sup> (M)</td>
			                            		<td>";

			       	$detail->row()->surat_kendaraan == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            </table>
			                        </div>

			                        <div class='col-md-3'>
			                            <table style='width:100%;' id='jenis'>
			                            	<tr>
			                            		<td colspan='2'>List Persediaan</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Dokumen</td>
			                            		<td>(&radic;)</td>
			                            	</tr>
			                            	<tr>
			                            		<td>List Persediaan</td>
			                            		<td>";

			       	$detail->row()->list_persediaan == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            </table>
			                        </div>

			                    </div>

							</div>";


			$data['user'] = $strHtml;

		echo json_encode($data);

	}

	public function detailtatakota(){
		$detail = $this->db->query("SELECT b.nama_user,a.* FROM order_tatakota a 
										LEFT JOIN sys_user b ON a.id_approval = b.id_user
										WHERE id_tatakota = '".$_POST['id_tkota']."' ");

			$strHtml = '';

				$strHtml .= "<div clas='col-md-12'>

								<div class='col-md-12'>
									<h4>Detail Cek Tata Kota</h4>
								</div>

								<div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Divisi/BU/Cabang</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->divisi."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Segment Loan</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->segment."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Tgl Order</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->date_order."</label>
			                        </div>
			                    </div>

			                    			<hr>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Nama Nasabah </label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->nasabah."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>No Rekening</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->no_rekening."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Penilaian</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->penilaian."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Alamat Jaminan</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->alamat_jaminan."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>
			                        <div class='col-md-3'>
			                            <label class='judul'>Kode Pos</label>
			                        </div>

			                        <div class='col-md-8'>
			                            <label class='judul'>: ".$detail->row()->kode_pos."</label>
			                        </div>
			                    </div>

			                    <div class='col-md-12'>

			                        <div class='col-md-6'>

			                            <table id='jenis' style='width:50%;'>
			                            	<tr>
			                            		<td colspan='2'>Tanah dan atau Bangunan<br>/ Property</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Dokumen</td>
			                            		<td>(&radic;)</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Copy Sertifikat (M)</td>
			                            		<td>";

			       	$detail->row()->sertifikat_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            	<tr>
			                            		<td>Laporan Apprasial</td>
			                            		<td>";

			       	$detail->row()->apprasial_tanah == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>
			                            </table>

			                        </div>


			                        <div class='col-md-6'>
			                            <table style='width:50%;' id='jenis'>
			                            	<tr>
			                            		<td colspan='2'>Mesin / Peralatan</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Dokumen</td>
			                            		<td>(&radic;)*)</td>
			                            	</tr>
			                            	<tr>
			                            		<td>Copy BPKB <sup>*)</sup></td>
			                            		<td>";

			       	$detail->row()->bpkb_kendaraan == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            	<tr>
			                            		<td>Copy STNK</td>
			                            		<td>";

			       	$detail->row()->stnk_kendaraan == 'yes' ? $strHtml .= "&radic;" : $strHtml .= "";

					$strHtml .=					"</td>
			                            	</tr>

			                            </table>
			                        </div>

			                    </div>

							</div>";


			$data['user'] = $strHtml;

		echo json_encode($data);	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */