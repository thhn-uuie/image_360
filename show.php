

<!DOCTYPE html>
<html>
<head>
    <title>Generate QR Code</title>
    <meta charset="UTF-8">
</head>
<body class="bg">
    <div class="container" id="panel">
        <br><br><br>
        <div class="row">
            <div class="col-md-6 offset-md-3" style="background-color: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
                <div class="panel-heading">
                    <h1>Generate QR code</h1>
                </div>
                <hr>
                <div id="qrbox" style="text-align: center;">
                    <img src="generate.php?text=<?php echo $_GET['text']?>" alt="">
                </div>
                <hr>
                <a href="form.php">Generate One More</a>
            </div>
        </div>
    </div>
</body>
</html>