@extends('layouts.app')

@section('title', 'Pendaftar Beasiswa')

@push('style')
<!-- CSS Libraries -->
{{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}
<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pendaftar Beasiswa</h1>
        </div>

        <div class="section-body">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
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
                            <h4>Daftar Pendaftar Beasiswa</h4>
                        </div>
                        <div class="card-body">
                            @if(count($pendaftars) > 0)
                                @foreach($pendaftars as $daftar)
                                    @if ($loop->first && empty($daftar->nilai_perhitungan))
                                        <a href="{{ route('dashboard.pendaftar.create', ['tahun' => $tahun, 'bulan' => $bulan]) }}" class="btn btn-primary mb-4">Tambah Pendaftar Beasiswa</a>
                                    @endif
                                @endforeach
                            @else
                                <a href="{{ route('dashboard.pendaftar.create', ['tahun' => $tahun, 'bulan' => $bulan]) }}" class="btn btn-primary mb-4">Tambah Pendaftar Beasiswa</a>
                            @endif
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

                            <div class="table-responsive">
                                <table class="table-striped table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kelamin</th>
                                            <th>NIK</th>
                                            <th>Telpon</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1
                                        @endphp
                                        @foreach($pendaftars as $daftar)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$daftar->nama}}</td>
                                            <td>{{$daftar->kelamin}}</td>
                                            <td>{{$daftar->nik}}</td>
                                            <td>{{$daftar->telpon}}</td>
                                            <td>{{$daftar->alamat}}</td>
                                            <td>
                                                @if (empty($daftar->nilai_perhitungan))
                                                <a href="{{ route('dashboard.pendaftar.edit', $daftar->id_pendaftar_beasiswas) }}" class="btn btn-warning">Edit</a>
                                                <a onclick="return confirm ('Hapus data?')" href="{{ route('dashboard.pendaftar.destroy', $daftar->id_pendaftar_beasiswas) }}" class="btn btn-danger">Delete</a>
                                                @else
                                                -
                                                @endif
                                            </td>
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
        url = app_url + ":8000/dashboard/pendaftar/" + $("#tahun").val() + "/" + $("#bulan").val();
        console.log(app_url);
        window.location.href = url;
    });
    $(document).on('change', '#bulan', function() {
        var app_url = '{!! env("APP_URL") !!}';
        url = app_url + ":8000/dashboard/pendaftar/" + $("#tahun").val() + "/" + $("#bulan").val();
        console.log(app_url);
        window.location.href = url;
    });
    $("#table-1").dataTable({
        "columnDefs": [{
            "sortable": false,
            "targets": [1, 3, 4, 5, 6]
        }],
        searchPanes: {
            viewTotal: true
        },
        dom: 'Plfrtip'
    });
</script>
@endpush