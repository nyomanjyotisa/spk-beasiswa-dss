@extends('layouts.app')

@section('title', 'Ubah Data Pendaftar Beasiswa')

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
            <h1>Ubah Data Pendaftar Beasiswa</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Mengubah Data Pendaftar Beasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.pendaftar.update', $pendaftar->id_pendaftar_beasiswas) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Nama Lengkap</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="nama" class="form-control" value="{{$pendaftar->nama}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Kelamin</label>
                                <div class="col-sm-12 col-md-8">
                                    <select name="kelamin" class="form-control selectric">
                                        <option value="Laki-laki" @if ($pendaftar->kelamin=="Laki-laki") selected="selected" @endif>Laki-laki</option>
                                        <option value="Perempuan" @if ($pendaftar->kelamin=="Perempuan") selected="selected" @endif>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">NIK</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="number" name="nik" class="form-control" value="{{$pendaftar->nik}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">No. Telepon</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="telpon" class="form-control" value="{{$pendaftar->telpon}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Alamat</label>
                                <div class="col-sm-12 col-md-8">
                                    <textarea class="form-control" data-height="150" name="alamat">{{$pendaftar->alamat}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Provinsi</label>
                                <div class="col-sm-12 col-md-8">
                                    <select name="id_provinsis" id="provinsi" class="form-control select2">
                                        <option disabled value>-Provinsi-</option>
                                        @foreach($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id_provinsis }}"  @if ($provinsi->id_provinsis==$pendaftar->id_provinsis) selected="selected" @endif>{{ $provinsi->provinsi }}</option>
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
                                        <option value="Milik Sendiri" @if ($pendaftar->kondisi_rumah=="Milik Sendiri") selected="selected" @endif>Milik Sendiri</option>
                                        <option value="Kontrak" @if ($pendaftar->kondisi_rumah=="Kontrak") selected="selected" @endif>Kontrak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">IP (Indeks Prestasi)</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="number" step="0.01" name="ip" class="form-control" min="0" max="4" value="{{$pendaftar->ip}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">IPK (Indeks Prestasi Kumulatif)</label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="number" step="0.01" name="ipk" class="form-control" min="1" max="5" value="{{$pendaftar->ipk}}">
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
                                    <input type="number" name="penghasilan_orangtua" class="form-control" value="{{$pendaftar->penghasilan_orangtua}}">
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
                                    <input type="number" name="tanggungan_orangtua" class="form-control" value="{{$pendaftar->tanggungan_orangtua}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Tahun</label>
                                <div class="col-sm-12 col-md-8">
                                    <select disabled name="periode_tahun" class="form-control select2">
                                        {{ $last= date('Y')-120 }}
                                        {{ $now = date('Y') }}
                                        @for ($i = $now; $i >= $last; $i--)
                                        <option value="{{ $i }}" @if ($pendaftar->periode_tahun==$i) selected="selected" @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <input type="hidden" name="periode_tahun" value="{{$pendaftar->periode_tahun}}" class="form-control">
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Bulan</label>
                                <div class="col-sm-12 col-md-8">
                                    <select disabled name="periode_bulan" class="form-control select2">
                                        @for ($i = 1; $i <= 12; $i++) 
                                        <option value="{{ $i }}" @if ($pendaftar->periode_bulan==$i) selected="selected" @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <input type="hidden" name="periode_bulan" value="{{$pendaftar->periode_bulan}}" class="form-control">
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Update Data Pendaftar Beasiswa</button>
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