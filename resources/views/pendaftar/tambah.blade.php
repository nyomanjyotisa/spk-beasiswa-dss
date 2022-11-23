@extends('layouts.app')

@section('title', 'Tambah Pendaftar Beasiswa')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pendaftar Beasiswa</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Pendaftar Beasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.pendaftar.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Nama Lengkap</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Kelamin</label>
                                <div class="col-sm-12 col-md-8">
                                    <select name="kelamin" class="form-control selectric">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">NIK</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="number" name="nik" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">No. Telepon</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="telpon" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Alamat</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea class="form-control" data-height="150" name="alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Provinsi</label>
                                <div class="col-sm-12 col-md-8">
                                    <select name="id_provinsis" id="provinsi" class="form-control select2">
                                        <option disabled value selected>-Provinsi-</option>
                                        @foreach($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id_provinsis }}">{{ $provinsi->provinsi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Kota/Kabupaten</label>
                                <div class="col-sm-12 col-md-8">
                                    <select name="id_kotas" id="kota_id" class="form-control select2">
                                        <option disabled value selected>-Kota/Kabupaten-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Kondisi Rumah</label>
                                <div class="col-sm-12 col-md-8">
                                    <select name="kondisi_rumah" class="form-control selectric">
                                        <option value="Milik Sendiri">Milik Sendiri</option>
                                        <option value="Kontrak">Kontrak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">IP (Indeks Prestasi)</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="number" step="0.01" name="ip" class="form-control" min="0" max="4">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">IPK (Indeks Prestasi Kumulatif)</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="number" step="0.01" name="ipk" class="form-control" min="1" max="5">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Penghasilan Orang Tua</label>
                                <div class="input-group col-sm-12 col-md-8">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="number" name="penghasilan_orangtua" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Tanggungan Orang Tua</label>
                                <div class="input-group col-sm-12 col-md-8">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                    </div>
                                    <input type="number" name="tanggungan_orangtua" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Tahun</label>
                                <div class="col-sm-12 col-md-8">
                                    <select disabled name="periode_tahun" class="form-control select2">
                                        {{ $last= date('Y')-120 }}
                                        {{ $now = date('Y') }}
                                        @for ($i = $now; $i >= $last; $i--)
                                        <option value="{{ $i }}" @if ($tahun==$i) selected="selected" @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <input type="hidden" name="periode_tahun" value="{{$tahun}}" class="form-control">
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Bulan</label>
                                <div class="col-sm-12 col-md-8">
                                    <select disabled name="periode_bulan" class="form-control select2">
                                        @for ($i = 1; $i <= 12; $i++) 
                                        <option value="{{ $i }}" @if ($bulan==$i) selected="selected" @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <input type="hidden" name="periode_bulan" value="{{$bulan}}" class="form-control">
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Tambah Pendaftar Beasiswa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Import Pendaftar Beasiswa (Excel)</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.pendaftar.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">File Excel</label>
                                <div class="col-sm-12 col-md-8">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="file" multiple>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="periode_tahun" value="{{$tahun}}" class="form-control">
                            <input type="hidden" name="periode_bulan" value="{{$bulan}}" class="form-control">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Import Pendaftar Beasiswa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Download Template Pendaftar Beasiswa (Excel)</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.pendaftar.export') }}" method="GET" enctype="multipart/form-data">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Template(.xlsx)</label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Download Template Pendaftar Beasiswa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

<script type="text/javascript">
    $('#provinsi').change(function() {
        var id = $(this).val();
        var app_url = '{!! env("APP_URL") !!}';
        var urls = app_url + "/dashboard/pendaftar/getKota/"+ id;
        $('#kota_id').find('option').remove().end()
        $.ajax({
            url: urls,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                var len = 0;
                if (response['data'] != null) {
                    len = response['data'].length;
                }
                if (len > 0) {
                    var option = "<option disabled value selected>-Kota/Kabupaten-</option>";
                    $("#kota_id").append(option);
                    for (var i = 0; i < len; i++) {
                        var id = response['data'][i].id_kotas;
                        var name = response['data'][i].kotas;
                        console.log(id)
                        var option = "<option value='" + id + "'>" + name + "</option>";
                        $("#kota_id").append(option);
                    }
                }

            }
        });
    });
</script>
@endpush