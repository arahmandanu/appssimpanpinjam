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
		padding:5px;
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
		margin-top: 50px;
		margin-bottom: 20px;
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
	<label style="text-align: center;"><h4><b><u>PERMOHONAN PENGECEKAN DOKUMEN</u></b></h4></label>
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
			<td>: <label><?php echo $data->row()->date_order; ?></label></td>
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
			<td>: <label><?php echo $data->row()->no_rekening; ?></label></td>
		</tr>

		<tr>
			<td><label class="judul">Penilaian</label></td>
			<td>: <label><?php echo $data->row()->penilaian; ?></label>
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
		
	</table>

	<label id="bawah" style="font-size: 12px;">Jenis Jaminan dan <b>copy</b> dokumen yang dilampirkan :</label>

</div>

<div class="tabjenis">
	<div>
		<table> 
			<col style="width: 350px;">
			<col style="width: 350px;">
			<tr>
				<td>
					<table class="tjenis" style="margin-left:80px;margin-top:50px;">
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
									Copy Sertifikat
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->sertifikat_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Laporan Apprasial
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->apprasial_tanah) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td id="centang">
							</tr>

						</tbody>
					</table>
				</td>

				<td>
					<table class="tjenis" style="margin-left:80px;margin-top:50px;">
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
									Copy BPKB *) 
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->bpkb_kendaraan) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
								</td>
							</tr>

							<tr>
								<td>
									Copy STNK 	
								</td>
								<td id="centang">
									<?php 	
										
									  strval($data->row()->stnk_kendaraan) == 'yes' ?  print "<img src=".$checked." > " :  print "";

									  ?>
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
	<label style="font-size: 10px;"><b>*) Asli</b> BPKB Wajib diserahkan ke petugas apprasial pada tgl site visit ke SAMSAT/POLDA.</label><br><br>

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

      $html2pdf->Output('IzinTataKota.pdf');

    }

    catch(HTML2PDF_exception $e) { echo $e; } 

  
  ?>