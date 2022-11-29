@extends('layouts.app')

@section('title', 'Detail Pendaftar Beasiswa')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
            <h1>Detail Pendaftar Beasiswa</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table-bordered table-md table">
                                            <tr>
                                                <th>Nama Pendaftar</th>
                                                <td>{{ $pendaftar->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>{{ $pendaftar->kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>{{ $pendaftar->nik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Telepon</th>
                                                <td>{{ $pendaftar->telpon }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $pendaftar->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th>Provinsi</th>
                                                <td>{{ $pendaftar->id_provinsis }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kota</th>
                                                <td>{{ $pendaftar->id_kotas }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kondisi Rumah</th>
                                                <td>{{ $pendaftar->kondisi_rumah }}</td>
                                            </tr>
                                            <tr>
                                                <th>Indeks Prestasi (IP)</th>
                                                <td>{{ $pendaftar->ip }}</td>
                                            </tr>
                                            <tr>
                                                <th>Indeks Prestasi Kumulatif (IPK)</th>
                                                <td>{{ $pendaftar->ipk }}</td>
                                            </tr>
                                            <tr>
                                                <th>Penghasilan Orang Tua</th>
                                                <td>{{ $pendaftar->penghasilan_orangtua }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggungan Orang Tua</th>
                                                <td>{{ $pendaftar->tanggungan_orangtua }}</td>
                                            </tr>
                                            <tr>
                                                <th>Periode Tahun</th>
                                                <td>{{ $pendaftar->periode_tahun }}</td>
                                            </tr>
                                            <tr>
                                                <th>Periode Bulan</th>
                                                <td>{{ $pendaftar->periode_bulan }}</td>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
