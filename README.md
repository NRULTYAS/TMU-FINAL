# 🎓 TMU-FINAL - Portal Diklat Management System

Sistem manajemen pendaftaran diklat (pendidikan dan pelatihan) yang lengkap dengan antarmuka modern dan fitur upload dokumen.

## 🚀 Fitur Utama

### 📝 Multi-Step Registration Form
- **Step 1**: Pilihan kategori pendaftaran (Sudah Pernah Daftar / Belum Pernah Daftar)
- **Step 2**: Upload dokumen persyaratan dengan validasi
- **Step 3**: Konfirmasi dan ringkasan pendaftaran

### 🔍 Smart User Detection
- Pencarian NIK untuk user yang sudah terdaftar
- Validasi NIK real-time dengan API
- Auto-fill data untuk user existing
- Form registrasi lengkap untuk user baru

### 📎 Document Upload System
- Upload dokumen wajib: KTP, Ijazah, Pas Foto, Surat Sehat
- Upload dokumen tambahan (opsional)
- Validasi format file (PDF, JPG, PNG)
- Validasi ukuran file (maksimal 2MB)
- Preview nama file dan ukuran

### 🎨 Modern UI/UX
- Responsive design untuk semua device
- Progress bar dengan step indicators
- Loading states dan animations
- Bootstrap 5.3.3 + Font Awesome 6.4.0
- Gradient backgrounds dan modern cards

### 🔔 Success Notification
- Modal notifikasi sukses yang elegant
- Auto-generate nomor registrasi
- Informasi langkah selanjutnya
- Opsi redirect ke beranda atau daftar lagi

## 🛠️ Teknologi yang Digunakan

- **Backend**: CodeIgniter 3.x
- **Frontend**: Bootstrap 5.3.3, Font Awesome 6.4.0
- **Database**: MySQL
- **JavaScript**: Vanilla JS dengan Fetch API
- **Version Control**: Git

## 📁 Struktur Project

```
TMU1-main/
├── application/
│   ├── controllers/
│   │   ├── Admin.php
│   │   ├── Dashboard.php
│   │   ├── Login.php
│   │   ├── Operator.php
│   │   ├── Pendaftaran.php
│   │   └── ...
│   ├── models/
│   │   ├── Dashboard_model.php
│   │   ├── Login_model.php
│   │   ├── Pendaftar_model.php
│   │   ├── Pendaftaran_model.php
│   │   └── ...
│   └── views/
│       ├── admin/
│       ├── frontend/
│       │   └── form_pendaftaran.php
│       ├── login/
│       ├── operator/
│       └── peserta/
├── database/
│   └── migrations/
├── system/
└── vendor/
```

## 🔧 Installation & Setup

1. **Clone Repository**
   ```bash
   git clone https://github.com/NRULTYAS/TMU-FINAL.git
   cd TMU-FINAL
   ```

2. **Setup Database**
   - Import database migrations dari folder `database/migrations/`
   - Configure database di `application/config/database.php`

3. **Web Server Setup**
   - Pastikan Apache/Nginx dan PHP 7.4+ sudah terinstall
   - Set document root ke folder project
   - Enable mod_rewrite untuk Apache

4. **Dependencies**
   ```bash
   composer install
   ```

5. **Configuration**
   - Set base_url di `application/config/config.php`
   - Configure database connection
   - Set encryption key untuk session

## 📋 API Endpoints

### Registration API
- `POST /Pendaftaran/check_existing_user` - Validasi NIK user existing
- `GET /Pendaftaran/get_diklat_info_detailed` - Informasi detail diklat

### Authentication API  
- `POST /Login/validate_login` - Login validation
- `GET /Login/logout` - Logout user

## 🎯 Changelog & Improvements

### ✨ Major Enhancements (Latest)

#### 🚀 Complete Multi-Step Registration Form
- **New**: 3-step wizard dengan progress indicator
- **New**: Smart registration type detection
- **New**: Real-time NIK validation
- **Enhanced**: Form validation dengan error handling
- **Enhanced**: Responsive design untuk mobile

#### 📎 Document Upload System
- **New**: Upload multiple documents dengan preview
- **New**: File validation (type, size, format)
- **New**: Progress tracking untuk upload
- **Enhanced**: Drag & drop interface (future enhancement)

#### 🎨 UI/UX Improvements
- **New**: Modern card-based design
- **New**: Gradient backgrounds dan animations
- **New**: Loading states untuk semua actions
- **Enhanced**: Bootstrap 5.3.3 integration
- **Enhanced**: Mobile-first responsive design

#### 🔔 Success Notification System
- **New**: Elegant success modal
- **New**: Auto-generated registration number
- **New**: Next steps information
- **Enhanced**: Better user feedback

#### 🛠️ Technical Improvements
- **Enhanced**: Pendaftaran controller dengan API endpoints
- **Enhanced**: Database models untuk registration workflow
- **New**: JavaScript validation framework
- **New**: File upload handling system
- **Enhanced**: Error handling dan logging

### 🧹 Code Cleanup
- **Removed**: Debug files (debug_*.html, test_*.html)
- **Removed**: Temporary development files
- **Kept**: Utility files (generate_operator_password.php)
- **Enhanced**: Clean project structure

## 👥 User Roles & Access

### 🔑 Admin
- Manajemen diklat dan jadwal
- Monitoring pendaftaran
- User management

### 👨‍💼 Operator
- Input dan verifikasi pendaftaran
- Manajemen data peserta
- Reporting

### 👨‍🎓 Peserta
- Pendaftaran diklat
- Upload dokumen
- Monitoring status pendaftaran

## 🔒 Security Features

- CSRF protection
- Input validation dan sanitization
- File upload security
- Session management
- SQL injection prevention

## 📱 Browser Support

- Chrome 80+
- Firefox 75+
- Safari 13+
- Edge 80+
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🤝 Contributing

1. Fork repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 📧 Contact

For any questions or support, please contact the development team.

---

**🎉 TMU-FINAL v2.0** - Powered by modern web technologies for better user experience
