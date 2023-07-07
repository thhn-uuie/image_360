<?php
require_once 'vendor/autoload.php';
use Endroid\QrCode\QrCode;

// Tạo đối tượng QrCode mới
$qrCode = new QrCode('Hello, world!');

// Hiển thị mã QR
header('Content-Type: '.$qrCode->getContentTypeWithoutImageCreate());
echo $qrCode->writeString();