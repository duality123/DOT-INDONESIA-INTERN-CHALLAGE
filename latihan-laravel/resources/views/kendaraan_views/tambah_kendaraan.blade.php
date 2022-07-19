@extends('base')

@section('content')
<div class="container">
 
	<h3>Tambah data kendaraan</h3>
 
	<form action="/kendaraan/tambah_kendaraan" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="kirim" value="1">
		<label>Nama : </label>
	    <input type="text" name="nama"> <br/>
	    <select name="pemilik">
	    @foreach ($daftarSiswa as $siswa)
   		 <option value="{{$siswa->id}}">{{$siswa->nama}}</option>
   		@endforeach
	  </select><br/>
	    <label>plat nomor : </label>
	    <input type="text" name="plat_nomor"> <br/>
		<button class="btn btn-primary" type="submit"> Tambah </button>
	</form>
</div>
@stop