<table>
	<tbody>
		<tr>
			<td colspan="6" style="font-size: 25px;text-align: center;"><?php echo $judul; ?></td>
		</tr>
		<tr></tr>
	</tbody>
</table>

<table border="1">
	<thead>
		<tr>
			<th>No.</th>
			<th>Debitur</th>
			<th>Peminjam</th>
			<th>Barang dipinjam</th>
			<th>Tgl Pinjam</th>
			<th>Tgl Kembali</th>
		</tr>
	</thead>
	<tbody>

		<?php
			$no=1;
			foreach ($user->result() as $key => $value) { ?>

		<tr>

			<td><?php echo $no; ?></td>

			<td><?php echo $value->pmlk_jmn; ?></td>

			<td><?php echo $value->nama_user; ?></td>

			<td><?php echo $value->ket_pinjam; ?></td>

			<td><?php echo $value->date_pinjam; ?></td>

			<td><?php echo $value->date_kembali; ?></td>

		</tr>

		<?php $no++; }?>
	</tbody>
</table>