@extends('layout.master')

@section('judul', 'Master Data Stok Bahan Baku')

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mt-2 mb-2">
                <button type="button" class="btn btn-info btn-xl" data-toggle="modal" data-target="#tambah_data"><i
                        class="fas fa-plus">
                        Tambah Stok Bahan Baku
                    </i>
                </button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">MASTER DATA STOK BAHAN BAKU </h3>
            <div class="card-tools">
                <a href="javascript:window.history.go(-1);" class="btn btn-outline-dark btn-sm"
                    style="border-radius: 15px"><i class="fa fa-arrow-left"> Kembali</i></a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama Loker</th>
                        <th class="text-center">Nama Bahan Baku</th>
                        <th class="text-center">Merk Bahan Baku</th>
                        <th class="text-center">Jenis Bahan Baku</th>
                        <th class="text-center">Warna</th>
                        <th class="text-center">QTY</th>
                        <th class="text-center">Update Terakhir</th>
                        <th class="text-center" style="width: 15%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->nama_loker_bahan }}</td>
                            <td class="text-center">{{ $item->nama_bahan_baku }}</td>
                            <td class="text-center">{{ $item->merk_bahan_baku }}</td>
                            <td class="text-center">{{ $item->jenis_bahan_baku }}</td>
                            <td class="text-center">{{ $item->warna_bahan }}</td>
                            <td class="text-center"><?php echo $item->qty_bahan . ' ' . 'Pcs'; ?></td>
                            <td class="text-center">
                                {{ Carbon\Carbon::parse($item->tgl_pemeriksaan_bahan)->format('d-M-Y') }}</td>
                            <td class="text-center">
                                <a href="/edit_stok_bahan_baku/{{ $item->id }}" class="btn btn-info btn-sm"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/hapus_stok_bahan_baku/{{ $item->id }}" class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header bg-info">
                                    <h3 class="card-title">FORM INPUT MASTER DATA STOK BAHAN BAKU</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="/input_master_stok_bahan_baku" method="POST">
                                        {{ csrf_field() }}
                                        <input type="text" class="form-control" value="{{ $tanggal }}"
                                            name="tgl_pemeriksaan_bahan" hidden>
                                        <div class="kolom_asli">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih
                                                            Loker</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" name="nama_loker_bahan[]">
                                                                <option selected="selected" disabled>Silahkan Pilih..
                                                                </option>
                                                                @foreach ($loker as $item)
                                                                    <option value="{{ $item->nama_loker_bahan }}">
                                                                        {{ $item->nama_loker_bahan }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="nama_bahan_baku" class="col-sm-3 col-form-label">Nama
                                                            Bahan Baku</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nama_bahan_baku"
                                                                placeholder="Nama Bahan Baku.." name="nama_bahan_baku[]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="merk_bahan_baku" class="col-sm-3 col-form-label">Merk
                                                            Bahan Baku</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="merk_bahan_baku" placeholder="Merk Bahan Baku.."
                                                                name="merk_bahan_baku[]">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="qty_bahan" class="col-sm-3 col-form-label">QTY</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" id="qty_bahan"
                                                                placeholder="Pcs .." name="qty_bahan[]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="warna_bahan"
                                                            class="col-sm-3 col-form-label">Warna</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="warna_bahan"
                                                                placeholder="Silahkan Di isi .." name="warna_bahan[]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jenis_bahan_baku"
                                                            class="col-sm-3 col-form-label">Jenis Bahan Baku</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control"
                                                                id="jenis_bahan_baku" placeholder="Jenis Bahan Baku.."
                                                                name="jenis_bahan_baku[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- BATAS --}}
                                        <hr>
                                        <div class="kolom_copy" style="display: none;">
                                            <hr>
                                            <center><span class="badge badge-pill badge-warning">
                                                    <h5>Form Tambah Bahan Baku</h5>
                                                </span>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih
                                                                Loker</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" name="nama_loker_bahan[]">
                                                                    <option selected="selected">Silahkan Pilih..</option>
                                                                    @foreach ($loker as $item)
                                                                        <option value="{{ $item->nama_loker_bahan }}">
                                                                            {{ $item->nama_loker_bahan }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="nama_bahan_baku"
                                                                class="col-sm-3 col-form-label">Nama
                                                                Bahan Baku</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="nama_bahan_baku" placeholder="Nama Bahan Baku.."
                                                                    name="nama_bahan_baku[]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="merk_bahan_baku"
                                                                class="col-sm-3 col-form-label">Merk
                                                                Bahan Baku</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="merk_bahan_baku" placeholder="Merk Bahan Baku.."
                                                                    name="merk_bahan_baku[]">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="qty_bahan"
                                                                class="col-sm-3 col-form-label">QTY</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="qty_bahan"
                                                                    placeholder="Pcs .." name="qty_bahan[]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="warna_bahan"
                                                                class="col-sm-3 col-form-label">Warna</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="warna_bahan" placeholder="Silahkan Di isi .."
                                                                    name="warna_bahan[]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="jenis_bahan_baku"
                                                                class="col-sm-3 col-form-label">Jenis Bahan Baku</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="jenis_bahan_baku" placeholder="Jenis Bahan Baku.."
                                                                    name="jenis_bahan_baku[]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-xl"
                                                    id="BtnHapus"><i class="fa fa-trash"> Hapus</a></i>
                                                <hr>
                                        </div>
                                        <a href="javascript:void(0)" class="btn btn-info btn-xl BtnTambah"><i
                                                class="fa fa-plus">
                                                Tambah</a></i>
                                        <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="border-radius: 15px"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-xl" style="border-radius: 15px"><i
                            class="fa fa-save">
                            Simpan</i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
