@extends('layout.master')

@section('judul', 'Edit Stok Bahan Baku')

@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header bg-info">
                    <h3 class="card-title">FORM EDIT DATA STOK BAHAN BAKU {{ $data->nama_loker_bahan }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/edit_stok_bahan_baku/{{ $data->id }}" method="POST">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <input type="text" class="form-control" value="{{ $tanggal }}" name="tgl_pemeriksaan_bahan" hidden>
                        <div class="kolom_asli">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="nama_loker_bahan" class="col-sm-2 col-form-label">Pilih Loker</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="nama_loker_bahan">
                                                <option value="{{ $data->nama_loker_bahan }}">{{ $data->nama_loker_bahan }}</option>
                                                @foreach ($loker as $item)
                                                    <option value="{{ $item->nama_loker_bahan }}">{{ $item->nama_loker_bahan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="nama_bahan_baku" class="col-sm-3 col-form-label">Nama Bahan Baku</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_bahan_baku" placeholder="Nama Bahan Baku.." name="nama_bahan_baku[]" value="{{ $data->nama_bahan_baku }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="merk_bahan_baku" class="col-sm-3 col-form-label">Merk Bahan Baku</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="merk_bahan_baku" placeholder="Merk Bahan Baku.." name="merk_bahan_baku[]" value="{{ $data->merk_bahan_baku }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="qty_bahan" class="col-sm-3 col-form-label">QTY</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="qty_bahan" placeholder="Pcs .." name="qty_bahan[]" value="{{ $data->qty_bahan }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="warna_bahan" class="col-sm-3 col-form-label">Warna</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="warna_bahan" placeholder="Silahkan Di isi .." name="warna_bahan[]" value="{{ $data->warna_bahan }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis_bahan_baku" class="col-sm-3 col-form-label">Jenis Bahan Baku</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="jenis_bahan_baku" placeholder="Jenis Bahan Baku.." name="jenis_bahan_baku[]" value="{{ $data->jenis_bahan_baku }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="javascript:window.history.go(-1);" class="btn btn-outline-dark btn-sm" style="border-radius: 15px">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <!-- Empty column for alignment purposes -->
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success btn-block btn-xl" style="border-radius: 15px">
                                        <i class="fa fa-save"></i> Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
