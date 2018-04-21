<table class="table-costum">
	<tr>
		<td width="30%">Tanggal Permohonan</td>
		<td width="2%">:</td>
		<td style="text-align: left; width: 68%"><?php echo $data->tanggal_permohonan; ?></td>
	</tr>
	<tr>
		<td>Nama Perusahaan</td>
		<td>:</td>
		<td style="text-align: left"><?php echo strtoupper($data->nama_perusahaan); ?></td>
	</tr>
	<tr>
		<td>Nama Direktur</td>
		<td>:</td>
		<td style="text-align: left"><?php echo strtoupper($data->nama_pemohon); ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td style="text-align: left"><?php echo $data->alamat; ?></td>
	</tr>
</table>

<table class="table-costum">
	<tr>
		<td width="70%">Dengan ini mengajukan permohonan izin pengiriman ternak :</td>
	</tr>
</table>

<table class="table-costum">
	<?php foreach($jml_ternak as $row): ?>
	<tr>
		<td width="3%"></td>
		<td width="3%">-</td>
		<td width="24%"><?php echo $row->nama_entitas ?> </td>
		<td width="2%">:</td>
		<td width="10%" style="text-align: left"><?php echo $row->quota; ?> Ekor</td>
	</tr>
	<?php endforeach; ?>
</table>

<table class="table-costum">
	<tr>
		<td width="30%">Dengan Tujuan</td>
		<td width="2%">:</td>
		<td style="text-align: left"><?php echo $data->tujuan; ?></td>
	</tr>
	<tr>
		<td>Pelabuhan Muat</td>
		<td>:</td>
		<td style="text-align: left"><?php echo $data->pelabuhan_muat; ?></td>
	</tr>
	<tr>
		<td>Pelabuhan Bongkar</td>
		<td>:</td>
		<td style="text-align: left"><?php echo $data->pelabuhan_bongkar; ?></td>
	</tr>
</table>
