@extends('layouts.app')

@section('title', 'Ubah Atribut')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ubah Atribut</h1>
            </div>

            <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form action="{{ route('dashboard.pengaturan.atribut.update', $atribut->id) }}" method="POST">
                                @csrf
                                <div class="card-header">
                                    <h4>Ubah Atribut</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Bobot</label>
                                        <input type="text"
                                            value="{{$atribut->bobot}}"
                                            name="bobot"
                                            class="form-control"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <div class="control-label">Status</div>
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox"
                                                name="status"
                                                class="custom-switch-input"
                                                @if($atribut->status == 1) checked @endif >
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Aktif atau non-aktifkan atribut</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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

    <!-- Page Specific JS File -->
@endpush
