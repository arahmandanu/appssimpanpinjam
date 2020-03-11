<style type="text/css">

	table {
  		border-collapse: collapse;
  		font-size: 19px;
	}

	table.tableitem thead tr th {
		border-bottom: 1px dotted black !important;
		font-weight: 100;
	}
	table.tableitem tbody tr td{
		border-bottom: 1px dotted black !important;	
	}

	table.tablesetuju{
		font-size: 12px;
	}
	table.tablesetuju thead th{
		padding:5px;
	}
	
	table.tablebawah tbody tr td{
		border: solid 1px #000000;
		padding:3px;
	}
	table.tablebawah{
		font-size: 12px;
	}

	table.tableitem{
		font-size: 12px;
	}
</style>

<div style="border: 1px solid black; display: inline-block;background: #bfbdbd; text-align: center;">
	
	<h3>FORM PERMOHONAN PEMINJAMAN<br>DOKUMEN JAMINAN / DOKUMEN HUKUM / DOKUMEN KREDIT</h3>

</div>

<br>
<br>
<div>
	<table class="tableitem">

		<col style="width: 110px">
		<col style="width: 560px"> 
		<thead>
			
			<tr>
				<th style="text-align: left;">Nomor</th>
				<th>
					:<span style="margin-left: 20px;">S.2019.</span><span style="margin-left: 30px;">/Presdir Community Distribution-RB Jateng KC Yogyakarta </span> 
				</th>
			</tr>

		</thead>

		<tbody>
			<tr>
				<td style="text-align: left;">Kepada</td>
				<td>:<span style="margin-left: 20px;">Bagian Administrasi Kredit</span>
				</td>
			</tr>

			<tr>
				<td style="text-align: left;">Dari</td>
				<td>:<span style="margin-left: 20px;">Home Loan</span>
				</td>
			</tr>

			<tr>
				<td style="text-align: left;">Nama Debitur</td>
				<td>
					:<span style="margin-left: 20px;"><?php echo $debitur->row()->pmlk_jmn; ?></span> <span style="margin-left: 20px;">Nomor</span><span style="margin-left: 20px;">A/C :</span>
				</td>
			</tr>

		</tbody>
	</table>
</div>

<br>

<div style="line-height: 1.6;">
	<span style="font-size: 14px;text-align: justify;">Mohon bantuannya untuk dapat mengeluarkan (meminjamkan) dokumen jaminan / dokumen hukum / dokumen kredit  sebagaimana persetujuan di bawah ini :</span>
</div>

<br>

<div style="display: inline;border:1px solid black;background-color: #35230600; text-align: center;font-size: 18px;">
	<span style="color: white">BAGIAN PERSETUJUAN PEMINJAMAN DOKUMEN JAMINAN / HUKUM / KREDIT</span>
</div>

<br>
<br>

<div>
	<span style="margin-left: 20px;">Mohon persetujuan untuk meminjam dokumen seperti tersebut di bawah ini  :</span>
</div>

<div>
	<table class="tablesetuju" border="1">

		<col style="width: 20px;">
		<col style="width: 75px;">
		<col style="width: 75px;">
		<col style="width: 50px;">
		<col style="width: 50px;">
		<col style="width: 30px;">
		<col style="width: 30px;">
		<col style="width: 80px;">

		<thead>
			<tr>
				<th rowspan="2" style="text-align: center;"> No</th>
				<th colspan="3" style="text-align: center;vertical-align: middle;"> Dokumen Jaminan/Dokumen Hukum / Dokuman Kredit</th>
				<th rowspan="2" style="text-align: center;vertical-align: middle;"> Jenis<br>Dokumen<br> (Jaminan/<br> Hukum/<br> Kredit)</th>
				<th rowspan="2" style="text-align: center;vertical-align: middle;"> Asli/<br> copy</th>
				<th rowspan="2" style="text-align: center;vertical-align: middle;"> Jml lbr/<br> set</th>
				<th rowspan="2" style="text-align: center;vertical-align: middle;"> Untuk<br>Keperluan </th>
				<th rowspan="2" style="text-align: center;vertical-align: middle;"> Rencana<br>Pengembalian<br>Dok. Jaminan </th>
			</tr>

			<tr>
				<th style="text-align: center;width: 75px">Jenis & Atas Nama</th>
				<th style="text-align: center;width: 75px;">Tgl & Nomor </th>
				<th style="text-align: center;width: 75px;">Lokasi</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td style="text-align: center;">1.</td>
				<td><?php echo $debitur->first_row()->jen_dok_jm." /";echo "<br>";echo $debitur->first_row()->pmlk_jmn; ?></td>
				<td style="text-align: center"><?php echo wordwrap(strval($debitur->first_row()->no_dok_jmn),10,"\n",TRUE); ?></td>
				<td><?php echo wordwrap($debitur->first_row()->alamat_jmn,10,"\n",TRUE); ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td style="text-align: center;"><?php echo($debitur->first_row()->date_pinjam)."<br> Sampai<br>".$debitur->first_row()->date_kembali;  ?></td>
			</tr>
		</tbody>
	</table>
</div>

<br>

<div>
	<span style="padding-left: 20px;font-size: 12px;">Pihak yang menerima dokumen di atas menerangkan hal-hal  sebagai berikut :</span>
	<ol style="padding-top: 0px; font-size: 12px;">
		<li style="text-align: justify;"><span>Dokumen yang diserahterimakan tersebut telah diperiksa dan dalam kondisi baik,</span></li>
		<li style="text-align: justify;"><span>Menyerahkan Surat Keterangan Notaris/PPAT atau tanda terima pengurusan dokumen kepada CAC pada tanggal yang sama dengan tanggal peminjaman, dan selambat-lambatnya (maksimal) dalam 1 (satu) hari berikutnya sejak tanggal peminjaman.</span></li>
		<li style="text-align: justify;"><span>Setelah ditandatanganinya Tanda Terima Peminjaman Dokumen Jaminan ini, maka seluruh dokumen (termasuk semua resiko yang timbul) menjadi tanggung jawab peminjam, dan akan peminjam akan mengembalikan dokumen sesuai tanggal pengembalian.</span></li>
		<li style="text-align: justify;"><span>Apabila dokumen tidak dapat dikembalikan sesuai rencana pengembalian, maka pengusul / peminjam harus mengajukan perpanjangan waktu peminjaman dokumen dengan menggunakan memo konfirmasi</span></li>
	</ol>
</div>

<div>
	<span style="text-align: justify;font-size: 12px;">Catatan :<br>Terhadap asli dokumen  jaminan / pengikatan yang dipinjam > 1 hari, form harus diajukan oleh unit legal dengan persetujuan bisnis unit head.</span>
</div>

<br>

<div>
	<span style="padding-left: 20px;font-size: 12px;">Demikian Kami Sampaikan, Terima Kasih.</span>
	<table class="tablebawah">
		<tbody>
		<tr>
			<td colspan="2" style="text-align: center;width: 260px;">Unit yang meminjam : Home Loan</td>
			<td colspan="2" style="text-align: center;width: 260px;">Unit Administrasi Kredit</td>
			<td style="text-align: center;width: 150px;">Diterima</td>
		</tr>
		<tr>
			<td style="text-align: center">Dipinjam oleh <br>CLE</td>
			<td style="text-align: center">Disetujui oleh<br><span style="margin-right: : 20px;">(CLM)</span> <span style="margin-left: 20px;">(ABrM)</span></td>
			<td style="text-align: center">Direview oleh<br>(Cred. Adm Staff)</td>
			<td style="text-align: center">Disetujui oleh<br>(Spv/Head) </td>
			<td style="text-align: center">Peminjam</td>
		</tr>
		<tr>
			<td style="height: 75px;vertical-align: bottom;">(.....................................)<br>Tgl:</td>
			<td style="vertical-align: bottom;">(..................................)<br>Tgl:</td>
			<td style="vertical-align: bottom;">(.....................................)<br>Tgl:</td>
			<td style="vertical-align: bottom;">(.....................................)<br>Tgl:</td>
			<td style="vertical-align: bottom;">(
					<?php 
						echo $_SESSION['nama_user'];
					// 	$nama=$_SESSION['nama_user'];
					// 	$pecah = explode(" ",$nama);
					// 	foreach ($pecah as $key => $value) {
					// echo $value;
					// } ?>)<br>Tgl:</td>
		</tr>
		</tbody>
	</table>
</div>

<div>
	<span style="margin-left: 20px;font-size: 12px;font-style: italic;">*) Kepala Bagian/pejabat setingkat/Head Unit Peminjam</span>
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

      $html2pdf->Output('IzinPeminjaman.pdf');

    }

    catch(HTML2PDF_exception $e) { echo $e; } 

  
  ?>