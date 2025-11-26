@extends('layouts.app')

@section('content')
<div class="section wow fadeIn" style="background-color: #f9f9f9; padding: 80px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.1); border-radius: 10px; overflow: hidden;">
                    <div class="card-header" style="background: linear-gradient(to right, #004494 0%, #20c997 100%); color: white; font-size: 20px; font-weight: 600; padding: 20px 30px;">
                        {{ __('Dashboard User') }}
                    </div>

                    <div class="card-body" style="padding: 40px 30px; text-align: center;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert" style="margin-bottom: 30px;">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3 style="color: #333; margin-bottom: 15px;">Selamat Datang, {{ Auth::user()->name }}!</h3>
                        <p style="color: #666; font-size: 16px; margin-bottom: 30px;">
                            Anda berhasil masuk ke sistem. Silakan hubungi admin jika Anda memerlukan akses lebih lanjut atau ingin membuat janji temu.
                        </p>

                        <div class="actions">
                            <a href="{{ url('/') }}" class="btn btn-light btn-radius btn-brd grd1 effect-1" style="padding: 12px 30px;">Kembali ke Beranda</a>
                            
                            @if(auth()->user()->is_super_admin)
                                <a href="{{ route('admin_dashboard') }}" class="btn btn-light btn-radius btn-brd grd1 effect-1" style="margin-left: 15px; padding: 12px 30px;">Masuk Admin Area</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection