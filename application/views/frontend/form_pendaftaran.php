<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Diklat - Portal Diklat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Base Styling - sama dengan pendaftaran_simple.php */
        body { 
            background-color: #f8f9fa; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card { 
            border: none; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.08); 
            border-radius: 12px; 
        }
        
        .container {
            max-width: 1200px;
        }
        
        /* Info Labels & Values - sama dengan pendaftaran_simple.php */
        .info-label { 
            font-size: 0.85rem; 
            color: #6c757d; 
            font-weight: 500; 
            text-transform: uppercase; 
            letter-spacing: 0.5px;
            margin-bottom: 4px; 
        }
        
        .info-value { 
            font-size: 1.1rem; 
            font-weight: 600; 
            color: #2c3e50; 
            margin-bottom: 15px;
        }
        
        /* Sidebar Section - update styling */
        .sidebar-section {
            background: #ffffff;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .sidebar-section h6 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        
        /* Category Badge */
        .category-badge {
            background: linear-gradient(135deg, #6f42c1, #007bff);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 15px;
        }
        
        /* Progress & Status */
        .progress { 
            border-radius: 4px; 
            overflow: hidden; 
            height: 8px; 
        }
        
        .badge {
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
        }
        
        .text-success { color: #28a745 !important; }
        .text-danger { color: #dc3545 !important; }
        .text-warning { color: #ffc107 !important; }
        
        /* Pastikan semua ikon check dalam persyaratan berwarna hijau */
        .list-group-item .fa-check-circle,
        .list-group-item i.fa-check-circle {
            color: #28a745 !important;
        }
        
        /* Button Styling */
        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 20px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
        }
        
        /* Form Elements */
        .form-label { 
            font-weight: 600; 
            color: #2c3e50;
            font-size: 0.95rem;
        }
        
        .form-control {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
        }
        
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        
        /* Registration Type Cards */
        .registration-type-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            background: #ffffff;
            cursor: pointer;
            transition: all 0.2s ease;
            height: 100%;
            position: relative;
            z-index: 1;
        }
        
        .registration-type-card:hover {
            border-color: #007bff;
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .registration-type-card.active {
            border-color: #007bff;
            background-color: #e7f3ff;
            box-shadow: 0 4px 12px rgba(0,123,255,0.3);
        }
        
        .registration-type-card i {
            font-size: 2rem;
        }
        
        .registration-type-card .card-title {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
            font-size: 1rem;
        }
        
        .registration-type-card .card-description {
            color: #6c757d;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
        
        .registration-type-card .card-badge small {
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 4px;
            background: #f8f9fa;
            display: inline-block;
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        /* Step Indicator */
        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .step {
            text-align: center;
            margin: 0 15px;
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }
        
        .step.active {
            opacity: 1;
        }
        
        .step.completed {
            opacity: 1;
        }
        
        .step.completed .step-number {
            background: #28a745;
            color: white;
        }
        
        .step.completed small {
            color: #28a745;
            font-weight: 600;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            font-weight: 600;
            color: #6c757d;
        }
        
        .step.active .step-number {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
        }
        
        /* Dropdown hover effect */
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 0.5rem 0;
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-primary" href="<?= base_url() ?>">
                <i class="fas fa-graduation-cap me-2"></i>
                Portal Diklat
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= base_url('home/about') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi AIRIS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Berita Terbaru</a></li>
                            <li><a class="dropdown-item" href="#">Sertifikat Terbit</a></li>
                            <li><a class="dropdown-item" href="#">Kuota Kursi Diklat</a></li>
                            <li><a class="dropdown-item" href="#">Alur & Tata Cara Pembayaran Diklat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home/contact') ?>">Kamus Maritim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">AIRIS Mobile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="row">
            <!-- Right Column - Informasi Diklat -->
            <div class="col-md-4 order-md-2">
                <div class="card">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0"><i class="fas fa-info-circle text-info me-2"></i>Informasi Diklat</h5>
                    </div>
                    <div class="card-body">
                        
                        <!-- Kategori Diklat -->
                        <div class="mb-3">
                            <span class="category-badge" id="kategori-badge">
                                PROGRAM DIKLAT
                            </span>
                        </div>

                        <!-- Nama Diklat -->
                        <div class="mb-3">
                            <span class="info-label">Nama Diklat</span>
                            <h5 class="info-value mb-0" id="info-nama-diklat">-</h5>
                            <small class="text-muted">Kode: <span id="info-kode-diklat">-</span></small>
                        </div>

                        <!-- Total Kuota & Sisa -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <span class="info-label">Total Kuota</span>
                                <div class="info-value" id="info-kuota">-</div>
                            </div>
                            <div class="col-6">
                                <span class="info-label">Sisa Kuota</span>
                                <div class="info-value text-success" id="info-sisa-kuota">-</div>
                            </div>
                        </div>

                        <!-- Biaya -->
                        <div class="mb-3">
                            <span class="info-label">Biaya Program</span>
                            <div class="info-value text-primary" id="info-biaya">Gratis</div>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <span class="info-label">Status Pendaftaran</span>
                            <div class="mt-2">
                                <span class="badge text-success" id="info-status">Terbuka</span>
                            </div>
                        </div>

                        <!-- Persyaratan -->
                        <div>
                            <span class="info-label">Persyaratan Administrasi</span>
                            <div class="mt-2">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item px-0 py-2 border-0">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <small>Kartu Identitas (KTP/SIM/Passport)</small>
                                    </div>
                                    <div class="list-group-item px-0 py-2 border-0">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <small>Ijazah Pendidikan Terakhir</small>
                                    </div>
                                    <div class="list-group-item px-0 py-2 border-0">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <small>Pas Foto Background Merah 4x6 (2 lembar)</small>
                                    </div>
                                    <div class="list-group-item px-0 py-2 border-0">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <small>Surat Keterangan Sehat dari Dokter</small>
                                    </div>
                                    <div class="list-group-item px-0 py-2 border-0">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <small>Mengisi formulir pendaftaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Left Column - Form -->
            <div class="col-md-8 order-md-1">
                <!-- Registration Form -->
                <div class="card">
                    <div class="card-body">
                        <!-- Step Indicator -->
                        <div class="step-indicator">
                            <div class="step active" id="step-1">
                                <div class="step-number">1</div>
                                <small>Kategori & Data</small>
                            </div>
                            <div class="step" id="step-2">
                                <div class="step-number">2</div>
                                <small>Dokumen</small>
                            </div>
                            <div class="step" id="step-3">
                                <div class="step-number">3</div>
                                <small>Konfirmasi</small>
                            </div>
                        </div>

            <form id="registrationForm" method="POST" enctype="multipart/form-data">
                <!-- Step 1: Registration Type Selection with Forms -->
                <div class="form-section active" id="section-1">
                    <h5 class="mb-3 text-center">Pilih Kategori Pendaftaran</h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="registration-type-card text-center" data-type="existing">
                                <i class="fas fa-user-check text-success mb-3"></i>
                                <h6 class="card-title">Pernah Daftar</h6>
                                <p class="card-description">
                                    Sudah pernah mendaftar diklat sebelumnya
                                </p>
                                <div class="card-badge">
                                    <small>Masukkan NIK</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="registration-type-card text-center" data-type="new">
                                <i class="fas fa-user-plus text-primary mb-3"></i>
                                <h6 class="card-title">Belum Pernah Daftar</h6>
                                <p class="card-description">
                                    Pendaftaran pertama kali
                                </p>
                                <div class="card-badge">
                                    <small>Isi data lengkap</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Existing User Form - Hidden initially -->
                    <div id="existing-user-form" style="display: none;" class="mt-4">
                        <hr>
                        <h5 class="mb-4">Masukkan NIK Anda</h5>
                        
                        <div class="row">
                            <div class="col-md-8">
                                <label class="form-label required">NIK</label>
                                <input type="text" class="form-control" id="existing-nik" placeholder="Masukkan NIK 15-16 digit" maxlength="16">
                                <small class="form-text text-muted">NIK sesuai KTP (15-16 digit)</small>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-success w-100" id="btn-check-nik">
                                    <i class="fas fa-search me-2"></i>Cari Data
                                </button>
                            </div>
                        </div>
                        
                        <div id="nik-result" class="mt-3" style="display: none;">
                            <div class="alert alert-info">
                                <div id="existing-user-info"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- New User Form - Hidden initially -->
                    <div id="new-user-form" style="display: none;" class="mt-4">
                        <hr>
                        <h5 class="mb-4">Data Pendaftar Baru</h5>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">NIK</label>
                                <input type="text" class="form-control" id="id" name="id" placeholder="15-16 digit" maxlength="16">
                                <small class="form-text text-muted">NIK akan digunakan sebagai ID unik</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama sesuai KTP">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Kota kelahiran">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Agama</label>
                                <select class="form-select" id="agama" name="agama">
                                    <option value="">Pilih agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label required">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap sesuai KTP"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">No. HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Pendidikan Terakhir</label>
                                <select class="form-select" id="pendidikan_terakhir" name="pendidikan_terakhir">
                                    <option value="">Pilih pendidikan terakhir</option>
                                    <option value="SD">SD/Sederajat</option>
                                    <option value="SMP">SMP/Sederajat</option>
                                    <option value="SMA">SMA/Sederajat</option>
                                    <option value="SMK">SMK/Sederajat</option>
                                    <option value="D1">Diploma I (D1)</option>
                                    <option value="D2">Diploma II (D2)</option>
                                    <option value="D3">Diploma III (D3)</option>
                                    <option value="D4/S1">Diploma IV/Sarjana (D4/S1)</option>
                                    <option value="S2">Magister (S2)</option>
                                    <option value="S3">Doktor (S3)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan saat ini">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama lengkap ayah">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama lengkap ibu">
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-primary" id="btn-next-1">
                            Lanjutkan <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Upload Dokumen -->
                <div class="form-section" id="section-2" style="display: none;">
                    <h5 class="mb-4 text-center">Upload Dokumen Persyaratan</h5>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Petunjuk Upload:</strong> Pastikan dokumen dalam format PDF, JPG, atau PNG dengan ukuran maksimal 2MB per file.
                    </div>

                    <div class="row">
                        <!-- Kartu Identitas -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="fas fa-id-card text-primary me-2"></i>
                                        Kartu Identitas *
                                    </h6>
                                    <p class="card-text small text-muted">KTP/SIM/Passport yang masih berlaku</p>
                                    
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="doc-ktp" name="doc_ktp" accept=".pdf,.jpg,.jpeg,.png" required>
                                        <small class="form-text text-muted">Format: PDF, JPG, PNG (Max: 2MB)</small>
                                    </div>
                                    
                                    <div class="upload-preview" id="preview-ktp" style="display: none;">
                                        <div class="alert alert-success py-2">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span class="filename"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Ijazah -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="fas fa-graduation-cap text-success me-2"></i>
                                        Ijazah Pendidikan Terakhir *
                                    </h6>
                                    <p class="card-text small text-muted">Ijazah/Sertifikat pendidikan terakhir</p>
                                    
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="doc-ijazah" name="doc_ijazah" accept=".pdf,.jpg,.jpeg,.png" required>
                                        <small class="form-text text-muted">Format: PDF, JPG, PNG (Max: 2MB)</small>
                                    </div>
                                    
                                    <div class="upload-preview" id="preview-ijazah" style="display: none;">
                                        <div class="alert alert-success py-2">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span class="filename"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pas Foto -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="fas fa-camera text-info me-2"></i>
                                        Pas Foto *
                                    </h6>
                                    <p class="card-text small text-muted">Pas foto 4x6 background merah (2 lembar)</p>
                                    
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="doc-foto" name="doc_foto" accept=".jpg,.jpeg,.png" required>
                                        <small class="form-text text-muted">Format: JPG, PNG (Max: 2MB)</small>
                                    </div>
                                    
                                    <div class="upload-preview" id="preview-foto" style="display: none;">
                                        <div class="alert alert-success py-2">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span class="filename"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Surat Keterangan Sehat -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="fas fa-heartbeat text-danger me-2"></i>
                                        Surat Keterangan Sehat *
                                    </h6>
                                    <p class="card-text small text-muted">Dari dokter yang masih berlaku</p>
                                    
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="doc-kesehatan" name="doc_kesehatan" accept=".pdf,.jpg,.jpeg,.png" required>
                                        <small class="form-text text-muted">Format: PDF, JPG, PNG (Max: 2MB)</small>
                                    </div>
                                    
                                    <div class="upload-preview" id="preview-kesehatan" style="display: none;">
                                        <div class="alert alert-success py-2">
                                            <i class="fas fa-check-circle me-2"></i>
                                            <span class="filename"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dokumen Tambahan (Opsional) -->
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="fas fa-file-alt text-warning me-2"></i>
                                        Dokumen Tambahan (Opsional)
                                    </h6>
                                    <p class="card-text small text-muted">Sertifikat keahlian, pengalaman kerja, atau dokumen pendukung lainnya</p>
                                    
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="doc-tambahan" name="doc_tambahan" accept=".pdf,.jpg,.jpeg,.png" multiple>
                                        <small class="form-text text-muted">Format: PDF, JPG, PNG (Max: 2MB per file, bisa pilih multiple files)</small>
                                    </div>
                                    
                                    <div class="upload-preview" id="preview-tambahan" style="display: none;">
                                        <div class="alert alert-info py-2">
                                            <i class="fas fa-paperclip me-2"></i>
                                            <span class="filename"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Progress -->
                    <div class="mt-4" id="upload-progress" style="display: none;">
                        <h6>Progress Upload:</h6>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                        <small class="text-muted">Uploading files...</small>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="row mt-4">
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-secondary" id="btn-prev-2">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </button>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-primary" id="btn-next-2">
                                Lanjutkan <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Konfirmasi -->
                <div class="form-section" id="section-3" style="display: none;">
                    <h5 class="mb-4 text-center">Konfirmasi Pendaftaran</h5>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Perhatian:</strong> Pastikan semua data dan dokumen yang Anda upload sudah benar sebelum mengirim pendaftaran.
                    </div>

                    <!-- Summary -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="mb-0">Ringkasan Pendaftaran</h6>
                        </div>
                        <div class="card-body" id="registration-summary">
                            <!-- Will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Agreement -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="agreement-final" required>
                        <label class="form-check-label" for="agreement-final">
                            Saya menyatakan bahwa data dan dokumen yang saya berikan adalah benar dan dapat dipertanggungjawabkan. 
                            Saya bersedia mengikuti seluruh rangkaian diklat sesuai jadwal yang ditentukan.
                        </label>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-secondary" id="btn-prev-3">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </button>
                        </div>
                        <div class="col-6 text-end">
                            <button type="submit" class="btn btn-success" id="btn-submit" disabled>
                                <i class="fas fa-paper-plane me-2"></i>Kirim Pendaftaran
                            </button>
                        </div>
                    </div>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-body text-center p-5">
                    <div class="mb-4">
                        <div class="success-icon mx-auto mb-3" style="width: 80px; height: 80px; background: linear-gradient(135deg, #28a745, #20c997); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-check text-white" style="font-size: 40px;"></i>
                        </div>
                        <h3 class="text-success mb-2">Pendaftaran Berhasil!</h3>
                        <p class="text-muted mb-4">Pendaftaran diklat Anda telah berhasil dikirim dan sedang dalam proses verifikasi.</p>
                    </div>
                    
                    <div class="alert alert-light border-0" style="background: #f8f9fa;">
                        <div class="row text-start">
                            <div class="col-6">
                                <small class="text-muted d-block">Nomor Pendaftaran</small>
                                <strong id="registration-number">REG-2025-001</strong>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Tanggal Pendaftaran</small>
                                <strong id="registration-date">14 Agustus 2025</strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h6 class="text-primary mb-3">Langkah Selanjutnya:</h6>
                        <div class="text-start">
                            <div class="d-flex align-items-start mb-2">
                                <div class="me-3">
                                    <span class="badge bg-primary rounded-circle" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 12px;">1</span>
                                </div>
                                <small>Tim kami akan memverifikasi dokumen yang Anda upload dalam 1-2 hari kerja</small>
                            </div>
                            <div class="d-flex align-items-start mb-2">
                                <div class="me-3">
                                    <span class="badge bg-primary rounded-circle" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 12px;">2</span>
                                </div>
                                <small>Anda akan menerima notifikasi via email mengenai status pendaftaran</small>
                            </div>
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <span class="badge bg-primary rounded-circle" style="width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 12px;">3</span>
                                </div>
                                <small>Jika diterima, Anda akan mendapat informasi jadwal dan tempat diklat</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary" onclick="redirectToHome()">
                            <i class="fas fa-home me-2"></i>Kembali ke Beranda
                        </button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-file-alt me-2"></i>Daftar Diklat Lain
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden inputs for selected data -->
    <input type="hidden" id="selected-diklat-id" name="diklat_id" value="14-01807-46">
    <input type="hidden" id="selected-jadwal-id" name="jadwal_id" value="">
    <input type="hidden" id="selected-periode" name="periode" value="">
    <input type="hidden" id="registration-type" name="registration_type" value="">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script>
        let currentStep = 1;
        let registrationType = '';
        let selectedData = {};
        
        // Load diklat information for sidebar
        function loadDiklatInfo() {
            const urlParams = new URLSearchParams(window.location.search);
            const diklatId = urlParams.get('diklat_id') || '14-01807-46'; // Default fallback
            
            console.log('loadDiklatInfo called');
            console.log('URL params:', window.location.search);
            console.log('Diklat ID from URL:', diklatId);
            
            // Get jadwal_id from URL path (after /form/)
            const pathArray = window.location.pathname.split('/');
            const formIndex = pathArray.indexOf('form');
            const jadwalId = formIndex !== -1 && pathArray[formIndex + 1] ? pathArray[formIndex + 1] : null;
            
            const periode = urlParams.get('periode');
            
            console.log('Loading diklat info for:', diklatId, jadwalId, periode);
            
            // Set hidden form values
            document.getElementById('selected-diklat-id').value = diklatId;
            document.getElementById('selected-jadwal-id').value = jadwalId || '';
            document.getElementById('selected-periode').value = periode || '';
            
            // Load diklat information
                const apiUrl = `<?= base_url('Pendaftaran/get_diklat_info_detailed'); ?>?diklat_id=${diklatId}&jadwal_id=${jadwalId || ''}&periode=${periode || ''}`;
                console.log('API URL:', apiUrl);
                
                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        console.log('API Response:', data);
                        if (data.status === 'success') {
                            const info = data.data;
                            console.log('Diklat info:', info);
                            
                            // Update sidebar dengan informasi diklat menggunakan struktur card yang baru
                            const namaElement = document.getElementById('info-nama-diklat');
                            const kuotaElement = document.getElementById('info-kuota');
                            const sisaKuotaElement = document.getElementById('info-sisa-kuota');
                            const kodeElement = document.getElementById('info-kode-diklat');
                            const biayaElement = document.getElementById('info-biaya');
                            const statusElement = document.getElementById('info-status');
                            const kategoriBadgeElement = document.getElementById('kategori-badge');
                            
                            if (namaElement) namaElement.textContent = info.nama_diklat || '-';
                            if (kuotaElement) kuotaElement.textContent = info.kuota || '-';
                            if (sisaKuotaElement) sisaKuotaElement.textContent = info.sisa_kuota || info.kuota || '-';
                            if (kodeElement) kodeElement.textContent = info.kode_diklat || info.diklat_id || '-';
                            if (kategoriBadgeElement) kategoriBadgeElement.textContent = info.jenis_diklat || 'PROGRAM DIKLAT';
                            
                            // Update biaya information
                            if (biayaElement) {
                                if (info.biaya && info.biaya > 0) {
                                    biayaElement.textContent = 'Rp ' + parseInt(info.biaya).toLocaleString('id-ID');
                                } else {
                                    biayaElement.textContent = 'Gratis';
                                }
                            }
                            
                            // Update status dengan badge
                            let statusText = 'Dibuka';
                            let statusBadgeClass = 'bg-success';
                            
                            if (info.status === 'open') {
                                statusText = 'Terbuka';
                                statusBadgeClass = 'bg-success';
                            } else if (info.status === 'closed') {
                                statusText = 'Dibuka';
                                statusBadgeClass = 'bg-success';
                            } else if (info.status === 'not_yet_open') {
                                statusText = 'Belum Dibuka';
                                statusBadgeClass = 'bg-warning';
                            } else if (info.status === 'execution_passed') {
                                statusText = 'Pelaksanaan Telah Selesai';
                                statusBadgeClass = 'bg-secondary';
                            }
                            
                            if (statusElement) {
                                statusElement.innerHTML = `<span class="badge ${statusBadgeClass}">${statusText}</span>`;
                            }
                        } else {
                            console.error('API returned error:', data.message);
                            loadDefaultDiklatInfo();
                        }
                    })
                    .catch(error => {
                        console.error('Error loading diklat info:', error);
                        loadDefaultDiklatInfo();
                    });
        }
        
        // Load default diklat information if API fails
        function loadDefaultDiklatInfo() {
            console.log('Loading default diklat info');
            
            // Set default values (menggunakan "-" sesuai dengan struktur baru)
            const namaElement = document.getElementById('info-nama-diklat');
            const kuotaElement = document.getElementById('info-kuota');
            const sisaKuotaElement = document.getElementById('info-sisa-kuota');
            const kodeElement = document.getElementById('info-kode-diklat');
            const biayaElement = document.getElementById('info-biaya');
            const statusElement = document.getElementById('info-status');
            const kategoriBadgeElement = document.getElementById('kategori-badge');
            
            if (namaElement) namaElement.textContent = '-';
            if (kuotaElement) kuotaElement.textContent = '-';
            if (sisaKuotaElement) sisaKuotaElement.textContent = '-';
            if (kodeElement) kodeElement.textContent = '-';
            if (biayaElement) biayaElement.textContent = '-';
            if (kategoriBadgeElement) kategoriBadgeElement.textContent = 'PROGRAM DIKLAT';
            
            // Set default status dengan badge
            if (statusElement) {
                statusElement.innerHTML = '<span class="badge bg-secondary">-</span>';
            }
        }
        
        // Setup file upload handlers
        function setupFileUploadHandlers() {
            const fileInputs = [
                { id: 'doc-ktp', preview: 'preview-ktp', required: true },
                { id: 'doc-ijazah', preview: 'preview-ijazah', required: true },
                { id: 'doc-foto', preview: 'preview-foto', required: true },
                { id: 'doc-kesehatan', preview: 'preview-kesehatan', required: true },
                { id: 'doc-tambahan', preview: 'preview-tambahan', required: false }
            ];
            
            fileInputs.forEach(fileConfig => {
                const fileInput = document.getElementById(fileConfig.id);
                if (fileInput) {
                    fileInput.addEventListener('change', function() {
                        handleFileUpload(this, fileConfig.preview, fileConfig.required);
                    });
                }
            });
        }
        
        // Handle file upload preview
        function handleFileUpload(input, previewId, isRequired) {
            const preview = document.getElementById(previewId);
            const file = input.files[0];
            
            if (!file) {
                if (preview) preview.style.display = 'none';
                return;
            }
            
            // Validate file size (2MB = 2 * 1024 * 1024 bytes)
            const maxSize = 2 * 1024 * 1024;
            if (file.size > maxSize) {
                alert('Ukuran file terlalu besar. Maksimal 2MB per file.');
                input.value = '';
                if (preview) preview.style.display = 'none';
                return;
            }
            
            // Validate file type
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan PDF, JPG, atau PNG.');
                input.value = '';
                if (preview) preview.style.display = 'none';
                return;
            }
            
            // Show preview
            if (preview) {
                const filename = preview.querySelector('.filename');
                if (filename) {
                    filename.textContent = file.name + ' (' + formatFileSize(file.size) + ')';
                }
                preview.style.display = 'block';
            }
            
            console.log('File uploaded:', file.name, 'Size:', formatFileSize(file.size));
        }
        
        // Format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
        
        // Validate required documents
        function validateDocuments() {
            const requiredFiles = ['doc-ktp', 'doc-ijazah', 'doc-foto', 'doc-kesehatan'];
            let allValid = true;
            
            for (let fileId of requiredFiles) {
                const fileInput = document.getElementById(fileId);
                if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
                    allValid = false;
                    break;
                }
            }
            
            return allValid;
        }
        
        // Generate registration summary
        function generateSummary() {
            const summaryDiv = document.getElementById('registration-summary');
            if (!summaryDiv) return;
            
            let html = '<div class="row">';
            
            // Personal Data
            html += '<div class="col-md-6">';
            html += '<h6 class="text-primary">Data Peserta</h6>';
            
            if (registrationType === 'existing' && selectedData.existingUser) {
                const user = selectedData.existingUser;
                html += `
                    <p><strong>NIK:</strong> ${user.id || '-'}<br>
                    <strong>Nama:</strong> ${user.nama_lengkap || '-'}<br>
                    <strong>Email:</strong> ${user.email || '-'}<br>
                    <strong>No. HP:</strong> ${user.no_hp || '-'}</p>
                `;
            } else if (registrationType === 'new') {
                const nama = document.getElementById('nama_lengkap')?.value || '-';
                const nik = document.getElementById('id')?.value || '-';
                const email = document.getElementById('email')?.value || '-';
                const noHp = document.getElementById('no_hp')?.value || '-';
                html += `
                    <p><strong>NIK:</strong> ${nik}<br>
                    <strong>Nama:</strong> ${nama}<br>
                    <strong>Email:</strong> ${email}<br>
                    <strong>No. HP:</strong> ${noHp}</p>
                `;
            }
            
            html += '</div>';
            
            // Documents
            html += '<div class="col-md-6">';
            html += '<h6 class="text-primary">Dokumen Upload</h6>';
            html += '<ul class="list-unstyled">';
            
            const docs = [
                { id: 'doc-ktp', name: 'Kartu Identitas' },
                { id: 'doc-ijazah', name: 'Ijazah' },
                { id: 'doc-foto', name: 'Pas Foto' },
                { id: 'doc-kesehatan', name: 'Surat Sehat' },
                { id: 'doc-tambahan', name: 'Dokumen Tambahan' }
            ];
            
            docs.forEach(doc => {
                const input = document.getElementById(doc.id);
                if (input && input.files && input.files.length > 0) {
                    html += `<li><i class="fas fa-check text-success me-2"></i>${doc.name}: ${input.files[0].name}</li>`;
                } else if (doc.id !== 'doc-tambahan') {
                    html += `<li><i class="fas fa-times text-danger me-2"></i>${doc.name}: Belum upload</li>`;
                }
            });
            
            html += '</ul></div></div>';
            summaryDiv.innerHTML = html;
        }
        
        // Step navigation
        function goToStep(step) {
            console.log('Going to step:', step);
            
            // Hide all sections
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show target section
            const targetSection = document.getElementById(`section-${step}`);
            if (targetSection) {
                targetSection.classList.add('active');
            }
            
            // Update step indicators using the same logic as updateProgressBar
            const stepElements = document.querySelectorAll('.step');
            stepElements.forEach((stepEl, index) => {
                const stepNumber = index + 1;
                stepEl.classList.remove('active', 'completed');
                
                if (stepNumber < step) {
                    stepEl.classList.add('completed');
                } else if (stepNumber === step) {
                    stepEl.classList.add('active');
                }
            });
            
            currentStep = step;
        }
        
        // Enhanced step navigation functions
        function showStep(stepNumber) {
            console.log('Showing step:', stepNumber);
            
            // Hide all sections
            const sections = ['section-1', 'section-2', 'section-3'];
            sections.forEach(sectionId => {
                const section = document.getElementById(sectionId);
                if (section) {
                    section.style.display = 'none';
                }
            });
            
            // Show target section
            const targetSection = document.getElementById(`section-${stepNumber}`);
            if (targetSection) {
                targetSection.style.display = 'block';
            }
            
            // Update progress bar
            updateProgressBar(stepNumber);
            
            // Generate summary if step 3
            if (stepNumber === 3) {
                generateSummary();
            }
        }
        
        function updateProgressBar(currentStep) {
            console.log('Updating progress bar for step:', currentStep);
            const progressSteps = document.querySelectorAll('.step');
            console.log('Found progress steps:', progressSteps.length);
            
            progressSteps.forEach((step, index) => {
                const stepNumber = index + 1;
                step.classList.remove('active', 'completed');
                
                if (stepNumber < currentStep) {
                    step.classList.add('completed');
                    console.log(`Step ${stepNumber} marked as completed`);
                } else if (stepNumber === currentStep) {
                    step.classList.add('active');
                    console.log(`Step ${stepNumber} marked as active`);
                }
            });
        }
        
        function nextStep() {
            console.log('Next step clicked, current step:', currentStep);
            
            if (currentStep === 1) {
                // Validate step 1 data
                if (registrationType === 'new') {
                    const nama = document.getElementById('nama_lengkap')?.value;
                    const nik = document.getElementById('id')?.value;
                    const email = document.getElementById('email')?.value;
                    const noHp = document.getElementById('no_hp')?.value;
                    
                    if (!nama || !nik || !email || !noHp) {
                        alert('Mohon lengkapi semua data yang diperlukan');
                        return;
                    }
                } else if (registrationType === 'existing' && !selectedData.existingUser) {
                    alert('Mohon pilih data peserta terlebih dahulu');
                    return;
                }
                
                currentStep = 2;
                showStep(currentStep);
            } else if (currentStep === 2) {
                // Validate documents
                if (!validateDocuments()) {
                    alert('Mohon upload semua dokumen yang diperlukan (KTP, Ijazah, Pas Foto, Surat Sehat)');
                    return;
                }
                
                currentStep = 3;
                showStep(currentStep);
            }
        }
        
        function prevStep() {
            console.log('Previous step clicked, current step:', currentStep);
            
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }
        
        function submitRegistration() {
            console.log('Submit registration clicked');
            
            const agreement = document.getElementById('agreement-final');
            if (!agreement || !agreement.checked) {
                alert('Mohon setujui syarat dan ketentuan untuk melanjutkan');
                return;
            }
            
            // Show loading state on submit button
            const submitBtn = document.getElementById('btn-submit');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim Pendaftaran...';
            submitBtn.disabled = true;
            
            // Simulate submission delay (replace with actual API call)
            setTimeout(() => {
                // Generate registration number and date
                const now = new Date();
                const regNumber = 'REG-' + now.getFullYear() + '-' + String(Math.floor(Math.random() * 999) + 1).padStart(3, '0');
                const regDate = now.toLocaleDateString('id-ID', { 
                    day: 'numeric', 
                    month: 'long', 
                    year: 'numeric' 
                });
                
                // Update modal content
                document.getElementById('registration-number').textContent = regNumber;
                document.getElementById('registration-date').textContent = regDate;
                
                // Reset button state
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                
                console.log('Registration submitted successfully with number:', regNumber);
            }, 2000); // 2 second delay to simulate processing
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded - Initializing form...');
            
            // Test if cards exist
            const testCards = document.querySelectorAll('.registration-type-card');
            console.log('INITIAL TEST - Found cards:', testCards.length);
            testCards.forEach((card, index) => {
                console.log(`INITIAL TEST - Card ${index}:`, card, card.dataset.type);
            });
            
            // Add click event test
            document.body.addEventListener('click', function(e) {
                console.log('GLOBAL CLICK - Target:', e.target);
                console.log('GLOBAL CLICK - Target classes:', e.target.className);
                if (e.target.closest('.registration-type-card')) {
                    console.log('GLOBAL CLICK - Registration card clicked (bubbled event)');
                }
            });
            
            // Load diklat information for sidebar
            loadDiklatInfo();
            
            // Initialize to step 1
            showStep(1);
            
            // Registration type card click handlers
            const registrationCards = document.querySelectorAll('.registration-type-card');
            console.log('Registration cards found:', registrationCards.length);
            
            registrationCards.forEach((card, index) => {
                console.log(`SETUP - Setting up card ${index}:`, card.dataset.type);
                console.log(`SETUP - Card element:`, card);
                console.log(`SETUP - Card style:`, window.getComputedStyle(card).pointerEvents);
                
                card.addEventListener('click', function(e) {
                    console.log('CARD CLICK - Event triggered!');
                    console.log('CARD CLICK - This:', this);
                    console.log('CARD CLICK - Type:', this.dataset.type);
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Card clicked:', this.dataset.type);
                    
                    // Remove active state from all cards
                    document.querySelectorAll('.registration-type-card').forEach(c => c.classList.remove('active'));
                    
                    // Add active state to clicked card
                    this.classList.add('active');
                    
                    // Set registration type
                    registrationType = this.dataset.type;
                    console.log('Registration type set to:', registrationType);
                    
                    // Show/hide forms based on selection
                    const existingForm = document.getElementById('existing-user-form');
                    const newForm = document.getElementById('new-user-form');
                    
                    console.log('Existing form element:', existingForm);
                    console.log('New form element:', newForm);
                    
                    if (registrationType === 'existing') {
                        existingForm.style.display = 'block';
                        newForm.style.display = 'none';
                        console.log('Showing existing user form');
                    } else if (registrationType === 'new') {
                        existingForm.style.display = 'none';
                        newForm.style.display = 'block';
                        console.log('Showing new user form');
                    }
                    
                    // Set hidden field
                    document.getElementById('registration-type').value = registrationType;
                });
            });
            
            // Next button for step 1
            document.getElementById('btn-next-1').addEventListener('click', function() {
                if (!registrationType) {
                    alert('Mohon pilih kategori registrasi terlebih dahulu');
                    return;
                }
                
                if (registrationType === 'existing') {
                    const existingNik = document.getElementById('existing-nik').value.trim();
                    
                    if (!existingNik) {
                        alert('Mohon masukkan NIK Anda');
                        document.getElementById('existing-nik').focus();
                        return;
                    }
                    
                    if (existingNik.length < 15 || existingNik.length > 16) {
                        alert('NIK harus terdiri dari 15-16 digit');
                        document.getElementById('existing-nik').focus();
                        return;
                    }
                    
                    if (!/^\d+$/.test(existingNik)) {
                        alert('NIK hanya boleh berisi angka');
                        document.getElementById('existing-nik').focus();
                        return;
                    }
                } else if (registrationType === 'new') {
                    const requiredFields = ['id', 'nama_lengkap', 'nama_ayah', 'nama_ibu', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'no_hp', 'email', 'pendidikan_terakhir', 'pekerjaan'];
                    
                    for (let fieldId of requiredFields) {
                        const element = document.getElementById(fieldId);
                        if (!element || !element.value.trim()) {
                            const fieldName = fieldId.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                            alert(`Mohon lengkapi field ${fieldName}`);
                            if (element) element.focus();
                            return;
                        }
                    }
                    
                    // Validate ID (NIK)
                    const id = document.getElementById('id').value.trim();
                    if (id.length < 15 || id.length > 16) {
                        alert('NIK harus terdiri dari 15-16 digit');
                        document.getElementById('id').focus();
                        return;
                    }
                    
                    if (!/^\d+$/.test(id)) {
                        alert('NIK hanya boleh berisi angka');
                        document.getElementById('id').focus();
                        return;
                    }
                    // Validate email
                    const email = document.getElementById('email').value.trim();
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        alert('Format email tidak valid');
                        document.getElementById('email').focus();
                        return;
                    }
                }
                
                nextStep();
            });
            
            // File upload handlers
            setupFileUploadHandlers();
            
            // Previous button for step 2
            const btnPrev2 = document.getElementById('btn-prev-2');
            if (btnPrev2) {
                btnPrev2.addEventListener('click', function() {
                    prevStep();
                });
            }
            
            // Next button for step 2
            const btnNext2 = document.getElementById('btn-next-2');
            if (btnNext2) {
                btnNext2.addEventListener('click', function() {
                    nextStep();
                });
            }
            
            // Previous button for step 3
            const btnPrev3 = document.getElementById('btn-prev-3');
            if (btnPrev3) {
                btnPrev3.addEventListener('click', function() {
                    prevStep();
                });
            }
            
            // Agreement checkbox handler
            const agreementFinal = document.getElementById('agreement-final');
            if (agreementFinal) {
                agreementFinal.addEventListener('change', function() {
                    const btnSubmit = document.getElementById('btn-submit');
                    if (btnSubmit) {
                        btnSubmit.disabled = !this.checked;
                    }
                });
            }
            
            // Form submission
            const registrationForm = document.getElementById('registrationForm');
            if (registrationForm) {
                registrationForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    submitRegistration();
                });
            }
            
            // Submit button click handler
            const btnSubmit = document.getElementById('btn-submit');
            if (btnSubmit) {
                btnSubmit.addEventListener('click', function(e) {
                    e.preventDefault();
                    submitRegistration();
                });
            }
            
            // Check NIK button handler
            const checkNikBtn = document.getElementById('btn-check-nik');
            console.log('Check NIK button found:', checkNikBtn);
            
            if (checkNikBtn) {
                console.log('Setting up NIK button click handler...');
                
                checkNikBtn.onclick = function() {
                    console.log('=== NIK BUTTON CLICKED ===');
                    const nik = document.getElementById('existing-nik').value.trim();
                    console.log('NIK entered:', nik);
                    
                    if (!nik) {
                        alert('Mohon masukkan NIK terlebih dahulu');
                        document.getElementById('existing-nik').focus();
                        return;
                    }
                    
                    if (nik.length < 15 || nik.length > 16) {
                        alert('NIK harus terdiri dari 15-16 digit');
                        document.getElementById('existing-nik').focus();
                        return;
                    }
                    
                    if (!/^\d+$/.test(nik)) {
                        alert('NIK hanya boleh berisi angka');
                        document.getElementById('existing-nik').focus();
                        return;
                    }
                    
                    console.log('NIK validation passed');
                    
                    // Show loading state
                    const btn = this;
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mencari...';
                    btn.disabled = true;
                    console.log('Button loading state set');
                    
                    // Check NIK via API
                    console.log('Calling API...');
                    fetch('<?= base_url("Pendaftaran/check_existing_user") ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'nik=' + encodeURIComponent(nik)
                    })
                    .then(response => {
                        console.log('API response received:', response.status);
                        return response.json();
                    })
                    .then(data => {
                        console.log('API data:', data);
                        
                        // Reset button state
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                        
                        const resultDiv = document.getElementById('nik-result');
                        const infoDiv = document.getElementById('existing-user-info');
                        console.log('Result containers:', resultDiv, infoDiv);
                        
                        if (data.status === 'success' && data.data) {
                            console.log('=== SUCCESS - SHOWING USER DATA ===');
                            // NIK found - show user data
                            const user = data.data;
                            resultDiv.style.display = 'block';
                            resultDiv.className = 'mt-3';
                            infoDiv.innerHTML = `
                                <div class="alert alert-success">
                                    <h6 class="mb-2"><i class="fas fa-check-circle me-2"></i>Data Ditemukan</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Nama:</strong> ${user.nama_lengkap || '-'}<br>
                                            <strong>NIK:</strong> ${user.id || '-'}<br>
                                            <strong>Email:</strong> ${user.email || '-'}
                                        </div>
                                        <div class="col-md-6">
                                            <strong>No. HP:</strong> ${user.no_hp || '-'}<br>
                                            <strong>Tempat Lahir:</strong> ${user.tempat_lahir || '-'}<br>
                                            <strong>Tanggal Lahir:</strong> ${user.tanggal_lahir || '-'}
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <small class="text-muted">Data ini akan digunakan untuk pendaftaran</small>
                                    </div>
                                </div>
                            `;
                            
                            // Store user data for form submission
                            selectedData.existingUser = user;
                            console.log('User data displayed successfully');
                            
                        } else {
                            console.log('=== ERROR - NIK NOT FOUND ===');
                            // NIK not found - show error message
                            resultDiv.style.display = 'block';
                            resultDiv.className = 'mt-3';
                            infoDiv.innerHTML = `
                                <div class="alert alert-danger">
                                    <h6 class="mb-2"><i class="fas fa-exclamation-triangle me-2"></i>NIK Tidak Ditemukan</h6>
                                    <p class="mb-3">NIK <strong>${nik}</strong> belum terdaftar dalam sistem kami.</p>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="switchToNewRegistration()">
                                            <i class="fas fa-user-plus me-2"></i>Daftar Sebagai Pengguna Baru
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="clearNikSearch()">
                                            <i class="fas fa-redo me-2"></i>Coba NIK Lain
                                        </button>
                                    </div>
                                    <hr class="my-3">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Pastikan NIK yang Anda masukkan sudah benar (15-16 digit). 
                                        Jika belum pernah mendaftar sebelumnya, silakan pilih "Belum Pernah Daftar".
                                    </small>
                                </div>
                            `;
                            
                            // Clear stored user data
                            selectedData.existingUser = null;
                            console.log('Error message displayed');
                        }
                    })
                    .catch(error => {
                        console.log('=== FETCH ERROR ===');
                        console.error('Error checking NIK:', error);
                        
                        // Reset button state
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                        
                        // Show error message
                        const resultDiv = document.getElementById('nik-result');
                        const infoDiv = document.getElementById('existing-user-info');
                        
                        resultDiv.style.display = 'block';
                        resultDiv.className = 'mt-3';
                        infoDiv.innerHTML = `
                            <div class="alert alert-warning">
                                <h6 class="mb-2"><i class="fas fa-exclamation-triangle me-2"></i>Terjadi Kesalahan</h6>
                                <p class="mb-3">Tidak dapat memeriksa NIK saat ini. Silakan coba lagi.</p>
                                <p class="mb-3">Error: ${error.message}</p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="document.getElementById('btn-check-nik').click()">
                                        <i class="fas fa-redo me-2"></i>Coba Lagi
                                    </button>
                                </div>
                            </div>
                        `;
                        console.log('Warning message displayed');
                    });
                };
            } else {
                console.error('Check NIK button not found!');
            }
            
            // Cancel Diklat button
            const btnCancelDiklat = document.getElementById('btn-cancel-diklat');
            if (btnCancelDiklat) {
                btnCancelDiklat.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin membatalkan pendaftaran diklat ini?')) {
                        // Get diklat_id from URL or form
                        const urlParams = new URLSearchParams(window.location.search);
                        const diklatId = urlParams.get('diklat_id') || '14-01807-46';
                        
                        // Redirect back to pendaftaran page
                        window.location.href = '<?= base_url("pendaftaran") ?>?diklat_id=' + diklatId;
                    }
                });
            }
            
            console.log('All event handlers set up successfully');
        });
        
        // Helper function to switch to new registration
        function switchToNewRegistration() {
            // Remove active state from existing card
            document.querySelector('.registration-type-card[data-type="existing"]').classList.remove('active');
            
            // Add active state to new card
            const newCard = document.querySelector('.registration-type-card[data-type="new"]');
            newCard.classList.add('active');
            
            // Set registration type
            registrationType = 'new';
            document.getElementById('registration-type').value = registrationType;
            
            // Hide existing form and show new form
            document.getElementById('existing-user-form').style.display = 'none';
            document.getElementById('new-user-form').style.display = 'block';
            
            // Clear existing form data
            document.getElementById('existing-nik').value = '';
            document.getElementById('nik-result').style.display = 'none';
            
            // Focus on first field of new form
            document.getElementById('id').focus();
        }
        
        // Helper function to clear NIK search
        function clearNikSearch() {
            document.getElementById('existing-nik').value = '';
            document.getElementById('nik-result').style.display = 'none';
            document.getElementById('existing-nik').focus();
            selectedData.existingUser = null;
        }
        
        // Helper function to redirect to home
        function redirectToHome() {
            window.location.href = '<?= base_url() ?>';
        }
    </script>
</body>
</html>
