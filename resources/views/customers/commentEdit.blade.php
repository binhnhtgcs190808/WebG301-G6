<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Products</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="./customers/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="./customers/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="./customers/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="./customers/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="./customers/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!--body-->

<body class="main-layout inner_posituong">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="./customers/images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="./customers/images/logo.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href='{{ url('customers/index') }}'>Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ url('customers/products') }}'>Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.html">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href='{{ url('admin/index') }}'>Admin Panel</a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="#"><i class="fa fa-search"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href='{{ url('customers/login') }}'>Login</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--products-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Update Admin Info </h3>

            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form action="{{ url('customers/cmtUpdate') }}" method="POST">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="id">Comment ID:</label>
                                    <input type="text" class="form-control" id="id" readonly
                                        value = "{{ $cmt->id }}" name="id">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name"
                                        value = "{{ $cmt->name }}" name="name">
                                </div>
                                <div>
                                    <label for="name">Product ID:</label>
                                    <select name="productID" id="productID" class="form-control">
                                        @foreach ($product as $pro)
                                            <option value="{{ $pro->productID }}">{{ $pro->productID }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email"
                                        value = "{{ $cmt->email }}" name="email">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="content">Content:</label>
                                    <input type="text" class="form-control" id="text"
                                        value = "{{ $cmt->content }}" name="text">
                                </div>

                                <button type="update" class="btn btn-primary">Update</button>
                                <a href="{{ url('customers/comment') }}" class="btn btn-danger"> Back </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--end products-->
    <!--footer-->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <img class="logo1" src="images/logo1.png" alt="#" />
                        <ul class="social_icon">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <h3>About Us</h3>
                        <ul class="about_us">
                            <li>dolor sit amet, consectetur<br> magna aliqua. Ut enim ad <br>minim veniam, <br>
                                quisdotempor incididunt r</li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <h3>Contact Us</h3>
                        <ul class="conta">
                            <li>dolor sit amet,<br> consectetur <br>magna aliqua.<br> quisdotempor <br>incididunt ut e
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <form class="bottom_form">
                            <h3>Newsletter</h3>
                            <input class="enter" placeholder="Enter your email" type="text"
                                name="Enter your email">
                            <button class="sub_btn">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html
                                    Templates</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="./customers/js/jquery.min.js"></script>
    <script src="./customers/js/popper.min.js"></script>
    <script src="./customers/js/bootstrap.bundle.min.js"></script>
    <script src="./customers/js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="./customers/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="./customers/js/custom.js"></script>
</body>
