<?php
$mod = isset($_REQUEST['mod']) ? $_REQUEST['mod'] : 'default';
switch ($mod) {
  case "data_barang":
    require("index.php");
    break;
  case "index":
    require("index.php");
    break;
  case "about":
    require("about.php");
    break;
  case "form_input":
    require("form_input.php");
    break;
  case "contact":
    require("contact.php");
    break;
  case "data":
    require("data.php");
    break;
  default;
    require("index1.php");
}
