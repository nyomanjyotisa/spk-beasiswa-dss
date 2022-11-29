@extends('layouts.app')

@section('title', 'Penerima Beasiswa')

@push('style')
<!-- CSS Libraries -->
{{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Penerima Beasiswa</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Penerima Beasiswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <div class="col-md-6">
                                    <label class="col-form-label text-md-left">Tahun</label>
                                    <div>
                                        <select name="tahun" id="tahun" class="form-control selectric">
                                            {{ $last= date('Y')-120 }}
                                            {{ $now = date('Y') }}
                                            @for ($i = $now; $i >= $last; $i--)
                                            <option value="{{ $i }}" @if ($tahun==$i) selected="selected" @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label text-md-left">Bulan</label>
                                    <div>
                                        <select name="bulan" id="bulan" class="form-control selectric">
                                            @for ($i = 1; $i <= 12; $i++) 
                                            <option value="{{ $i }}" @if ($bulan==$i) selected="selected" @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @if($showGenerate == 1)
                            <div class="mb-5">
                                <a href="{{ route('dashboard.penerima.generate', ['tahun'=>$tahun,'bulan'=>$bulan]) }}" class="btn btn-primary" id="applyFilter" name="applyFilter">Generate Penerima Beasiswa di Periode Ini</a>
                            </div>
                            @elseif($showGenerate == 0)
                            <div class="mb-5">
                                <a href="{{ route('dashboard.penerima.regenerate', ['tahun'=>$tahun,'bulan'=>$bulan]) }}" class="btn btn-primary" id="applyFilter" name="applyFilter">Reset Penerima Beasiswa di Periode Ini</a>
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Provinsi</th>
                                            <th>Kota</th>
                                            <th>Skor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1
                                        @endphp
                                        @foreach($penerimas as $penerima)
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>{{$penerima->nama}}</td>
                                            <td>{{$penerima->provinsiModel->provinsi}}</td>
                                            <td>{{$penerima->kota->kotas}}</td>
                                            <td>{{$penerima->nilai_perhitungan}}</td>
                                            <td><a href="" class="btn btn-secondary">Detail</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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
{{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
<script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
{{-- <script src="{{ asset() }}"></script> --}}
{{-- <script src="{{ asset() }}"></script> --}}
<script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

<!-- Page Specific JS File -->
<script>
    $(document).on('change', '#tahun', function() {
        var app_url = '{!! env("APP_URL") !!}';
        url = app_url + "/dashboard/penerima/" + $("#tahun").val() + "/" + $("#bulan").val();
        console.log(app_url);
        window.location.href = url;
    });
    $(document).on('change', '#bulan', function() {
        var app_url = '{!! env("APP_URL") !!}';
        url = app_url + "/dashboard/penerima/" + $("#tahun").val() + "/" + $("#bulan").val();
        console.log(app_url);
        window.location.href = url;
    });

    $("#table-1").dataTable({
        "columnDefs": [{
            "sortable": false,
            "targets": [2, 3]
        }],
        searchPanes: {
            viewTotal: true
        },
        dom: 'Plfrtip'
    });
</script>
@endpush