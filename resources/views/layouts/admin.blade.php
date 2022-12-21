<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>South Eastern Brief - Wasya wa Ukambani</title>
    <link rel="icon" href="{!! asset('storage/logos/journalism.png') !!}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
    <div id="app">
        <div class="container-scroller">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row shadow">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="{{ route('admin') }}" ><img src="/storage/logos/Dark Blue Red White Generic News General News Logo (4)cropped1.png" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('admin') }}" ><img src="/storage/logos/journalism.png" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
    
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="nav-profile-img">
                                    <div>
                                      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="image">
                                    </div>
                                    <span class="availability-status online"></span>
                                </div>
                                <div class="nav-profile-text">
                                    <p class="mb-1 text-light text-capitalize">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                                </div>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                              <a href="{{ route('ProfilePic') }}" class="dropdown-item" onclick="edit_profile({{Auth::user()->id}})">
                                <i class="mdi mdi-account-circle me-2 text-info"></i> Update Picture 
                              </a>
                              <hr class="dropdown-divider">
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout me-2 text-danger"></i> Signout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                              </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas"= !isActive">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                          <a href="{{ route('Profile') }}" class="nav-link">
                              <div class="nav-profile-image">
                                <div>
                                  <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="image">
                                </div>
                                <span class="login-status online"></span>
                              </div>
                              <div class="nav-profile-text d-flex flex-column">
                                  <span class="font-weight-bold mb-2">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                  <span class="text-dark text-small">Author</span>
                              </div>
                              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                          </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin') }}" class="nav-link">
                                <span class="menu-title">Dashboard</span>
                                <i class="mdi mdi-home menu-icon"></i>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news') }}">
                                <span class="menu-title">News</span>
                                <i class="mdi mdi-newspaper-variant-multiple-outline menu-icon"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('regions') }}">
                                <span class="menu-title">Regions</span>
                                <i class="mdi mdi-earth menu-icon"></i>
                            </a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories') }}">
                                <span class="menu-title">Categories</span>
                                <i class="mdi mdi-shape-outline menu-icon"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="main-panel">
                    <main class="content-wrapper py-4">
                        @yield('content')
                    </main>
                    <footer class="footer">
                        <div class="container-fluid">
                            <span class="text-muted d-block text-center d-sm-inline-block">Copyright © {{ date('Y') }} All Rights Reserved</span>
                        </div>
                    </footer>
                </div>
            </div>        
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.bootstrap5.min.js"></script>
</body>
</html>

<style>
    /* Miscellanoeous */
  body,
  html {
    overflow-x: hidden;
    padding-right: 0 !important; }
  
  *:-moz-full-screen,
  *:-webkit-full-screen,
  *:fullscreen *:-ms-fullscreen {
    overflow: auto; }
  
  .container-scroller {
    overflow: hidden; }
  
  pre {
    background: color(gray-lighter);
    padding: 15px;
    font-size: 14px; }
  
  code {
    padding: 5px;
    color: #fe7c96;
    font-family: "ubuntu-light", sans-serif;
    font-size: 0.875rem;
    border-radius: 4px; }
  
  .page-header {
    margin: 0 0 1.5rem 0; }
    .page-header .breadcrumb {
      border: 0;
      margin-bottom: 0; }
  
  .page-title {
    color: #343a40;
    font-size: 1.125rem;
    margin-bottom: 0; }
    .page-title .page-title-icon {
      display: inline-block;
      width: 36px;
      height: 36px;
      border-radius: 4px;
      text-align: center;
      -webkit-box-shadow: 0px 3px 8.3px 0.7px rgba(163, 93, 255, 0.35);
      box-shadow: 0px 3px 8.3px 0.7px rgba(163, 93, 255, 0.35); }
      .page-title .page-title-icon i {
        font-size: .9375rem;
        line-height: 36px; }
  
  /* Footer */
  .footer {
    background: #ffffff;
    color: color(dark);
    border-top: 1px solid #e7dee9;
    padding: 30px 1rem;
    transition: all 0.25s ease;
    -moz-transition: all 0.25s ease;
    -webkit-transition: all 0.25s ease;
    -ms-transition: all 0.25s ease;
    font-size: calc(0.875rem - 0.05rem);
    font-family: "ubuntu-regular", sans-serif; }
    @media (max-width: 991px) {
      .footer {
        margin-left: 0;
        width: 100%; } }
  
  /* Navbar */
  .navbar {
    font-family: "ubuntu-light", sans-serif;
    background: #ff2942;
    transition: background 0.25s ease;
    -webkit-transition: background 0.25s ease;
    -moz-transition: background 0.25s ease;
    -ms-transition: background 0.25s ease; }
    .navbar .navbar-brand {
      width: 110px; }
    .navbar .navbar-brand-wrapper {
      transition: width 0.25s ease, background 0.25s ease;
      -webkit-transition: width 0.25s ease, background 0.25s ease;
      -moz-transition: width 0.25s ease, background 0.25s ease;
      -ms-transition: width 0.25s ease, background 0.25s ease;
      background: #ff2942;
      width: 260px;
      height: 70px; }
      @media (max-width: 991px) {
        .navbar .navbar-brand-wrapper {
          width: 55px; } }
      .navbar .navbar-brand-wrapper .navbar-brand {
        color: #ff2942;
        font-size: 1.5rem;
        line-height: 48px;
        margin-right: 0;
        padding: .25rem 0;
        width: 100%; }
        .navbar .navbar-brand-wrapper .navbar-brand:active, .navbar .navbar-brand-wrapper .navbar-brand:focus, .navbar .navbar-brand-wrapper .navbar-brand:hover {
          color: #1b2658; }
        .navbar .navbar-brand-wrapper .navbar-brand img {
          width: calc(260px - 120px);
          max-width: 100%;
          height: 28px;
          margin: auto;
          vertical-align: middle; }
        .navbar .navbar-brand-wrapper .navbar-brand.brand-logo-mini {
          display: none; }
          .navbar .navbar-brand-wrapper .navbar-brand.brand-logo-mini img {
            width: calc(70px - 50px);
            max-width: 100%;
            height: 28px;
            margin: auto; }
    .navbar .navbar-menu-wrapper {
      transition: width 0.25s ease;
      -webkit-transition: width 0.25s ease;
      -moz-transition: width 0.25s ease;
      -ms-transition: width 0.25s ease;
      color: #ffffff;
      padding-left: 24px;
      padding-right: 24px;
      width: calc(100% - 260px);
      height: 70px; }
      @media (max-width: 991px) {
        .navbar .navbar-menu-wrapper {
          width: auto;
          padding-left: 15px;
          padding-right: 15px; } }
      .navbar .navbar-menu-wrapper .navbar-toggler {
        border: 0;
        color: inherit;
        height: 70px;
        border-radius: 0px;
        padding-left: 5px;
        padding-right: 20px; }
        .navbar .navbar-menu-wrapper .navbar-toggler:focus {
          -webkit-box-shadow: none;
          box-shadow: none; }
        .navbar .navbar-menu-wrapper .navbar-toggler:not(.navbar-toggler-right) {
          font-size: 1.5rem; }
          @media (max-width: 991px) {
            .navbar .navbar-menu-wrapper .navbar-toggler:not(.navbar-toggler-right) {
              display: none; } }
        @media (max-width: 991px) {
          .navbar .navbar-menu-wrapper .navbar-toggler.navbar-toggler-right {
            padding-left: 15px;
            padding-right: 11px;
            border-right: none; } }
      .navbar .navbar-menu-wrapper .navbar-nav {
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center; }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link {
          color: inherit;
          font-size: 0.875rem;
          margin-left: 1.5rem;
          margin-right: 1.5rem;
          height: 70px;
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-align: center;
          -ms-flex-align: center;
          align-items: center; }
          @media (max-width: 767px) {
            .navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link {
              margin-left: .8rem;
              margin-right: .8rem; } }
          .navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link i {
            font-size: 1.25rem; }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-toggle:after {
          color: #ffffff;
          font-size: 1rem; }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu {
          border: none;
          border-radius: 5px;
          -webkit-box-shadow: 0px 3px 21px 0px rgba(0, 0, 0, 0.2);
          box-shadow: 0px 3px 21px 0px rgba(0, 0, 0, 0.2); }
          .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown {
            position: absolute;
            font-size: 0.9rem;
            margin-top: 0;
            padding: 0; }
            .rtl .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown {
              right: auto;
              left: 0; }
            .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown .dropdown-item {
              margin-bottom: 0;
              padding: 11px 13px;
              cursor: pointer; }
              .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown .dropdown-item i {
                font-size: 17px; }
              .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown .dropdown-item .ellipsis {
                max-width: 200px;
                overflow: hidden;
                text-overflow: ellipsis; }
              .rtl .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown .dropdown-item i {
                margin-left: 10px; }
            .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu.navbar-dropdown .dropdown-divider {
              margin: 0; }
        @media (max-width: 991px) {
          .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown {
            position: static; }
            .navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown {
              left: 20px;
              right: 20px;
              top: 70px;
              width: calc(100% - 40px); } }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-settings {
          padding-left: 20px;
          padding-right: 5px; }
          .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-settings .nav-link {
            margin-right: 0;
            margin-left: 0; }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-img {
          position: relative;
          width: 32px;
          height: 32px; }
          .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-img img {
            width: 32px;
            height: 32px;
            border-radius: 100%; }
          .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-img .availability-status {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 100%;
            border: 2px solid #ffffff;
            bottom: 5px;
            right: -5px; }
            .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-img .availability-status.online {
              background: #1bcfb4; }
            .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-img .availability-status.offline {
              background: #fe7c96; }
            .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-img .availability-status.busy {
              background: #fed713; }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-text {
          margin-left: 1.25rem; }
          .rtl .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-text {
            margin-left: 0;
            margin-right: 1.25rem; }
          .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-text p {
            line-height: 1; }
          @media (max-width: 767px) {
            .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link .nav-profile-text {
              display: none; } }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link.dropdown-toggle:after {
          line-height: 2; }
        @media (min-width: 992px) {
          .navbar .navbar-menu-wrapper .navbar-nav.navbar-nav-right {
            margin-left: auto; }
            .rtl .navbar .navbar-menu-wrapper .navbar-nav.navbar-nav-right {
              margin-left: 0;
              margin-right: auto; } }
  
  @media (max-width: 991px) {
    .navbar {
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
      -ms-flex-direction: row;
      flex-direction: row; }
      .navbar .navbar-brand-wrapper {
        width: 75px; }
        .navbar .navbar-brand-wrapper .navbar-brand.brand-logo {
          display: none; }
        .navbar .navbar-brand-wrapper .navbar-brand.brand-logo-mini {
          display: inline-block; }
    .navbar-collapse {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      margin-top: 0.5rem; } }
  
  @media (max-width: 480px) {
    .navbar .navbar-brand-wrapper {
      width: 55px; }
      .navbar .navbar-brand-wrapper .brand-logo-mini {
        padding-top: 0px; } }
  
  /* Sidebar */
  .sidebar {
    min-height: calc(100vh - 70px);
    background: #ff2942;
    font-family: "ubuntu-regular", sans-serif;
    padding: 0;
    width: 260px;
    z-index: 11;
    transition: width 0.25s ease, background 0.25s ease;
    -webkit-transition: width 0.25s ease, background 0.25s ease;
    -moz-transition: width 0.25s ease, background 0.25s ease;
    -ms-transition: width 0.25s ease, background 0.25s ease; }
    .sidebar .nav {
      overflow: hidden;
      -ms-flex-wrap: nowrap;
      flex-wrap: nowrap;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -ms-flex-direction: column;
      flex-direction: column;
      margin-bottom: 60px; }
      .sidebar .nav .nav-item {
        padding: 0 2.25rem;
        -webkit-transition-duration: 0.25s;
        transition-duration: 0.25s;
        transition-property: background;
        -webkit-transition-property: background; }
        .sidebar .nav .nav-item .collapse {
          z-index: 999; }
        .sidebar .nav .nav-item .nav-link {
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-align: center;
          -ms-flex-align: center;
          align-items: center;
          white-space: nowrap;
          padding: 1.125rem 0 1.125rem 0;
          color: #ffffff;
          -webkit-transition-duration: 0.45s;
          transition-duration: 0.45s;
          transition-property: color;
          -webkit-transition-property: color; }
          .sidebar .nav .nav-item .nav-link i {
            color: inherit; }
            .sidebar .nav .nav-item .nav-link i.menu-icon {
              font-size: 1.125rem;
              line-height: 1;
              margin-left: auto;
              color: #ffffff; }
              .rtl .sidebar .nav .nav-item .nav-link i.menu-icon {
                margin-left: 0;
                margin-right: auto; }
              .sidebar .nav .nav-item .nav-link i.menu-icon:before {
                vertical-align: middle; }
            .sidebar .nav .nav-item .nav-link i.menu-arrow {
              font-family: "FontAwesome";
              line-height: 1;
              font-size: 1.125rem;
              margin-left: auto;
              color: #ffffff; }
              .rtl .sidebar .nav .nav-item .nav-link i.menu-arrow {
                margin-left: 0;
                margin-right: auto; }
              .sidebar .nav .nav-item .nav-link i.menu-arrow:before {
                content: "\f053";
                font-size: inherit;
                color: inherit; }
              .sidebar .nav .nav-item .nav-link i.menu-arrow + .menu-icon {
                margin-left: .25rem; }
                .rtl .sidebar .nav .nav-item .nav-link i.menu-arrow + .menu-icon {
                  margin-left: 0;
                  margin-right: .25rem; }
          .sidebar .nav .nav-item .nav-link .menu-title {
            color: inherit;
            display: inline-block;
            font-size: 0.875rem;
            line-height: 1;
            vertical-align: middle; }
          .sidebar .nav .nav-item .nav-link .badge {
            margin-right: auto;
            margin-left: 1rem; }
          .sidebar .nav .nav-item .nav-link[aria-expanded="true"] .menu-arrow:before {
            content: "\f078"; }
        .sidebar .nav .nav-item.active {
          background: brown;
        border-left: 5px solid black; }
          .sidebar .nav .nav-item.active > .nav-link .menu-title {
            color: #ffffff;
            font-family: "ubuntu-medium", sans-serif; }
          .sidebar .nav .nav-item.active > .nav-link i {
            color: #ffffff; }
        .sidebar .nav .nav-item:hover {
          background: brown; }
        .sidebar .nav .nav-item.nav-profile .nav-link {
          height: auto;
          line-height: 1;
          border-top: 0;
          padding: 1.25rem 0; }
          .sidebar .nav .nav-item.nav-profile .nav-link .nav-profile-image {
            width: 44px;
            height: 44px; }
            .sidebar .nav .nav-item.nav-profile .nav-link .nav-profile-image img {
              width: 44px;
              height: 44px;
              border-radius: 100%; }
          .sidebar .nav .nav-item.nav-profile .nav-link .nav-profile-text {
            margin-left: 1rem; }
            .rtl .sidebar .nav .nav-item.nav-profile .nav-link .nav-profile-text {
              margin-left: auto;
              margin-right: 1rem; }
          .sidebar .nav .nav-item.nav-profile .nav-link .nav-profile-badge {
            font-size: 1.125rem;
            margin-left: auto; }
            .rtl .sidebar .nav .nav-item.nav-profile .nav-link .nav-profile-badge {
              margin-left: 0;
              margin-right: auto; }
        .sidebar .nav .nav-item.sidebar-actions {
          margin-top: 1rem; }
          .sidebar .nav .nav-item.sidebar-actions .nav-link {
            border-top: 0;
            display: block;
            height: auto; }
          .sidebar .nav .nav-item.sidebar-actions:hover {
            background: initial; }
            .sidebar .nav .nav-item.sidebar-actions:hover .nav-link {
              color: initial; }
      .sidebar .nav:not(.sub-menu) > .nav-item:hover:not(.nav-category):not(.nav-profile) > .nav-link {
        color: #ffffff; }
      .sidebar .nav.sub-menu {
        margin-bottom: 20px;
        margin-top: 0;
        list-style: none; }
        .sidebar .nav.sub-menu .nav-item {
          padding: 0; }
          .sidebar .nav.sub-menu .nav-item .nav-link {
            color: #ffffff;
            padding: 0.75rem 2rem 0.75rem 2rem;
            position: relative;
            font-size: 0.8125rem;
            line-height: 1;
            height: auto;
            border-top: 0; }
            .sidebar .nav.sub-menu .nav-item .nav-link:before {
              content: "\f061";
              font-family: "FontAwesome";
              display: block;
              position: absolute;
              left: 0px;
              top: 50%;
              -webkit-transform: translateY(-50%);
              transform: translateY(-50%);
              color: #ffffff;
              font-size: .75rem; }
              .rtl .sidebar .nav.sub-menu .nav-item .nav-link:before {
                left: auto;
                right: 0; }
            .sidebar .nav.sub-menu .nav-item .nav-link.active {
              color: #ff2942;
              background: transparent; }
            .sidebar .nav.sub-menu .nav-item .nav-link:hover {
              color: #ff2942; }
          .sidebar .nav.sub-menu .nav-item:hover {
            background: transparent;
          cursor: pointer; }
  
  /* style for off-canvas menu*/
  @media screen and (max-width: 991px) {
    .sidebar-offcanvas {
      position: fixed;
      max-height: calc(100vh - 70px);
      top: 70px;
      bottom: 0;
      overflow: auto;
      right: -260px;
      -webkit-transition: all 0.25s ease-out;
      transition: all 0.25s ease-out; }
      .sidebar-offcanvas.active {
        right: 0; } }
  
  /* Layouts */
  .navbar.fixed-top + .page-body-wrapper {
    padding-top: 70px; }
  
  @media (min-width: 992px) {
    .sidebar-icon-only .navbar .navbar-brand-wrapper {
      width: 70px; }
      .sidebar-icon-only .navbar .navbar-brand-wrapper .brand-logo {
        display: none; }
      .sidebar-icon-only .navbar .navbar-brand-wrapper .brand-logo-mini {
        display: inline-block; }
    .sidebar-icon-only .navbar .navbar-menu-wrapper {
      width: calc(100% - 70px); }
    .sidebar-icon-only .sidebar {
      width: 70px; }
      .sidebar-icon-only .sidebar .nav {
        overflow: visible; }
        .sidebar-icon-only .sidebar .nav .nav-item {
          position: relative;
          padding: 0; }
          .sidebar-icon-only .sidebar .nav .nav-item .nav-link {
            display: block;
            text-align: center; }
            .sidebar-icon-only .sidebar .nav .nav-item .nav-link .menu-title,
            .sidebar-icon-only .sidebar .nav .nav-item .nav-link .badge, .sidebar-icon-only .sidebar .nav .nav-item .nav-link .menu-sub-title {
              display: none; }
            .sidebar-icon-only .sidebar .nav .nav-item .nav-link .menu-title {
              border-radius: 0 5px 5px 0px; }
              .rtl.sidebar-icon-only .sidebar .nav .nav-item .nav-link .menu-title {
                border-radius: 5px 0 0 5px; }
            .sidebar-icon-only .sidebar .nav .nav-item .nav-link i.menu-icon {
              margin-right: 0;
              margin-left: 0; }
            .sidebar-icon-only .sidebar .nav .nav-item .nav-link i.menu-arrow {
              display: none; }
            .sidebar-icon-only .sidebar .nav .nav-item .nav-link[aria-expanded] .menu-title {
              border-radius: 0 5px 0 0px; }
              .rtl.sidebar-icon-only .sidebar .nav .nav-item .nav-link[aria-expanded] .menu-title {
                border-radius: 5px 0 0 0; }
          .sidebar-icon-only .sidebar .nav .nav-item.nav-profile span{
            display: none; }
          .sidebar-icon-only .sidebar .nav .nav-item.nav-profile img{
            display: block;
            margin-left: 10px;
           }
          .sidebar-icon-only .sidebar .nav .nav-item.nav-category {
            display: none; }
          .sidebar-icon-only .sidebar .nav .nav-item.nav-doc {
            margin: 0; }
            .sidebar-icon-only .sidebar .nav .nav-item.nav-doc i {
              display: block; }
          .sidebar-icon-only .sidebar .nav .nav-item .collapse {
            display: none; }
          .sidebar-icon-only .sidebar .nav .nav-item.hover-open .nav-link .menu-title {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background: brown;
            padding: 0.5rem 1.4rem;
            left: 70px;
            position: absolute;
            text-align: left;
            top: 0;
            bottom: 0;
            width: 190px;
            z-index: 1;
            line-height: 1.8; }
            .rtl.sidebar-icon-only .sidebar .nav .nav-item.hover-open .nav-link .menu-title {
              left: auto;
              right: 70px;
              text-align: left; }
            .sidebar-icon-only .sidebar .nav .nav-item.hover-open .nav-link .menu-title:after {
              display: none; }
          .sidebar-icon-only .sidebar .nav .nav-item.hover-open .collapse,
          .sidebar-icon-only .sidebar .nav .nav-item.hover-open .collapsing {
            display: block;
            padding: .5rem 0;
            background: brown;
            border-radius: 0 0 5px 0;
            position: absolute;
            left: 70px;
            width: 190px; }
            .rtl.sidebar-icon-only .sidebar .nav .nav-item.hover-open .collapse, .rtl.sidebar-icon-only .sidebar .nav .nav-item.hover-open .collapsing {
              left: auto;
              right: 70px;
              border-radius: 0 0 0 5px; }
        .sidebar-icon-only .sidebar .nav.sub-menu {
          padding: 0 0 0 1.5rem; }
          .sidebar-icon-only .sidebar .nav.sub-menu .nav-item .nav-link {
            text-align: left;
            padding-left: 20px; }
          .rtl.sidebar-icon-only .sidebar .nav.sub-menu .nav-item {
            margin-right: auto;
            margin-left: 0; }
            .rtl.sidebar-icon-only .sidebar .nav.sub-menu .nav-item .nav-link {
              text-align: right; }
              .rtl.sidebar-icon-only .sidebar .nav.sub-menu .nav-item .nav-link:before {
                left: 0;
                right: unset; }
      .sidebar-icon-only .sidebar .sidebar-actions {
        display: none; }
    .sidebar-icon-only .main-panel {
      width: calc(100% - 70px); } }
  .page-body-wrapper {
    min-height: calc(100vh - 70px);
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    padding-right: 0; }
    .page-body-wrapper.full-page-wrapper {
      width: 100%;
      min-height: 100vh; }
  
  .main-panel {
    -webkit-transition: width 0.25s ease, margin 0.25s ease;
    transition: width 0.25s ease, margin 0.25s ease;
    width: calc(100% - 260px);
    min-height: calc(100vh - 70px);
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column; }
    @media (max-width: 991px) {
      .main-panel {
        margin-left: 0;
        width: 100%; } }
  
  .content-wrapper {
    background: #ffffff;
    padding: 2.75rem 2.25rem;
    width: 100%;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1; }
</style>

