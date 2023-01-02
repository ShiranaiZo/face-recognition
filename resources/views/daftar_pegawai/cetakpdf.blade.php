<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cetak QR Code Pegawai</title>
</head>

<body style="background-color:#ffffff;text-align: center;">
    <img width="50%" src="data:image/svg;base64, {!! base64_encode(QrCode::format('svg')->size(100)->generate($pegawai->qrcode_p)) !!} ">
</body>
</html>
