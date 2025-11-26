<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" style="font-family: 'Inter', sans-serif; font-weight: 700; letter-spacing: -0.5px;">Dashboard Overview</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card shadow-sm" style="background: linear-gradient(135deg, #0056b3 0%, #20c997 100%); color: white; border: none; border-radius: 12px; overflow: hidden;">
                        <div class="card-body p-4" style="position: relative;">
                            <i class="fas fa-heartbeat" style="position: absolute; right: 20px; top: -10px; font-size: 150px; opacity: 0.1; transform: rotate(-15deg);"></i>
                            
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h2 style="font-family: 'Inter', sans-serif; font-weight: 700; margin-bottom: 10px;">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
                                    <p style="font-family: 'Inter', sans-serif; font-size: 1.1rem; opacity: 0.9; max-width: 600px; margin-bottom: 0;">
                                        Selamat bertugas. Ini adalah pusat kontrol Manajemen Rumah Sakit. Pantau statistik pasien, jadwal dokter, dan ketersediaan kamar secara real-time dari sini.
                                    </p>
                                </div>
                                <div class="col-md-4 text-right d-none d-md-block">
                                    <span style="background: rgba(255,255,255,0.2); padding: 10px 20px; border-radius: 30px; font-size: 14px; font-family: 'Inter', sans-serif;">
                                        <i class="fas fa-calendar-alt mr-2"></i> {{ date('l, d F Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .custom-small-box {
                    border-radius: 8px;
                    position: relative;
                    overflow: hidden;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                    margin-bottom: 20px;
                    color: white;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    min-height: 140px;
                }
                .custom-small-box .inner {
                    padding: 20px 20px 5px 20px;
                    flex-grow: 1;
                    position: relative;
                    z-index: 2;
                }
                .custom-small-box h3 {
                    font-family: 'Inter', sans-serif;
                    font-weight: 800;
                    font-size: 2.8rem;
                    margin-bottom: 5px;
                    line-height: 1;
                    position: relative;
                    z-index: 2;
                }
                .custom-small-box p {
                    font-family: 'Inter', sans-serif;
                    font-size: 1rem;
                    margin-bottom: 0;
                    opacity: 0.9;
                    font-weight: 500;
                    position: relative;
                    z-index: 2;
                }
                .custom-small-box .bg-icon {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    font-size: 4rem;
                    opacity: 0.2;
                    color: rgba(0,0,0,0.2);
                    transition: all 0.3s;
                    z-index: 1;
                }
                .custom-small-box:hover .bg-icon {
                    transform: scale(1.1);
                    opacity: 0.3;
                }
                .custom-small-box .footer-link {
                    background: rgba(0,0,0,0.1);
                    display: block;
                    padding: 10px 20px;
                    color: rgba(255,255,255,0.9);
                    text-decoration: none;
                    font-family: 'Inter', sans-serif;
                    font-weight: 600;
                    font-size: 0.9rem;
                    transition: background 0.3s;
                    margin-top: auto; /* Dorong footer ke bawah */
                    position: relative;
                    z-index: 2;
                }
                .custom-small-box .footer-link:hover {
                    background: rgba(0,0,0,0.2);
                    color: white;
                }
                .custom-small-box .footer-link i {
                    margin-left: 5px;
                }
            </style>

            <div class="d-flex align-items-center mb-3">
                <h5 class="m-0 text-dark font-weight-bold text-uppercase" style="font-family: 'Inter', sans-serif; letter-spacing: 1px; font-size: 14px; color: #555;">
                    <i class="fas fa-procedures text-primary mr-2"></i> Aktivitas Klinis
                </h5>
                <div class="ml-3" style="flex-grow: 1; height: 1px; background-color: #ddd;"></div>
            </div>
            
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="custom-small-box bg-info">
                        <div class="inner">
                            <h3>{{ $patients }}</h3>
                            <p>Total Pasien Terdaftar</p>
                        </div>
                        <i class="fas fa-user-injured bg-icon"></i>
                        <a href="{{ route('admin_patients') }}" class="footer-link">
                            Lihat Database <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="custom-small-box bg-success">
                        <div class="inner">
                            <h3>{{ $employees }}</h3>
                            <p>Dokter & Staff Medis</p>
                        </div>
                        <i class="fas fa-user-md bg-icon"></i>
                        <a href="{{ route('employees') }}" class="footer-link">
                            Kelola SDM <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="custom-small-box bg-warning">
                        <div class="inner">
                            <h3 style="color: white;">{{ $appointments }}</h3>
                            <p style="color: white;">Jadwal Konsultasi</p>
                        </div>
                        <i class="fas fa-calendar-check bg-icon"></i>
                        <a href="{{ route('appointment') }}" class="footer-link" style="color: white;">
                            Cek Jadwal <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="custom-small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $requestedAppointment }}</h3>
                            <p>Permintaan Baru</p>
                        </div>
                        <i class="fas fa-envelope-open-text bg-icon"></i>
                        <a href="{{ route('requestedAppointment') }}" class="footer-link">
                            Verifikasi <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center mb-3 mt-4">
                <h5 class="m-0 text-dark font-weight-bold text-uppercase" style="font-family: 'Inter', sans-serif; letter-spacing: 1px; font-size: 14px; color: #555;">
                    <i class="fas fa-hospital-alt text-success mr-2"></i> Fasilitas & Ruangan
                </h5>
                <div class="ml-3" style="flex-grow: 1; height: 1px; background-color: #ddd;"></div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="custom-small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $blocks }}</h3>
                            <p>Gedung (Blocks)</p>
                        </div>
                        <i class="fas fa-building bg-icon"></i>
                        <a href="{{ route('blocks') }}" class="footer-link">
                            Detail Gedung <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="custom-small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $departments }}</h3>
                            <p>Departemen / Poli</p>
                        </div>
                        <i class="fas fa-clinic-medical bg-icon"></i>
                        <a href="{{ route('departments') }}" class="footer-link">
                            Detail Poli <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="custom-small-box bg-dark">
                        <div class="inner">
                            <h3>{{ $rooms }}</h3>
                            <p>Ruangan Rawat</p>
                        </div>
                        <i class="fas fa-door-open bg-icon"></i>
                        <a href="{{ route('Rooms') }}" class="footer-link">
                            Detail Ruangan <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="custom-small-box" style="background-color: #6f42c1;">
                        <div class="inner">
                            <h3>{{ $beds }}</h3>
                            <p>Ketersediaan Bed</p>
                        </div>
                        <i class="fas fa-bed bg-icon"></i>
                        <a href="{{ route('patients_beds') }}" class="footer-link">
                            Alokasi Pasien <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>