# Perkiraan Tinggi Badan Anak

Proyek ini adalah aplikasi sederhana dalam bahasa Java yang memperkirakan tinggi badan anak berdasarkan tinggi badan ayah dan ibu serta jenis kelamin anak.

---------------------------------------------------------------------------------------------------------------------------------------------

## Fitur

- Menerima input tinggi badan ayah dan ibu dalam satuan cm.
- Menerima input jenis kelamin anak (laki-laki atau perempuan).
- Menghitung perkiraan tinggi badan anak berdasarkan rumus:
  - Anak laki-laki: `(tinggiAyah + tinggiIbu) * 0.54`
  - Anak perempuan: `(tinggiAyah + tinggiIbu) * 0.51`
- Menampilkan hasil perkiraan tinggi badan anak.

---------------------------------------------------------------------------------------------------------------------------------------------

## Prasyarat

- Java Development Kit (JDK) harus terpasang pada sistem Anda.
- Disarankan untuk menggunakan Java versi 8 ke atas.

---------------------------------------------------------------------------------------------------------------------------------------------

## Cara Menjalankan Program

1. **Kloning atau Unduh Proyek**
   - Kloning repositori ini atau unduh berkas `PerkiraanTinggiBadan2.java`.

2. **Kompilasi Program**
   - Buka terminal atau command prompt, lalu arahkan ke direktori tempat berkas `PerkiraanTinggiBadan2.java` disimpan.
   - Jalankan perintah berikut untuk mengompilasi:
     ```bash
     javac PerkiraanTinggiBadan2.java
     ```

3. **Jalankan Program**
   - Setelah berhasil dikompilasi, jalankan program dengan perintah:
     ```bash
     java PerkiraanTinggiBadan2
     ```

4. **Input Data**
   - Masukkan tinggi badan ayah dalam cm.
   - Masukkan tinggi badan ibu dalam cm.
   - Masukkan jenis kelamin anak (laki-laki atau perempuan).
   - Program akan menampilkan hasil perkiraan tinggi badan anak dalam cm

---------------------------------------------------------------------------------------------------------------------------------------------

## Informasi Tambahan

- Proyek ini menggunakan perhitungan dasar untuk memberikan estimasi tinggi badan anak.
- Estimasi ini tidak dapat dijadikan patokan akurat, karena tinggi badan dipengaruhi oleh banyak faktor lain, seperti genetika dan lingkungan.

---------------------------------------------------------------------------------------------------------------------------------------------

## Pengembangan Lebih Lanjut

- **Refactoring**: Kode dapat di-refactor untuk lebih modular atau memperbaiki struktur kodenya.
- **Branching di Git**: Jika Anda ingin menambahkan fitur tambahan atau melakukan perubahan, buat branch baru di Git untuk memisahkan perubahan tersebut dari kode utama.

---------------------------------------------------------------------------------------------------------------------------------------------

Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi pengembang proyek ini.