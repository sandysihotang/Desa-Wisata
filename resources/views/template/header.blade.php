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
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <!--    <link href="/css" rel="stylesheet">-->
    <link href="/css/blog.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quasar@1.14.3/dist/quasar.min.css" rel="stylesheet" type="text/css">
</head>
<div class="container-fluid">
    <div class="container">
        <header class="py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <svg width="20px" height="20px" viewBox="0 0 256 256" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     preserveAspectRatio="xMidYMid">
                                    <g>
                                        <path
                                            d="M127.999746,23.06353 C162.177385,23.06353 166.225393,23.1936027 179.722476,23.8094161 C192.20235,24.3789926 198.979853,26.4642218 203.490736,28.2166477 C209.464938,30.5386501 213.729395,33.3128586 218.208268,37.7917319 C222.687141,42.2706052 225.46135,46.5350617 227.782844,52.5092638 C229.535778,57.0201472 231.621007,63.7976504 232.190584,76.277016 C232.806397,89.7746075 232.93647,93.8226147 232.93647,128.000254 C232.93647,162.177893 232.806397,166.225901 232.190584,179.722984 C231.621007,192.202858 229.535778,198.980361 227.782844,203.491244 C225.46135,209.465446 222.687141,213.729903 218.208268,218.208776 C213.729395,222.687649 209.464938,225.461858 203.490736,227.783352 C198.979853,229.536286 192.20235,231.621516 179.722476,232.191092 C166.227425,232.806905 162.179418,232.936978 127.999746,232.936978 C93.8200742,232.936978 89.772067,232.806905 76.277016,232.191092 C63.7971424,231.621516 57.0196391,229.536286 52.5092638,227.783352 C46.5345536,225.461858 42.2700971,222.687649 37.7912238,218.208776 C33.3123505,213.729903 30.538142,209.465446 28.2166477,203.491244 C26.4637138,198.980361 24.3784845,192.202858 23.808908,179.723492 C23.1930946,166.225901 23.0630219,162.177893 23.0630219,128.000254 C23.0630219,93.8226147 23.1930946,89.7746075 23.808908,76.2775241 C24.3784845,63.7976504 26.4637138,57.0201472 28.2166477,52.5092638 C30.538142,46.5350617 33.3123505,42.2706052 37.7912238,37.7917319 C42.2700971,33.3128586 46.5345536,30.5386501 52.5092638,28.2166477 C57.0196391,26.4642218 63.7971424,24.3789926 76.2765079,23.8094161 C89.7740994,23.1936027 93.8221066,23.06353 127.999746,23.06353 M127.999746,0 C93.2367791,0 88.8783247,0.147348072 75.2257637,0.770274749 C61.601148,1.39218523 52.2968794,3.55566141 44.1546281,6.72008828 C35.7374966,9.99121548 28.5992446,14.3679613 21.4833489,21.483857 C14.3674532,28.5997527 9.99070739,35.7380046 6.71958019,44.1551362 C3.55515331,52.2973875 1.39167714,61.6016561 0.769766653,75.2262718 C0.146839975,88.8783247 0,93.2372872 0,128.000254 C0,162.763221 0.146839975,167.122183 0.769766653,180.774236 C1.39167714,194.398852 3.55515331,203.703121 6.71958019,211.845372 C9.99070739,220.261995 14.3674532,227.400755 21.4833489,234.516651 C28.5992446,241.632547 35.7374966,246.009293 44.1546281,249.28042 C52.2968794,252.444847 61.601148,254.608323 75.2257637,255.230233 C88.8783247,255.85316 93.2367791,256 127.999746,256 C162.762713,256 167.121675,255.85316 180.773728,255.230233 C194.398344,254.608323 203.702613,252.444847 211.844864,249.28042 C220.261995,246.009293 227.400247,241.632547 234.516143,234.516651 C241.632039,227.400755 246.008785,220.262503 249.279912,211.845372 C252.444339,203.703121 254.607815,194.398852 255.229725,180.774236 C255.852652,167.122183 256,162.763221 256,128.000254 C256,93.2372872 255.852652,88.8783247 255.229725,75.2262718 C254.607815,61.6016561 252.444339,52.2973875 249.279912,44.1551362 C246.008785,35.7380046 241.632039,28.5997527 234.516143,21.483857 C227.400247,14.3679613 220.261995,9.99121548 211.844864,6.72008828 C203.702613,3.55566141 194.398344,1.39218523 180.773728,0.770274749 C167.121675,0.147348072 162.762713,0 127.999746,0 Z M127.999746,62.2703115 C91.698262,62.2703115 62.2698034,91.69877 62.2698034,128.000254 C62.2698034,164.301738 91.698262,193.730197 127.999746,193.730197 C164.30123,193.730197 193.729689,164.301738 193.729689,128.000254 C193.729689,91.69877 164.30123,62.2703115 127.999746,62.2703115 Z M127.999746,170.667175 C104.435741,170.667175 85.3328252,151.564259 85.3328252,128.000254 C85.3328252,104.436249 104.435741,85.3333333 127.999746,85.3333333 C151.563751,85.3333333 170.666667,104.436249 170.666667,128.000254 C170.666667,151.564259 151.563751,170.667175 127.999746,170.667175 Z M211.686338,59.6734287 C211.686338,68.1566129 204.809755,75.0337031 196.326571,75.0337031 C187.843387,75.0337031 180.966297,68.1566129 180.966297,59.6734287 C180.966297,51.1902445 187.843387,44.3136624 196.326571,44.3136624 C204.809755,44.3136624 211.686338,51.1902445 211.686338,59.6734287 Z"
                                            fill=""></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <svg width="20px" height="20px" viewBox="0 0 256 256" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     preserveAspectRatio="xMidYMid">
                                    <g>
                                        <path
                                            d="M241.871,256.001 C249.673,256.001 256,249.675 256,241.872 L256,14.129 C256,6.325 249.673,0 241.871,0 L14.129,0 C6.324,0 0,6.325 0,14.129 L0,241.872 C0,249.675 6.324,256.001 14.129,256.001 L241.871,256.001"
                                            fill="#395185"></path>
                                        <path
                                            d="M176.635,256.001 L176.635,156.864 L209.912,156.864 L214.894,118.229 L176.635,118.229 L176.635,93.561 C176.635,82.375 179.742,74.752 195.783,74.752 L216.242,74.743 L216.242,40.188 C212.702,39.717 200.558,38.665 186.43,38.665 C156.932,38.665 136.738,56.67 136.738,89.736 L136.738,118.229 L103.376,118.229 L103.376,156.864 L136.738,156.864 L136.738,256.001 L176.635,256.001"
                                            fill="#FFFFFF"></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <a class="blog-header-logo text-dark" href="/">
                                    <img class="img-fluid"
                                         src="/image/logo/Logo_Marbun_Toruan.png">
                                </a>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center"></div>
            </div>
        </header>

        <div class="blog-header nav-scroller py-1 mb-2" id="menus">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href="/">Home</a>
                <a href="#" class="p-2 text-muted">
                    Profil
                    <q-menu fit>
                        <q-list style="min-width: 100px">
                            <q-item tag="a" clickable href="/profil-desa/2" class="text-muted">
                                <q-item-section>Tentang Desa</q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/profil-desa/3" class="text-muted">
                                <q-item-section>Lokasi</q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/profil-desa/4" class="text-muted">
                                <q-item-section>Potensi dan Daya Tarik</q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/berita" class="text-muted">
                                <q-item-section>Berita</q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/profil-desa/6" class="text-muted">
                                <q-item-section>Kelembagaan</q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </a>
                <a href="#" class="p-2 text-muted">
                    Wisata Desa
                    <q-menu fit>
                        <q-list style="min-width: 100px">
                            <q-item tag="a" clickable href="/wisata-desa-detail/1" class="text-muted">
                                <q-item-section>
                                    Air Terjun Janji
                                </q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </a>
                <a href="#" class="p-2 text-muted">
                    Kategori Wisata
                    <q-menu fit>
                        <q-list style="min-width: 100px">
                            <?php $kat = App\Models\KategoriWisata::pluck('nama_kategori', 'id_kategori'); ?>
                            @foreach($kat as $id => $nama)
                                <q-item tag="a" clickable href="/kategori-wisata/{{$id}}" class="text-muted">
                                    <q-item-section>{{$nama}}</q-item-section>
                                </q-item>
                            @endforeach
                        </q-list>
                    </q-menu>
                </a>
                <a href="#" class="p-2 text-muted">
                    Fasilitas
                    <q-menu fit>
                        <q-list style="min-width: 100px">
                            <q-item tag="a" clickable href="/fasilitas-desa/2" class="text-muted">
                                <q-item-section>Fasilitas Pariwisata</q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/fasilitas-desa/3" class="text-muted">
                                <q-item-section>Fasilitas Umum</q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/fasilitas-desa/4" class="text-muted">
                                <q-item-section>Aksesibilitas</q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </a>
                <a href="#" class="p-2 text-muted">
                    Paket Wisata
                    <q-menu fit>
                        <q-list style="min-width: 100px">
                            <q-item tag="a" clickable href="/paket-wisata" class="text-muted">
                                <q-item-section>Pemesanan Paket Wisata</q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/riwayat-pemesanan/1" class="text-muted">
                                <q-item-section>Riwayat Pemesanan</q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/kontak" class="text-muted">
                                <q-item-section>Kontak Pengelola</q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </a>
                <a href="#" class="p-2 text-muted">
                    Galeri
                    <q-menu fit>
                        <q-list style="min-width: 100px">
                            <q-item tag="a" clickable href="/galeri-foto" class="text-muted">
                                <q-item-section>Foto</q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/pengalaman-wisata" class="text-muted">
                                <q-item-section>Pengalaman Wisata</q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </a>

                @foreach($menu as $data)
                @if($data->mempunyai_sub_menu)

                <a href="#" class="p-2 text-muted">
                    {{ $data->nama_menu }}
                    <q-menu fit>
                        <q-list style="min-width: 100px">
                            @foreach($data->subMenu as $sub)
                            <q-item tag="a" clickable href="/submenu/{{ $sub->id_submenu }}" class="text-muted">
                                <q-item-section>{{ $sub->nama_submenu }}</q-item-section>
                            </q-item>
                            @endforeach
                        </q-list>
                    </q-menu>
                </a>

                @else
                <a class="p-2 text-muted" href="/menu/{{ $data->id_menu }}">{{ $data->nama_menu }}</a>
                @endif
                @endforeach

                @guest
                <a class="p-2 text-muted" href="/login">Login</a>
                @else
                <a href="#" class="p-2 text-muted">
                    {{ Auth::user()->nama_lengkap }}
                    <q-menu fit>
                        <q-list style="min-width: 100px">
                            <q-item tag="a" clickable href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    class="text-muted">
                                <q-item-section>
                                    {{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </q-item-section>
                            </q-item>
                            <q-item tag="a" clickable href="/edit-profile" class="text-muted">
                                <q-item-section>Profile</q-item-section>
                            </q-item>
                        </q-list>
                    </q-menu>
                </a>
                @endguest

                <a class="text-muted" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="
                    none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="mx-3">
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                    </svg>
                    Cari
                </a>
            </nav>
            <hr>
        </div>
    </div>
