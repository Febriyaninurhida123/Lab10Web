<!-- Program memanfaatkan Program 5.2 untuk membuat form inputan sederhana. -->
<?php
include "database.php";
$database = new database();

if (isset($_POST['submit'])) {
  $data = [
    'Nim' => $_POST['txtNim'],
    'Nama' => $_POST['txtNama'],
    'Kelas' => $_POST['txtKelas'],
    'Status' => $_POST['txtStatus'],
    'Alamat' => $_POST['txtAlamat'],
    'Nomer' => $_POST['txtNomer']
  ];
  $database->insert('tb_latihan', $data);
  // Menampilkan notifikasi jika data berhasil disimpan
  echo "<script>alert('Data berhasil disimpan')</script>";
}
?>
<html>

<head>
  <title>Identitas Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="form-container">
    <h2 style="margin-left: 80px;">Silahkan isi form berikut ini</h2>
    <?php
    include "form.php";
    $form = new Form("form_input.php", "submit");
    $form->addField("txtNim", "Nim", "form-input");
    $form->addField("txtNama", "Nama", "form-input");
    $form->addField("txtKelas", "Kelas", "form-input");
    $form->addField("txtStatus", "Status", "form-input");
    $form->addField("txtAlamat", "Alamat", "form-input");
    $form->addField("txtNomer", "Nomer", "form-input");
    $form->displayForm();
    ?>
  </div>
</body>

</html>