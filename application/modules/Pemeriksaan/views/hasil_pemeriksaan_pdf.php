<style type="text/css">
	.table-costum tr th {
		font-size: 9px;
		font-weight: bold;
		border: 1px solid #000;
		line-height: 20px;
		text-align: center;

	}
	.table-costum tr td {
		font-size: 9px;
		border: 1px solid #000;
		line-height: 20px;
	}

	.tbl-header tr th,
	.tbl-header tr td {
		font-size: 9px;
		font-weight: bold;
		text-align: left;
	}
</style>
<table class="tbl-header">
	<tr>
		<th width="60%">HASIL PEMENIMBANGAN/PEMERIKSAAN TERNAK TANGGAL</th>
		<th width="2%">:</th>
		<th><?php echo strtoupper($data->tanggal_permohonan); ?></th>
	</tr>
	<tr>
		<th>SESUAI DENGAN PERINTAH KEUR HOMOR</th>
		<th>:</th>
		<th ></th>
	</tr>
	<tr>
		<th>NAMA PERUSAHAAN</th>
		<th>:</th>
		<th><?php echo strtoupper($data->nama_perusahaan); ?></th>
	</tr>
</table>
<br>
<br>
<table class="table-costum">
	<tr>
		<th width="5%">No</th>
		<th width="25%">No. Kartu Ternak</th>
		<th width="35%">Berat (Kg) </th>
		<th width="35%">Keterangan</th>
	</tr>
	<?php 
		foreach($jml_ternak as $row): 
	?>						
	<tr>
		<td colspan="4" style="text-align: left; font-weight: bold"><?php echo strtoupper($row->nama_entitas); ?></td>
	</tr>						
	<?php 
		$x=1;
		foreach($komoditi_pemohon as $no => $list): 
			if($list->id_entitas == $row->id_entitas) {
	?>
	<tr>
		<td style="text-align: center"><?php echo $x; ?></td>
		<td><?php echo $list->id_ternak; ?></td>
		<td><?php echo $list->berat; ?></td>
		<td>Sesuai</td>
	</tr>

	<?php 
			$x++; 
			} 
		endforeach;
		endforeach; 
	?>

</table>
<br>
<br>
<table class="tbl-header">
	<tr>
		<th colspan="3">PETUGAS PEMERIKSA</th>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="34%">1. ________________________</td>
		<td width="33%">2. ________________________</td>
		<td width="33%">3. ________________________</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>4. ________________________</td>
		<td>5. ________________________</td>
		<td>6. ________________________</td>
	</tr>
</table>