@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <section class="section">
        <div class="d-flex align-items-stretch flex-wrap">
            <div class="d-flex align-items-center justify-content-center col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="m-3 p-4">
                    <h4 class="text-dark font-weight-normal mb-5">Silahkan login untuk masuk ke halaman admin web
                    </h4>
                    @if(session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                    @endif
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                    @endif
                    <form method="POST"
                        action="{{ route('login.action') }}"
                        class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="email">Email</label>
                            <input id="email"
                                type="email"
                                class="form-control"
                                name="email"
                                tabindex="1"
                                value="{{ old('username') }}"
                                required
                                autofocus>
                            <div class="invalid-feedback">
                                Please fill in your email
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="d-block">
                                <label for="password"
                                    class="control-label">Password</label>
                            </div>
                            <input id="password"
                                type="password"
                                class="form-control"
                                name="password"
                                tabindex="2"
                                required>
                            <div class="invalid-feedback">
                                please fill in your password
                            </div>
                        </div>
                        
                        <button type="submit"
                            class="btn btn-primary btn-lg btn-icon icon-right w-100"
                            tabindex="4">
                            Login
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 min-vh-100 background-walk-y position-relative overlay-gradient-bottom order-1"
                data-background="{{ asset('img/unsplash/login-bg.jpg') }}">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="display-4 font-weight-bold mb-2">Selamat Pagi</h1>
                            <h5 class="font-weight-normal text-muted-transparent">Bukit Campuhan, Ubud</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
