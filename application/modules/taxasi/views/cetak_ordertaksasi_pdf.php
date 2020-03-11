<style type="text/css">
	table#tableheader{
		border-collapse: collapse;
	}
	table#tableheader tr td{
		border:1px solid black;
	}
	table.tjenis{
		border-collapse: collapse;
		font-size: 12px;
	}
	table.tjenis tr td{
		border:1px solid black;
		padding:2px;
	}
	table.ttd{
		font-size: 12px;
		border-collapse: collapse;
	}
	table.ttd tr td{
		border:1px solid black;
		padding:5px;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	table.ttd tr#atas {
		text-align: center;
		vertical-align: middle;
		font-weight: bold;
	}
	div.body{
		margin-top: 10px;
	}
/*	div.tabjenis{
		margin-top: 10px;
		margin-left: 250px;
	}*/
	label.judul{
		font-size: 12px;	
	}
	tr.head{
		background: aqua;
	}
	table#profile{
		font-size: 12px;
	}
	label#bawah{
		font-size: 10px;
		margin-left: 20px;
	}
	td#centang{
		text-align: center;
		vertical-align: middle;
	}
</style>

<div class="header">
	<table id="tableheader">
		<tbody>
			<tr>
				<td colspan="2" style="width: 520px;border-bottom: 1px solid black;border-top: none;border-left: none;border-right: none;">
					<label>Standard Operating Procedure Apprasial<br> CREDIT ADMINISTRATION AND CONTROL</label>
				</td>
				<td rowspan="2" style="width: 120px;border-bottom: 5px solid black;border-right: none;border-top: none;border-left: none;text-align: center">

					<img src="<?php echo $url_gambar; ?>" width="100px" height="100px;">
				</td>
			</tr>

			<tr>
				<td style="border-bottom: 5px solid black;border-left: none;">
					<label>LAMPIRAN B.</label><br>
					<label>FORMAT PERMOHONAN PENGECEKAN DOKUMEN</label>
				</td>

				<td style="border-bottom: 5px solid black;border-left: 3px solid black;border-right: none;">
					<label>Versi	:2</label>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="body">
	<label style="text-align: center;"><h4><b><u>PERMOHONAN PENILAIAN / VISIT ASET / JAMINAN</u></b></h4></label>
</div>

<div>
	<table id="profile">
		<col style="width:100px;">
		<col style="width:590px;">
		<tr>
			<td><label class="judul">Divisi/BU/Cabang</label></td>
			<td>: <label style="border-bottom:1px dashed black;"><?php echo $data->row()->divisi; ?></label></td>
		</tr>
		<tr>
			<td><label class="judul">Segment Loan</label></td>
			<td>: <label><?php echo $data->row()->segment; ?></label></td>
		</tr>
		<tr>
			<td><label class="judul">Tanggal Order</label></td>
			<td>: <label><?php echo $data->row()->tgl_order; ?></label></td>
		</tr>
		<tr>
			<td><label class="judul">Jenis Penilaian</label></td>
			<td>: <label style="padding-left: 20px;"><?php echo $data->row()->penilaian; ?> </label></td>
		</tr>
		<tr>
			<td><label class="judul">Kondisi Aset</label></td>
			<td>: <label><?php echo $data->row()->kondisi; ?></label></td>
		</tr>
	</table>
</div>

<hr>

<div>
	<table id="profile">
		<col style="width: 100px;">
		<col style="width: 590px;">

		<tr>
			<td><label class="judul">Nama Nasabah</label></td>
			<td>: <label><?php echo $data->row()->nasabah; ?></label></td>
		</tr>

		<tr>
			<td><label class="judul">No Rekening</label></td>
			<td>: <label><?php echo $data->row()->no_rek; ?></label></td>
		</tr>

		<tr>
			<td><label class="judul">Alamat Lengkap</label></td>
			<td>: <label><?php echo $data->row()->alamat_lengkap; ?></label>
				<table>
					<col style="width:250px;">
					<col style="width:250px;">
					<tr>
						<td>Telpon :<?php echo $data->row()->telpon; ?></td>
						<td>Hp :<?php echo $data->row()->hp; ?></td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td><label class="judul">Alamat Jaminan</label></td>
			<td>: <label><?php echo $data->row()->alamat_jaminan; ?></label>
			</td>
		</tr>

		<tr>
			<td><label class="judul">Kode Pos</label></td>
			<td>: <label><?php echo $data->row()->kode_pos; ?></label></td>
		</tr>

		<tr>
			<td colspan="2">

				<table>
					<col style="width:400px;">
					<col style="width:280px;">

					<tr>
						<td>
							<label class="judul">Nama Contact Person Debitur :<?php echo $data->row()->cp; ?></label>
						</td>
						<td>
							<label>Telp/Hp :<?php echo $data->row()->telp_debitur; ?></label>
						</td>
					</tr>
				</table>
			</td>
			
		</tr>

		
	</table>

	<label id="bawah" style="font-size: 12px;">Jenis Jaminan dan <b>copy</b> dokumen yang dilampirkan :</label>

</div>

<div class="tabjenis">
	<div>
		<table>
			<col style="width: 170px;">
			<col style="width: 170px;">
			<col style="width: 170px;">
			<col style="width: 170px;">
			<tr>
				<td>
					<table class="tjenis">
						<tbody>
							<col style="width: 125px;">
							<col style="width: 25px;">
							<tr class="head">
								<td colspan="2" style="text-align: center;vertical-align: middle; height: 23px;">
									Tanah dan atau Bangunan <br>/ Property
								</td>
							</tr>

							<tr class="head">
								<td>
									Dokumen	
								</td>
								<td style="text-align: center;vertical-align: center;">
									<span>(<img src="<?php echo $checked;?>" >)</span>
								</td>
							</tr>

							<tr>
								<td>
									Sertifikat (M) <sup>1)</sup>
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->sertifikat_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									IMB	<sup>1)</sup>
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->imb_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td id="centang">
							</tr>

							<tr>
								<td>
									SPPT PBB terakhir <sup>1)</sup>
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->sppt_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Site plan / Peta Situasi	
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->site_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Denah Bangunan
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->denah_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Building Plan	
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->building_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									RAB (on Progress)	
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->rab_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Surat pesanan <br>/ penawaran <sup>1)**</sup> (M)
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->surat_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									...................
								</td>
								<td>
									
								</td>
							</tr>

						</tbody>
					</table>
				</td>

				<td>
					<table class="tjenis">
						<tbody>
							<col style="width: 125px;">
							<col style="width: 25px;">
							<tr class="head">
								<td colspan="2" style="text-align: center;vertical-align: middle;height: 23px;">
									Mesin / Peralatan
								</td>
							</tr>

							<tr class="head">
								<td>
									Dokumen	
								</td>
								<td style="text-align: center;vertical-align: center;">
									<span>(<img src="<?php echo $checked;?>" >)</span>
								</td>
							</tr>

							<tr>
								<td>
									Invoice / Faktur <sup>1)</sup>
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->invoice_mesin) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Faktur Pajak <sup>1)</sup>	
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->pajak_mesin) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Kwitansi <sup>1)</sup>
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->kwitansi_mesin) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Kartu Garansi	
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->garansi_mesin) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Surat Pesanan /<br>
									Penawaran <sup>1)*</sup> (M)
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->surat_mesin) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									.........	
								</td>
								<td>
									
								</td>
							</tr>

						</tbody>
					</table>
				</td>
				<td>
					<table class="tjenis">
						<tbody>
							<col style="width: 125px;">
							<col style="width: 25px;">
							<tr class="head">
								<td colspan="2" style="text-align: center;vertical-align: middle;height: 23px;">
									Kendaraan Bermotor
								</td>
							</tr>

							<tr class="head">
								<td>
									Dokumen	
								</td>
								<td style="text-align: center;vertical-align: center;">
									<span>(<img src="<?php echo $checked;?>" >)</span>
								</td>
							</tr>

							<tr>
								<td>
									BPKB <sup>1)</sup>
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->bpkb_kendaraan) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Faktur <sup>1)</sup>
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->faktur_kendaraan) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									STNK <sup>1)</sup>
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->stnk_kendaraan) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Surat Pesanan /<br> 
									Penawaran <sup>1)*</sup>(M)
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->surat_kendaraan) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

						</tbody>
					</table>
				</td>
				<td>
					<table class="tjenis">
						<tbody>
							<col style="width: 125px;">
							<col style="width: 25px;">
							<tr class="head">
								<td colspan="2" style="text-align: center;vertical-align: middle;height: 23px;">
									Persediaan
								</td>
							</tr>

							<tr class="head">
								<td>
									Dokumen	
								</td>
								<td style="text-align: center;vertical-align: center;">
									<span>(<img src="<?php echo $checked;?>" >)</span>
								</td>
							</tr>

							<tr>
								<td>
									List Persediaan<sup>3)</sup>
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->list_persediaan) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									.................	
								</td>
								<td>
									
								</td>
							</tr>

							<tr>
								<td>
									.................	
								</td>
								<td>
									
								</td>
							</tr>

							<tr>
								<td style="border:none;">
									<sup>2)</sup> <i>khusus jaminan tambahan</i>
								</td>
								<td style="border:none;">
									
								</td>
							</tr>

							<tr>
								<td style="border:none;font-weight: bold;font-size: 10px;line-height: 1.6;" colspan="2">
									<sup>3)</sup> <i>min. posisi 1 bulan yang lalu yang ditanda-tangani debitur diatas materai dan distempel perusahaan (untuk badan hukum).</i>
								</td>
							</tr>

						</tbody>
					</table>
				</td>
			</tr>
		</table>

	</div>
</div>



<div class="body" style="position: absolute; bottom: 0">
	<label style="font-size: 10px;">NB: <sup>1)</sup>Dokumen Minimal. Deviasi atas dokumen minimal wajib memperoleh approval (menggunakan form A.2)</label><br>
	<label id="bawah">(M) = Mandatory (tidak dapat di-deviasi)</label><br>
	<label id="bawah">* Untuk kondisi Baru&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;** Ada MOU BII dgn developer</label><br>
	<label id="bawah">*** Khusus Take Over wajib melampirkan copy BII Checking (Jaminan terkait) terupdate</label><br><br>

	<label><b>Diajukan oleh <i>(wajib diisi)</i></b></label>
	<br>
	<br>
	<table class="ttd">
		<col style="width: 90px;">
		<col style="width: 200px;">
		<col style="width: 75px;">
		<col style="width: 110px;">
		<col style="width: 110px;">

			<tr id="atas">
				<td>Contact Person</td>
				<td>Nama Lengkap</td>
				<td>Tanda Tangan </td>
				<td>No. Telp Kantor &<br> Extension / No. HP</td>
				<td>Email Kantor /<br>Email Pribadi</td>
			</tr>
			<tr>
				<td>Account Officer</td>
				<td><?php echo $data->row()->acc_officer; ?></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Team Leader</td>
				<td><?php echo $data->row()->t_leader; ?></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Pejabat Lain.....</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
	</table>

	<hr style="margin-top:20px;">

	<label>Bank International Indonesia</label>
</div>
<?php 
  $content = ob_get_clean();

    // conversion HTML => PDF

    require_once 'vendors/plugin/html2pdf_v4.03/html2pdf.class.php'; // arahkan ke folder html2pdf

    try

    {

      $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10)); //setting ukuran kertas dan margin pada dokumen anda

      //$html2pdf->setModeDebug();

      $html2pdf->pdf->SetDisplayMode('fullpage');

      $html2pdf->setDefaultFont('Arial');

      $html2pdf->writeHTML($content, isset($_GET['vuehtml']));

      $html2pdf->Output('IzinOrderTaksasi.pdf');

    }

    catch(HTML2PDF_exception $e) { echo $e; } 

  
  ?>