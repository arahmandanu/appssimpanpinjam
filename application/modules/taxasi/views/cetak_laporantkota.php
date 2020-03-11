<body style="border: 1px solid #ccc"> 
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Karyawan</th>
				<th>Nama Nasabah</th>
				<th>Status</th>
				<th>Aproval</th>
				<th>tgl Aprove/reject</th>
				<th>Verifikasi Dokumen</th>
				<th>tgl Verifikasi</th>
				<th>Penutup Transaksi</th>
				<th>tgl tutup Transaksi</th>
				<th>Alamat jaminan</th>
				<th>Tgl Order</th>
				<th>Tgl Submit</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$no =1;
				foreach ($tkota->result() as $key => $value) { ?>
			
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $value->karyawan; ?></td>
					<td><?php echo $value->nasabah; ?></td>
					<td><?php echo $value->status; ?></td>
					<td><?php echo $value->approval; ?></td>
					<td><?php echo $value->tgl_approve; ?></td>
					<td><?php  ($value->verifikator == "") ? print "-" : print $value->verifikator; ?></td>
					<td><?php  ($value->tgl_veriv == "") ? print "-" : print $value->tgl_veriv; ?></td>
					<td><?php  ($value->penutup == "") ? print "-" : print $value->penutup ; ?></td>
					<td><?php  ($value->tgl_done == "") ? print "-" : print $value->tgl_done; ?></td>
					<td><?php echo $value->alamat_jaminan; ?></td>
					<td><?php echo $value->date_order; ?></td>
					<td><?php echo $value->date_created; ?></td>
				</tr>

			<?php 
			$no++;
				} ?>
		</tbody>
	</table>
</body>