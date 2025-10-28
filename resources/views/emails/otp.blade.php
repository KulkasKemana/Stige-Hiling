<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset OTP</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f5f7;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 24px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background: linear-gradient(135deg, #ff914d, #ff7a1a);
            padding: 40px 30px;
            text-align: center;
        }
        .logo-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        .logo {
            width: 50px;
            height: 50px;
            background-color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .brand-name {
            color: white;
            font-size: 18px;
            font-weight: 700;
            text-align: left;
            line-height: 1.3;
        }
        .email-title {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }
        .email-body {
            padding: 40px 30px;
            text-align: center;
        }
        .message {
            color: #374151;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .otp-container {
            background-color: #f9fafb;
            border: 2px dashed #d1d5db;
            border-radius: 16px;
            padding: 30px;
            margin: 30px 0;
        }
        .otp-label {
            color: #6b7280;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }
        .otp-code {
            font-size: 48px;
            font-weight: 700;
            color: #ff914d;
            letter-spacing: 8px;
            margin: 15px 0;
        }
        .otp-expiry {
            color: #9ca3af;
            font-size: 13px;
            margin-top: 15px;
        }
        .warning-box {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 16px;
            margin: 30px 0;
            border-radius: 8px;
            text-align: left;
        }
        .warning-title {
            color: #92400e;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }
        .warning-text {
            color: #78350f;
            font-size: 13px;
            line-height: 1.5;
            margin: 0;
        }
        .email-footer {
            background-color: #f9fafb;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
        .footer-text {
            color: #6b7280;
            font-size: 13px;
            line-height: 1.6;
            margin: 0 0 15px 0;
        }
        .footer-links {
            margin-top: 20px;
        }
        .footer-link {
            color: #ff914d;
            text-decoration: none;
            font-size: 13px;
            margin: 0 10px;
        }
        .footer-link:hover {
            text-decoration: underline;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 20px;
            }
            .email-header, .email-body, .email-footer {
                padding: 30px 20px;
            }
            .otp-code {
                font-size: 36px;
                letter-spacing: 6px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="logo-section">
                <div class="logo">✈️</div>
                <div class="brand-name">
                    Healing<br>Tour And Travel
                </div>
            </div>
            <h1 class="email-title">Password Reset</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p class="message">
                Hello!<br><br>
                We received a request to reset your password for your Healing Tour and Travel account.
                Use the verification code below to complete the password reset process:
            </p>

            <!-- OTP Code -->
            <div class="otp-container">
                <div class="otp-label">Your Verification Code</div>
                <div class="otp-code">{{ $otp }}</div>
                <div class="otp-expiry">⏰ This code will expire in 10 minutes</div>
            </div>

            <p class="message">
                Enter this code on the verification page to proceed with resetting your password.
            </p>

            <!-- Warning -->
            <div class="warning-box">
                <div class="warning-title">🔒 Security Notice</div>
                <p class="warning-text">
                    If you didn't request a password reset, please ignore this email or contact our support team immediately. 
                    Your account is still secure, and no changes have been made.
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p class="footer-text">
                This is an automated email. Please do not reply to this message.<br>
                © {{ date('Y') }} Healing Tour and Travel. All rights reserved.
            </p>
            <div class="footer-links">
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Service</a>
                <a href="#" class="footer-link">Contact Us</a>
            </div>
        </div>
    </div>
</body>
</html>