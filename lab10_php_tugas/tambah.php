<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;;
        }
    }

    $sql = 'INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) ';
    $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index1.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />

    

<title>Tambah Barang</title>
</head>
<style>
  /* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto; /* Center the table and provide top margin */
    max-width: 80%; /* Limit the maximum width to 80% */
}

th, td {
    padding: 15px;
    border: 1px solid #ddd; /* Set your table border color */
}

th {
    background-color: rgb(241, 163, 253); /* Set your table header background color */
    color: #fff;
}

/* Table row styles */
tr:nth-child(even) {
    background-color: #ecf0f1; /* Set your even row background color */
}

tr:hover {
    background-color: #d4e6f1; /* Set your row hover background color */
}

/* Table cell styles */
td {
    text-align: center;
    font-size: 14px;
}

/* Add some spacing between the table cells */
td, th {
    padding: 15px;
}

/* Add some spacing between the table cells and the table borders */
table, th, td {
    border: 1px solid #ddd;
    border-collapse: collapse;
}

/* Add a box shadow to the table */
table {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Tambah Barang button styles */
.tambah-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: rgb(241, 163, 253);
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
    transition: background-color 0.3s ease;
    margin: 0 auto;
}

.tambah-button:hover {
    background-color: rgb(241, 163, 253);
}

    </style>

    
<body>
    <div class="container">
        <h1>Tambah Barang</h1>
        <div class="main">
            
            <form method="post" action="tambah.php" enctype="multipart/form-data">
                <div class="input">
                    <label>Nama Barang</label>
                    <input type="text" name="nama" />
                </div>
                <div class="input">
                    <label>Kategori</label>
                    <select name="kategori">
                        <option value="Komputer">Komputer</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Hand Phone">Hand Phone</option>
                    </select>
                </div>
                <div class="input">
                    <label>Harga Jual</label>
                    <input type="text" name="harga_jual" />
                </div>
                <div class="input">
                    <label>Harga Beli</label>
                    <input type="text" name="harga_beli" />
                </div>
                <div class="input">
                    <label>Stok</label>
                    <input type="text" name="stok" />
                </div>
                <div class="input">
                    <label>File Gambar</label>
                    <input type="file" name="file_gambar" />
                </div>
                <div class="simpan-button">
                    <input type="submit" name="submit" value="Simpan" class="simpan-button" />
                </div>
            </form>
        </div>

    </div>
    <?php
    include('footer.php');
    ?>
</body>
</html>
