<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MARBUN TORUAN</title>

    <!-- Fonts -->
    <link rel="icon" href="/image/logo/Logo_Marbun_Toruan.png">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin_style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <!--    <link href="/css" rel="stylesheet">-->
    <style>
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

        footer {
            /*position: absolute;*/
            /*bottom: 0;*/
            width: calc(100%);
            /*height: 50px;*/
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
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #fff0ff;}
    </style>
    <link href="/css/blog.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/quasar@1.14.3/dist/quasar.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="sub-title">Dashboard Desa</div>
        </div>

        <ul class="list-unstyled components border-right">
            <li><a href="/home-admin">Home</a></li>
            <li>
                <a href="/kelola-pesanan">Pesanan Tiket</a>
            </li>
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Artikel</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="/kelola-artikel">Kelola Artikel</a>
                    </li>
                    <li>
                        <a href="/konfirmasi-artikel">Persetujuan Artikel</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/kelola-semua-artikel">Artikel</a>
            </li>
            <li>
                <a href="#subObjek" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Wisata Desa</a>
                <ul class="collapse list-unstyled" id="subObjek">
                    <li>
                        <a href="/kelola-kat-wisata">Kelola Kategori Wisata</a>
                    </li>
                    <li>
                        <a href="/kelola-wisata">Kelola Objek Wisata Desa</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#subGaleri" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Galeri</a>
                <ul class="collapse list-unstyled" id="subGaleri">
                    <li>
                        <a href="/kelola-kat-galeri">Kelola Kategori Galeri</a>
                    </li>
                    <li>
                        <a href="/kelola-galeri">Kelola Galeri</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/kelola-user">User</a>
            </li>
            <li>
                <a href="/tambah-menu">Menu</a>
            </li>
            <li>
                <a href="/backup">Backup</a>
            </li>
            <li>
                <a href="/kelola-profil">Profile</a>
            </li>
        </ul>
    </nav>
    <div id="content" class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropbtn">{{ Auth::user()->nama_lengkap }}</a>
                                <div class="dropdown-content dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

