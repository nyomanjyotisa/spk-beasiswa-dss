@extends('layouts.app')

@section('title', 'Detail Penerima Beasiswa')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Penerima Beasiswa</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-bordered table-md table">
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <td>{{ $penerima->dataPenerima->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $penerima->dataPenerima->kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>{{ $penerima->dataPenerima->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>{{ $penerima->dataPenerima->telpon }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $penerima->dataPenerima->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>{{ $penerima->dataPenerima->provinsiModel->provinsi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kota</th>
                                        <td>{{ $penerima->dataPenerima->kota->kotas }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kondisi Rumah</th>
                                        <td>{{ $penerima->dataPenerima->kondisi_rumah }}</td>
                                    </tr>
                                    <tr>
                                        <th>Indeks Prestasi (IP)</th>
                                        <td>{{ $penerima->dataPenerima->ip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Indeks Prestasi Kumulatif (IPK)</th>
                                        <td>{{ $penerima->dataPenerima->ipk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penghasilan Orang Tua</th>
                                        <td>Rp {{ $penerima->dataPenerima->penghasilan_orangtua }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggungan Orang Tua</th>
                                        <td>{{ $penerima->dataPenerima->tanggungan_orangtua }}</td>
                                    </tr>
                                    <tr>
                                        <th>Periode Tahun</th>
                                        <td>{{ $penerima->dataPenerima->periode_tahun }}</td>
                                    </tr>
                                    <tr>
                                        <th>Periode Bulan</th>
                                        <td>{{ $penerima->dataPenerima->periode_bulan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nilai Perhitungan</th>
                                        <td>{{ $penerima->dataPenerima->nilai_perhitungan }}</td>
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