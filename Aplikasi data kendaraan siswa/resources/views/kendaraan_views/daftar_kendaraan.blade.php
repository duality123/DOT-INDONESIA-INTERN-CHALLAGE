@extends('base')

@section('content')
<div class="container">
	<h3>CRUD 2 (Kendaraan)</h3>
<a href="kendaraan/tambah_kendaraan" class="btn btn-primary"> Tambah kendaraan</a>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Pemilik</th>
				<th>Plat Nomor</th>
				<th>Aksi</th>
			</tr>
			<?php $i = 1;?>
			<?php $x = 0;?>
			<tr>
			@foreach($daftarKendaraan as $kendaraan)
			<td><?php echo $i;?></td>
			<td>{{$kendaraan->nama}}</td>
			
			<td>{{$siswa[$x]}}</td>
			<td>{{$kendaraan->plat_nomor}}</td>

			<td><a href="kendaraan/hapus_kendaraan/{{$kendaraan->id}}">Hapus</a> <a href="kendaraan/halaman_ubah_kendaraan/{{$kendaraan->id}}">ubah</a></td>
			<?php $i++;?>
			<?php $x++;?>
			</tr>
			@endforeach
		</table>
</div>	
@stop
