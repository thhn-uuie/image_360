<?php

namespace common\helper;

use Yii;
class QRCodeHelper {
    public static function generateQRCode($data, $size = 4, $margin = 2) {
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'image/png');
        \QRCode::png($data, false, QR_ECLEVEL_L,$size,$margin);
    }
}