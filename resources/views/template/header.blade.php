<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">

</head>
<div class="container">
    <header class="py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#">Large</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center"/>
        </div>
    </header>

    <div class="blog-header nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-around">
            <a class="p-2 text-muted" href="#">Home</a>
            <a class="p-2 text-muted" href="#">Wisata Desa</a>
            <a class="p-2 text-muted" href="#">Kategori Wisata</a>
            <a class="p-2 text-muted" href="#">Paket Wisata</a>
            <a class="p-2 text-muted" href="#">Profile</a>
            <a class="text-muted" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="mx-3">
                    <circle cx="10.5" cy="10.5" r="7.5"></circle>
                    <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                </svg>
            </a>
        </nav>
        <hr>
    </div>
