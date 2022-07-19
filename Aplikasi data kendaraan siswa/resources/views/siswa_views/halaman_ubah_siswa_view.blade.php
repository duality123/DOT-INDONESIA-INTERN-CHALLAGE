@extends('base')

@section('content')
<div class="container">
	<h3>Data Pegawai</h3>
 
	<a href="/"> Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/siswa/ubah_siswa" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{$id}}">
		<label>Nama : </label>
	    <input type="text" name="nama" value="{{$nama}}"> <br/>
	    <label>Absen : </label>
	    <input type="text" name="absen" value="{{$absen}}"> <br/>
		<button class="btn btn-primary" type="submit"> Ubah </button>
	</form>
 
</div>
@stop