<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class taxasi extends MY_Controller {

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
			
		echo $this->load->view("v_taxasi");

		
	}

	public function taksasi()
	{
		
		echo $this->load->view("v_form_taksasi");


	}

	public function tkota()
	{

		echo $this->load->view("v_form_cektatakota");


	}

	public function ordertaksasi(){

		$day = date("Y-m-d H-i-s");

		$data =   array('id_user' => $_SESSION['id_user'],
						'status' => "Pending",
						'divisi' => $_POST['divisi'],
						'segment'=> $_POST['segment'],
						'tgl_order'=> $_POST['mulai'],
						'penilaian'=> $_POST['penilaian'],
						'kondisi'=> $_POST['kondisi'],
						'nasabah'=> $_POST['nasabah'],
						'no_rek'=> $_POST['no_rek'],
						'alamat_lengkap'=>$_POST['alamat_lengkap'],
						'telpon' => $_POST['telpon'],
						'hp' => $_POST['hp'],
						'alamat_jaminan' => $_POST['alamat_jaminan'],
						'kode_pos' => $_POST['pos'],
						'cp' => $_POST['cp'],
						'telp_debitur' => $_POST['telp_debitur'],
						'sertifikat_tanah' => $_POST['sertifikat_tanah'],
						'imb_tanah' => $_POST['imb_tanah'],
						'sppt_tanah' => $_POST['sppt_tanah'],
						'site_tanah' => $_POST['site_tanah'],
						'denah_tanah' => $_POST['denah_tanah'],
						'building_tanah' =>$_POST['building_tanah'],
						'rab_tanah' => $_POST['rab_tanah'],
						'surat_tanah' => $_POST['surat_tanah'],
						'invoice_mesin' => $_POST['invoice_mesin'],
						'pajak_mesin' => $_POST['pajak_mesin'],
						'kwitansi_mesin' => $_POST['kwitansi_mesin'],
						'garansi_mesin' => $_POST['garansi_mesin'],
						'surat_mesin' => $_POST['surat_mesin'],
						'bpkb_kendaraan' => $_POST['bpkb_kendaraan'],
						'faktur_kendaraan' => $_POST['faktur_kendaraan'],
						'stnk_kendaraan' => $_POST['stnk_kendaraan'],
						'surat_kendaraan' => $_POST['surat_kendaraan'],
						'list_persediaan' => $_POST['list_persediaan'],
						'acc_officer' => $_POST['acc_oficer'],
						't_leader' => $_POST['t_leader'],
						'date_created' => $day,
						'jenis' => $_POST['jenis']
						 );

		$this->db->trans_begin();
			$this->db->insert("order_taksasi", $data);
			$id_ordertaksasi = $this->db->insert_id();
		$this->db->trans_complete();


		if($this->db->trans_status() === false ){
			$status['error'] = 1;
			$this->db->trans_rollback();
		} else {
			$status['error']  = 0;
			$status['id_ordertaksasi'] = $id_ordertaksasi;
			$status['jenis'] = $_POST['jenis'];
		}

		echo json_encode($status);
	}

	public function cetakordertaksasi(){

		$id_ordertaksasi = $_GET['id_ordertaksasi'];

		$gabung = "";

		$jenis = '%_'.$_GET['jenis']; 
		$pecah = $this->db->query("SHOW COLUMNS FROM order_taksasi LIKE '".$jenis."' ")->result();

			foreach ($pecah as $key => $value) {
				$gabung .= $value->Field.",";		
			}

		$gabung =  rtrim($gabung,',');

		$this->db->where('id_order_taksasi', $id_ordertaksasi);
			$data['data'] = $this->db->get('order_taksasi');
			$data['url_gambar'] = base_url('vendors/img/logo/logo_bii.jpg');
			$data['checked'] = base_url('vendors/img/logo/checkmark.png');

		echo $this->load->view("cetak_ordertaksasi_pdf", $data, true);

	}

	public function ordertkota(){

		$day = date('Y-m-d H-i-s');

		$data = array('id_user' => $_SESSION['id_user'],
						'status' => "Pending",
						'divisi' => $_POST['divisi'],
						'segment' => $_POST['segment'],
						'date_order' => $_POST['mulai'],
						'nasabah' => $_POST['nasabah'],
						'no_rekening' => $_POST['no_rekening'],
						'penilaian' => $_POST['penilaian'],
						'alamat_jaminan' => $_POST['alamat_jaminan'],
						'kode_pos' => $_POST['pos'],
						'sertifikat_tanah' => $_POST['sertifikat_tanah'],
						'apprasial_tanah' => $_POST['apprasial_tanah'],
						'bpkb_kendaraan' => $_POST['bpkb_kendaraan'],
						'stnk_kendaraan' => $_POST['stnk_kendaraan'],
						'jenis' => $_POST['jenis'],
						'acc_officer' => $_POST['acc_oficer'],
						't_leader' => $_POST['t_leader'],
						'date_created' => $day );

		// print_r($data);

		$this->db->trans_begin();
			$this->db->insert("order_tatakota", $data);
			$id_tkota = $this->db->insert_id();
		$this->db->trans_complete();

		if($this->db->trans_status() === false){
			$status['error'] = 1;
			$this->db->trans_rollback();
		}
		else {
			$status['error'] = 0;
			$status['id_tkota'] = $id_tkota;
			$status['jenis'] = $_POST['jenis'];
		}

		echo json_encode($status);
	}

	public function cetakordertkota(){
		// print_r($_GET);
		$this->db->where('id_tatakota',$_GET['id_ordertkota']);
			$data['data'] = $this->db->get('order_tatakota');
			$data['url_gambar'] = base_url('vendors/img/logo/logo_bii.jpg');
			$data['checked'] = base_url('vendors/img/logo/checkmark.png');

		// print_r($data);

		echo $this->load->view('cetak_ordertatakota_pdf', $data, true);
	}

	public function statustaksasi(){
		$data['taksasi'] = $this->db->query("SELECT status, id_order_taksasi, nasabah, alamat_lengkap, tgl_order, date_created FROM order_taksasi WHERE status in ('Pending','Approved','Verified') AND id_user='".$_SESSION['id_user']."' ORDER BY date_created ");

		$data['tatakota'] = $this->db->query("SELECT status, id_tatakota, nasabah, alamat_jaminan, date_order, date_created FROM order_tatakota WHERE status IN ('Pending','Approved','Verified') AND id_user='".$_SESSION['id_user']."' ORDER BY date_created ");

		echo $this->load->view("v_status_ordertaksasi", $data, true);
	}

	public function daftarnasabah(){

		$user = $this->db->query("SELECT status_lunas, id_debitur, PMLK_JMN, ALAMAT_JMN FROM master_data WHERE status_lunas <> 'lunas' ");

		$strHtml = '';

		if($user->num_rows() > 0){
			
			$no=1;

			foreach ($user->result() as $key => $value) {

				if($value->status_lunas == "belum"){

					$button	=  "<button class='btn btn-custon-rounded-three btn-primary' type='button' onclick='ambiluser(this)'>Pilih</button>" ;

				} else if($value->status_lunas == "lunas"){

					$button = "<label id='status2'>Nasabah Lunas</label>";

				}

				$strHtml .= "<tr>

								<td style='vertical-align:middle;'> <input type='hidden' name='id' value='$value->id_debitur'>$no</td>

								<td style='vertical-align:middle;'> <label id='nama'>$value->PMLK_JMN</label> </td>

								<td style='vertical-align:middle;'> <label id='alamat'>$value->ALAMAT_JMN</label></td>

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

	public function logtaksasiuser(){

		$data['taksasi'] = $this->db->query("SELECT b.nama_user AS karyawan, status, id_order_taksasi, nasabah, 												alamat_lengkap, tgl_order, date_created FROM order_taksasi a 
												  LEFT JOIN sys_user b ON a.id_user = b.id_user
												WHERE STATUS IN ('Done', 'Reject')
												ORDER BY date_created ");

		$data['tatakota'] = $this->db->query("SELECT b.nama_user AS karyawan, status, id_tatakota, nasabah,alamat_jaminan, 											date_order, date_created FROM order_tatakota a 
												  LEFT JOIN sys_user b ON a.id_user = b.id_user
												WHERE STATUS IN ('Done', 'Reject')
												ORDER BY date_created");

		echo $this->load->view("v_logtaksasi_user", $data, true);
	}


	public function detailtaksasi(){
		$detail = $this->db->query("SELECT b.nama_user AS approval, c.nama_user AS verifikator, d.nama_user AS penutup,
											a.* FROM order_taksasi a
											LEFT JOIN sys_user b ON a.id_approval = b.id_user 
											LEFT JOIN sys_user c ON a.id_veriv = c.id_user 
											LEFT JOIN sys_user d ON a.id_done = d.id_user 
										WHERE id_order_taksasi = '".$_POST['id_taksasi']."' ");

		if($detail->row()->status == "Reject"){

			$isian = "<div class='col-md-12' style='margin-top:10px;'> 
							<table width='100%'>
								<tr>
									<td>Reject</td>
								</tr>
								<tr>
									<td>".$detail->row()->approval."</td>
								</tr>
								<tr>
									<td>( ".$detail->row()->tgl_approve." )</td>
								</tr>
							</table>
					</div>";

		}
		elseif ($detail->row()->status == "Done") {

			$isian = "<div class='col-md-12' style='margin-top:20px;'> 
							<table width='100%'>
								<tr>
									<td style='width:30%'>Approval</td>
									<td style='width:30%'>Verifikator Dokumen</td>
									<td style='width:30%'>Penutup Transaksi</td>
								</tr>
								<tr>
									<td>".$detail->row()->approval."</td>
									<td>".$detail->row()->verifikator."</td>
									<td>".$detail->row()->penutup."</td>
								</tr>
								<tr>
									<td>( ".$detail->row()->tgl_approve." )</td>
									<td>( ".$detail->row()->tgl_veriv." )</td>
									<td>( ".$detail->row()->tgl_done." )</td>
								</tr>
							</table>
					</div>";

		}


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
			                        </div>";

			            $strHtml .= $isian;

				$strHtml .=		"</div>";


			$data['user'] = $strHtml;

		echo json_encode($data);

	}

	public function detailtatakota(){
		$detail = $this->db->query("SELECT a.*, b.nama_user AS approval, c.nama_user AS verifikator, d.nama_user AS penutup 
										FROM order_tatakota a
										LEFT JOIN sys_user b ON a.id_approval = b.id_user
										LEFT JOIN sys_user c ON a.id_veriv = c.id_user
										LEFT JOIN sys_user d ON a.id_done = d.id_user
										WHERE id_tatakota =  '".$_POST['id_tkota']."' ");

		if($detail->row()->status == "Reject"){

			$isian = "<div class='col-md-12' style='margin-top:10px;'> 
							<table width='100%'>
								<tr>
									<td>Reject</td>
								</tr>
								<tr>
									<td>".$detail->row()->approval."</td>
								</tr>
								<tr>
									<td>( ".$detail->row()->tgl_approve." )</td>
								</tr>
							</table>
					</div>";

		}
		elseif ($detail->row()->status == "Done") {

			$isian = "<div class='col-md-12' style='margin-top:20px;'> 
							<table width='100%'>
								<tr>
									<td style='width:30%'>Approval</td>
									<td style='width:30%'>Verifikator Dokumen</td>
									<td style='width:30%'>Penutup Transaksi</td>
								</tr>
								<tr>
									<td>".$detail->row()->approval."</td>
									<td>".$detail->row()->verifikator."</td>
									<td>".$detail->row()->penutup."</td>
								</tr>
								<tr>
									<td>( ".$detail->row()->tgl_approve." )</td>
									<td>( ".$detail->row()->tgl_veriv." )</td>
									<td>( ".$detail->row()->tgl_done." )</td>
								</tr>
							</table>
					</div>";

		}

			$strHtml = '';

				$strHtml .= "<div clas='col-md-12' style='margin-top:20px;'>

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
			                        </div>";

			              $strHtml .= $isian;

			$strHtml .=			"</div>";


			$data['user'] = $strHtml;

		echo json_encode($data);	
	}

	public function taksasisemua(){

		$list = $this->db->query("SELECT b.nama_user AS karyawan, status, id_order_taksasi, nasabah, alamat_lengkap, 									tgl_order, date_created FROM order_taksasi a LEFT JOIN sys_user b
									    ON a.id_user = b.id_user
									WHERE STATUS IN ('Done', 'Reject')
									ORDER BY date_created");

			$strHtml = "";
			$no = 1;

			foreach ($list->result() as $key => $value) {

				($value->status == "Done") ? $label="<label style='background:green;color:white;'>".$value->status."</label>" : $label= "<label style='color:white;background:red;'>".$value->status."</label>";

				$strHtml .= "<tr>
								<td>".$no."</td>
								<td>".$value->nasabah."</td>
								<td>".$value->karyawan."</td>
								<td>".$value->tgl_order."</td>
								<td style='text-align: center;'>".wordwrap($value->date_created,2,"<br>\n")."</td>
								<td style='text-align: center;'>".$label."</td>
								<td><button class='' onclick='detail(this, ".$value->id_order_taksasi.", \"taksasi\")'><i class='glyphicon glyphicon-search'> Detail</i></button></td>
							 </tr>";
				$no++;				 
			}

			$data['list'] = $strHtml;

		echo json_encode($data);
	}

	public function taksasitgl(){
		// print_r($_GET);

		$list = $this->db->query("SELECT b.nama_user AS karyawan, status, id_order_taksasi, nasabah, alamat_lengkap, 									tgl_order, date_created FROM order_taksasi a LEFT JOIN sys_user b
									    ON a.id_user = b.id_user
									WHERE STATUS IN ('Done', 'Reject') 
										AND a.tgl_order BETWEEN '".$_GET['start']."' AND  '".$_GET['end']."'
									ORDER BY date_created");

		$strHtml = "";
			$no = 1;

			foreach ($list->result() as $key => $value) {

				($value->status == "Done") ? $label="<label style='background:green;color:white;'>".$value->status."</label>" : $label= "<label style='color:white;background:red;'>".$value->status."</label>";

				$strHtml .= "<tr>
								<td>".$no."</td>
								<td>".$value->nasabah."</td>
								<td>".$value->karyawan."</td>
								<td>".$value->tgl_order."</td>
								<td style='text-align: center;'>".wordwrap($value->date_created,2,"<br>\n")."</td>
								<td style='text-align: center;'>".$label."</td>
								<td><button class='' onclick='detail(this, ".$value->id_order_taksasi.", \"taksasi\")'><i class='glyphicon glyphicon-search'> Detail</i></button></td>
							 </tr>";
				$no++;				 
			}

			$data['list'] = $strHtml;

		echo json_encode($data);

	}

	public function taksasisemuatkota(){

		$list = $this->db->query("SELECT b.nama_user AS karyawan, status, id_tatakota, nasabah, alamat_jaminan, 									date_order, date_created FROM order_tatakota a LEFT JOIN sys_user b
									    ON a.id_user = b.id_user
									WHERE STATUS IN ('Done', 'Reject')
									ORDER BY date_created");

			$strHtml = "";
			$no = 1;

			foreach ($list->result() as $key => $value) {

				($value->status == "Done") ? $label="<label style='background:green;color:white;'>".$value->status."</label>" : $label= "<label style='color:white;background:red;'>".$value->status."</label>";

				$strHtml .= "<tr>
								<td>".$no."</td>
								<td>".$value->nasabah."</td>
								<td>".$value->karyawan."</td>
								<td>".$value->date_order."</td>
								<td style='text-align: center;'>".wordwrap($value->date_created,2,"<br>\n")."</td>
								<td style='text-align: center;'>".$label."</td>
								<td><button class='' onclick='detail(this, ".$value->id_tatakota.", \"taksasi\")'><i class='glyphicon glyphicon-search'> Detail</i></button></td>
							 </tr>";
				$no++;				 
			}

			$data['list'] = $strHtml;

		echo json_encode($data);
	}

	public function taksasitgltkota(){
		// print_r($_GET);

		$list = $this->db->query("SELECT b.nama_user AS karyawan, status, id_tatakota, nasabah, alamat_jaminan, 									date_order, date_created FROM order_tatakota a LEFT JOIN sys_user b
									    ON a.id_user = b.id_user
									WHERE STATUS IN ('Done', 'Reject') 
										AND a.date_order BETWEEN '".$_GET['start']."' AND  '".$_GET['end']."'
									ORDER BY date_created");

		$strHtml = "";
			$no = 1;	

			foreach ($list->result() as $key => $value) {

				($value->status == "Done") ? $label="<label style='background:green;color:white;'>".$value->status."</label>" : $label= "<label style='color:white;background:red;'>".$value->status."</label>";

				$strHtml .= "<tr>
								<td>".$no."</td>
								<td>".$value->nasabah."</td>
								<td>".$value->karyawan."</td>
								<td>".$value->date_order."</td>
								<td style='text-align: center;'>".wordwrap($value->date_created,2,"<br>\n")."</td>
								<td style='text-align: center;'>".$label."</td>
								<td><button class='' onclick='detail(this, ".$value->id_tatakota.", \"taksasi\")'><i class='glyphicon glyphicon-search'> Detail</i></button></td>
							 </tr>";
				$no++;				 
			}

			$data['list'] = $strHtml;

		echo json_encode($data);

	}

	public function downloadexceltaksasi(){

		if($_GET['jenis'] == "all"){

			$data['taksasi'] = $this->db->query("SELECT
													  b.nama_user AS karyawan,
													  c.nama_user AS aproval,
													  d.nama_user AS verifikator,
													  e.nama_user AS penutup,
													  a.*
													FROM
													  order_taksasi a
													  LEFT JOIN sys_user b ON a.id_user = b.id_user
													  LEFT JOIN sys_user c ON a.id_approval = c.id_user
													  LEFT JOIN sys_user d ON a.id_veriv = d.id_user
													  LEFT JOIN sys_user e ON a.id_done = e.id_user
													WHERE STATUS IN ('Done', 'Reject')
													ORDER BY date_created");

			header("Content-Disposition: attachment; filename=LaporanTaksasiSemua.xls");

		}
		else if($_GET['jenis'] == "date"){

			$data['taksasi'] = $this->db->query("SELECT
													  b.nama_user AS karyawan,
													  c.nama_user AS aproval,
													  d.nama_user AS verifikator,
													  e.nama_user AS penutup,
													  a.*
													FROM
													  order_taksasi a
													  LEFT JOIN sys_user b ON a.id_user = b.id_user
													  LEFT JOIN sys_user c ON a.id_approval = c.id_user
													  LEFT JOIN sys_user d ON a.id_veriv = d.id_user
													  LEFT JOIN sys_user e ON a.id_done = e.id_user
												WHERE STATUS IN ('Done', 'Reject') 
													AND a.tgl_order BETWEEN '".$_GET['start']."' AND  '".$_GET['end']."'
												ORDER BY date_created");

			$tgl = $_GET['start']."to".$_GET['end'];

			header("Content-Disposition: attachment; filename=LaporanTaksasiS".$tgl.".xls");

		}

		// print_r($data);
		header("Content-type: application/vnd-ms-excel");
		echo $this->load->view("cetak_laporantaksasi" , $data , true);

	}

	public function downloadexceltaksasitkota(){

		// print_r($_GET);exit;

		if($_GET['jenis'] == "all"){

			$data['tkota'] = $this->db->query("SELECT b.nama_user AS karyawan, a.*, c.nama_user AS approval, d.nama_user  										AS verifikator, d.nama_user AS penutup
														FROM order_tatakota a
													  LEFT JOIN sys_user b ON a.id_user = b.id_user
													  LEFT JOIN sys_user c ON a.id_approval = c.id_user
													  LEFT JOIN sys_user d ON a.id_veriv = d.id_user
													  LEFT JOIN sys_user e ON a.id_done = e.id_user
													WHERE STATUS IN ('Done', 'Reject')
													ORDER BY date_created");

			header("Content-Disposition: attachment; filename=LaporanTatakotaSemua.xls");

		}
		else if($_GET['jenis'] == "date"){

			$data['tkota'] = $this->db->query("SELECT b.nama_user AS karyawan, a.*, c.nama_user AS approval, d.nama_user  										AS verifikator, d.nama_user AS penutup
														FROM order_tatakota a
													  LEFT JOIN sys_user b ON a.id_user = b.id_user
													  LEFT JOIN sys_user c ON a.id_approval = c.id_user
													  LEFT JOIN sys_user d ON a.id_veriv = d.id_user
													  LEFT JOIN sys_user e ON a.id_done = e.id_user
													WHERE STATUS IN ('Done', 'Reject')
													AND  a.date_order BETWEEN '".$_GET['start']."' AND  '".$_GET['end']."'
													ORDER BY date_created");

			$tgl = $_GET['start']."to".$_GET['end'];
			header("Content-Disposition: attachment; filename=LaporanTatakota".$tgl.".xls");

		}

		// print_r($data);
		header("Content-type: application/vnd-ms-excel");
		echo $this->load->view("cetak_laporantkota" , $data , true);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */