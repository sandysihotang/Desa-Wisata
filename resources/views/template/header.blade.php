<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Desa Wisata {{ config('app.name', 'Desa Wisata') }}</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ $logo->deskripsi }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/style_menu.css') }}" rel="stylesheet">
    <style>
    .link-drop:hover {
        color: #000000;
    }

    .btn-facebook {
        color: #fff;
        /*background-color: #3b5998;*/
        border-color: rgba(0, 0, 0, 0.2);
    }

    .btn-social {
        position: relative;
        padding-left: 40px;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .btn-social:hover {
        color: #eee;
    }

    .btn-social :first-child {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        padding: 7px;
        font-size: 1.6em;
        text-align: center;
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }

    footer .socila-list {
        overflow: hidden;
        margin: 20px 0 10px;
    }

    footer .socila-list li {
        float: left;
        margin-right: 3px;
        /*opacity: 0.7;*/
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    footer .socila-list li:hover {
        opacity: 1;
    }

    .dropbtn {
        /*background-color: #4CAF50;*/
        /*color: white;*/
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #fff0ff;
    }


    .dropdown:hover .dropdown-menu {
        display: block;
        margin: 0;
    }

    .dropdown:hover {
        -webkit-transition-delay: 3s;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .navbar,
    .navbar-brand {
        /*font-size: 20px;*/
        /*text-transform: uppercase;*/
    }

    .navbar,
    .navbar-expand-lg,
    .navbar-light,
    .bg-light {}

    .navbar-light .navbar-nav .nav-link {
        /*color: white;*/
        /*color: black;*/
        color: #358ed7;
    }

    nav {
        font-family: "BentonSans Medium";
    }

    .dropdown-menu {
        text-align: left;
    }

    .navbar-nav,
    .mr-auto {
        margin: auto !important;
        display: flex;
        justify-content: space-between;
    }

    .nav__link {
        color: #F7F7F7 !important;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <!--    <link href="/css" rel="stylesheet">-->
    <link href="/css/blog.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quasar@1.14.3/dist/quasar.min.css" rel="stylesheet" type="text/css">
</head>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <header class="container py-3">
                    <div class="row flex-nowrap justify-content-between align-items-center">
                        <div class="col pt-1">
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <a
                                            href="{{ $socialInstagram->link == null || $socialInstagram->link == '' ? '#' : $socialInstagram->link }}">
                                            <svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 64 64" width="256px" height="256px">
                                                <radialGradient id="TGwjmZMm2W~B4yrgup6jda" cx="32" cy="32.5" r="31.259"
                                                    gradientTransform="matrix(1 0 0 -1 0 64)"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop offset="0" stop-color="#efdcb1" />
                                                    <stop offset="0" stop-color="#f2e0bb" />
                                                    <stop offset=".011" stop-color="#f2e0bc" />
                                                    <stop offset=".362" stop-color="#f9edd2" />
                                                    <stop offset=".699" stop-color="#fef4df" />
                                                    <stop offset="1" stop-color="#fff7e4" />
                                                </radialGradient>
                                                <path fill="url(#TGwjmZMm2W~B4yrgup6jda)"
                                                    d="M58,54c-1.1,0-2-0.9-2-2s0.9-2,2-2h2.5c1.9,0,3.5-1.6,3.5-3.5S62.4,43,60.5,43H50c-1.4,0-2.5-1.1-2.5-2.5	S48.6,38,50,38h8c1.7,0,3-1.3,3-3s-1.3-3-3-3H42v-6h18c2.3,0,4.2-2,4-4.4c-0.2-2.1-2.1-3.6-4.2-3.6H58c-1.1,0-2-0.9-2-2s0.9-2,2-2	h0.4c1.3,0,2.5-0.9,2.6-2.2c0.2-1.5-1-2.8-2.5-2.8h-14C43.7,9,43,8.3,43,7.5S43.7,6,44.5,6h3.9c1.3,0,2.5-0.9,2.6-2.2	C51.1,2.3,50,1,48.5,1H15.6c-1.3,0-2.5,0.9-2.6,2.2C12.9,4.7,14,6,15.5,6H19c1.1,0,2,0.9,2,2s-0.9,2-2,2H6.2c-2.1,0-4,1.5-4.2,3.6	C1.8,16,3.7,18,6,18h2.5c1.9,0,3.5,1.6,3.5,3.5S10.4,25,8.5,25H5.2c-2.1,0-4,1.5-4.2,3.6C0.8,31,2.7,33,5,33h17v11H6	c-1.7,0-3,1.3-3,3s1.3,3,3,3l0,0c1.1,0,2,0.9,2,2s-0.9,2-2,2H4.2c-2.1,0-4,1.5-4.2,3.6C-0.2,60,1.7,62,4,62h53.8	c2.1,0,4-1.5,4.2-3.6C62.2,56,60.3,54,58,54z" />
                                                <radialGradient id="TGwjmZMm2W~B4yrgup6jdb" cx="18.51" cy="66.293"
                                                    r="69.648"
                                                    gradientTransform="matrix(.6435 -.7654 .5056 .4251 -26.92 52.282)"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop offset=".073" stop-color="#eacc7b" />
                                                    <stop offset=".184" stop-color="#ecaa59" />
                                                    <stop offset=".307" stop-color="#ef802e" />
                                                    <stop offset=".358" stop-color="#ef6d3a" />
                                                    <stop offset=".46" stop-color="#f04b50" />
                                                    <stop offset=".516" stop-color="#f03e58" />
                                                    <stop offset=".689" stop-color="#db359e" />
                                                    <stop offset=".724" stop-color="#ce37a4" />
                                                    <stop offset=".789" stop-color="#ac3cb4" />
                                                    <stop offset=".877" stop-color="#7544cf" />
                                                    <stop offset=".98" stop-color="#2b4ff2" />
                                                </radialGradient>
                                                <path fill="url(#TGwjmZMm2W~B4yrgup6jdb)"
                                                    d="M45,57H19c-5.5,0-10-4.5-10-10V21c0-5.5,4.5-10,10-10h26c5.5,0,10,4.5,10,10v26C55,52.5,50.5,57,45,57z" />
                                                <path fill="#fff"
                                                    d="M32,20c4.6,0,5.1,0,6.9,0.1c1.7,0.1,2.6,0.4,3.2,0.6c0.8,0.3,1.4,0.7,2,1.3c0.6,0.6,1,1.2,1.3,2 c0.2,0.6,0.5,1.5,0.6,3.2C46,28.9,46,29.4,46,34s0,5.1-0.1,6.9c-0.1,1.7-0.4,2.6-0.6,3.2c-0.3,0.8-0.7,1.4-1.3,2 c-0.6,0.6-1.2,1-2,1.3c-0.6,0.2-1.5,0.5-3.2,0.6C37.1,48,36.6,48,32,48s-5.1,0-6.9-0.1c-1.7-0.1-2.6-0.4-3.2-0.6 c-0.8-0.3-1.4-0.7-2-1.3c-0.6-0.6-1-1.2-1.3-2c-0.2-0.6-0.5-1.5-0.6-3.2C18,39.1,18,38.6,18,34s0-5.1,0.1-6.9 c0.1-1.7,0.4-2.6,0.6-3.2c0.3-0.8,0.7-1.4,1.3-2c0.6-0.6,1.2-1,2-1.3c0.6-0.2,1.5-0.5,3.2-0.6C26.9,20,27.4,20,32,20 M32,17 c-4.6,0-5.2,0-7,0.1c-1.8,0.1-3,0.4-4.1,0.8c-1.1,0.4-2.1,1-3,2s-1.5,1.9-2,3c-0.4,1.1-0.7,2.3-0.8,4.1C15,28.8,15,29.4,15,34 s0,5.2,0.1,7c0.1,1.8,0.4,3,0.8,4.1c0.4,1.1,1,2.1,2,3c0.9,0.9,1.9,1.5,3,2c1.1,0.4,2.3,0.7,4.1,0.8c1.8,0.1,2.4,0.1,7,0.1 s5.2,0,7-0.1c1.8-0.1,3-0.4,4.1-0.8c1.1-0.4,2.1-1,3-2c0.9-0.9,1.5-1.9,2-3c0.4-1.1,0.7-2.3,0.8-4.1c0.1-1.8,0.1-2.4,0.1-7 s0-5.2-0.1-7c-0.1-1.8-0.4-3-0.8-4.1c-0.4-1.1-1-2.1-2-3s-1.9-1.5-3-2c-1.1-0.4-2.3-0.7-4.1-0.8C37.2,17,36.6,17,32,17L32,17z" />
                                                <path fill="#fff"
                                                    d="M32,25c-5,0-9,4-9,9s4,9,9,9s9-4,9-9S37,25,32,25z M32,40c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6S35.3,40,32,40 z" />
                                                <circle cx="41" cy="25" r="2" fill="#fff" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <a
                                            href="{{ $socialFacebook->link == null || $socialFacebook->link == '' ? '#' : $socialFacebook->link }}">
                                            <svg height="25px" width="25px" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 64 64" width="512px" height="512px">
                                                <radialGradient id="nT5WH7nXAOiS46rXmee3Oa" cx="33.34" cy="27.936"
                                                    r="43.888" gradientTransform="matrix(1 0 0 -1 0 66)"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop offset="0" stop-color="#f4e9c3" />
                                                    <stop offset=".219" stop-color="#f8eecd" />
                                                    <stop offset=".644" stop-color="#fdf4dc" />
                                                    <stop offset="1" stop-color="#fff6e1" />
                                                </radialGradient>
                                                <path fill="url(#nT5WH7nXAOiS46rXmee3Oa)"
                                                    d="M51.03,37.34c0.16,0.98,1.08,1.66,2.08,1.66h5.39c2.63,0,4.75,2.28,4.48,4.96	C62.74,46.3,60.64,48,58.29,48H49c-1.22,0-2.18,1.08-1.97,2.34c0.16,0.98,1.08,1.66,2.08,1.66h8.39c1.24,0,2.37,0.5,3.18,1.32	C61.5,54.13,62,55.26,62,56.5c0,2.49-2.01,4.5-4.5,4.5h-49c-1.52,0-2.9-0.62-3.89-1.61C3.62,58.4,3,57.02,3,55.5	C3,52.46,5.46,50,8.5,50H14c1.22,0,2.18-1.08,1.97-2.34C15.81,46.68,14.89,44,13.89,44H5.5c-2.63,0-4.75-2.28-4.48-4.96	C1.26,36.7,3.36,35,5.71,35H8c1.71,0,3.09-1.43,3-3.16C10.91,30.22,9.45,29,7.83,29H4.5c-2.63,0-4.75-2.28-4.48-4.96	C0.26,21.7,2.37,20,4.71,20H20c0.83,0,1.58-0.34,2.12-0.88C22.66,18.58,23,17.83,23,17c0-1.66-1.34-3-3-3h-1.18	c-0.62-0.09-1.43,0-2.32,0h-9c-1.52,0-2.9-0.62-3.89-1.61S2,10.02,2,8.5C2,5.46,4.46,3,7.5,3h49c3.21,0,5.8,2.79,5.47,6.06	C61.68,11.92,60.11,14,57.24,14H52c-2.76,0-5,2.24-5,5c0,1.38,0.56,2.63,1.46,3.54C49.37,23.44,50.62,24,52,24h6.5	c3.21,0,5.8,2.79,5.47,6.06C63.68,32.92,61.11,35,58.24,35H53C51.78,35,50.82,36.08,51.03,37.34z" />
                                                <linearGradient id="nT5WH7nXAOiS46rXmee3Ob" x1="32" x2="32" y1="-3.34"
                                                    y2="59.223" gradientTransform="matrix(1 0 0 -1 0 66)"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop offset="0" stop-color="#155cde" />
                                                    <stop offset=".278" stop-color="#1f7fe5" />
                                                    <stop offset=".569" stop-color="#279ceb" />
                                                    <stop offset=".82" stop-color="#2cafef" />
                                                    <stop offset="1" stop-color="#2eb5f0" />
                                                </linearGradient>
                                                <path fill="url(#nT5WH7nXAOiS46rXmee3Ob)"
                                                    d="M58,32c0,13.35-10.05,24.34-23,25.83C34.02,57.94,33.01,58,32,58c-1.71,0-3.38-0.17-5-0.49	C15.03,55.19,6,44.65,6,32C6,17.64,17.64,6,32,6S58,17.64,58,32z" />
                                                <path fill="#fff"
                                                    d="M42.8,36.05l-0.76,2C41.6,39.22,40.46,40,39.19,40H35v17.83C34.02,57.94,33.01,58,32,58	c-1.71,0-3.38-0.17-5-0.49V40h-2.95C22.36,40,21,38.66,21,37v-2c0-1.66,1.36-3,3.05-3H27v-6c0-5.51,4.49-10,10-10h3	c2.21,0,4,1.79,4,4s-1.79,4-4,4h-3c-1.1,0-2,0.9-2,2v6h4.95C42.08,32,43.55,34.09,42.8,36.05z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <a
                                            href="{{ $socialTwitter->link == null || $socialTwitter->link == '' ? '#' : $socialTwitter->link }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="25px"
                                                height="25px">
                                                <radialGradient id="xW1rhakWxHfCsuNDi~7SWa" cx="32" cy="33" r="29.606"
                                                    gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                                                    <stop offset="0" stop-color="#c5f1ff" />
                                                    <stop offset=".35" stop-color="#cdf3ff" />
                                                    <stop offset=".907" stop-color="#e4faff" />
                                                    <stop offset="1" stop-color="#e9fbff" />
                                                </radialGradient>
                                                <path fill="url(#xW1rhakWxHfCsuNDi~7SWa)"
                                                    d="M10.5,60h41c2.485,0,4.5-2.015,4.5-4.5v0c0-2.485-2.015-4.5-4.5-4.5h-0.393 c-0.996,0-1.92-0.681-2.08-1.664C48.824,48.083,49.785,47,51,47l5.288,0c2.347,0,4.453-1.704,4.689-4.039 C61.247,40.282,59.127,38,56.5,38l-3.393,0c-0.996,0-1.92-0.681-2.08-1.664C50.824,35.083,51.785,34,53,34l5.241,0 c2.868,0,5.442-2.082,5.731-4.936C64.303,25.789,61.711,23,58.5,23l-12.33,0c-1.624,0-3.081-1.216-3.166-2.839 C42.914,18.431,44.29,17,46,17l2.241,0c2.868,0,5.442-2.082,5.731-4.936C54.303,8.789,51.711,6,48.5,6l-38,0C7.462,6,5,8.462,5,11.5 v0c0,3.038,2.462,5.5,5.5,5.5H14c1.105,0,2,0.895,2,2v0c0,1.105-0.895,2-2,2l-9.288,0c-2.347,0-4.453,1.704-4.689,4.038 C-0.248,27.718,1.873,30,4.5,30l8.33,0c1.624,0,3.081,1.216,3.166,2.839C16.086,34.569,14.71,36,13,36H7.712 c-2.347,0-4.453,1.704-4.689,4.038C2.753,42.718,4.873,45,7.5,45h6.393c0.996,0,1.92,0.681,2.08,1.664 C16.176,47.917,15.215,49,14,49l-3.5,0C7.462,49,5,51.462,5,54.5v0C5,57.538,7.462,60,10.5,60z" />
                                                <linearGradient id="xW1rhakWxHfCsuNDi~7SWb" x1="32.5" x2="32.5"
                                                    y1="64.102" y2="22.102" gradientUnits="userSpaceOnUse"
                                                    spreadMethod="reflect">
                                                    <stop offset="0" stop-color="#155cde" />
                                                    <stop offset=".278" stop-color="#1f7fe5" />
                                                    <stop offset=".569" stop-color="#279ceb" />
                                                    <stop offset=".82" stop-color="#2cafef" />
                                                    <stop offset="1" stop-color="#2eb5f0" />
                                                </linearGradient>
                                                <path fill="url(#xW1rhakWxHfCsuNDi~7SWb)"
                                                    d="M57.667,19.058c-1.44,0.493-2.997,0.771-4.636,0.956c1.617-0.805,2.735-1.99,3.78-3.441 c0.598-0.83-0.329-1.915-1.25-1.469c-1.638,0.793-3.22,1.382-5.213,1.721C48.399,15.073,45.829,14,43,14 c-4.11,0-7.69,2.25-9.57,5.58C32.52,21.18,32,23.03,32,25c0,0.677,0.082,1.332,0.199,1.975c-8.839-0.263-16.248-4.827-20.463-10.568 C11.268,15.77,10.29,15.906,10,16.641C9.553,17.772,9,19,9,21c0,0.12,0,0.23,0.01,0.34c0.04,1.3,0.33,2.54,0.83,3.66 c0.94,2.17,2.64,3.94,4.77,4.98C14.41,29.99,14.21,30,14,30c-2,0-2.658-0.685-3.743-0.967c-0.683-0.178-1.35,0.392-1.247,1.09 c0.328,2.221,1.484,4.559,3.029,6.047c1.66,1.62,3.88,2.66,6.35,2.81C17.07,39.63,15.58,40,14,40h-1c-0.756,0-1.227,0.8-0.886,1.474 c1.677,3.317,5.561,5.53,9.722,5.516C17.826,49.518,13.091,51,8,51H7c-0.552,0-1,0.448-1,1c0,0.458,0.314,0.828,0.734,0.946 l-0.002,0.017c0,0,7.53,3.037,16.268,3.037c16.93,0,30.69-13.57,30.99-30.43C54,25.38,54,25.19,54,25s0-0.38-0.01-0.57 c-0.014-0.275-0.048-0.545-0.082-0.815c1.851-0.589,3.499-1.558,4.811-2.926C59.442,19.936,58.655,18.72,57.667,19.058z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <a
                                            href="{{ $socialYoutube->link == null || $socialYoutube->link == '' ? '#' : $socialYoutube->link }}">
                                            <svg height="25px" viewBox="0 -77 512.00213 512" width="25px"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m501.453125 56.09375c-5.902344-21.933594-23.195313-39.222656-45.125-45.128906-40.066406-10.964844-200.332031-10.964844-200.332031-10.964844s-160.261719 0-200.328125 10.546875c-21.507813 5.902344-39.222657 23.617187-45.125 45.546875-10.542969 40.0625-10.542969 123.148438-10.542969 123.148438s0 83.503906 10.542969 123.148437c5.90625 21.929687 23.195312 39.222656 45.128906 45.128906 40.484375 10.964844 200.328125 10.964844 200.328125 10.964844s160.261719 0 200.328125-10.546875c21.933594-5.902344 39.222656-23.195312 45.128906-45.125 10.542969-40.066406 10.542969-123.148438 10.542969-123.148438s.421875-83.507812-10.546875-123.570312zm0 0"
                                                    fill="#f00" />
                                                <path d="m204.96875 256 133.269531-76.757812-133.269531-76.757813zm0 0"
                                                    fill="#fff" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <!-- <div class="float-right w-75"> -->
                                    <!-- <a class="blog-header-logo w-100" href="/"> -->
                                    <img style="width: 150px" src="{{ $logo->deskripsi }}" style="position: relative;">
                                    <!-- </a> -->
                                    <br />
                                    <div class="nama-desa" style="font-size: 18pt;">
                                        <?php echo (strip_tags($nama_desa->deskripsi)); ?></div>
                                    <!-- </div> -->
                                </div>

                            </div>
                        </div>
                        <div class="col" align="right">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="w-75" id="google_translate_element">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <div class="row">
                <nav id="nav" class="nav">
                    <div id="nav__outer-wrap" class="nav__outer-wrap d-block" align="center">
                        <ul id="nav__inner-wrap" class="justify-content-between nav__inner-wrap">
                            <li id="nav__item--92" class="nav__item nav__menu-item">
                                <a class="nav__link nav__link--toplevel" href="{{ URL('/') }}">Home</a>
                            </li>
                            <li id="nav__item--178" class="nav__item nav__menu-item nav__menu-item--has-children"
                                tabindex="0">
                                <span class="nav__link nav__link--has-dropdown">
                                    Profil
                                    <svg class="icon icon--dropdown" viewBox="0 0 24 24"
                                        style="height: 1em; width: 1em">
                                        <path d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z"></path>
                                    </svg>
                                </span>
                                <ul class="nav__dropdown">
                                    @foreach($profil as $val)
                                    @if($val->id_profil === 8)
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/berita">{{ $val->nama_profil }}</a>
                                    </li>
                                    @else
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/profil-desa/{{ $val->id_profil }}">{{
                                            $val->nama_profil
                                            }}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li id="nav__item--178" class="nav__item nav__menu-item nav__menu-item--has-children"
                                tabindex="0">
                                <span class="nav__link nav__link--has-dropdown">
                                    Wisata Desa
                                    <svg class="icon icon--dropdown" viewBox="0 0 24 24"
                                        style="height: 1em; width: 1em">
                                        <path d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z"></path>
                                    </svg>
                                </span>
                                <ul class="nav__dropdown">
                                    @foreach($aktivitas_wisata as $val)
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/aktivitas-wisata-detail/{{ $val->aktivitas_id }}">{{
                                            $val->judul }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li id="nav__item--178" class="nav__item nav__menu-item nav__menu-item--has-children"
                                tabindex="0">
                                <span class="nav__link nav__link--has-dropdown">
                                    Kategori Wisata
                                    <svg class="icon icon--dropdown" viewBox="0 0 24 24"
                                        style="height: 1em; width: 1em">
                                        <path d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z"></path>
                                    </svg>
                                </span>
                                <ul class="nav__dropdown">
                                    @foreach($kategori_wisata as $val)
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/kategori-wisata/{{ $val->id_kategori }}">{{
                                            $val->nama_kategori }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li id="nav__item--178" class="nav__item nav__menu-item nav__menu-item--has-children"
                                tabindex="0">
                                <span class="nav__link nav__link--has-dropdown">
                                    Fasilitas
                                    <svg class="icon icon--dropdown" viewBox="0 0 24 24"
                                        style="height: 1em; width: 1em">
                                        <path d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z"></path>
                                    </svg>
                                </span>
                                <ul class="nav__dropdown">
                                    @foreach($fasilitas as $value)
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/fasilitas-desa/{{ $value->id_fasilitas }}">{{
                                            $value->nama_fasilitas }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li id="nav__item--178" class="nav__item nav__menu-item nav__menu-item--has-children"
                                tabindex="0">
                                <span class="nav__link nav__link--has-dropdown">
                                    Paket Wisata
                                    <svg class="icon icon--dropdown" viewBox="0 0 24 24"
                                        style="height: 1em; width: 1em">
                                        <path d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z"></path>
                                    </svg>
                                </span>
                                <ul class="nav__dropdown">
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/paket-wisata">
                                            Pemesanan Paket Wisata</a>
                                    </li>
                                    @if(Auth::check())
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/riwayat-pemesanan">
                                            Riwayat Pemesanan</a>
                                    </li>
                                    @endif
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/kontak">
                                            Kontak Pengelola</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="nav__item--178" class="nav__item nav__menu-item nav__menu-item--has-children"
                                tabindex="0">
                                <span class="nav__link nav__link--has-dropdown">
                                    Galeri
                                    <svg class="icon icon--dropdown" viewBox="0 0 24 24"
                                        style="height: 1em; width: 1em">
                                        <path d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z"></path>
                                    </svg>
                                </span>
                                <ul class="nav__dropdown">
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/galeri-foto">
                                            Foto</a>
                                    </li>
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/pengalaman-wisata">
                                            Pengalaman Wisata</a>
                                    </li>
                                    @if(Auth::check())
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/pengalaman-saya">
                                            Pengalaman Saya</a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                            <!-- @foreach($menu as $data)
                            @if($data->mempunyai_sub_menu)
                            <li id="nav__item--178" class="nav__item nav__menu-item nav__menu-item--has-children"
                                tabindex="0">
                                <span class="nav__link nav__link--has-dropdown">
                                    {{ $data->nama_menu }}
                                    <svg class="icon icon--dropdown" viewBox="0 0 24 24"
                                        style="height: 1em; width: 1em">
                                        <path d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z"></path>
                                    </svg>
                                </span>
                                <ul class="nav__dropdown">
                                    @foreach($data->subMenu as $sub)
                                    @if($sub->mempunyai_sub_menu)
                                    <li class="nav__menu-item nav__item--repeated dropdown">
                                        <span class="nav__link nav__link--has-dropdown dropdown-toggle"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ $sub->nama_submenu }}
                                            <svg class="icon icon--dropdown" viewBox="0 0 24 24"
                                                style="height: 1em; width: 1em">
                                                <path d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z">
                                                </path>
                                            </svg>
                                        </span>
                                        <ul class="dropdown-menu" style="background-color: #358ED7">
                                            @foreach($sub->subSubMenu as $subSub)
                                            <li class="nav__menu-item nav__item--repeated dropdown-item">
                                                <a class="nav__link"
                                                    href="/subsubmenu/{{ $subSub->id_sub_submenu }}">{{$subSub->nama_sub_submenu}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li class="nav__menu-item nav__item--repeated">
                                        <a class="nav__link"
                                            href="/submenu/{{ $sub->id_submenu }}">{{$sub->nama_submenu}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @else
                            <li id="nav__item--92" class="nav__item nav__menu-item">
                                <a class="nav__link nav__link--toplevel"
                                    href="/menu/{{ $data->id_menu }}">{{ $data->nama_menu }}</a>
                            </li>
                            @endif
                            @endforeach -->
                            @guest
                            <li id="nav__item--92" class="nav__item nav__menu-item">
                                <a class="nav__link nav__link--toplevel" href="/login">Login</a>
                            </li>
                            @else
                            <li id="nav__item--178" class="nav__item nav__menu-item nav__menu-item--has-children"
                                tabindex="0">
                                <span class="nav__link nav__link--has-dropdown">
                                    {{ Auth::user()->nama_lengkap }}
                                    <svg class="icon icon--dropdown" viewBox="0 0 24 24"
                                        style="height: 1em; width: 1em">
                                        <path d="M16.594 8.578l1.406 1.406-6 6-6-6 1.406-1.406 4.594 4.594z"></path>
                                    </svg>
                                </span>
                                <ul class="nav__dropdown">
                                    <li class="nav__menu-item">
                                        <a href="/edit-profile" class="nav__link">Profile</a>
                                    </li>
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                            <li id="nav__item--92" class="nav__item nav__menu-item">
                                <a class="nav__link nav__link--toplevel" href="{{ URL('/search') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="mx-3 mt-1">
                                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <hr>
            </div>
        </div>
    </div>