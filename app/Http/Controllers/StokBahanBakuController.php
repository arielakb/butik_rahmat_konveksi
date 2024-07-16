<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\StokBahanBakuModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StokBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $join = DB::table('tbl_stok_bahan_baku')
            ->join('tbl_loker_bahan', 'tbl_loker_bahan.nama_loker_bahan', '=', 'tbl_stok_bahan_baku.nama_loker_bahan')
            ->select('tbl_stok_bahan_baku.id', 'tbl_loker_bahan.id_loker_bahan', 'tbl_stok_bahan_baku.nama_loker_bahan', 'tbl_stok_bahan_baku.nama_bahan_baku', 'tbl_stok_bahan_baku.nama_bahan_baku', 'tbl_stok_bahan_baku.merk_bahan_baku', 'tbl_stok_bahan_baku.jenis_bahan_baku', 'tbl_stok_bahan_baku.warna_bahan', 'tbl_stok_bahan_baku.qty_bahan', 'tbl_stok_bahan_baku.tgl_pemeriksaan_bahan', 'tbl_stok_bahan_baku.penanggung_jawab')
            ->get();
        // dd($join[0]->id_loker_bahan);
        return view('admin.stok_bahan_baku.crud.index', compact('join'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_stok_bahan_baku($id)
    {

        $join = DB::table('tbl_stok_bahan_baku')
            ->join('tbl_loker_bahan', 'tbl_loker_bahan.nama_loker_bahan', '=', 'tbl_stok_bahan_baku.nama_loker_bahan')
            ->select('tbl_stok_bahan_baku.id', 'tbl_loker_bahan.id_loker_bahan', 'tbl_stok_bahan_baku.nama_loker_bahan', 'tbl_stok_bahan_baku.nama_bahan_baku', 'tbl_stok_bahan_baku.nama_bahan_baku', 'tbl_stok_bahan_baku.merk_bahan_baku', 'tbl_stok_bahan_baku.jenis_bahan_baku', 'tbl_stok_bahan_baku.warna_bahan', 'tbl_stok_bahan_baku.qty_bahan', 'tbl_stok_bahan_baku.tgl_pemeriksaan_bahan', 'tbl_stok_bahan_baku.penanggung_jawab')
            ->where('tbl_stok_bahan_baku.id', '=', $id)
            ->get();
        // dd($join[0]->items);

        return view('admin.stok_bahan_baku.crud.show_stok', compact('join'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print_stok_bahan_baku($nama_loker_bahan)
    {
        $data = StokBahanBakuModel::find($nama_loker_bahan);
        $join = DB::table('tbl_stok_bahan_baku')
            ->join('tbl_loker_bahan', 'tbl_loker_bahan.nama_loker_bahan', '=', 'tbl_stok_bahan_baku.nama_loker_bahan')
            ->select('tbl_stok_bahan_baku.id', 'tbl_loker_bahan.id_loker_bahan', 'tbl_stok_bahan_baku.nama_loker_bahan', 'tbl_stok_bahan_baku.nama_bahan_baku', 'tbl_stok_bahan_baku.nama_bahan_baku', 'tbl_stok_bahan_baku.merk_bahan_baku', 'tbl_stok_bahan_baku.jenis_bahan_baku', 'tbl_stok_bahan_baku.warna_bahan', 'tbl_stok_bahan_baku.qty_bahan', 'tbl_stok_bahan_baku.tgl_pemeriksaan_bahan', 'tbl_stok_bahan_baku.penanggung_jawab')
            ->where('tbl_stok_bahan_baku.nama_loker_bahan', '=', $nama_loker_bahan)
            ->get();
        // dd($join[0]->nama_loker);
        return view('admin.stok_bahan_baku.crud.print_stok', compact('data', 'join'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}