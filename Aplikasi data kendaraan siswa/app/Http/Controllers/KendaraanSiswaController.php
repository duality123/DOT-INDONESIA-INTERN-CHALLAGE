<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Siswa;
class KendaraanSiswaController extends Controller
{

   /**
    * controller untuk halaman siswa/index
    */

    function index(){
        $kendaraan = Kendaraan::all()->sortBy(['nama', 'asc']); //query dengan order ascending di absen
        $siswanya = [];
        foreach ($kendaraan as $k) {
        //print_r($k->owner['nama']);
            $siswanya[]=Siswa::firstwhere('id',$k->siswaid)['nama'];
        }
        
        return view('/kendaraan_views/daftar_kendaraan',['daftarKendaraan'=>$kendaraan,'siswa'=>$siswanya]);
    }

    function tambah_kendaraan_view(Request $request){
        if (isset($request->kirim)) {
            $pesan = '';
            $status ='';
            try{
                     if (!isset($request->nama) && !isset($request->plat_nomor)) {
                            throw new Exception("Semua kredensial harus dipenuhi!");
                        }
                     if (Kendaraan::firstWhere('plat_nomor',$request->plat_nomor)) {
                        throw new Exception("kendaraan telah diambil !");
           
                      }
                       $kendaraan_baru = new Kendaraan;
                       $kendaraan_baru->nama = $request->nama;
                       $kendaraan_baru->plat_nomor = $request->plat_nomor;
                       $kendaraan_baru->siswaid = $request->pemilik;
                       $kendaraan_baru->save();
                       $pesan = 'data berhasil ditambah';
                       $status = 'success';

                    }
               
                catch(Exception $e) {  // Jika gagal keluarkan errornya
                       $pesan = $e->getMessage();
                       $status ='error';

                }
          return redirect('kendaraan/tambah_kendaraan')->with([$status => $pesan]);  
         } 
    $daftarSiswa = Siswa::all();
    return view('/kendaraan_views/tambah_kendaraan',['daftarSiswa'=>$daftarSiswa]);
       
    }

    function hapus_kendaraan_view($id){
        $status ='';
        $pesan='';
        $target = Kendaraan::firstWhere('id',$id);
        try{  //coba hapus row dalam siswa dengan atribut no == uri_$id
            if ($target == null) {
                throw new Exception();
                
            }
            $target->delete();
            $status ='success';
            $pesan = "data berhasil dihapus";
        }
        catch(Exception $e) {//bila gagal keluarkan errornya
            $status ='error';
            $pesan = "data gagal dihapus,  id data tak ada !";
        }
        return redirect('/kendaraan')->with([$status=>$pesan]);; # ke halaman siswa
    }



    function halaman_ubah_kendaraan_view($id){
    try{
        $data = Kendaraan::firstWhere('id',$id);
        $pemiliknya = Siswa::firstWhere('id',$data['siswaid']);
        return view('/kendaraan_views/halaman_ubah_kendaraan_view',['kendaraan'=>$data,'pemiliknya'=>$pemiliknya]);
    }
    catch(Exception $e) {//bila gagal keluarkan errornya
        return redirect('/kendaraan')->with(['error'=>'nomor id tidak ada!']);
    }
}

function ubah_kendaraan_view(Request $request){
    $status ='';
    $pesan='';
    try{
        if (!isset($request->nama) && !isset($request->plat_nomor) && !isset($request->pemilik)) {
                throw new Exception("Semua kredensial harus dipenuhi!");
            }
        if (Kendaraan::firstWhere('plat_nomor',$request->plat_nomor)) {
                        throw new Exception("kendaraan telah diambil !");}
           
        
        $siswanya = Siswa::firstWhere('nama',$request->pemilik);
        Kendaraan::where('id',$request->id)->update([
        'nama' => $request->nama,
        'plat_nomor' => $request->plat_nomor,
        'siswaid'=>$siswanya['id']]);
        $status ='success';
        $pesan='Data sukses diubah';
     }

    catch(Exception $e) {//bila gagal keluarkan errornya
        $pesan = $e->getMessage();
        $status ='error';
    }
    return redirect('/kendaraan/halaman_ubah_kendaraan/'.$request->id)->with([$status=>$pesan]); # ke halaman siswa
}


    
}