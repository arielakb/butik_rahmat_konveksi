@extends('layout.master')
@section('judul', 'Print Stok Bahan Baku')
@section('konten')

    <div class="row">
        <div class="col-md-12">
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-6">
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-2">
                                <button onclick="window.print()"rel="noopener" target="_blank"
                                    class="btn btn-info btn-block btn-sm"><i class="fas fa-print"></i> Print</button>
                            </div>
                        </div>
                        <br>
                        <h4>
                            <img src="/assets/dist/img/AdminLTELogo.png" style="width: 190px; border-radius: 8px">
                            <center> <b> STOK BAHAN BAKU {{ $join[0]->nama_loker_bahan }} </b> </center>
                            <small class="float-right">Tanggal Update:
                                <b>{{ $join[0]->tgl_pemeriksaan_bahan }}</b></small><br>
                            <small class="float-right">Penanggung Jawab: <b>{{ $join[0]->penanggung_jawab }}</b></small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Bahan Baku</th>
                                        <th class="text-center">Merk Bahan Baku</th>
                                        <th class="text-center">Jenis Bahan Baku</th>
                                        <th class="text-center">Warna</th>
                                        <th class="text-center">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($join as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->nama_bahan_baku }}</td>
                                            <td class="text-center">{{ $item->merk_bahan_baku }}</td>
                                            <td class="text-center">{{ $item->jenis_bahan_baku }}</td>
                                            <td class="text-center">{{ $item->warna_bahan }}</td>
                                            <td class="text-center"><?php echo $item->qty_bahan . ' ' . 'Pcs'; ?></td>
                                        </tr>
                                    @endforeach
                            </table>
                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div>

    @endsection
