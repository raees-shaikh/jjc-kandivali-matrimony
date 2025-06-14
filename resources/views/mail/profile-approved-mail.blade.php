<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <title>{{ config('app.name') }}</title>
    {{-- <link
        href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700"
        rel="stylesheet" media="screen"> --}}

    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">

    <style>
        @import url('https://fonts.cdnfonts.com/css/poppins');

        body {
            background: #E2E4F8 !important;
        }

        p {

            font-family: 'Poppins', sans-serif;
        }

        .bg-white {
            background: white !important;
        }

        .bg-lightblue {
            background: #E2E4F8 !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-blue {
            color: #2D358B !important;
        }

        .rounded-border {
            border-radius: 10px !important;
            padding: 10px !important;
        }

        .text-w-700 {
            font-weight: 700 !important;
        }

        .font-size-1-4 {
            font-size: 1.2rem !important;
        }

        p {
            font-size: 1.1rem !important;
            margin-top: 8px !important;
            margin: 8px !important;
        }

        .card {
            height: auto;
            width: 100%;
            max-width: 350px;
            background: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.2);
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 9px;
            margin: 10px auto;
        }

        .inner {
            height: auto;
            background: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 9px;
            margin: 10px 10px;
            text-align: center;
            padding: 1rem 0;
        }

        .img {
            /* margin: 30px 80px 20px 80px; */
        }

        .text-center {
            text-align: center;
        }

        p.text-center {
            color: #000000;

            opacity: 0.8;
            padding: 0px 20px;
        }

        .cust-text {
            color: #55595F;
            font-size: 1rem !important;
            opacity: 0.7;
            text-align: center;
            padding: 5px 40px;
        }
    </style>
</head>

<body
    style="width: 100%; padding: 0; word-break: break-word; -webkit-font-smoothing: antialiased; background-color: #ffffff;">
    <div style="max-width:600px;margin:auto;background:#E2E4F8;padding:1.5em;font-family:sans-serif">

        <div class="rounded-border ">
            <img style="max-width: 350px;width:100%;display:block;margin:auto"
                src="{{ url('frontend/image/logo.png') }}" alt="">
        </div>


        <div class="card">
            <div class="inner">
                <img src="frontend/image/pink-new-bell.png" alt="" class="img">
                <p class="text-center">Hey {{$user->full_name}}! Your Profile has been Approved</p>
            </div>
        </div>

    </div>
    <p class="text-center" style="font-size:0.9rem !important;"><small>©</small> {{ now()->format('Y') }} All Rights Reserved
        {{ config('app.name') }} | Designed & Developed by
        <a href="http://acetrot.com" target="_blank">Acetrot<img src="{{ url('frontend/image/acetrot.png') }}"
                style="vertical-align: middle;" width="20" alt="">

        </a>
    </p>
    </div>
</body>

</html>
