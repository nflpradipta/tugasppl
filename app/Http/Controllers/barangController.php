<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Session;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = barang::orderBy('barang_nama', 'desc')->paginate();
        return view('barang.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('barang_id',$request->barang_id);
        Session::flash('barang_nama',$request->barang_nama);
        Session::flash('barang_total',$request->barang_total);
        Session::flash('barang_kondisi',$request->barang_kondisi);
        $request->validate([
            'barang_id'=>'required|numeric|unique:barang,barang_id',
            'barang_nama'=>'required',
            'barang_total'=>'required|numeric',
            'barang_kondisi'=>'required',
        ],[
            'barang_id.required' => 'ID Barang harus diisi',
            'barang_id.numeric' => 'ID Barang harus berupa angka',
            'barang_id.unique' => 'ID Barang harus berbeda dari ID Barang lainnya',
            'barang_nama.required' => 'Nama Barang harus diisi',
            'barang_total.required' => 'Total Barang harus diisi',
            'barang_total.numeric' => 'Total Barang harus berupa angka',
            'barang_kondisi.required' => 'Kondisi Barang harus diisi',
        ]);
        
        $data = [
            'barang_id' => $request->barang_id,
            'barang_nama' => $request->barang_nama,
            'barang_total' => $request->barang_total,
            'barang_kondisi' => $request->barang_kondisi,
        ];
        barang::create($data);
        return redirect()->to('barang')->with('success', 'Berhasil Menambahkan Barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = barang::where('barang_id',$id)->first();
        return view('barang.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_nama'=>'required',
            'barang_total'=>'required|numeric',
            'barang_kondisi'=>'required',
        ],[
            'barang_nama.required' => 'Nama Barang harus diisi',
            'barang_total.required' => 'Total Barang harus diisi',
            'barang_total.numeric' => 'Total Barang harus berupa angka',
            'barang_kondisi.required' => 'Kondisi Barang harus diisi',
        ]);
        
        $data = [
            'barang_nama' => $request->barang_nama,
            'barang_total' => $request->barang_total,
            'barang_kondisi' => $request->barang_kondisi,
        ];
        barang::where('barang_id',$id)->update($data);
        return redirect()->to('barang')->with('success', 'Berhasil Mengubah Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang::where('barang_id', $id)->delete();
        return redirect()->to('barang')->with('success', 'Berhasil Menghapus Barang');
    }
}
