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

$a = new Mobil();
$b = new Mobil();

echo "<b>Mobil pertama</b><br>";

$a->tampilWarna();

echo "<b><br>Mobil pertama ganti warna</b><br>";

$a->gantiWarna("Merah");

$a->tampilWarna();

echo "<br><b>Mobil kedua</b><br>";

$b->gantiWarna("Hijau");

$b->tampilWarna();
?>