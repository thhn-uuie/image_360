<head>
    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">
</head>
<div class="slider_container">
    <div class="row">
        <div class="col-md-3">
            <div class="detail-box">
                <hf style="line-height: 1.5cm; font-size: 23px"> Khám phá thế giới xung quanh một cách toàn diện qua những hình ảnh 360 độ sống động.</hf>
                <br>
                <a href="">
                    Liên hệ
                </a>
            </div>
        </div>
        <div class="col-md-9 ">
            <style>
                #panorama {
                    width: 100%;
                    height: 393px;
                }
            </style>
            <div id="panorama">
            </div>
            <script>
                pannellum.viewer('panorama', {
                    "type": "equirectangular",
                    "panorama": "https://pannellum.org/images/cerro-toco-0.jpg",
                    "autoRotate": -5,
                    "autoLoad": true
                });
            </script>
        </div>
    </div>
</div>