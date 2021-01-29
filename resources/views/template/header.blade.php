<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Desa Wisata') }}</title>

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
                                            <svg width="20px" height="20px" viewBox="0 0 256 256" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                preserveAspectRatio="xMidYMid">
                                                <g>
                                                    <path
                                                        d="M127.999746,23.06353 C162.177385,23.06353 166.225393,23.1936027 179.722476,23.8094161 C192.20235,24.3789926 198.979853,26.4642218 203.490736,28.2166477 C209.464938,30.5386501 213.729395,33.3128586 218.208268,37.7917319 C222.687141,42.2706052 225.46135,46.5350617 227.782844,52.5092638 C229.535778,57.0201472 231.621007,63.7976504 232.190584,76.277016 C232.806397,89.7746075 232.93647,93.8226147 232.93647,128.000254 C232.93647,162.177893 232.806397,166.225901 232.190584,179.722984 C231.621007,192.202858 229.535778,198.980361 227.782844,203.491244 C225.46135,209.465446 222.687141,213.729903 218.208268,218.208776 C213.729395,222.687649 209.464938,225.461858 203.490736,227.783352 C198.979853,229.536286 192.20235,231.621516 179.722476,232.191092 C166.227425,232.806905 162.179418,232.936978 127.999746,232.936978 C93.8200742,232.936978 89.772067,232.806905 76.277016,232.191092 C63.7971424,231.621516 57.0196391,229.536286 52.5092638,227.783352 C46.5345536,225.461858 42.2700971,222.687649 37.7912238,218.208776 C33.3123505,213.729903 30.538142,209.465446 28.2166477,203.491244 C26.4637138,198.980361 24.3784845,192.202858 23.808908,179.723492 C23.1930946,166.225901 23.0630219,162.177893 23.0630219,128.000254 C23.0630219,93.8226147 23.1930946,89.7746075 23.808908,76.2775241 C24.3784845,63.7976504 26.4637138,57.0201472 28.2166477,52.5092638 C30.538142,46.5350617 33.3123505,42.2706052 37.7912238,37.7917319 C42.2700971,33.3128586 46.5345536,30.5386501 52.5092638,28.2166477 C57.0196391,26.4642218 63.7971424,24.3789926 76.2765079,23.8094161 C89.7740994,23.1936027 93.8221066,23.06353 127.999746,23.06353 M127.999746,0 C93.2367791,0 88.8783247,0.147348072 75.2257637,0.770274749 C61.601148,1.39218523 52.2968794,3.55566141 44.1546281,6.72008828 C35.7374966,9.99121548 28.5992446,14.3679613 21.4833489,21.483857 C14.3674532,28.5997527 9.99070739,35.7380046 6.71958019,44.1551362 C3.55515331,52.2973875 1.39167714,61.6016561 0.769766653,75.2262718 C0.146839975,88.8783247 0,93.2372872 0,128.000254 C0,162.763221 0.146839975,167.122183 0.769766653,180.774236 C1.39167714,194.398852 3.55515331,203.703121 6.71958019,211.845372 C9.99070739,220.261995 14.3674532,227.400755 21.4833489,234.516651 C28.5992446,241.632547 35.7374966,246.009293 44.1546281,249.28042 C52.2968794,252.444847 61.601148,254.608323 75.2257637,255.230233 C88.8783247,255.85316 93.2367791,256 127.999746,256 C162.762713,256 167.121675,255.85316 180.773728,255.230233 C194.398344,254.608323 203.702613,252.444847 211.844864,249.28042 C220.261995,246.009293 227.400247,241.632547 234.516143,234.516651 C241.632039,227.400755 246.008785,220.262503 249.279912,211.845372 C252.444339,203.703121 254.607815,194.398852 255.229725,180.774236 C255.852652,167.122183 256,162.763221 256,128.000254 C256,93.2372872 255.852652,88.8783247 255.229725,75.2262718 C254.607815,61.6016561 252.444339,52.2973875 249.279912,44.1551362 C246.008785,35.7380046 241.632039,28.5997527 234.516143,21.483857 C227.400247,14.3679613 220.261995,9.99121548 211.844864,6.72008828 C203.702613,3.55566141 194.398344,1.39218523 180.773728,0.770274749 C167.121675,0.147348072 162.762713,0 127.999746,0 Z M127.999746,62.2703115 C91.698262,62.2703115 62.2698034,91.69877 62.2698034,128.000254 C62.2698034,164.301738 91.698262,193.730197 127.999746,193.730197 C164.30123,193.730197 193.729689,164.301738 193.729689,128.000254 C193.729689,91.69877 164.30123,62.2703115 127.999746,62.2703115 Z M127.999746,170.667175 C104.435741,170.667175 85.3328252,151.564259 85.3328252,128.000254 C85.3328252,104.436249 104.435741,85.3333333 127.999746,85.3333333 C151.563751,85.3333333 170.666667,104.436249 170.666667,128.000254 C170.666667,151.564259 151.563751,170.667175 127.999746,170.667175 Z M211.686338,59.6734287 C211.686338,68.1566129 204.809755,75.0337031 196.326571,75.0337031 C187.843387,75.0337031 180.966297,68.1566129 180.966297,59.6734287 C180.966297,51.1902445 187.843387,44.3136624 196.326571,44.3136624 C204.809755,44.3136624 211.686338,51.1902445 211.686338,59.6734287 Z"
                                                        fill=""></path>
                                                </g>
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
                                            <svg width="20px" height="20px" version="1.1" id="Capa_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 155.139 155.139"
                                                style="enable-background:new 0 0 155.139 155.139;" xml:space="preserve">
                                                <g>
                                                    <path id="f_1_" style="fill:#010002;" d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184
		c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452
		v20.341H37.29v27.585h23.814v70.761H89.584z" />
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
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
                                            <svg width="20px" height="20px" version="1.1" id="Capa_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512.001 512.001"
                                                style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <g>
                                                            <path d="M142.701,163.305l0.463,0.213c1.35,0.618,2.765,0.911,4.159,0.911c3.79,0,7.416-2.166,9.099-5.837
				c2.3-5.021,0.095-10.956-4.926-13.257l-0.414-0.189c-5.015-2.316-10.956-0.126-13.27,4.889
				C135.497,155.049,137.686,160.991,142.701,163.305z" />
                                                            <path d="M509.648,97.008c-2.867-3.402-7.635-4.502-11.702-2.698c-6.087,2.699-12.282,5.075-18.566,7.121
				c8.145-10.321,14.476-22.094,18.604-34.83c1.283-3.957-0.018-8.295-3.266-10.893s-7.767-2.913-11.344-0.794
				c-17.466,10.349-36.24,17.8-55.881,22.186c-20.516-19.716-48.208-30.923-76.848-30.923c-61.146,0-110.891,49.745-110.891,110.891
				c0,4.013,0.219,8.053,0.653,12.093c-15.721-1.497-31.284-4.323-46.416-8.434c-5.329-1.448-10.824,1.699-12.272,7.029
				c-1.448,5.33,1.699,10.824,7.029,12.272c20.492,5.567,41.714,8.936,63.077,10.012c3.131,0.158,6.135-1.153,8.149-3.542
				c2.014-2.389,2.796-5.581,2.113-8.63c-1.548-6.913-2.333-13.912-2.333-20.8c0-50.118,40.774-90.891,90.891-90.891
				c25.045,0,49.198,10.447,66.266,28.662c2.351,2.51,5.827,3.637,9.205,2.979c13.73-2.668,27.098-6.678,39.982-11.982
				c-7.222,10.025-16.446,18.554-27.193,24.987c-4.048,2.423-5.852,7.345-4.329,11.809c1.523,4.464,5.957,7.258,10.643,6.702
				c9.236-1.096,18.385-2.806,27.396-5.117c-8.196,8.576-17.188,16.393-26.917,23.389c-2.68,1.928-4.237,5.054-4.159,8.354
				l0.304,12.951c-0.063,136.137-103.69,276.911-277.068,276.911c-39.621,0-78.442-8.424-114.149-24.594
				c42.034-3.177,81.48-18.427,114.929-44.583c3.331-2.605,4.664-7.023,3.328-11.036c-1.336-4.012-5.051-6.751-9.279-6.839
				c-33.474-0.699-63.422-19.583-78.721-48.384c1.091,0.03,2.19,0.045,3.295,0.045c9.92,0,19.717-1.263,29.119-3.754
				c4.492-1.19,7.572-5.316,7.435-9.961s-3.455-8.583-8.009-9.506c-37.301-7.56-65.57-37.735-71.666-74.423
				c11.025,4.03,22.452,6.213,34.142,6.512c4.453,0.106,8.445-2.732,9.79-6.98c1.343-4.248-0.285-8.872-3.993-11.341
				c-25.318-16.855-40.433-45.109-40.433-75.579c0-11.269,2.066-22.359,6.042-32.692c16.303,18.001,34.709,33.926,54.879,47.465
				c4.586,3.079,10.798,1.856,13.876-2.729c3.079-4.585,1.856-10.798-2.729-13.876C89.812,108.25,69.412,89.658,51.996,68.308
				c-2.07-2.538-5.255-3.897-8.517-3.65c-3.265,0.252-6.2,2.086-7.857,4.911C25.771,86.364,20.564,105.67,20.564,125.4
				c0,24.38,7.932,47.596,22.108,66.494c-2.698-1.179-5.368-2.496-8.003-3.951c-3.098-1.71-6.869-1.656-9.917,0.142
				c-3.047,1.799-4.917,5.073-4.917,8.612v1.23c0,36.997,18.463,70.606,47.32,90.945c-0.06-0.011-0.12-0.022-0.18-0.034
				c-3.465-0.653-7.021,0.565-9.356,3.21c-2.334,2.646-3.102,6.325-2.02,9.683c11.733,36.423,41.158,63.627,77.042,73.258
				c-29.687,17.642-63.339,26.864-98.619,26.864c-7.657,0-15.152-0.42-22.915-1.283c-4.614-0.513-8.981,2.221-10.532,6.6
				c-1.552,4.38,0.118,9.251,4.03,11.758c47.869,30.679,103.255,46.895,160.171,46.895c45.777,0,88.621-9.094,127.34-27.034
				c35.518-16.452,66.902-39.966,93.28-69.887c48.583-55.109,76.447-128.047,76.447-200.111c0-0.078-0.001-0.157-0.003-0.235
				l-0.185-7.874c19.047-14.42,35.402-31.787,48.666-51.684C512.789,105.297,512.514,100.41,509.648,97.008z" />
                                                        </g>
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M376.697,289.023c-4.735-2.841-10.879-1.306-13.72,3.43l-0.018,0.029c-2.842,4.736-1.298,10.864,3.438,13.705
			c1.607,0.965,3.376,1.423,5.125,1.423c3.404,0,6.727-1.739,8.605-4.867C382.968,298.007,381.433,291.864,376.697,289.023z" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M357.183,319.116c-4.261-3.512-10.564-2.906-14.077,1.356c-17.505,21.238-38.201,38.762-61.512,52.085
			c-4.795,2.741-6.46,8.849-3.72,13.644c1.846,3.23,5.219,5.04,8.691,5.04c1.682,0,3.388-0.425,4.953-1.319
			c25.42-14.529,47.969-33.615,67.021-56.729C362.052,328.931,361.445,322.629,357.183,319.116z" />
                                                    </g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
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
                                            <svg width="20px" height="20px" viewBox="0 -62 512.00199 512"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m334.808594 170.992188-113.113282-61.890626c-6.503906-3.558593-14.191406-3.425781-20.566406.351563-6.378906 3.78125-10.183594 10.460937-10.183594 17.875v122.71875c0 7.378906 3.78125 14.046875 10.117188 17.832031 3.308594 1.976563 6.976562 2.96875 10.652344 2.96875 3.367187 0 6.742187-.832031 9.847656-2.503906l113.117188-60.824219c6.714843-3.613281 10.90625-10.59375 10.9375-18.222656.027343-7.628906-4.113282-14.640625-10.808594-18.304687zm-113.859375 63.617187v-91.71875l84.539062 46.257813zm0 0" />
                                                <path
                                                    d="m508.234375 91.527344-.023437-.234375c-.433594-4.121094-4.75-40.777344-22.570313-59.421875-20.597656-21.929688-43.949219-24.59375-55.179687-25.871094-.929688-.105469-1.78125-.203125-2.542969-.304688l-.894531-.09375c-67.6875-4.921874-169.910157-5.5937495-170.933594-5.59765575l-.089844-.00390625-.089844.00390625c-1.023437.00390625-103.246094.67578175-171.542968 5.59765575l-.902344.09375c-.726563.097657-1.527344.1875-2.398438.289063-11.101562 1.28125-34.203125 3.949219-54.859375 26.671875-16.972656 18.445312-21.878906 54.316406-22.382812 58.347656l-.058594.523438c-.152344 1.714844-3.765625 42.539062-3.765625 83.523437v38.3125c0 40.984375 3.613281 81.808594 3.765625 83.527344l.027344.257813c.433593 4.054687 4.746093 40.039062 22.484375 58.691406 19.367187 21.195312 43.855468 24 57.027344 25.507812 2.082031.238282 3.875.441406 5.097656.65625l1.183594.164063c39.082031 3.71875 161.617187 5.550781 166.8125 5.625l.15625.003906.15625-.003906c1.023437-.003907 103.242187-.675781 170.929687-5.597657l.894531-.09375c.855469-.113281 1.816406-.214843 2.871094-.324218 11.039062-1.171875 34.015625-3.605469 54.386719-26.019532 16.972656-18.449218 21.882812-54.320312 22.382812-58.347656l.058594-.523437c.152344-1.71875 3.769531-42.539063 3.769531-83.523438v-38.3125c-.003906-40.984375-3.617187-81.804687-3.769531-83.523437zm-26.238281 121.835937c0 37.933594-3.3125 77-3.625 80.585938-1.273438 9.878906-6.449219 32.574219-14.71875 41.5625-12.75 14.027343-25.847656 15.417969-35.410156 16.429687-1.15625.121094-2.226563.238282-3.195313.359375-65.46875 4.734375-163.832031 5.460938-168.363281 5.488281-5.082032-.074218-125.824219-1.921874-163.714844-5.441406-1.941406-.316406-4.039062-.558594-6.25-.808594-11.214844-1.285156-26.566406-3.042968-38.371094-16.027343l-.277344-.296875c-8.125-8.464844-13.152343-29.6875-14.429687-41.148438-.238281-2.710937-3.636719-42.238281-3.636719-80.703125v-38.3125c0-37.890625 3.304688-76.914062 3.625-80.574219 1.519532-11.636718 6.792969-32.957031 14.71875-41.574218 13.140625-14.453125 26.996094-16.054688 36.160156-17.113282.875-.101562 1.691407-.195312 2.445313-.292968 66.421875-4.757813 165.492187-5.464844 169.046875-5.492188 3.554688.023438 102.589844.734375 168.421875 5.492188.808594.101562 1.691406.203125 2.640625.3125 9.425781 1.074218 23.671875 2.699218 36.746094 16.644531l.121094.128906c8.125 8.464844 13.152343 30.058594 14.429687 41.75.226563 2.558594 3.636719 42.171875 3.636719 80.71875zm0 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-4">
                                        <a class="blog-header-logo w-100" href="/">
                                            <div class="container">
                                                <div class="row">
                                                    <img class="img-fluid" style="width: 100%"
                                                        src="{{ $logo->deskripsi }}">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col" align="right">
                            <div class="w-75" id="google_translate_element">
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
                                    @if($val->id_profil === 5)
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
                                    @foreach($objek_wisata as $val)
                                    <li class="nav__menu-item">
                                        <a class="nav__link" href="/wisata-desa-detail/{{ $val->id_obj_wisata }}">{{
                                            $val->nama_wisata }}</a>
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