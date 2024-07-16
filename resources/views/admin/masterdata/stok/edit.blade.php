@extends('layout.master')

@section('judul', 'Edit Stok Barang')

@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title">FORM EDIT DATA STOK BARANG {{ $data->nama_loker }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="/edit_stok/{{ $data->id }}" method="POST">
                    @method('PATCH')
                    {{ csrf_field() }}
                    <input type="text" class="form-control" value="{{ $tanggal }}" name="tgl_pemeriksaan" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Pilih Loker -->
                            <div class="form-group row">
                                <label for="inputLoker" class="col-sm-4 col-form-label">Pilih Loker</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" id="inputLoker" name="nama_loker">
                                        <option value="{{ $data->nama_loker }}">{{ $data->nama_loker }}</option>
                                        @foreach ($loker as $item)
                                        <option value="{{ $item->nama_loker }}">{{ $item->nama_loker }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Nama Barang -->
                            <div class="form-group row">
                                <label for="inputNamaBarang" class="col-sm-4 col-form-label">Nama Barang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputNamaBarang" placeholder="Nama Barang.." name="nama_barang" value="{{ $data->nama_barang }}">
                                </div>
                            </div>

                            <!-- QTY -->
                            <div class="form-group row">
                                <label for="inputQty" class="col-sm-4 col-form-label">QTY</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="inputQty" placeholder="Pcs .." name="qty" value="{{ $data->qty }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Warna -->
                            <div class="form-group row">
                                <label for="inputWarna" class="col-sm-4 col-form-label">Warna</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputWarna" placeholder="Silahkan Di isi .." name="warna" value="{{ $data->warna }}">
                                </div>
                            </div>

                            <!-- Bahan -->
                            <div class="form-group row">
                                <label for="inputBahan" class="col-sm-4 col-form-label">Bahan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputBahan" placeholder="Silahkan Di isi .." name="bahan" value="{{ $data->bahan }}">
                                </div>
                            </div>

                            <!-- Size -->
                            <div class="form-group row">
                                <label for="inputSize" class="col-sm-4 col-form-label">Size</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputSize" placeholder="Silahkan Di isi .." name="size" value="{{ $data->size }}">
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
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
