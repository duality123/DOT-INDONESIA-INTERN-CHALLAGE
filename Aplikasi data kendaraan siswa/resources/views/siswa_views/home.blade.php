@extends('base')

@section('content')
<div class="container">
	<h3>CRUD 1 (SISWA)</h3>
<a href="siswa/tambah_siswa" class="btn btn-primary"> Tambah Siswa</a>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Siswa</th>
				<th>Absen</th>
				<th>Opsi</th>
			</tr>
			<?php $i = 1;?>
			<tr>
			@foreach($daftarSiswa as $siswa)
			<td><?php echo $i;?></td>
			<td>{{$siswa->nama}}</td>
			<td>{{$siswa->absen}}</td>
			<td><a href="siswa/hapus_siswa/{{$siswa->id}}">Hapus</a> <a href="siswa/halaman_ubah/{{$siswa->id}}">Ubah</a></td>
			<?php $i++;?>
			</tr>
			@endforeach
		</table>
</div>	
@stop
