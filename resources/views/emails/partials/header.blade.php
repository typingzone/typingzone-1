<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f9f9f9; }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            padding: 20px;
            text-align: center;
        }
        .email-header h1 {
            font-size: 28px;
            color: #ffffff;
            margin: 0;
        }
        .email-logo {
            max-width: 150px;
        }
        @media (max-width: 600px) {
            .email-header h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="{{ $companyLogo }}" alt="Logo" class="email-logo">
        </div>
