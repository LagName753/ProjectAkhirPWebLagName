@extends('layouts.app')

@section('content')

<style>
   #home {
      background-image: url('{{ asset("images/clinic2.png") }}');
   }
</style>

<div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="text-contant">
               <h2>
                  <span class="center"><span class="icon"><img src="{{ asset('images/icon-logo1.png') }}" alt="#" /></span></span>
                  <a href="" class="typewrite" data-period="2000" data-type='[ "Selamat Datang", "Kesehatan Anda Prioritas Kami", "Pelayanan Profesional & Modern" ]'>
                  <span class="wrap"></span>
                  </a>
               </h2>
            </div>
         </div>
      </div>
   </div>
</div>

<div id="time-table" class="time-table-section">
   <div class="container">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="row">
            <div class="service-time one" style="background:#0056b3;">
               <span class="info-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></span>
               <h3>Layanan Gawat Darurat</h3>
               <p>Siap siaga 24 jam untuk menangani kondisi darurat medis Anda dengan cepat dan tepat.</p>
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="row">
            <div class="service-time middle" style="background:#004494;">
               <span class="info-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
               <h3>Jam Operasional</h3>
               <div class="time-table-section">
                  <ul>
                     <li><span class="left">Senin - Jumat</span><span class="right">08.00 – 20.00</span></li>
                     <li><span class="left">Sabtu</span><span class="right">08.00 – 14.00</span></li>
                     <li><span class="left">Minggu</span><span class="right">Tutup (IGD 24 Jam)</span></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="row">
            <div class="service-time three" style="background:#003366;">
               <span class="info-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
               <h3>Fasilitas Lengkap</h3>
               <p>Laboratorium modern, Radiologi, Farmasi 24 jam, dan ruang rawat inap yang nyaman.</p>
            </div>
         </div>
      </div>
   </div>
</div>

<div id="about" class="section wow fadeIn">
   <div class="container">
      <div class="heading">
         <span class="icon-logo"><img src="{{ asset('images/icon-logo1.png') }}" alt="#"></span>
         <h2>Tentang Kami</h2>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="message-box">
               <h4>Dedikasi Kami</h4>
               <h2>Pelayanan Kesehatan Terpadu</h2>
               <p class="lead">Kami berkomitmen memberikan pelayanan kesehatan berkualitas tinggi dengan pendekatan yang berpusat pada pasien.</p>
               <p>Didukung oleh tenaga medis profesional dan teknologi terkini, RS Sehat siap menjadi mitra kesehatan terpercaya bagi keluarga Anda. Kami mengutamakan keselamatan pasien, ketepatan diagnosis, dan efektivitas pengobatan.</p>
               <a href="{{ url('/about') }}" class="btn btn-light btn-radius btn-brd grd1 effect-1">Selengkapnya</a>
            </div>
         </div>
         <div class="col-md-6">
            <div class="post-media wow fadeIn">
               <img src="{{ asset('images/about1.png') }}" alt="" class="img-responsive">
            </div>
         </div>
      </div>
   </div>
</div>

<div id="service" class="services wow fadeIn">
    <div class="container">
       <div class="heading">
            <span class="icon-logo"><img src="{{ asset('images/icon-logo1.png') }}" alt="#"></span>
            <h2 style="color: white;">Layanan Unggulan</h2>
        </div>
       <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
             <div class="inner-services">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="{{ asset('images/service-icon1.png') }}" alt="#" /></span>
                      <h4>FASILITAS PREMIUM</h4>
                      <p>Ruang rawat inap VIP dan VVIP dengan kenyamanan setara hotel berbintang.</p>
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="{{ asset('images/service-icon2.png') }}" alt="#" /></span>
                      <h4>LABORATORIUM LENGKAP</h4>
                      <p>Pemeriksaan darah, patologi, dan mikrobiologi dengan hasil akurat dan cepat.</p>
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="{{ asset('images/service-icon3.png') }}" alt="#" /></span>
                      <h4>DOKTER SPESIALIS</h4>
                      <p>Tim dokter spesialis berpengalaman di berbagai bidang medis.</p>
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="{{ asset('images/service-icon4.png') }}" alt="#" /></span>
                      <h4>POLI ANAK</h4>
                      <p>Layanan kesehatan khusus anak dengan ruang tunggu ramah anak.</p>
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="{{ asset('images/service-icon5.png') }}" alt="#" /></span>
                      <h4>INFRASTRUKTUR MODERN</h4>
                      <p>Gedung dan peralatan medis berstandar internasional.</p>
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                   <div class="serv">
                      <span class="icon-service"><img src="{{ asset('images/service-icon6.png') }}" alt="#" /></span>
                      <h4>BANK DARAH 24 JAM</h4>
                      <p>Ketersediaan darah untuk kebutuhan transfusi darurat.</p>
                   </div>
                </div>
             </div>
          </div>
          
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="appointment-form">
                <h3>Buat Janji Temu</h3>
                <div class="form">
                    <p style="margin-bottom: 20px;">Silakan hubungi kami untuk menjadwalkan konsultasi dengan dokter spesialis pilihan Anda.</p>
                    
                    @guest
                        <div class="alert alert-info">
                            <i class="fa fa-info-circle"></i> Silakan <strong>Login</strong> terlebih dahulu untuk membuat janji temu secara online.
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-light btn-radius btn-brd grd1 effect-1 btn-block">Login Pasien</a>
                    @else
                        <div class="alert alert-success">
                            <i class="fa fa-user"></i> Halo, <strong>{{ Auth::user()->name }}</strong>!
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-light btn-radius btn-brd grd1 effect-1 btn-block">Ke Dashboard Saya</a>
                    @endguest

                    <hr>
                    <p class="text-center" style="margin-top: 10px;">Atau hubungi Call Center:</p>
                    <a href="tel:1234567890" class="btn btn-dark btn-radius btn-brd effect-1 btn-block"><i class="fa fa-phone"></i> 123-456-7890</a>
                </div>
            </div>
          </div>

       </div>
    </div>
</div>

<div id="doctors" class="parallax section db" data-stellar-background-ratio="0.4" style="background:#fff;" data-scroll-id="doctors" tabindex="-1">
  <div class="container">
   <div class="heading">
         <span class="icon-logo"><img src="{{ asset('images/icon-logo1.png') }}" alt="#"></span>
         <h2>Tim Dokter Kami</h2>
      </div>
      <div class="row dev-list text-center">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
              <div class="widget clearfix">
                  <img src="{{ asset('images/doctor1.png') }}" alt="" class="img-responsive img-rounded">
                  <div class="widget-title">
                      <h3>Dr. Siti Amanah, Sp.PD</h3>
                      <small>Spesialis Penyakit Dalam</small>
                  </div>
                  <p>Ahli dalam diagnosis dan penanganan penyakit organ dalam dengan pengalaman lebih dari 15 tahun.</p>
              </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
              <div class="widget clearfix">
                  <img src="{{ asset('images/doctor2.png') }}" alt="" class="img-responsive img-rounded">
                  <div class="widget-title">
                      <h3>Dr. Wahyu Santoso, Sp.A</h3>
                      <small>Spesialis Anak</small>
                  </div>
                  <p>Berdedikasi untuk kesehatan dan tumbuh kembang anak dengan pendekatan yang ramah.</p>
              </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn">
              <div class="widget clearfix">
                  <img src="{{ asset('images/doctor3.png') }}" alt="" class="img-responsive img-rounded">
                  <div class="widget-title">
                      <h3>Dr. Budi Wijaya, Sp.OT</h3>
                      <small>Spesialis Bedah Tulang</small>
                  </div>
                  <p>Pakar dalam penanganan cedera olahraga, patah tulang, ve bedah ortopedi.</p>
              </div>
          </div>
      </div>
  </div>
</div>

<div id="getintouch" class="section wb wow fadeIn" style="padding-bottom:0;">
   <div class="container">
      <div class="heading">
         <span class="icon-logo"><img src="{{ asset('images/icon-logo1.png') }}" alt="#"></span>
         <h2>Butuh Bantuan?</h2>
         <p class="lead" style="margin-top: 15px;">Tim layanan pelanggan kami siap membantu Anda 24/7.</p>
      </div>
   </div>
</div>

@endsection