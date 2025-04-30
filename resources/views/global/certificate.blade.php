<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        @page {
            size: letter landscape;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
            background-color: #f2f2f2;
        }

        .certificate-border {
            padding: 40px;
            border: 15px solid #2c89c9;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            background: white;
            position: relative;
            overflow: hidden; /* Prevent overflow */
        }

        .certificate {
            border: 4px double #aaa;
            padding: 40px 30px;
            text-align: center;
            height: 100%;
            position: relative;
            box-sizing: border-box;
            overflow: hidden; /* Prevent overflow */
        }

        .logo {
            max-height: 60px;
            margin-bottom: 20px;
        }

        .certificate-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #1c1c1c;
        }

        .subtitle {
            font-size: 20px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 40px;
            color: #6a6a6a;
        }

        .student-name {
            font-size: 26px;
            font-weight: bold;
            color: #000;
            border-bottom: 1px solid #ccc;
            display: inline-block;
            padding: 5px 20px;
            margin-bottom: 10px;
        }

        .description {
            font-size: 16px;
            margin: 20px auto;
            max-width: 70%;
            color: #555;
        }

        .course-skill {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }

        .footer-section {
            position: absolute;
            bottom: 40px;
            left: 40px;
            right: 40px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #444;
        }

        .footer-date {
            text-align: left;
        }

        .signature {
            text-align: right;
        }

        .signature img {
            height: 50px;
        }

        .certificate-id {
            position: absolute;
            top: 25px;
            right: 35px;
            font-size: 12px;
            color: #999;
        }

        .certificate {
            max-height: 95vh;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="certificate-border">
    <div class="certificate-id">ID: {{ strtoupper(Str::random(10)) }}</div>
    <div class="certificate">
        @if($logo)
            <img src="{{ public_path('storage/' . $logo) }}" class="logo">
        @endif

        <div class="certificate-title">{{ $title }}</div>
        <div class="subtitle">Certificate</div>

        <p>This is to certify that</p>

        <div class="student-name">{{ $student }}</div>

        <p>has successfully completed the course</p>
        <div class="course-skill">{{ $course->title }}</div>

        <div class="description">{{ $description }}</div>

        <div class="footer-section">
            <div class="footer-date">
                {{ $date }}<br>
                <small>Date</small>
            </div>
            <div class="signature">
                <img src="{{ public_path('images/signature.png') }}" alt="Signature"><br>
                <strong>UpCours Team</strong><br>
                <small>{{ $footer }}</small>
            </div>
        </div>
    </div>
</div>
</body>
</html>
