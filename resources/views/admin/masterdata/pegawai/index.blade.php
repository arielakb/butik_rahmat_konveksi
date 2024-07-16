@extends('layout.master')
@section('judul', 'Master Pegawai')

@section('konten')
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h3 class="card-title">LIST DAFTAR PEGAWAI</span></b></h3>
                    <div class="card-tools">
                        <a href="#tambah_pegawai" data-toggle="modal" class="btn btn-warning btn-sm"
                            style="border-radius: 15px"><i class="fas fa-plus"></i> Tambah Pegawai</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Kontak</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Tanggal Bekerja</th>
                                <th class="text-center">Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->nama_pegawai }}</td>
                                    <td class="text-center">{{ $item->alamat_pegawai }}</td>
                                    <td class="text-center">{{ $item->kontak_pegawai }}</td>
                                    <td class="text-center">{{ $item->jenis_kelamin }}</td>
                                    <td class="text-center">{{ $item->tggl_bekerja }}</td>
                                    <td class="text-center">{{ $item->jabatan }}</td>
                                    <td class="text-center">
                                        <a href="/master_pegawai/edit/{{ $item->id }}" class="btn btn-info btn-sm"><i
                                                class="fas fa-edit"> Edit</i></a>
                                        <a href="/master_pegawai/hapus_pegawai/{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"> Hapus</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah_pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/master_pegawai/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Silahkan Di isi.."
                                    name="nama_pegawai">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_pegawai" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Silahkan Di isi.."
                                    name="alamat_pegawai">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kontak_pegawai" class="col-sm-2 col-form-label">Kontak</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="Silahkan Di isi.."
                                    name="kontak_pegawai">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Silahkan Di isi.."
                                    name="jenis_kelamin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tggl_bekerja" class="col-sm-2 col-form-label">Tanggal Bekerja</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" placeholder="Silahkan Di isi.."
                                    name="tggl_bekerja">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Silahkan Di isi.."
                                    name="jabatan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="border-radius: 13px"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" style="border-radius: 13px"><i
                                class="fas fa-save"> Simpan</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
