@extends('base')

@section('content')
<div class="container">
 
	<h3>Tambah data siswa</h3>
 
	<form action="/siswa/tambah_siswa" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="kirim" value="1">
		<label>Nama : </label>
	    <input type="text" name="nama"> <br/>
	    <label>Absen : </label>
	    <input type="text" name="absen"> <br/>
		<button class="btn btn-primary" type="submit"> Tambah </button>
	</form>
</div>
@stop