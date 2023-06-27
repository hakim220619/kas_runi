<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KasController extends Controller
{
    function view()
    {
        $data['title'] = "Kas";
        $data['jenis'] = ['Kas Masuk', 'Kas Keluar'];
        $data['kas'] = DB::table('kas')->get();
        return view('backend.kas.view', $data);
    }
    function addKas()
    {
        $data['title'] = "Tambah Kas";
        return view('backend.kas.add', $data);
    }
    function addProses(Request $request)
    {
        try {
            $data = [
                'title' => $request->title,
                'user_id' => request()->user()->id,
                'jenis' => $request->jenis,
                'count' => $request->count,
                'sum' => $request->sum,
                'description' => $request->description,
                'created_at' => now(),
            ];
            DB::table('kas')->insert($data);
            Alert::success('Kas successfully added.');
            return redirect('kas');
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
    public function editProses(Request  $request)
    {

        $data = [
            'title' => $request->title,
            'user_id' => request()->user()->id,
            'count' => $request->count,
            'jenis' => $request->jenis,
            'sum' => $request->sum,
            'description' => $request->description,
            'updated_at' => now(),
        ];
        // dd($data);
        DB::table('kas')->where('id', $request->id)->update($data);
        Alert::success('Kas successfully updated.');
        return redirect('kas');
    }
    
    public function delete($id)
    {
        try {
            // dd($id);
            DB::table('kas')->where('id', $id)->delete();
            // Alert::success('Category was successful deleted!');
            return redirect()->route('kas');
        } catch (Exception $e) {
            return response([
                'success' => false,
                'msg'     => 'Error : ' . $e->getMessage() . ' Line : ' . $e->getLine() . ' File : ' . $e->getFile()
            ]);
        }
    }
}
