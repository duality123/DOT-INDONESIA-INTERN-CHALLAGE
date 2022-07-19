<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Siswa;

class SiswaController extends Controller
{

   /**
    * controller untuk halaman siswa/index
    */

    function index(){
        $siswa = Siswa::all()->sortBy(['absen', 'asc']); //query dengan order ascending di absen
        return view('/siswa_views/home',['daftarSiswa'=>$siswa]);
    }

    
    /**
    * controller untuk tambah siswa
    */
    
    function tambah_siswa_view(Request $request){
        if (isset($request->kirim)) {
            $pesan = '';
            $status ='';
            try{
                     cekData($request->id,$request->nama,$request->absen);
                     if (Siswa::firstWhere('absen',$request->absen)) {
                        throw new Exception("Absen telah diambil !");
           
                      }
                       $siswa_baru = new Siswa;
                       $siswa_baru->nama = $request->nama;
                       $siswa_baru->absen = $request->absen;
                       $siswa_baru->save();
                       $pesan = 'data berhasil ditambah';
                       $status = 'success';

                    }
               
                catch(Exception $e) {  // Jika gagal keluarkan errornya
                       $pesan = $e->getMessage();
                       $status ='error';

                }
          return redirect('siswa/tambah_siswa')->with([$status => $pesan]);  
         } 
    return view('/siswa_views/tambah_siswa');
       
    }

    /**
    * controller untuk hapus siswa
    */
    
    function hapus_siswa_view($id){
        $status ='';
        $pesan='';
        $target = Siswa::firstWhere('id',$id);
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
        return redirect('/siswa')->with([$status=>$pesan]);; # ke halaman siswa
    }

    /**
    * controller untuk halaman ubah siswa
    */

    function halaman_ubah_siswa_view($id){
    try{
        $data = Siswa::firstWhere('id',$id);
        return view('/siswa_views/halaman_ubah_siswa_view',$data);
    }
    catch(Exception $e) {//bila gagal keluarkan errornya
        return redirect('/siswa')->with(['error'=>'nomor id tidak ada!']);
    }
       
    }

function ubah_siswa_view(Request $request){
    $status ='';
    $pesan='';
    try{
        cekData($request->id,$request->nama,$request->absen);
        if ($request->absen != Siswa::firstWhere('id',$request->id)->absen && Siswa::firstWhere('absen',$request->absen) ) {
            throw new Exception("Absen sudah dipakai !");
            
        }
        Siswa::where('id',$request->id)->update([
        'nama' => $request->nama,
        'absen' => $request->absen,]);
        $status ='success';
        $pesan='Data sukses diubah';
     }
    catch(Exception $e) {//bila gagal keluarkan errornya
        $pesan = $e->getMessage();
        $status ='error';
    }
    return redirect('/siswa/halaman_ubah/'.$request->id)->with([$status=>$pesan]); # ke halaman siswa
}




}


function cekData($id,$nama,$absen){
        if (var_dump(is_int($absen))) {
           throw new Exception("No Absen harus berupa angka!");
           
        }
        if (!isset($nama) || !isset($absen)) {
            throw new Exception("Semua kredensial harus dipenuhi!");
        }

}