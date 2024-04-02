<?php
// Sertakan file classnya
require_once 'fileSiswa.php';

// Inisialisasi array siswa
$ar_siswa = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data dari form ke dalam variabel lokal
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kuliah = $_POST['kuliah'];
    $mataKuliah = $_POST['mataKuliah'];
    $nilai = $_POST['nilai'];

    // Buat objek dan tambahkan ke array siswa
    $ar_siswa[] = new Siswa($nim, $nama, $kuliah, $mataKuliah, $nilai);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Ujian Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        
        <h2 align="center">Form Nilai Ujian</h2><br>
        <form method="post">
            <div class="form-group row">
                <label for="nim" class="col-4 col-form-label">NIM:</label> 
                <div class="col-8">
                    <input type="text" id="nim" name="nim" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama:</label> 
                <div class="col-8">
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="kuliah" class="col-4 col-form-label">Kampus:</label> 
                <div class="col-8">
                    <select id="kuliah" name="kuliah" class="custom-select" required>
                        <option value="Universitas Yarsi">Universitas Yarsi</option>
                        <option value="Universitas Brawijaya">Universitas Brawijaya</option>
                        <option value="Universitas Indonesia">Universitas Indonesia</option>
                        <option value="Universitas Jakarta">Universitas Jakarta</option> 
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="mataKuliah" class="col-4 col-form-label">Mata Kuliah:</label> 
                <div class="col-8">
                    <select id="mataKuliah" name="mataKuliah" class="custom-select" required>
                        <option value="UI/UX">UI/UX</option>
                        <option value="HTML">HTML</option>
                        <option value="PHP">PHP</option>
                        <option value="Java Script">Java Script</option> 
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="nilai" class="col-4 col-form-label">Nilai:</label> 
                <div class="col-8">
                    <input type="text" id="nilai" name="nilai" class="form-control" required>
                </div>
            </div> 

            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
        <br><br>
        <h2 align="center">Daftar Nilai Ujian Mahasiswa</h2><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kuliah</th>
                        <th>Mata Kuliah</th>
                        <th>Nilai</th>
                        <th>Grade</th>
                        <th>Predikat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($ar_siswa as $siswa) {
                        echo '<tr>';
                        echo '<td>' . $no . '</td>';
                        echo '<td>' . $siswa->nim . '</td>';
                        echo '<td>' . $siswa->nama . '</td>';
                        echo '<td>' . $siswa->kuliah . '</td>';
                        echo '<td>' . $siswa->mataKuliah . '</td>';
                        echo '<td>' . $siswa->nilai . '</td>';
                        echo '<td>' . $siswa->grade . '</td>';
                        echo '<td>' . $siswa->predikat . '</td>';
                        echo '<td>' . $siswa->status . '</td>';
                        echo '</tr>';
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <a href="#" onclick="window.print();" class="btn btn-primary float-right">Hasil Cetak</a>
    </div>
</body>
</html>
