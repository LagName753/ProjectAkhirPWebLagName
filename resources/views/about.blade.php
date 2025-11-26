@extends('layouts.app')

@section('content')
<div id="about" class="section wow fadeIn">
    <div class="container">
        <div class="heading">
            <span class="icon-logo"><img src="{{ asset('images/icon-logo1.png') }}" alt="#"></span>
            <h2>Testing</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="message-box">
                    <h4>What We Do</h4>
                    <h2>Clinic Service</h2>
                    <p class="lead">Achmad Faiez Jatmiko berdedikasi memberikan layanan kesehatan terbaik dengan fasilitas modern dan tim medis profesional yang siap melayani Anda 24/7.</p>
                    
                    <p>
                        Rumah sakit ini dilengkapi dengan teknologi medis terkini untuk memastikan diagnosis yang akurat dan perawatan yang efektif. Mulai dari layanan gawat darurat, rawat inap, hingga konsultasi spesialis, kami berkomitmen untuk keselamatan dan kenyamanan pasien.
                    </p>
                    
                    <p>
                        Visi RS ini adalah menjadi pusat rujukan kesehatan terpercaya yang mengutamakan pelayanan dan pendekatan kepada setiap pasien dan keluarga.
                    </p>

                    <a href="#services" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Lihat Layanan Kami</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="post-media wow fadeIn">
                    <img src="{{ asset('images/about_03.jpg') }}" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection