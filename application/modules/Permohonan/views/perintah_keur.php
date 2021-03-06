<?php
	$tanggal1 = date('Y-m-d');
	$tanggal2 = $keur->tanggal_keur;
	$day = date('D', strtotime($tanggal2));
	$dayList = array(
		'Sun' => 'Minggu',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabu',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);		

	$bulan = array(
		'01' => 'Januari', 
		'02' => 'Februari', 
		'03' => 'Maret', 
		'04' => 'April', 
		'05' => 'Mei', 
		'06' => 'Juni', 
		'07' => 'Juli', 
		'08' => 'Agustus', 
		'09' => 'September', 
		'10' => 'Oktober', 
		'11' => 'November',
		'12' => 'Desember'
	);

	$tgl1 = explode("-", $tanggal1);
	$tgl2 = explode("-", $tanggal2);
	$bulan1 = $tgl1[1];
	$bulan2 = $tgl2[1];

?>

<table style="border-bottom: 3px solid #000">
	<tr>
		<td width="10%"><img src="<?php echo base_url('assets/image/logo/logosumbawa.png'); ?>" style="width: 50px"/></td>
		<td style="text-align: center; width:80%">
			<p style="line-height: 15px; font-size: 15px">
				<strong>
					PEMERINTAH KABUPATEN SUMBAWA<br>
					DINAS PETERNAKAN DAN KESEHATAN HEWAN<br>
				</strong>
				<span style="font-size: 10px;font-style: italic;">Jalan Dr. Wahidin No. 25 Telp. (0371) 21148</span><br>
				<span style="font-size: 10px;font-style: italic;">Fax. (0371) 22781 Sumbawa Besar</span>
			</p>
		</td>
		<td width="10%"></td>
	</tr>
</table>
<br>
<br>
<table style="width: 100%">
	<tr>
		<td style="text-align: center">
			<p style="font-size: 11px; font-weight: bold"><u>SURAT PERINTAH KELUARAN TERNAK</u></p>
		</td>
	</tr>
	<tr>
		<td style="text-align: center">
			<p style="font-size: 11px;">NOMOR : 524.2/<?php echo $keur->nomor; ?>/Disnakwan-KPP/IV/<?php echo date('Y'); ?></p>
		</td>
	</tr>
</table>
<br>
<br>

<table class="table-costum">
	<tr>
		<td width="35%">Nama</td>
		<td width="2%">:</td>
		<td style="text-align: left;width: 63%"><?php echo strtoupper($data->nama_pemohon); ?></td>
	</tr>
	<tr>
		<td>Nama Perusahaan</td>
		<td>:</td>
		<td style="text-align: left"><?php echo strtoupper($data->nama_perusahaan); ?></td>
	</tr>
	<tr>
		<td>Waktu Pengurusan/No. Urut</td>
		<td>:</td>
		<td style="text-align: left"><?php echo $keur->waktu_pengurusan; ?></td>
	</tr>
	<tr>
		<td>Hari / Tanggal Keur</td>
		<td>:</td>
		<td style="text-align: left"><?php echo $dayList[$day].", ".$tgl2[2]." ".$bulan[$bulan2]." ".$tgl2[0]; ?></td>
	</tr>
	<tr>
		<td>Jenis dan Jumlah Ternak</td>
		<td>:</td>
		<td style="text-align: left">
			<table class="table-costum">
				<?php foreach($jml_ternak as $no => $row): $no = $no + 1; ?>
				<tr>
					<td width="1%"></td>
					<td width="5%"><?php echo $no.". "; ?></td>
					<td width="35%"><?php echo $row->nama_entitas ?> </td>
					<td width="3%">=</td>
					<td width="15%" style="text-align: center;"><?php echo $row->quota; ?></td>
					<td width="30%" style="text-align: left">Ekor</td>
				</tr>
				<?php endforeach; ?>
			</table>			
		</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td>Petugas Pemeriksa</td>
		<td>:</td>
		<td style="text-align: left">
			1. <?php echo $keur->petugas_pemeriksa; ?>
		</td>
	</tr>
	<tr>
		<td>Tujuan Pemeriksaan</td>
		<td>:</td>
		<td style="text-align: left">
			<?php echo $keur->tujuan_pemeriksa; ?>
		</td>
	</tr>
	<tr>
		<td>Tujuan Pengeluaran</td>
		<td>:</td>
		<td style="text-align: left">
			<?php echo $data->tujuan; ?>
		</td>
	</tr>
</table>
<br>
<br>
<br>

<table class="table-costum">
	<tr>
		<td width="50%">
			<br>
			<br>
			<br>
			<br>
			<table style="border: 2px solid #000; width: 65%; font-size: 9px;padding: 5px">
				<tr>
					<td>
						Hanya berlaku untuk 1 ( Satu ) Kali <br>
						Pemeriksaan pada Jam Dinas Sesuai <br>
						Sesuai dengan tanggal Perintah Keur						
					</td>
				</tr>
			</table>
		</td>
		<td style="text-align: center; width: 50%">
			Sumbawa Besar, <?php echo $tgl1[2]." ".$bulan[$bulan1]." ".$tgl1[0] ?><br>
			<?php echo $row_pegawai->jabatan; ?> Kabupaten Sumbawa
			<br><br><br><br><br><br>
			<u><b><?php echo $row_pegawai->nama; ?></b></u><br>
			NIP. <?php echo $row_pegawai->nip; ?>
		</td>
	</tr>
</table>
