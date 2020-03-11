<style> 
	.str {mso-number-format:\@; }
</style>
<table>
	<tbody>
		<tr>
			<td colspan="10" style="font-size: 25px;text-align: center;">Daftar Debitur</td>
		</tr>
		<tr></tr>
	</tbody>
</table>

<table border="1">
	<thead>
		<tr>
			<th>No.</th>

			<th>Pemilik Jaminan</th>

			<th>CTRL 1</th>

			<th>CTRL 2</th>

			<th>CTRL 3</th>

			<th>CIF_NO</th>

			<th>Note_No</th>

			<th>Status</th>

			<th>Alamat_jmn</th>

			<th>Jenis_Ikat</th>

			<th>Jen_Dok_Jm</th>

			<th>No_Dok_Jmn</th>

			<th>Developer</th>

			<th>Draw_No</th>

			<th>Part_No</th>

			<th>Seq_No</th>

			<th>RC</th>

			<th>BI_Code</th>

			<th>BII_Code</th>

			<th>Tgl_Ikat</th>

			<th>No_Ikat</th>

			<th>Nm_Notaris</th>

			<th>Nm_Asrk</th>

			<th>Nopls_Asrk</th>

			<th>Nilai_Asrk</th>

			<th>Jttmpoasrk</th>

			<th>BKCLSEASRK</th>

			<th>Sandi_Wil</th>

			<th>Unit_Jmn</th>

			<th>Luas_Tanah</th>

			<th>Luas_Bang</th>

			<th>EXP_Date</th>

			<th>Nama_Asj</th>

			<th>Polis_Asl</th>

			<th>Nilai_Asl</th>

			<th>Jt_tmp_Asj</th>

			<th>Bk_Cls_Asj</th>

			<th>No_Apht</th>

			<th>Nilai_Apht</th>

			<th>TglApht</th>

			<th>status_lunas</th>

			<th>tgl Lunas</th>

		</tr>

	</thead>
	<tbody>

		 <?php
			$no =1;
			foreach ($debitur->result() as $key => $value) { ?>

		 <tr>

		 	<td class="str"><?php echo $no; ?></td>

			<td class="str"><?php echo $value->pmlk_jmn; ?></td>

			<td class="str"><?php echo $value->ctrl1; ?></td>

			<td class="str"><?php echo $value->ctrl2; ?></td>

			<td class="str"><?php echo $value->ctrl3 ?></td>

			<td class="str"><?php echo $value->cif_no; ?></td>

			<td class="str"><?php echo $value->note_no; ?></td>

			<td class="str"><?php echo $value->status; ?></td>

			<td class="str"><?php echo $value->alamat_jmn; ?></td>

			<td class="str"><?php echo $value->jenis_ikat; ?></td>

			<td class="str"><?php echo $value->jen_dok_jm; ?></td>

			<td class="str"><?php echo $value->no_dok_jmn ?></td>

			<td class="str"><?php echo $value->developer; ?></td>

			<td class="str"><?php echo $value->draw_no; ?></td>

			<td class="str"><?php echo $value->part_no; ?></td>

			<td class="str"><?php echo $value->seq_no; ?></td>

			<td class="str"><?php echo $value->rc; ?></td>

			<td class="str"><?php echo $value->bi_code; ?></td>

			<td class="str"><?php echo $value->bii_code; ?></td>

			<td class="str"><?php echo $value->tgl_ikat; ?></td>

			<td class="str"><?php echo $value->no_ikat; ?></td>

			<td class="str"><?php echo $value->nm_notaris; ?></td>

			<td class="str"><?php echo $value->nm_asrk; ?></td>

			<td class="str"><?php echo $value->nopls_asrk; ?></td>

			<td class="str"><?php echo $value->nilai_asrk; ?></td>

			<td class="str"><?php echo $value->jttmpoasrk; ?></td>

			<td class="str"><?php echo $value->bkclseasrk; ?></td>

			<td class="str"><?php echo $value->sandi_wil; ?></td>

			<td class="str"><?php echo $value->unit_jmn; ?></td>

			<td class="str"><?php echo $value->luas_tanah; ?></td>

			<td class="str"><?php echo $value->luas_bang; ?></td>

			<td class="str"><?php echo $value->exp_date; ?></td>

			<td class="str"><?php echo $value->nama_asj; ?></td>

			<td class="str"><?php echo $value->polis_asl; ?></td>

			<td class="str"><?php echo $value->nilai_asl; ?></td>

			<td class="str"><?php echo $value->jt_tmp_asj; ?></td>

			<td class="str"><?php echo $value->bk_cls_asj; ?></td>

			<td class="str"><?php echo $value->no_apht; ?></td>

			<td class="str"><?php echo $value->nilai_apht; ?></td>

			<td class="str"><?php echo $value->tglapht; ?></td>

			<td class="str"><?php echo $value->status_lunas; ?></td>

			<td class="str"><?php echo $value->tgl_lunas; ?></td>


		</tr>

		<?php $no++; }?>
	</tbody>
</table>