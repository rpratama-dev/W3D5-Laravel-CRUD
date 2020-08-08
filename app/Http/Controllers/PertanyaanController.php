<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PertanyaanController extends Controller
{

    private $current_timestamp;

    public function __construct()
    {
        $this->current_timestamp = Carbon::now()->toDateTimeString(); //get timestamp;
    }

    /** menampilkan list data pertanyaan-pertanyaan (boleh menggunakan table html atau bootstrap card) */
    public function index(){
        $data = DB::table('pertanyaan')->orderBy('id', 'desc')->get();
        //print_r ($datas);
        return view('pertanyaan.index',['page' => 'Daftar Pertanyaan', 'datas' => $data]);
    } 

    /** menyimpan data baru ke tabel pertanyaan */
    public function store(Request $request){ 
        // insert data ke table pegawai
        $store = DB::table('pertanyaan')->insert([
            'judul' => $request->txtJudul,
            'isi' => $request->txtPertanyaan,
            'created_at' => $this->current_timestamp,
            'updated_at' => $this->current_timestamp, 
            'profil_id' => 1
        ]);

        if ($store) { 
            return  $this->index();
        } 
    }

    /** menampilkan form untuk membuat pertanyaan baru */
    public function create(){
        $data = (object) array('id'=>'', 'judul' => '', 'isi' => '' );
        return view('pertanyaan.create',['page' => 'Buat Pertanyaan', 'href'=>'/pertanyaan', 'data'=>$data]);
        
        //return view('pertanyaan.create',['page' => 'Pertanyaan', 'href'=>'/pertanyaan']);
    }

    /** menampilkan detail pertanyaan dengan id tertentu */
    public function show($id){
        $data = DB::table('pertanyaan')->find($id);   
        return view('pertanyaan.show',['page' => 'Rincian Pertanyaan', 'data' => $data]); 
    }

    /** menyimpan perubahan data pertanyaan (update) untuk id tertentu */
    public function update(Request $request, $id){ 
        $affected = DB::table('pertanyaan')
              ->where('id', $id)
              ->update([
                    'judul' => $request->txtJudul,
                    'isi' => $request->txtPertanyaan, 
                    'updated_at' => $this->current_timestamp]);

        if ($affected) {
            return  $this->index(); 
        }
    }

    /** menghapus pertanyaand dengan id tertentu */
    public function destroy($id){
        $affected = DB::table('pertanyaan')->where('id', $id)->delete();
        if ($affected) {
            return  $this->index(); 
        }
    }

    /** menampilkan form untuk edit pertanyaan dengan id tertentu */
    public function edit($id){ 
        $data = DB::table('pertanyaan')->find($id); 
        return view('pertanyaan.create',['page' => 'Edit Pertanyaan', 'href'=>'/pertanyaan/'.$id, 'data'=>$data]);
    }

}
