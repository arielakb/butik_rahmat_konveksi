<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\StokModel;
use App\StokBahanBakuModel;
use App\OrderModel;
use App\PegawaiModel;
use App\SupplierModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class MasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function master_stok()
    {
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d');
        // dd($tanggal);

        $data = DB::table('tbl_stok')->orderBy('nama_loker', 'ASC')->get();
        $loker = DB::table('tbl_loker')->orderBy('nama_loker', 'ASC')->get();

        return view('admin.masterdata.stok.index', compact('data', 'loker', 'tanggal'));
    }



    public function input_master_stok(Request $request)
    {
        $nama_barang = $request->nama_barang;

        for ($i = 0; $i < count($nama_barang); $i++) {
            if (!empty($nama_barang[$i])) {
                $data = StokModel::create([
                    'nama_loker' => $request->nama_loker[$i],
                    'nama_barang' => $request->nama_barang[$i],
                    'qty' => $request->qty[$i],
                    'warna' => $request->warna[$i],
                    'bahan' => $request->bahan[$i],
                    'size' => $request->size[$i],
                    'pemeriksa' => Auth::user()->name,
                    'tgl_pemeriksaan' => $request->tgl_pemeriksaan
                ]);
            }
        }
        Alert::success('Berhasil', 'Stok Barang Berhasil Di Buat');
        return redirect()->back();
    }



    public function show_stok($nama_loker)
    {
        $data = StokModel::find($nama_loker);
        // dd($data);

        $join = DB::table('tbl_stok')
            ->join('tbl_loker', 'tbl_loker.nama_loker', '=', 'tbl_stok.nama_loker')
            ->select('tbl_stok.id', 'tbl_stok.nama_loker', 'tbl_stok.nama_barang', 'tbl_stok.warna', 'tbl_stok.bahan', 'tbl_stok.size', 'tbl_stok.qty', 'tbl_stok.tgl_pemeriksaan')
            ->where('tbl_stok.nama_loker', '=', $nama_loker)
            ->get();
        // dd($join[0]->nama_loker);

        return view('admin.masterdata.stok.show_stok', compact('data', 'join'));
    }

    public function edit_stok($id)
    {
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d');

        $data = StokModel::find($id);
        // dd($data);

        $loker = DB::table('tbl_loker')->get();


        return view('admin.masterdata.stok.edit', compact('data', 'tanggal', 'loker'));
    }

    public function update_stok(Request $request, $id)
    {
        $data = StokModel::find($id);

        $result =  StokModel::where('id', $id)->update([
            'nama_loker' => $request->nama_loker,
            'nama_barang' => $request->nama_barang,
            'qty' => $request->qty,
            'warna' => $request->warna,
            'bahan' => $request->bahan,
            'size' => $request->size,
            'pemeriksa' => Auth::user()->name,
            'tgl_pemeriksaan' => $request->tgl_pemeriksaan
        ]);
        Alert::success('Berhasil', 'Stok Berhasil Di Update');
        return redirect('/master_stok');
    }

    public function destroy_stok($id)
    {
        $data = StokModel::find($id);
        $data->delete();
        Alert::success('Berhasil', 'Stok Barang Berhasil Di Hapus');
        return redirect('/master_stok');
    }

    //MASTER STOK BAHAN BAKU

    public function master_stok_bahan_baku()
    {
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d');
        // dd($tanggal);

        $data = DB::table('tbl_stok_bahan_baku')->orderBy('nama_loker_bahan', 'ASC')->get();
        $loker = DB::table('tbl_loker_bahan')->orderBy('nama_loker_bahan', 'ASC')->get();

        return view('admin.masterdata.stok_bahan_baku.index', compact('data', 'loker', 'tanggal'));
    }

    public function input_master_stok_bahan_baku(Request $request)
    {
        $nama_bahan_baku = $request->nama_bahan_baku;

        for ($i = 0; $i < count($nama_bahan_baku); $i++) {
            if (!empty($nama_bahan_baku[$i])) {
                $data = StokBahanBakuModel::create([
                    'nama_loker_bahan' => $request->nama_loker_bahan[$i],
                    'nama_bahan_baku' => $request->nama_bahan_baku[$i],
                    'merk_bahan_baku' => $request->merk_bahan_baku[$i],
                    'jenis_bahan_baku' => $request->jenis_bahan_baku[$i],
                    'warna_bahan' => $request->warna_bahan[$i],
                    'qty_bahan' => $request->qty_bahan[$i],
                    'penanggung_jawab' => Auth::user()->name,
                    'tgl_pemeriksaan_bahan' => $request->tgl_pemeriksaan_bahan
                ]);
            }
        }
        Alert::success('Berhasil', 'Stok Barang Berhasil Di Buat');
        return redirect()->back();
    }


    public function show_stok_bahan_baku($nama_loker_bahan)
    {
        $data = StokBahanBakuModel::find($nama_loker_bahan);
        // dd($data);

        $join = DB::table('tbl_stok_bahan_baku')
            ->join('tbl_loker_bahan', 'tbl_loker.nama_loker_bahan', '=', 'tbl_stok_bahan_baku.nama_loker_bahan')
            ->select('tbl_stok_bahan_baku.id', 'tbl_stok_bahan_baku.nama_loker_bahan', 'tbl_stok_bahan_baku.nama_bahan_baku', 'tbl_stok_bahan_baku.merk_bahan_baku', 'tbl_stok_bahan_baku.jenis_bahan_baku', 'tbl_stok_bahan_baku.warna_bahan', 'tbl_stok.qty_bahan', 'tbl_stok.tgl_pemeriksaan_bahan')
            ->where('tbl_stok.nama_loker_bahan', '=', $nama_loker_bahan)
            ->get();
        // dd($join[0]->nama_loker);

        return view('admin.masterdata.stok_bahan_baku.show_stok', compact('data', 'join'));
    }



    public function edit_stok_bahan_baku($id)
    {
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d');

        $data = StokBahanBakuModel::find($id);
        // dd($data);

        $loker = DB::table('tbl_loker_bahan')->get();


        return view('admin.masterdata.stok_bahan_baku.edit', compact('data', 'tanggal', 'loker'));
    }



    public function update_stok_bahan_baku(Request $request, $id)
    {
        $data = StokBahanBakuModel::find($id);

        $nama_loker_bahan = $request->nama_loker_bahan;
        $nama_bahan_baku = $request->nama_bahan_baku[0];
        $merk_bahan_baku = $request->merk_bahan_baku[0];
        $jenis_bahan_baku = $request->jenis_bahan_baku[0];
        $warna_bahan = $request->warna_bahan[0];
        $qty_bahan = $request->qty_bahan[0];
        $penanggung_jawab = Auth::user()->name;
        $tgl_pemeriksaan_bahan = $request->tgl_pemeriksaan_bahan;

        $result = StokBahanBakuModel::where('id', $id)->update([
            'nama_loker_bahan' => $nama_loker_bahan,
            'nama_bahan_baku' => $nama_bahan_baku,
            'merk_bahan_baku' => $merk_bahan_baku,
            'jenis_bahan_baku' => $jenis_bahan_baku,
            'warna_bahan' => $warna_bahan,
            'qty_bahan' => $qty_bahan,
            'penanggung_jawab' => $penanggung_jawab,
            'tgl_pemeriksaan_bahan' => $tgl_pemeriksaan_bahan,
        ]);

        Alert::success('Berhasil', 'Stok Berhasil Di Update');
        return redirect('/master_stok_bahan_baku');
    }


    public function destroy_stok_bahan_baku($id)
    {
        $data = StokBahanBakuModel::find($id);
        $data->delete();
        Alert::success('Berhasil', 'Stok Barang Berhasil Di Hapus');
        return redirect('/master_stok_bahan_baku');
    }

    public function add_jahit()
    {
        date_default_timezone_set('asia/jakarta');
        $tanggal = date('Y-m-d');

        $vendor = OrderModel::select('nama_vendor')->where('status', 1)->get();
        // dd($status_vendor);

        return view('admin.masterdata.penggajian.jahit.add', compact('tanggal', 'vendor'));
    }


    public function master_orderan()
    {
        $data = OrderModel::all();
        return view('admin.masterdata.orderan.index', compact('data'));
    }

    public function destroy_orderan($id)
    {
        $data = OrderModel::find($id);
        // dd($data);
        $data->delete();
        Alert::success('Berhasil', 'Orderan Berhasil Di Hapus');
        return redirect('/master_orderan');
    }

    //MASTER PEGAWAI
    public function master_pegawai()
    {
        $data = PegawaiModel::all();
        return view('admin.masterdata.pegawai.index', compact('data'));
    }

    public function edit_pegawai($id)
    {
        $data = PegawaiModel::find($id);
        // dd($data);
        return view('admin.masterdata.pegawai.edit', compact('data'));
    }

    public function update_pegawai(Request $request, $id)
    {
        $data = PegawaiModel::find($id);
        $data->nama_pegawai = $request->nama_pegawai;
        $data->kontak_pegawai = $request->kontak_pegawai;
        $data->alamat_pegawai = $request->alamat_pegawai;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tggl_bekerja = $request->tggl_bekerja;
        $data->jabatan = $request->jabatan;
        $data->save();

        Alert::success('Sukses', 'Akun Berhasil Di Edit');
        return redirect('/master_pegawai');
    }

    public function add_pegawai(Request $request)
    {
        $data = PegawaiModel::create([
            'nama_pegawai' => $request->nama_pegawai,
            'kontak_pegawai' => $request->kontak_pegawai,
            'alamat_pegawai' => $request->alamat_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tggl_bekerja' => $request->tggl_bekerja,
            'jabatan' => $request->jabatan,
        ]);

        Alert::success('Sukses', 'Akun Berhasil Di Simpan');
        return redirect('/master_pegawai');
    }

    public function destroy_pegawai($id)
    {
        $data = PegawaiModel::find($id);
        // dd($data);
        $data->delete();
        Alert::success('Berhasil', 'Akun Berhasil Di Hapus');
        return redirect('/master_pegawai');
    }


    // MASTER SUPPLIER
    public function master_supplier()
    {
        $data = SupplierModel::all();
        return view('admin.masterdata.supplier.index', compact('data'));
    }

    public function edit_supplier($id)
    {
        $data = SupplierModel::find($id);
        // dd($data);
        return view('admin.masterdata.supplier.edit', compact('data'));
    }

    public function update_supplier(Request $request, $id)
    {
        $data = SupplierModel::find($id);
        $data->nama_supplier = $request->nama_supplier;
        $data->kontak = $request->kontak;
        $data->alamat = $request->alamat;
        $data->save();

        Alert::success('Sukses', 'Akun Berhasil Di Edit');
        return redirect('/master_supplier');
    }

    public function add_supplier(Request $request)
    {
        $data = SupplierModel::create([
            'nama_supplier' => $request->nama_supplier,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
        ]);

        Alert::success('Sukses', 'Akun Berhasil Di Simpan');
        return redirect('/master_supplier');
    }

    public function destroy_supplier($id)
    {
        $data = SupplierModel::find($id);
        // dd($data);
        $data->delete();
        Alert::success('Berhasil', 'Akun Berhasil Di Hapus');
        return redirect('/master_supplier');
    }

    public function master_akun()

    {
        $provinces = $this->getProvinces();
		$cities = isset(auth()->user()->province_id) ? $this->getCities(auth()->user()->province_id) : [];
		$user = auth()->user();

        $data = User::all();
        return view('admin.masterdata.akun.index', compact('data', 'provinces', 'cities','user'));
    }

    public function edit_akun($id)
    {
        $data = User::find($id);
        // dd($data);
        return view('admin.masterdata.akun.edit', compact('data'));
    }

    public function update_akun(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        Alert::success('Sukses', 'Akun Berhasil Di Edit');
        return redirect('/master_akun');
    }

    public function update_pw(Request $request, $id)
    {
        $data = User::find($id);
        $data->password = bcrypt($request->password);
        $data->save();

        Alert::success('Sukses', 'Password Berhasil Di Ubah Menjadi' . ' ' . $request->password);
        return redirect('/master_akun');
    }

    public function add_akun(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $request->foto,
        ]);
        Alert::success('Sukses', 'Akun Berhasil Di Simpan');
        return redirect('/master_akun');
    }

    public function destroy_akun($id)
    {
        $data = User::find($id);
        // dd($data);
        $data->delete();
        Alert::success('Berhasil', 'Akun Berhasil Di Hapus');
        return redirect('/master_akun');
    }


}
