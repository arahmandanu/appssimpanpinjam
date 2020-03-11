<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class approve extends MY_Controller {

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
			$data['user'] = $this->db->query("SELECT a.*,b.nama_user FROM master_data a 
													LEFT JOIN sys_user b ON b.id_user = a.id_user
 													WHERE is_pinjam = 1 AND jenis_trx='peminjaman'");

			$data['pelunasan'] = $this->db->query("SELECT a.*,b.nama_user FROM master_data a 
													LEFT JOIN sys_user b ON b.id_user = a.id_user
 													WHERE jenis_trx='pelunasan' AND status_lunas='belum'");

			$data['taksasi'] = $this->db->query("SELECT a.*,b.nama_user FROM order_taksasi a 
													LEFT JOIN sys_user b ON a.id_user = b.id_user
													WHERE a.status in ('Approved','Pending','Verified') ORDER BY date_created DESC");

			$data['tkota'] = $this->db->query("SELECT a.*,b.nama_user FROM order_tatakota a
													LEFT JOIN sys_user b ON a.id_user = b.id_user
													WHERE status IN ('Pending','Approved','Verified') ORDER BY date_created DESC");

			// print_r($data['taksasi']);

			echo $this->load->view("v_approve", $data ,true);

		
	}

	public function confirmapprove()

	{

		$id_debitur = $_POST['id_debitur'];

		$this->db->trans_start();

			$this->db->query("UPDATE master_data SET is_approve = 1 WHERE id_debitur='".$id_debitur."' ");

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE) {

			$data['error'] = 1;
			$data['pesan'] = "gagal approve";
			$this->db->trans_rollback();

		} else {

			$data['error'] = 0;
			$data['pesan'] = "approved";

		}

		echo json_encode($data);
	}

	public function confirmnote()
	{

		$id_debitur = $_POST['id_debitur'];

		$this->db->trans_start();

			$this->db->query("UPDATE master_data SET is_note = 1 WHERE id_debitur='".$id_debitur."' ");

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE) {

			$data['error'] = 1;
			$data['pesan'] = "gagal approve";
			$this->db->trans_rollback();

		} else {

			$data['error'] = 0;
			$data['pesan'] = "approved";

		}

		echo json_encode($data);

	}

	public function lihatdetail(){

		$iddebitur = $_POST['iddebitur'];

		$ngecek = $this->db->query("SELECT a.ket_pinjam,a.alasan_pinjam,a.date_pinjam,a.date_kembali,a.pmlk_jmn,b.`nama_user` FROM master_data a
										LEFT JOIN sys_user b ON b.id_user = a.id_user WHERE id_debitur ='".$iddebitur."'");

			$isi = $ngecek->row();

			echo json_encode($isi);
		
	}

	public function approvepengembalian(){

		$id_debitur = $_POST['id_uniq'];

		$this->db->trans_start();

			$pindah = $this->db->query("INSERT INTO history_peminjaman ( id_debitur, ctrl1, ctrl2,  ctrl3, cif_no, note_no, pmlk_jmn,  STATUS,
													  alamat_jmn, jenis_ikat,  jen_dok_jm, no_dok_jmn, developer, draw_no,  part_no, seq_no,
													  rc, bi_code,  bii_code,  tgl_ikat,  no_ikat, nm_notaris, nm_asrk, nopls_asrk, nilai_asrk, jttmpoasrk, bkclseasrk, sandi_wil, unit_jmn, luas_tanah, luas_bang, exp_date, nama_asj, polis_asl, nilai_asl,  jt_tmp_asj, bk_cls_asj,  no_apht,  nilai_apht, tglapht, tgl_dokumen_masuk, id_user, ket_pinjam, alasan_pinjam,
													  date_pinjam, date_kembali, tgl_selesai ) 
													  
													  SELECT id_debitur, ctrl1, ctrl2, ctrl3,cif_no,
													  note_no, pmlk_jmn, STATUS, alamat_jmn, jenis_ikat, jen_dok_jm, no_dok_jmn, developer,
													  draw_no,  part_no, seq_no,  rc, bi_code, bii_code, tgl_ikat, no_ikat,nm_notaris,nm_asrk,
													  nopls_asrk, nilai_asrk, jttmpoasrk, bkclseasrk, sandi_wil, unit_jmn, luas_tanah, luas_bang,
													  exp_date, nama_asj, polis_asl, nilai_asl, jt_tmp_asj, bk_cls_asj, no_apht, nilai_apht,  tglapht, tgl_dokumen_masuk, id_user, ket_pinjam, alasan_pinjam, date_pinjam,
													  date_kembali, CURDATE()
													FROM
													  master_data
													WHERE id_debitur ='".$id_debitur."'     ");

		$this->db->trans_complete();

		if($this->db->trans_status() === false ){

			$data['error'] = 1;
			$data['pesan'] = "gagal";

			$this->db->trans_rollback();

		} else {

			$query = $this->db->query("UPDATE master_data SET jenis_trx=NULL,is_pinjam=0, id_user = NULL, ket_pinjam=NULL, alasan_pinjam=NULL, date_pinjam=NULL, date_kembali=NULL, is_approve=0, is_note=0, is_kembali=0 WHERE id_debitur='".$id_debitur."' ");

			if($query){

				$data['error'] = 0;
				$data['pesan'] = "berhasil";

			 } else {

			 	$data['error'] = 1;
			 	$data['pesan'] = "ada yang error";
			 }

		}

		echo json_encode($data);

	}

	public function mainpengembalian(){

		$data['history'] = $this->db->query("SELECT a.*,b.nama_user FROM history_peminjaman a 
												LEFT JOIN sys_user b ON a.id_user = b.id_user ORDER BY id DESC ");

		echo $this->load->view("v_history_peminjaman", $data , true);


	}

	public function approvepelunasan(){

		$iddeb = $_POST['id_uniq'];

		$this->db->trans_start();
			$this->db->query("UPDATE master_data SET is_approve = 1 , status_lunas='lunas' WHERE id_debitur='".$iddeb."'");
		$this->db->trans_complete();

			if($this->db->trans_status() === false){
				$this->trans_rollback();
				$data['error'] = 1;
			} else {
				$data['error'] = 0;
			}
		echo json_encode($data);
	}

	public function hapuspelunasan(){

		$iddeb = $_POST['id_uniq'];

		$this->db->trans_start();
			$this->db->query("UPDATE master_data SET jenis_trx=NULL , id_user=NULL, tgl_lunas=NULL WHERE id_debitur='".$iddeb."' " );
		$this->db->trans_complete();

			if($this->db->trans_status() === false){
				$this->db->trans_rollback();
				$data['error'] = 1;
			} else {
				$data['error'] = 0;
			}
		echo json_encode($data);

	}

	public function hapuspeminjaman(){

		$iddeb = $_POST['id_uniq'];

		$this->db->trans_start();
			$this->db->query("UPDATE master_data SET jenis_trx=NULL,is_pinjam=0,id_user=NULL,ket_pinjam=NULL,alasan_pinjam=NULL,date_pinjam=NULL,date_kembali=NULL WHERE id_debitur='".$iddeb."'");
		$this->db->trans_complete();

			if($this->db->trans_status() === false){
				$this->db->trans_rollback();
				$data['error'] = 1;
			} else {
				$data['error'] = 0;
			}

	echo json_encode($data);

	}

	public function detailtaksasi(){
		// print_r($_POST);
		// $this->db->where("id_order_taksasi", $_POST['id_taksasi']);
		// 	$detail = $this->db->get("order_taksasi");

		$detail = $this->db->query("SELECT a.*,b.nama_user AS aproval, c.nama_user AS verifikator, d.nama_user AS penutup 							FROM order_taksasi a 
									  LEFT JOIN sys_user b ON a.id_approval = b.id_user 
									  LEFT JOIN sys_user c ON a.id_veriv = c.id_user 
									  LEFT JOIN sys_user d ON a.id_done = d.id_user
									WHERE id_order_taksasi = '".$_POST['id_taksasi']."'");

			//CEK sudah pending/diapprv/verified/
			if($detail->row()->status == "Pending"){

				$isian = 	"<div class='col-md-12' style='margin-top:5%;'>
								<div class='col-md-6'>
		                            <textarea type='text' class='form-control' name='alasanreject' style='width:100%; height:100px;' placeholder='Alasan Reject'></textarea>
		                            <button class='btn btn-custon-four btn-danger' onclick='rejecttaksasi(this,".$detail->row()->id_order_taksasi.")'><i class='glyphicon glyphicon-remove'> Reject</i></button>
		                        </div>

		                        <div class='col-md-6'>
		                            <button class='btn btn-custon-four btn-success' style='margin-top:100px;'  onclick='approvetaksasi(this,".$detail->row()->id_order_taksasi.")'><i class='glyphicon glyphicon-thumbs-up'> Approve</i></button>
		                        </div>
		                    </div>";

			}
			elseif ($detail->row()->status == "Approved") {

				$isian = 	"<div class='col-md-12'>
								<div class='col-md-12'>
		                            <button class='btn btn-custon-four btn-success' style='margin-top:100px;'  onclick='verifdokumen(this,".$detail->row()->id_order_taksasi.")'><i class='glyphicon glyphicon-thumbs-up'> Verifikasi Dokumen</i></button>
		                        </div>
		                    </div>";

			}
			elseif ($detail->row()->status == "Verified"){

				$isian = 	"<div class='col-md-12'>
								<div class='col-md-12'>
		                            <button class='btn btn-custon-four btn-success' style='margin-top:100px;'  onclick='tutuptaksasi(this,".$detail->row()->id_order_taksasi.")'><i class='glyphicon glyphicon-thumbs-up'> Done</i></button>
		                        </div>
		                    </div>";

			}
			elseif ($detail->row()->status == "Done"){

				$isian = 	"<div class='col-md-12' style='margin-top:5%;'>
								<label id='status'>Transaksi untuk karyawan ini sudah selesai. Silahkan Cek di History Order Taksasi User</label>
		                    </div>";

			}

			
				$strHtml = '';

				$strHtml .= "<div clas='col-md-12'>

								<div class='col-md-12'>
									<h4 style='border-bottom:1px solid black;display:inline-block;'>Detail Order Taksasi</h4>
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


			                    <div class='col-md-12' style='margin-top:5%;'>
			                    	<table style='width:100%' id='ppl'>
			                    		<tr>
			                    			<td style='width:30%'>Aproval</td>
			                    			<td style='width:30%'>Verifikator Dokumen</td>
			                    			<td style='width:30%'>Penutup Transaksi</td>
			                    		</tr>
			                    		<tr>
			                    			<td style='width:30%'> ".$detail->row()->aproval."</td>
			                    			<td style='width:30%'>".$detail->row()->verifikator."</td>
			                    			<td style='width:30%'>".$detail->row()->penutup."</td>
			                    		</tr>
			                    		<tr>
			                    			<td style='width:30%'>( ".$detail->row()->tgl_approve." )</td>
			                    			<td style='width:30%'>( ".$detail->row()->tgl_veriv." )</td>
			                    			<td style='width:30%'>( ".$detail->row()->tgl_done." )</td>
			                    		</tr>
			                    	</table>
			                    </div> ";

			                        $strHtml .=$isian;

				$strHtml .=		"</div>";

			$data['user'] = $strHtml;

		echo json_encode($data);
	}

	public function detailtatakota(){

		// $this->db->where("id_tatakota", $_POST['id_tkota']);
		// 	$detail = $this->db->get("order_tatakota");
		$detail = $this->db->query("SELECT a.*, b.nama_user AS aproval, c.nama_user AS verifikator, d.nama_user AS penutup
									FROM order_tatakota a 
									  LEFT JOIN sys_user b ON a.id_approval = b.id_user
									  LEFT JOIN sys_user c ON a.id_veriv = c.id_user
									  LEFT JOIN sys_user d ON a.id_done = d.id_user
									WHERE id_tatakota = '".$_POST['id_tkota']."'");

			if($detail->row()->status == "Pending"){

				$isian = "<div class='col-md-12' style='margin-top:5%;'>
			                        <div class='col-md-6'>

			                            <textarea type='text' name='alasanreject' style='width:100%; height:100px;' placeholder='Alasan Reject' class='form-control'></textarea>

			                            <button class='btn btn-custon-four btn-danger' onclick='rejecttkota(this,".$detail->row()->id_tatakota.")'><i class='glyphicon glyphicon-remove'> Reject</i></button>
			                        </div>

			                        <div class='col-md-6'>
			                            <button class='btn btn-custon-four btn-success' style='margin-top:100px;'  onclick='approvettkota(this,".$detail->row()->id_tatakota.")' ><i class='glyphicon glyphicon-thumbs-up'> Approve</i></button>
			                        </div>
			                    </div>";
			}
			elseif ($detail->row()->status == "Approved") {

				$isian = 	"<div class='col-md-12'>
								<div class='col-md-12'>
		                            <button class='btn btn-custon-four btn-success' style='margin-top:100px;'  onclick='verifdokumentkota(this,".$detail->row()->id_tatakota.")'><i class='glyphicon glyphicon-thumbs-up'> Verifikasi Dokumen</i></button>
		                        </div>
		                    </div>";

			}
			elseif ($detail->row()->status == "Verified"){

				$isian = 	"<div class='col-md-12'>
								<div class='col-md-12'>
		                            <button class='btn btn-custon-four btn-success' style='margin-top:100px;'  onclick='tutuptaksasitkota(this,".$detail->row()->id_tatakota.")'><i class='glyphicon glyphicon-thumbs-up'> Done</i></button>
		                        </div>
		                    </div>";

			}
			elseif ($detail->row()->status == "Done"){

				$isian = 	"<div class='col-md-12' style='margin-top:5%;'>
								<label id='status'>Transaksi untuk karyawan ini sudah selesai. Silahkan Cek di History Order Taksasi User</label>
		                    </div>";

			}

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

			                    <div class='col-md-12' style='margin-top:10px;'>
			                    	<table id='ppl' style='width:100%;'>
			                    		<tr>
			                    			<td style='width:30%'>Approval</td>
			                    			<td style='width:30%'>Verifikator Dokumen</td>
			                    			<td style='width:30%'>Penutup Transaksi</td>
			                    		</tr>
			                    		<tr>
			                    			<td>".$detail->row()->aproval."</td>
			                    			<td>".$detail->row()->verifikator."</td>
			                    			<td>".$detail->row()->penutup."</td>
			                    		</tr>
			                    		<tr>
			                    			<td>( ".$detail->row()->tgl_approve." )</td>
			                    			<td>( ".$detail->row()->tgl_veriv." )</td>
			                    			<td>( ".$detail->row()->tgl_done." )</td>
			                    		</tr>
			                    	</table
			                    </div>
			                    ";

			   	$strHtml .= 		$isian."

							</div>";


			$data['user'] = $strHtml;

		echo json_encode($data);

	}

	public function approvetaksasi() {

		$day = date("Y-m-d H:i:s");

		$this->db->query("UPDATE order_taksasi SET status='Approved',tgl_approve='".$day."' ,id_approval='".$_SESSION['id_user']."' WHERE id_order_taksasi='".$_POST['id_taksasi']."' ");

	}

	public function rejecttaksasi() {

		$day = date("Y-m-d H:i:s");

		$this->db->query("UPDATE order_taksasi SET status='Reject', tgl_approve='".$day."', keterangan='".$_POST['alasan']."', id_approval='".$_SESSION['id_user']."' WHERE id_order_taksasi='".$_POST['id_taksasi']."' ");

	}

	public function hapustaksasi(){
		$this->db->query("DELETE FROM order_taksasi WHERE id_order_taksasi='".$_POST['id_taksasi']."'");
	}


	public function approvetkota() {

		$day = date("Y-m-d H:i:s");

		$this->db->query("UPDATE order_tatakota SET status='Approved', tgl_approve='".$day."' ,id_approval='".$_SESSION['id_user']."' WHERE id_tatakota='".$_POST['id_tkota']."' ");

	}

	public function rejecttkota() {

		$day = date("Y-m-d H:i:s");

		$this->db->query("UPDATE order_tatakota SET status='Reject', tgl_approve='".$day."', keterangan='".$_POST['alasan']."', id_approval='".$_SESSION['id_user']."' WHERE id_tatakota='".$_POST['id_tkota']."' ");

	}

	public function hapustkota() {
		$this->db->query("DELETE FROM order_tatakota WHERE id_tatakota='".$_POST['id_tkota']."'");
	}

	public function verifdokumen(){

		// print_r($_POST);

		$day = date("Y-m-d H:i:s") ;

		$this->db->query("UPDATE order_taksasi SET id_veriv='".$_SESSION['id_user']."', tgl_veriv='".$day."', status='Verified' WHERE id_order_taksasi='".$_POST['id']."' ");
		
	}

	public function tutuptaksasi(){

		$day = date("Y-m-d H:i:s") ;

		$this->db->query("UPDATE order_taksasi SET id_done='".$_SESSION['id_user']."', tgl_done='".$day."', status='Done' WHERE id_order_taksasi='".$_POST['id']."' ");
	}

	public function verifdokumentkota(){

		$day = date("Y-m-d H:i:s") ;

		$this->db->query("UPDATE order_tatakota SET id_veriv='".$_SESSION['id_user']."', tgl_veriv='".$day."', status='Verified' WHERE id_tatakota='".$_POST['id']."' ");

	}

	public function tutuptaksasitkota(){
		
		$day = date("Y-m-d H:i:s") ;

		$this->db->query("UPDATE order_tatakota SET id_done='".$_SESSION['id_user']."', tgl_done='".$day."', status='Done' WHERE id_tatakota='".$_POST['id']."' ");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */