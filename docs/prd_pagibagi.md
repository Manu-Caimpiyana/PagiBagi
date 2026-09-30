# Product Requirements Document (PRD): PagiBagi
**"Berbagi Dari Pagi"**

> **Disusun oleh:** Manu Caimpiyana Bhimasena

---

## A. Highlight
User dan admin dapat mencatat dan mengelola nominal pengeluaran maupun pemasukan yang dilakukan dari uang "Pagi Berbagi".

## B. Background & Problem Statement
Projek ini dibuat karena sistem pengelolaan data dari kegiatan Pagi Berbagi masih menggunakan Excel / Google Spreadsheet. Karena masih menggunakan Excel/Spreadsheet, user menjadi bingung untuk alur pengisian data-data yang akan dikirimkan, dan masih adanya kemungkinan user yang salah menginput data di kolom-kolom Excel yang terlalu padat dan rumit untuk dilihat. 

Projek ini dapat menjadi solusi untuk masalah tersebut dengan menawarkan beberapa fitur utama:
*   **Input Data Pemasukan:** User (siswa / sekretaris per kelasnya) menginput nominal yang dibayarkan oleh setiap siswa yang ada di kelas tersebut.
*   **Kalkulasi Otomatis:** Sistem akan otomatis menjumlahkan total nominal yang dibayarkan siswa per kelasnya, dikirimkan ke database, dan otomatis mencatat siapa saja yang bayar atau tidak bayar di suatu kelas (untuk dilihat oleh admin).
*   **Input Data Pengeluaran:** Admin (guru) bisa menginput pengeluaran (penyaluran infaq) dari hasil nominal yang sudah ada.
*   **Generate Bukti Digital:** Sistem akan otomatis membuatkan berkas seperti cek atau nota berbentuk *image* setiap ada pengeluaran / penyaluran infaq yang dilakukan.
*   **Statistik Mingguan:** Sistem akan otomatis membuat statistik dari nominal yang diberikan siswa setiap minggunya, seperti: kelas mana yang paling banyak memberikan infaq (persentase murid yang memberikan infaq), dan lonjakan yang terjadi dari minggu sebelumnya ke minggu ini (persentase murid yang memberikan infaq minggu sebelumnya dibandingkan dengan minggu sekarang).
*   **Dashboard Admin:** Menunjukkan data statistik dan data asli dari nominal yang siswa berikan per kelasnya.

## C. Objective
Projek ini akan terbagi menjadi beberapa tahapan:
*   **Fase 1:** Membuat dan menerapkan autentikasi login.
*   **Fase 2:** Membuat sistem input dan pengolahan data otomatis oleh sistem.
*   **Fase 3:** Mengatur dan menyesuaikan tampilan (UI/UX).

---

## D. Tech Proposal

### Struktur Database (Data Types & ERD Representation)

**1. Tabel `rombel`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id_rombel` | bigint | Primary Key, Auto Increment (AI) |
| `nama_kelas` | varchar | - |
| `tingkat` | varchar | - |

**2. Tabel `rayon`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id_rayon` | bigint | Primary Key, Auto Increment (AI) |
| `nama_rayon` | varchar | - |

**3. Tabel `siswa`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `nis` | bigint | Primary Key |
| `id_rombel` | bigint | Relasi ke tabel `rombel` |
| `id_rayon` | bigint | Relasi ke tabel `rayon` |
| `nama_siswa` | varchar | - |

**4. Tabel `user`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id_user` | bigint | Primary Key, Auto Increment (AI) |
| `id_rayon` | bigint | Relasi ke tabel `rayon` (Nullable) |
| `id_rombel` | bigint | Relasi ke tabel `rombel` (Nullable) |
| `username` | varchar | - |
| `password` | varchar | Hashed |
| `role` | enum | e.g., Admin, User |

**5. Tabel `periode`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id_periode` | bigint | Primary Key, Auto Increment (AI) |
| `minggu_ke` | bigint | - |
| `tanggal_mulai` | date | - |
| `tanggal_selesai` | date | - |

**6. Tabel `pemasukan`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id_pemasukan` | bigint | Primary Key, Auto Increment (AI) |
| `nis` | bigint | Relasi ke tabel `siswa` |
| `id_periode` | bigint | Relasi ke tabel `periode` |
| `id_user` | bigint | Relasi ke tabel `user` |
| `nominal_infaq_masjid`| decimal | - |
| `nominal_pagi_berbagi`| decimal | - |
| `status_bayar` | boolean | - |
| `tanggal_bayar` | datetime| - |

**7. Tabel `pengeluaran`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id_pengeluaran` | bigint | Primary Key, Auto Increment (AI) |
| `id_user` | bigint | Relasi ke tabel `user` |
| `nominal` | decimal | - |
| `keterangan` | varchar | - |
| `tanggal` | date | - |
| `image_url` | varchar | Path/URL bukti nota/cek |

**8. Tabel `statistik_rombel`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id_statistik` | bigint | Primary Key, Auto Increment (AI) |
| `id_rombel` | bigint | Relasi ke tabel `rombel` |
| `id_periode` | bigint | Relasi ke tabel `periode` |
| `total_nominal` | decimal | - |
| `jumlah_siswa_bayar`| bigint | - |
| `total_siswa` | bigint | - |
| `presentase_partisipasi`| decimal| - |
| `presentase_perubahan`| decimal | - |

**9. Tabel `statistik_rayon`**
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id_statistik` | bigint | Primary Key, Auto Increment (AI) |
| `id_rayon` | bigint | Relasi ke tabel `rayon` |
| `id_periode` | bigint | Relasi ke tabel `periode` |
| `total_nominal` | decimal | - |
| `jumlah_siswa_bayar`| bigint | - |
| `total_siswa` | bigint | - |
| `presentase_partisipasi`| decimal| - |
| `presentase_perubahan`| decimal | - |

---

## E. User And Data Flow

### 1. User Flow
1. **Mulai** -> Halaman Login
2. **Input Kredensial** -> Autentikasi Login
3. **Akun Valid?**
   * *False:* Menampilkan Pesan Error -> Kembali ke Halaman Login.
   * *True:* Masuk ke Halaman Utama.
4. **Cek Role:**
   * **Jika Admin (Guru):**
     * Masuk ke Halaman Dashboard Admin.
     * Dapat mengakses: Kelola Pengeluaran Uang Infaq & Kelola Statistik & Laporan.
     * Selesai.
   * **Jika User (Sekretaris):**
     * Masuk ke Halaman Dashboard Sekretaris.
     * Dapat mengakses: Kelola Pemasukan Uang Infaq.
     * Selesai.

### 2. Data Flow Konseptual
* **Input Pemasukan (Sekretaris):** Data dikelola di *Kelola Pemasukan Infaq* -> Menyimpan ke `Data Pemasukan` -> Digunakan untuk membuat `Statistik & Laporan`.
* **Input Pengeluaran (Admin/Guru):** Data dikelola di *Kelola Pengeluaran Infaq* -> Menyimpan ke `Data Pengeluaran` -> Digunakan untuk membuat `Statistik & Laporan`.
* **Autentikasi (Semua):** Input Kredensial -> Autentikasi Login (Cek Akun) -> Membaca `User Data`.

### 3. User Stories

**1. Fase Autentikasi & Login**
*   **Story:** Sebagai User (Sekretaris / Admin Guru), Saya ingin login menggunakan kredensial akun, agar saya dapat mengakses fitur sesuai dengan hak akses saya.
*   **Detail Flow:**
    1. Pengguna membuka halaman login dan menginput kredensial (username/password).
    2. Sistem melakukan verifikasi data pada tabel User.
    3. Jika tidak valid, sistem menampilkan pesan eror dan mengembalikan ke halaman login.
    4. Jika valid, sistem memeriksa role akun (User/Sekretaris atau Admin/Guru) dan mengarahkan ke dashboard yang sesuai.

**2. Alur Kerja Sekretaris (Penginputan Pemasukan)**
*   **Story:** Sebagai Sekretaris Kelas, Saya ingin mencatat nominal infaq siswa per minggu, agar data partisipasi dan total infaq kelas tercatat dengan akurat.
*   **Detail Flow:**
    1. Sekretaris masuk ke Dashboard Sekretaris.
    2. Memilih daftar siswa di rombelnya dan menginput nominal pembayaran (infaq masjid & pagi berbagi).
    3. Sistem secara otomatis memperbarui status pembayaran dan menjumlahkan total nominal per rombel.
    4. Data tersimpan ke tabel Pemasukan dan siap diolah menjadi statistik.

**3. Alur Kerja Guru/Admin (Pengelolaan Pengeluaran)**
*   **Story:** Sebagai Admin/Guru, Saya ingin mencatat penyaluran/pengeluaran dana infaq, agar terdapat transparansi dan bukti fisik berbentuk cek/nota otomatis.
*   **Detail Flow:**
    1. Admin mengakses Halaman Dashboard Admin lalu memilih menu Kelola Pengeluaran.
    2. Menginput nominal pengeluaran, keterangan penyaluran, tanggal, serta mengunggah/menghasilkan gambar bukti.
    3. Sistem menyimpan data ke tabel Pengeluaran dan meng-generate berkas visual (nota/cek).

**4. Alur Kerja Guru/Admin (Statistik & Laporan)**
*   **Story:** Sebagai Admin/Guru, Saya ingin melihat statistik partisipasi serta tren mingguan, agar evaluasi kegiatan Pagi Berbagi dapat dilakukan dengan jelas dan terukur.
*   **Detail Flow:**
    1. Sistem secara otomatis mengalkulasi persentase partisipasi dan persentase perubahan mingguan pada tabel StatistikRombel dan StatistikRayon.
    2. Admin dapat melihat rangkuman grafik, peringkat kelas/rayon paling berpartisipasi, serta laporan lengkap pemasukan dan pengeluaran.

---

## F. UI Design (Figma)
*   **Link:** [Desain Figma PagiBagi](https://www.figma.com/design/Xsz6QKoAPiCtLbiiuCZab9/Untitled?node-id=20-1492&t=s4sveYrfTFz5CXdt-1)

## G. Repository (GitHub)
*   **Link:** [https://github.com/Manu-Caimpiyana/PagiBagi](https://github.com/Manu-Caimpiyana/PagiBagi)