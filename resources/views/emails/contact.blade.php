<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru dari Portofolio</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333333;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #e1e8ed;
        }
        .email-header {
            background-color: #0b132b;
            color: #ffffff;
            padding: 24px 30px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .email-body {
            padding: 30px;
        }
        .info-row {
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #edf2f7;
        }
        .info-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: #8d99ae;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .info-value {
            font-size: 15px;
            color: #1d2d44;
            font-weight: 500;
        }
        .info-value a {
            color: #2563eb;
            text-decoration: none;
        }
        .message-box {
            background-color: #f8fafc;
            border-left: 4px solid #c59b27;
            padding: 16px 20px;
            border-radius: 4px;
            margin-top: 20px;
        }
        .message-text {
            font-size: 14px;
            line-height: 1.6;
            color: #2b2d42;
            white-space: pre-line;
        }
        .email-footer {
            background-color: #f1f5f9;
            padding: 16px 30px;
            text-align: center;
            font-size: 12px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Pesan Baru dari Portofolio Web</h1>
        </div>
        <div class="email-body">
            <div class="info-row">
                <div class="info-label">Nama Pengirim</div>
                <div class="info-value">{{ $senderName }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Email Pengirim</div>
                <div class="info-value">
                    <a href="mailto:{{ $senderEmail }}">{{ $senderEmail }}</a>
                </div>
            </div>
            <div class="info-row" style="border-bottom: none; margin-bottom: 0;">
                <div class="info-label">Pesan</div>
                <div class="message-box">
                    <div class="message-text">{{ $messageContent }}</div>
                </div>
            </div>
        </div>
        <div class="email-footer">
            Pesan ini dikirim secara otomatis melalui formulir kontak di website Portofolio Anda.
        </div>
    </div>
</body>
</html>
