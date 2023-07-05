<?php
use PhpQrcode\QRcode;
require_once 'phpqrcode/qrlib.php';
$url = '../../../../uploads/';
$qrcode = $path.time().".png";
QRcode::png('https://www.google.com/');
//echo "<img src='".$qrcode."'>";

