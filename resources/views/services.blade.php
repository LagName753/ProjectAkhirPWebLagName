@extends('layouts.app')

@section('content')
<div id="service" class="services wow fadeIn">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <div class="inner-services">
               <div class="col-lg-12 text-center">
                  <h2>Layanan Kami</h2>
                  <hr style="width: 50px; border-top: 3px solid #fff; margin: 10px auto 30px;">
               </div>

               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="serv">
                     <span class="icon-service"><img src="{{ asset('images/service-icon1.png') }}" alt="#" /></span>
                     <h4>FASILITAS PREMIUM</h4>
                     <p>Ruang perawatan nyaman dengan standar kebersihan tinggi dan fasilitas penunjang pemulihan.</p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="serv">
                     <span class="icon-service"><img src="{{ asset('images/service-icon2.png') }}" alt="#" /></span>
                     <h4>LABORATORIUM</h4>
                     <p>Peralatan diagnostik lengkap untuk hasil pemeriksaan medis yang akurat dan cepat.</p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="serv">
                     <span class="icon-service"><img src="{{ asset('images/service-icon3.png') }}" alt="#" /></span>
                     <h4>DOKTER SPESIALIS</h4>
                     <p>Ditangani langsung oleh tim dokter ahli berpengalaman di berbagai bidang spesialisasi.</p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="serv">
                     <span class="icon-service"><img src="{{ asset('images/service-icon4.png') }}" alt="#" /></span>
                     <h4>POLI ANAK</h4>
                     <p>Layanan kesehatan khusus buah hati dengan pendekatan yang ramah dan menyenangkan.</p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="serv">
                     <span class="icon-service"><img src="{{ asset('images/service-icon5.png') }}" alt="#" /></span>
                     <h4>INFRASTRUKTUR</h4>
                     <p>Gedung modern yang dirancang untuk kemudahan aksesibilitas dan keselamatan pasien.</p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <div class="serv">
                     <span class="icon-service"><img src="{{ asset('images/service-icon6.png') }}" alt="#" /></span>
                     <h4>BANK DARAH</h4>
                     <p>Unit transfusi darah yang siap sedia 24 jam untuk kebutuhan gawat darurat.</p>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="appointment-form">
               <h3>Jadwal Konsultasi</h3>
               <div class="form">
                  <p style="margin-bottom: 20px;">Ingin berkonsultasi dengan dokter kami? Silakan login untuk membuat janji temu atau hubungi layanan pelanggan.</p>
                  
                  @guest
                     <div class="alert alert-info" style="font-size: 14px;">
                        <i class="fa fa-info-circle"></i> Akses penuh fitur janji temu tersedia untuk member terdaftar.
                     </div>
                     <a href="{{ route('login') }}" class="btn btn-light btn-radius btn-brd grd1 effect-1 btn-block">Login Sekarang</a>
                  @else
                     <div class="alert alert-success">
                        <i class="fa fa-user"></i> Halo, {{ Auth::user()->name }}!
                     </div>
                     <a href="{{ route('home') }}" class="btn btn-light btn-radius btn-brd grd1 effect-1 btn-block">Buat Janji Temu</a>
                  @endguest

                  <hr>
                  <p class="text-center" style="margin-top: 10px;">Layanan Gawat Darurat:</p>
                  <a href="tel:1234567890" class="btn btn-dark btn-radius btn-brd effect-1 btn-block"><i class="fa fa-phone"></i> 083-195-247-182</a>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
@endsection