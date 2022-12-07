@extends('layouts.app')

@section('title', 'Pengaturan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengaturan</h1>
            </div>

            <div class="section-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close"
                            data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ $message }}
                    </div>
                </div>
            @endif

            <div class="row">
                    <div class="col-12">
                    <div class="card">
                            <div class="card-header">
                                <h4>Jumlah Penerima Beasiswa per Periode</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <form action="{{ route('dashboard.pengaturan.jumlah-penerima.update') }}" method="POST">
                                        @csrf
                                        <input type="number"
                                            value="{{$data->value}}"
                                            name="jumlah_penerima_per_periode"
                                            class="form-control"
                                            required="">
                                        <button class="float-right mt-3 btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Atribut SPK</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table-bordered table-md table">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Bobot</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            @php
                                                $i = 1
                                            @endphp
                                            @foreach($atributs as $atribut)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$atribut->nama}}</td>
                                                <td>{{$atribut->bobot}}</td>
                                                <td>
                                                    @if($atribut->status==1)
                                                        <span class="badge badge-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-danger">Non-aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('dashboard.pengaturan.atribut.edit', $atribut->id) }}" class="btn btn-warning">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2"><strong>Total Bobot Aktif</strong></td>
                                                <td colspan="3"><strong>{{$totalBobot}}</strong></td>
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
