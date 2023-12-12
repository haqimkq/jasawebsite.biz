{{-- <!DOCTYPE html>
<html>

<head>
    <title>Email</title>
    <script src="https://kit.fontawesome.com/a6c5beee0a.js" crossorigin="anonymous"></script>
</head>

<body style="margin-top: 8px;">

    <main style="margin-top: 8px;">
        <div style="background-color: white; padding: 20px;">
            <div style="border: 1px solid #606060; margin-left: 20px; margin-right: 20px; border-radius: 8px;">
                <div
                    style="display: flex; justify-content: center; padding-top: 5px; padding-bottom: 5px; background-color: #111827; border-start-end-radius: 8px; border-start-start-radius: 8px;">
                    <img src="https://jasawebsite.biz/wp-content/uploads/2021/08/New-Project.png" width="180"
                        alt="">
                </div>
                <div style="padding: 10px;">
                    <h2 style="margin: 0; color: black;">Hi Jasawebsite.biz</h2>
                    <h2
                        style="font-weight: 800; text-transform: capitalize; font-size: 1.5rem; color: black; line-height:2px">
                        Saya
                        <span style="font-size: 1.5rem;">{{ $data['name'] }}</span>,
                        mengirim pesan untuk anda
                    </h2>
                    <textarea style="width: 100%; margin-top: 3px; border-radius: 8px;" cols="30" rows="10" disabled> {{ $data['message'] }}</textarea>
                    <div style="display: flex;">
                        <h2 style="align-self: center; margin-right: 3px; color: black;">Balas pesan saya ke</h2>
                        <a href="wa.me/{{ $data['email'] }}" style="text-decoration: none;">
                            <div
                                style="padding-left: 2px; padding-right:2px; border-radius: 24px; background-color: #16a34a
                                ;">
                                <div
                                    style="color: white;gap: 0.75rem; padding-left: 0.75rem; padding-right: 0.75rem; align-items: center">
                                    <h2 style="flex-auto;">{{ $data['email'] }}
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>




</html> --}}

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <script src="https://kit.fontawesome.com/a6c5beee0a.js" crossorigin="anonymous"></script>
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

        /* Base */

        body,
        body *:not(html):not(style):not(br):not(tr):not(code) {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
                'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            position: relative;
        }

        body {
            -webkit-text-size-adjust: none;
            background-color: #ffffff;
            color: white;
            height: 100%;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        p,
        ul,
        ol,
        blockquote {
            line-height: 1.4;
            text-align: left;
        }

        a {
            color: #3869d4;
        }

        a img {
            border: none;
        }

        /* Typography */

        h1 {
            color: white;
            font-size: 18px;
            font-weight: bold;
            margin-top: 0;
            text-align: left;
        }

        h2 {
            font-size: 16px;
            font-weight: bold;
            margin-top: 0;
            text-align: left;
        }

        h3 {
            font-size: 14px;
            font-weight: bold;
            margin-top: 0;
            text-align: left;
        }

        p {
            font-size: 16px;
            line-height: 1.5em;
            margin-top: 0;
            text-align: left;
            color: white !important;
        }

        p.sub {
            font-size: 12px;
        }

        img {
            max-width: 100%;
        }

        /* Layout */

        .wrapper {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            background-color: #edf2f7;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .content {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        /* Header */

        .header {
            padding: 25px 0;
            text-align: center;
        }

        .header a {
            color: #3d4852;
            font-size: 19px;
            font-weight: bold;
            text-decoration: none;
        }

        /* Logo */

        .logo {
            height: 75px;
            max-height: 75px;
            width: 75px;
        }

        /* Body */

        .body {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            background-color: #edf2f7;
            border-bottom: 1px solid #edf2f7;
            border-top: 1px solid #edf2f7;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .inner-body {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 570px;
            background-color: #ffffff;
            border-color: #e8e5ef;
            border-radius: 2px;
            border-width: 1px;
            box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015);
            margin: 0 auto;
            padding: 0;
            width: 570px;
        }

        /* Subcopy */

        .subcopy {
            border-top: 1px solid #e8e5ef;
            margin-top: 25px;
            padding-top: 25px;
        }

        .subcopy p {
            font-size: 14px;
        }

        /* Footer */

        .footer {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 570px;
            margin: 0 auto;
            padding: 0;
            text-align: center;
            width: 570px;
        }

        .footer p {
            color: #b0adc5;
            font-size: 12px;
            text-align: center;
        }

        .footer a {
            color: #b0adc5;
            text-decoration: underline;
        }

        /* Tables */

        .table table {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            margin: 30px auto;
            width: 100%;
        }

        .table th {
            border-bottom: 1px solid #edeff2;
            margin: 0;
            padding-bottom: 8px;
        }

        .table td {
            color: #74787e;
            font-size: 15px;
            line-height: 18px;
            margin: 0;
            padding: 10px 0;
        }

        .content-cell {
            max-width: 100vw;
            padding: 32px;
        }

        /* Buttons */

        .action {
            -premailer-cellpadding: 0;
            -premailer-cellspacing: 0;
            -premailer-width: 100%;
            margin: 30px auto;
            padding: 0;
            text-align: center;
            width: 100%;
        }

        .button {
            -webkit-text-size-adjust: none;
            border-radius: 4px;
            color: #fff;
            display: inline-block;
            overflow: hidden;
            text-decoration: none;
        }

        .button-blue,
        .button-primary {
            background-color: #2d3748;
            border-bottom: 8px solid #2d3748;
            border-left: 18px solid #2d3748;
            border-right: 18px solid #2d3748;
            border-top: 8px solid #2d3748;
        }

        .button-green,
        .button-success {
            background-color: #48bb78;
            border-bottom: 8px solid #48bb78;
            border-left: 18px solid #48bb78;
            border-right: 18px solid #48bb78;
            border-top: 8px solid #48bb78;
        }

        .button-red,
        .button-error {
            background-color: #e53e3e;
            border-bottom: 8px solid #e53e3e;
            border-left: 18px solid #e53e3e;
            border-right: 18px solid #e53e3e;
            border-top: 8px solid #e53e3e;
        }

        /* Panels */

        .panel {
            border-left: #2d3748 solid 4px;
            margin: 21px 0;
        }

        .panel-content {
            background-color: #edf2f7;
            color: #718096;
            padding: 16px;
        }

        .panel-content p {
            color: #718096;
        }

        .panel-item {
            padding: 0;
        }

        .panel-item p:last-of-type {
            margin-bottom: 0;
            padding-bottom: 0;
        }
    </style>
</head>

<body>


    <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation"
        style="background-image: url('https://client.webz.biz/assets/bgmoon.png ')">
        <tr>
            <td class="header">
                <a href="" style="display: inline-block;">
                    <img src="https://client.webz.biz/assets/logo.png" class="logo" style="width: 100%"
                        alt="Laravel Logo">
                </a>
            </td>
        </tr>


        <!-- Email Body -->
        <tr>
            <td class="body" width="100%" cellpadding="0" cellspacing="0"
                style="border: hidden !important; background-color: transparent;color: white">
                <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                    role="presentation" style="background-color: #1e2836f0 ;border-style: solid; border-color: white;">
                    <!-- Body content -->
                    <tr>
                        <td class="content-cell" style="color: white">
                            <h1 style="margin: 0    ;">Hi Jasawebsite.biz</h1>
                            <table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td>
                                        <div style="padding: 10px;">

                                            <h1
                                                style="font-weight: 800; text-transform: capitalize; font-size: 1.5rem  ; line-height:2px">
                                                Saya
                                                <span style="font-size: 1.5rem;">{{ $data['name'] }}</span>
                                            </h1>
                                            <h1>
                                                mengirim pesan untuk anda
                                            </h1>
                                            <textarea style="width: 100%; margin-top: 3px; border-radius: 8px; color: white" cols="30" rows="10" disabled> {{ $data['message'] }}</textarea>
                                            <div style="display: flex;">
                                                <h1 style="align-self: center; margin-right: 3px    ;">Balas
                                                    pesan saya ke</h1>
                                                <a href="wa.me/{{ $data['email'] }}" style="text-decoration: none;">
                                                    <div
                                                        style="padding-left: 2px; padding-right:2px; border-radius: 24px; background-color: #16a34a
                                                        ;">
                                                        <div
                                                            style="color: white;gap: 0.75rem; padding-left: 0.75rem; padding-right: 0.75rem; align-items: center">
                                                            <h1 style="flex-auto;">{{ $data['email'] }}
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="content-cell" align="center">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>

</body>

</html>
