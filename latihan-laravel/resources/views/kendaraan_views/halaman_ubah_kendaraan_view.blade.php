@extends('base')

@section('content')
<div class="container">
    <h3>Data Kendaraan</h3>
 
    <a href="/"> Kembali</a>
    
    <br/>
    <br/>
 
    <form action="/kendaraan/ubah_kendaraan" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$kendaraan->id}}">
        <label>Nama : </label>
        <input type="text" name="nama" value="{{$kendaraan->nama}}"> <br/>
        <label>Absen : </label>
        <input type="text" name="plat_nomor" value="{{$kendaraan->plat_nomor}}"> <br/>
        <input type="text" name="pemilik" value="{{$pemiliknya->nama}}"> <br/>
        <button class="btn btn-primary" type="submit"> Ubah </button>
    </form>
 
</div>
@stop