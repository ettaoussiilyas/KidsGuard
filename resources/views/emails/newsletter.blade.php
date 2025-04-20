<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .content {
            margin-bottom: 30px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
        .button {
            display: inline-block;
            background-color: #9B59B6;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="KidsGuard" class="logo">
        <h1>KidsGuard Newsletter</h1>
    </div>
    
    <p>Hello {{ $recipientName }},</p>
    
    <div class="content">
        {!! $content !!}
    </div>
    
    <div class="footer">
        <p>© {{ date('Y') }} KidsGuard. All rights reserved.</p>
        <p>
            If you no longer wish to receive these emails, you can 
            <a href="{{ route('newsletter.subscription') }}">unsubscribe here</a>.
        </p>
    </div>
</body>
</html>