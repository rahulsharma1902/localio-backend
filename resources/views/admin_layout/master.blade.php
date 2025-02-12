<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ url('front/img/icon.svg') }}">
    <!-- Page Title  -->
    <title>Localio || Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admin-theme/assets/css/dashlite.css?ver=3.1.2') }}">
    <link rel="stylesheet" href="{{ asset('admin-theme/coustam.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin-theme/assets/css/theme.css?ver=3.1.2') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="{{ asset('front/admin/style.css') }}">
    <!-- slick slider cdn -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!-- ckeditor -->
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/42.0.0/classic/ckeditor.js"></script> --}}

    <style>
        HEAD .dropdown-menu.dropdown-menu-end.show {
            height: 42vh;
            overflow-y: scroll;
        }

        .dropdown-menu.dropdown-menu-end.show {
            height: 42vh;
            overflow-y: scroll;
        }

        :root {
            --btn-background: #F9633B;
            ;
        }

        .btn-localio {
            background-color: var(--btn-background);
            border: none;
            outline: none;
        }

        .btn-localio:hover {
            background-color: var(--btn-background);
            border: none;
            outline: none;
        }


        .edit-btn {
            --bs-dropdown-min-width: 45px;
            background-color: #F9633B;
            color: white;
            overflow: hidden !important;
            height: 41px !important;
        }

        .edit-btn>ul>li>a {
            padding: 2px 21px !important;
            color: white !important;
        }

        .link-list-opt a:hover {
            background-color: #F9633B !important;
            color: white !important;
        }


        em.icon.ni.ni-more-h {
            color: var(--bs-link-color) !important;
        }

        a.btn.btn-primary.d-none.d-md-inline-flex {
            background-color: var(--btn-background) !important;
            border: none;
        }

        .nk-menu-link:hover,
        .active>.nk-menu-link {
            color: var(--btn-background) !important;
        }
    </style>

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="spinner-container">
        <div class="spinner"></div>
    </div>
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                            data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                            data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="{{ url('admin-dashboard/products') ?? '' }}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{ asset('front/img/logo.svg') }}"
                                srcset="{{ asset('front/img/logo.svg') }}" alt="logo">
                            <img class="logo-dark logo-img" src="{{ asset('front/img/logo-dark.svg') }}"
                                srcset="{{ asset('front/img/logo.svg') }}" alt="logo-dark">
                        </a>
                    </div>

                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <!-- Dashboard -->
                                <li class="nk-menu-heading">
                                    <a href="{{ url('admin-dashboard/products') ?? '' }}">
                                        <h6 class="overline-title text-primary-alt">Dashboard</h6>
                                    </a>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-article"></em></span>
                                        <span class="nk-menu-text">Products</span>
                                    </a>
                                    <ul class="nk-menu-sub">

                                    </ul>


                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('/admin-dashboard/products') }}" class="nk-menu-link"><span
                                                    class="nk-menu-text">Product</span>
                                            </a>
                                        </li>

                                        <li class="nk-menu-item">
                                            <a href="{{ route('productfeature.index') }}?tab=top_features"
                                                class="nk-menu-link"><span class="nk-menu-text">Top Product Feature</span>
                                            </a>
                                        </li>

                                        <li class="nk-menu-item">
                                            <a href="{{ route('productfeature.index') }}?tab=typical_custmor"
                                                class="nk-menu-link"><span class="nk-menu-text">Typical Customers</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('productfeature.index') }}?tab=platform_supported"
                                                class="nk-menu-link"><span class="nk-menu-text">Platforms
                                                    Supported</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('productfeature.index') }}?tab=support_options"
                                                class="nk-menu-link"><span class="nk-menu-text">Support Options</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('productfeature.index') }}?tab=tranning_options"
                                                class="nk-menu-link"><span class="nk-menu-text">Training Options</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nk-menu-item has-sub">
                                    <a href="{{ url('admin-dashboard/categories') ?? '#' }}" class="nk-menu-link ">
                                        <span class="nk-menu-icon"><i class="icon fas fa-icons"></i></span>
                                        <span class="nk-menu-text">categories</span>
                                    </a>
                                </li>

                                <li class="nk-menu-item has-sub">
                                    <a href="{{ url('admin-dashboard/filters') ?? '#' }}" class="nk-menu-link ">
                                        <span class="nk-menu-icon"><em class="icon ni ni-filter-fill"></em></span>
                                        <!-- <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span> -->
                                        <span class="nk-menu-text">Filter</span>
                                    </a>

                                </li>

                                <!-- Globals  -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span>
                                        <span class="nk-menu-text">Global Section</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('/admin-dashboard/header-page') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Header</span></a>
                                        </li>


                                        <li class="nk-menu-item ">
                                            <a href="{{ url('/admin-dashboard/footer-page') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Footer</span></a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span>
                                        <span class="nk-menu-text">Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">


                                        <li class="nk-menu-item ">
                                            <a href="{{ url('/admin-dashboard/home-page') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Home</span></a>
                                        </li>


                                        <li class="nk-menu-item ">
                                            <a href="{{ route('who_we_are_content') }}" class="nk-menu-link"><span
                                                    class="nk-menu-text">Who we are</span></a>

                                        </li>

                                        <li class="nk-menu-item ">
                                            <a href="{{ route('admin.page-expert-guide.update') }}" class="nk-menu-link"><span
                                                    class="nk-menu-text">Expert Guide</span></a>

                                        </li>

                                        <li class="nk-menu-item ">
                                            <a href="{{ route('admin.page-contact.update') }}" class="nk-menu-link"><span
                                                    class="nk-menu-text">Contact</span></a>

                                        </li>
                                        <li class="nk-menu-item ">
                                            <a href="{{ url('/admin-dashboard/categories-page') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Categories
                                                </span></a>
                                        </li>

                                        <li class="nk-menu-item ">
                                            <a href="{{ url('/admin-dashboard/top-product-page') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Top Product
                                                </span></a>
                                        </li>

                                        <li class="nk-menu-item ">
                                            <a href="{{ url('/admin-dashboard/policies') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Privacy Policy
                                                </span></a>
                                        </li>

                                        <li class="nk-menu-item ">
                                            <a href="{{ url('/admin-dashboard/terms') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Terms And Conditions
                                                </span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-article"></em></span>
                                        <span class="nk-menu-text">Reviews</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('/admin-dashboard/reviews') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Reviews</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-article"></em></span>
                                        <span class="nk-menu-text">Article Section</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('/admin-dashboard/article-category') }}"
                                                class="nk-menu-link"><span
                                                    class="nk-menu-text">Article-Category</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('/admin-dashboard/article') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Article</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-article"></em></span>
                                        <span class="nk-menu-text">FAQ's Section</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('/admin-dashboard/faqs') }}" class="nk-menu-link"><span
                                                    class="nk-menu-text">Faq's</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span>
                                        <span class="nk-menu-text">Setting</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ url('/admin-dashboard/site-languages') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">
                                                    Languages</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ url('/admin-dashboard/country') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">Country</span></a>
                                        </li>

                                        <li class="nk-menu-item">
                                            <a href="{{ url('/admin-dashboard/db-refresh') }}"
                                                class="nk-menu-link"><span class="nk-menu-text">DB-Refresh</span></a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar @e -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon"
                                    data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="{{ url('admin-dashboard') ?? '' }}" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('admin-theme/images/logo.png') }}"
                                        srcset="{{ asset('admin-theme/images/logo2x.png 2x') }}" alt="logo">
                                    <img class="logo-dark logo-img"
                                        src="{{ asset('admin-theme/images/logo-dark.png') }}"
                                        srcset="{{ asset('admin-theme/images/logo-dark2x.png 2x') }}"
                                        alt="logo-dark">
                                </a>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li>
                                        <div class="dropdown">
                                            <a href="#"
                                                class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                data-bs-toggle="dropdown">
                                                {{ Cookie::get('lang_code', config('app.locale')) }}
                                                {{-- {{config('app.locale')}} --}}
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    @php
                                                        $languages = \App\Models\Language::where('status', 1)->get();
                                                    @endphp
                                                    @foreach ($languages as $language)
                                                        <li>
                                                            <a
                                                                href="{{ url('set-site-active-language/' . $language->lang_code) }}">
                                                                <span>{{ $language->name }}
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                                        <!-- <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="quick-icon border border-light">
                                                <img class="icon" src="{{ asset('admin-theme/images/flags/english-sq.png') }}" alt="">
                                            </div>
                                        </a> -->
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                                            <ul class="language-list">
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <img src="{{ asset('admin-theme/images/flags/english.png') }}"
                                                            alt="" class="language-flag">
                                                        <span class="language-name">English</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Administrator</div>
                                                    <div class="user-name dropdown-indicator">
                                                        {{ Auth::user()->first_name ?? '' }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ Auth::user()->name ?? '' }}</span>
                                                        <span class="sub-text">{{ Auth::user()->email ?? '' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <!-- <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li> -->
                                                    <li><a href="{{ url('admin-dashboard/setting') ?? '' }}"><em
                                                                class="icon ni ni-setting-alt"></em><span>Account
                                                                Setting</span></a></li>

                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ url('/logout') }}"><em
                                                                class="icon ni ni-signout"></em><span>Sign
                                                                out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- <li class="dropdown notification-dropdown me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @start -->
                <div class="nk-content ">
                    @yield('content')
                </div>
                <!-- content @end -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2024 by <a
                                    href="{{ url('admin-dashboard') ?? '' }}" target="_blank">localio</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="{{ asset('admin-theme/assets/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('admin-theme/assets/js/scripts.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('admin-theme/assets/js/charts/gd-default.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('admin-theme/assets/js/example-toastr.js?ver=3.1.2') }}"></script>
    {{-- select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- remove confermation pop up -->

    <script>
        $('body').delegate('.removeConfermation', 'click', function(e) {
            event.preventDefault();
            url = $(this).attr('data-url');
            Swal.fire({
                title: "Are you sure?",
                text: "You lost your all related data if you remove this",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
            // console.log(url);
        });
    </script>

    @if (Session::get('error'))
        <script>
            toastr.clear();
            NioApp.Toast(
                '{{ Session::get('
                                                                                                                                                                                                                                error ') }}',
                'error', {
                    position: 'top-right'
                });
        </script>
    @endif

    @if (Session::get('success'))
        <script>
            toastr.clear();
            NioApp.Toast(
                '{{ Session::get('                                                                                                                                                                                                          success ') }}',
                'success', {
                    position: 'top-right'
                });
        </script>
    @endif

    <!-- script make theme dark mode dinamic: -->
    <script>
        $(document).ready(function() {
            var theme = localStorage.getItem('siteTheme');
            if (theme && theme === 'dark') {
                $('body').addClass('nk-body bg-lighter npc-general has-sidebar no-touch nk-nio-theme dark-mode');
            }
            $('.dark-switch').on('click', function() {
                if ($(this).hasClass('active')) {
                    localStorage.setItem('siteTheme', 'light');
                } else {
                    localStorage.setItem('siteTheme', 'dark');
                }
            });
        });
    </script>
    <!-- script make theme dark mode dinamic end: -->
    <script>
        var editorElements = document.querySelectorAll('.description');
        editorElements.forEach(function(element) {
            ClassicEditor
                .create(element)
                .catch(error => {
                    console.error(error);
                });
        });
        var vareditorElements = document.querySelectorAll('.variation_description');
        vareditorElements.forEach(function(element) {

    var editorElements = document.querySelectorAll('.description');
    editorElements.forEach(function(element) {
        ClassicEditor
            .create(element)
            .catch(error => {
                console.error(error);
            });
    });
    var vareditorElements = document.querySelectorAll('.variation_description');
    vareditorElements.forEach(function(element) {
        ClassicEditor
            .create(element)
            .catch(error => {
                console.error(error);
            });
    });

    function initializeEditors(container) {
        var var_editorElements = container.querySelectorAll('.variation_description');

        var_editorElements.forEach(function(element) {

            ClassicEditor
                .create(element)
                .catch(error => {
                    console.error(error);
                });
        });

        function initializeEditors(container) {
            var var_editorElements = container.querySelectorAll('.variation_description');

            var_editorElements.forEach(function(element) {
                ClassicEditor
                    .create(element)
                    .then(editor => {
                        editor.setData('');
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });


            function initializeEditors(container) {
                var var_editorElements = container.querySelectorAll('.variation_description');

                var_editorElements.forEach(function(element) {
                    ClassicEditor
                        .create(element)
                        .then(editor => {
                            editor.setData('');
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            }

        }
    }
});
    </script>

</body>

</html>
