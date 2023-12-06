# Lab10Web
```
Febriyani Nurhida
312210222
TI.22.A2
```

# Praktikum 10: PHP OOP

## Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buat folder baru dengan nama lab10_php_oop pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

## Langkah-langkah Praktikum
jalankan MySql server dari XXAMPP
![img](ss/ss2.png
)
Buat file baru dengan nama mobil.php
```
<?php
/**
* Program sederhana pendefinisian class dan pemanggilan class.
**/
class Mobil
{
private $warna;
private $merk;
private $harga;
public function __construct()
{
$this->warna = "Biru";
$this->merk = "BMW";
$this->harga = "10000000";
}
public function gantiWarna ($warnaBaru)
{
$this->warna = $warnaBaru;
}
public function tampilWarna ()
{
echo "Warna mobilnya : " . $this->warna;
}
}
// membuat objek mobil
$a = new Mobil();
$b = new Mobil();
// memanggil objek
echo "<b>Mobil pertama</b><br>";
$a->tampilWarna();
echo "<br>Mobil pertama ganti warna<br>";
$a->gantiWarna("Merah");

$a->tampilWarna();
// memanggil objek
echo "<br><b>Mobil kedua</b><br>";
$b->gantiWarna("Hijau");
$b->tampilWarna();
?>
```
![img](ss/ss1.png)

outputnya:
![img](ss/ss3.png)


## Class Library
Class library merupakan pustaka kode program yang dapat digunakan bersama pada beberapa file yang berbeda (konsep modularisasi). Class library menyimpan fungsi-fungsi atau class object komponen untuk memudahkan dalam proses development aplikasi.

Contoh class library untuk membuat form.

Buat file baru dengan nama form.php
```
<?php
/**
* Nama Class: Form
* Deskripsi: CLass untuk membuat form inputan text sederhan
**/
class Form
{
private $fields = array();
private $action;
private $submit = "Submit Form";
private $jumField = 0;
public function __construct($action, $submit)
{
$this->action = $action;
$this->submit = $submit;
}
public function displayForm()
{
echo "<form action='".$this->action."' method='POST'>";
echo '<table width="100%" border="0">';
for ($j=0; $j<count($this->fields); $j++) {
echo "<tr><td
align='right'>".$this->fields[$j]['label']."</td>";
echo "<td><input type='text'
name='".$this->fields[$j]['name']."'></td></tr>";
}
echo "<tr><td colspan='2'>";
echo "<input type='submit' value='".$this->submit."'></td></tr>";
echo "</table>";
}
public function addField($name, $label)
{
$this->fields [$this->jumField]['name'] = $name;
$this->fields [$this->jumField]['label'] = $label;
$this->jumField ++;

}
}
?>
```
![img](ss/ss4.png)


File tersebut tidak dapat dieksekusi langsung, karena hanya berisi deklarasi class. Untuk menggunakannya perlu dilakukan include pada file lain yang akan
menjalankan dan harus dibuat instance object terlebih dulu.
Contoh implementasi pemanggilan class library form.php
Buat file baru dengan nama form_input.php

```
<?php
/**
* Program memanfaatkan Program 10.2 untuk membuat form inputan sederhana.
**/
include "form.php";
echo "<html><head><title>Mahasiswa</title></head><body>";
$form = new Form("","Input Form");
$form->addField("txtnim", "Nim");
$form->addField("txtnama", "Nama");
$form->addField("txtalamat", "Alamat");
echo "<h3>Silahkan isi form berikut ini :</h3>";
$form->displayForm();
echo "</body></html>";
?>
```
![img](ss/ss5.png)

outputnya :
![img](ss/ss6.png)


Contoh lainnya untuk database connection dan query Buat file dengan nama database.php
```
<?php
class Database {
protected $host;
protected $user;
protected $password;
protected $db_name;
protected $conn;
public function __construct() {
$this->getConfig();
$this->conn = new mysqli($this->host, $this->user, $this->password,
$this->db_name);
if ($this->conn->connect_error) {
die("Connection failed: " . $this->conn->connect_error);
}
}
private function getConfig() {
include_once("config.php");
$this->host = $config['host'];
$this->user = $config['username'];
$this->password = $config['password'];

$this->db_name = $config['db_name'];
}
public function query($sql) {
return $this->conn->query($sql);
}
public function get($table, $where=null) {
if ($where) {
$where = " WHERE ".$where;
}
$sql = "SELECT * FROM ".$table.$where;
$sql = $this->conn->query($sql);
$sql = $sql->fetch_assoc();
return $sql;
}
public function insert($table, $data) {
if (is_array($data)) {
foreach($data as $key => $val) {
$column[] = $key;
$value[] = "'{$val}'";
}
$columns = implode(",", $column);
$values = implode(",", $value);
}
$sql = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
$sql = $this->conn->query($sql);
if ($sql == true) {
return $sql;
} else {
return false;
}
}
public function update($table, $data, $where) {
$update_value = "";
if (is_array($data)) {
foreach($data as $key => $val) {
$update_value[] = "$key='{$val}'"
}
$update_value = implode(",", $update_value);
}
$sql = "UPDATE ".$table." SET ".$update_value." WHERE ".$where;
$sql = $this->conn->query($sql);
if ($sql == true) {
return true;
} else {

return false;
}
}
public function delete($table, $filter) {
$sql = "DELETE FROM ".$table." ".$filter;
$sql = $this->conn->query($sql);
if ($sql == true) {
return true;
} else {
return false;
}
}
}
?>
```
![img](ss/ss7.png)

## Pertanyaan dan Tugas
Implementasikan konsep modularisasi pada kode program pada praktukum sebelumnya dengan menggunakan class library untuk form dan database connection.
1. Buat folder baru dengan nama lab10_php_praktikum

2. Setelah itu buat beberapa file sama seperti file-file yang ada pada praktikum 9 hanya saja ditambah dengan file database.php, untuk script lebih lengkapnya kalian dapat langsung lihat pada folder lab10_php_praktikum.

3. Hasil Output index.php:
![img](ss/ss8.png)

4. Hasil Output tambah.php:
![img](ss/ss9.png)

![img](ss/ss10.png)

5. Hasil Output ubah.php :
![img](ss/ss11.png)

![img](ss/ss12.png)

6. Hasil Output hapus.php :
![img](ss/ss13.png)

### Sekian Dan Terima Kasih :)







