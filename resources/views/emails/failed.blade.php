<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode OTP Anda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #333333;
        }
        .content {
            text-align: center;
        }
        .content p {
            font-size: 16px;
            color: #666666;
        }
        .otp {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            font-size: 24px;
            letter-spacing: 4px;
            border-radius: 5px;
            background-color: red;
            color: #ffffff;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            font-size: 14px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Verification</h1>
        </div>
        <div class="content">
            <p>Halo,</p>
            <p>Kami menginformasikan bahwa</p>
            <div class="otp">{{ $code }}</div>
        </div>
        <div class="footer">
            <p>Jika Anda tidak merasa mendaftar Anda dapat mengabaikan email ini.</p>
            <p>Terima kasih</p>
        </div>
    </div>
</body>
</html>
