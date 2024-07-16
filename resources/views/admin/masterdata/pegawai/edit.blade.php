@extends('layout.master')
@section('judul', 'Edit Halaman Pegawai')
@section('konten')
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <form action="/master_pegawai/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">LIST DAFTAR PEGAWAI</span></b></h3>
                        <div class="card-tools">
                            <a href="/print_pegawai/" class="btn btn-info btn-sm" style="border-radius: 15px"><i
                                    class="fas fa-print"></i> Print</a>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-1 col-form-label">Nama</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" placeholder="Silahkan Di isi.."
                                    name="nama_pegawai" value="{{ $data->nama_pegawai }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-1 col-form-label">Alamat</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" placeholder="Silahkan Di isi.."
                                    name="alamat_pegawai" value="{{ $data->alamat_pegawai }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-1 col-form-label">Kontak</label>
                            <div class="col-sm-11">
                                <input type="number" class="form-control" placeholder="Silahkan Di isi.."
                                    name="kontak_pegawai" value="{{ $data->kontak_pegawai }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-1 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" placeholder="Silahkan Di isi.."
                                    name="jenis_kelamin" value="{{ $data->jenis_kelamin }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-1 col-form-label">Tanggal Bekerja</label>
                            <div class="col-sm-11">
                                <input type="date" class="form-control" placeholder="Silahkan Di isi.."
                                    name="tggl_bekerja" value="{{ $data->tggl_bekerja }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-1 col-form-label">Jabatan</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" placeholder="Silahkan Di isi.." name="jabatan"
                                    value="{{ $data->jabatan }}">
                            </div>
                        </div>

                        <hr>
                        <a href="javascript:window.history.go(-1);" class="btn btn-outline-dark btn-sm"
                            style="border-radius: 15px"><i class="fa fa-arrow-left"> Kembali</i></a>
                        <button type="submit" class="btn btn-success btn-sm" style="border-radius: 13px"><i
                                class="fas fa-save"> Update</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    </div>
    </div>



@endsection
