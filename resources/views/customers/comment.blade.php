

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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
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
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
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
                                    <a href="index.html"><img src="images/logo.png" alt="#" /></a>
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
                                        <a class="nav-link"href='{{ url('customers/comment') }}'>comment</a>
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
    <form action="{{ url('customers/store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="name">Product ID:</label>
            <select name="productID" id="productID" class="form-control">
                @foreach ($product as $pro)
                    <option value="{{ $pro->productID }}">{{ $pro->productID }}</option>
                @endforeach
            </select>
        </div>
    
        <div>
            <label for="email">Email (tuỳ chọn):</label>
            <input type="email" name="email" id="email">
        </div>
    
        <div>
            <label for="content">Nội dung:</label>
            <textarea name="content" id="content" rows="4" required></textarea>
        </div>
    
        <button type="submit">Gửi bình luận</button>
    </form>
    
    <h3>Bình luận</h3>

    <div class="row">
        <form method="post">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!--<h2>Product List</h2>-->
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-success">
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>productID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $cmt)
                                        <tr style="text-align: center">
                                            <td>{{ $cmt->id }}</td>
                                            <td>{{ $cmt->productID }}</td>
                                                        <td>{{ $cmt->name }}</td>
                                                        <td>{{ $cmt->email }}</td>
                                                        <td>{{ $cmt->content }}</td>
                                            <td>
                                                <a href="{{ url('customers/commentEdit/' . $cmt->id) }}"
                                                                title="Edit this admin"> edit </a>
                                                <a href="{{ url('customers/cmtDelete/' . $cmt->id) }}"
                                                                title="Delete this admin">delete</a>
                                            </td>
                                        </tr>
                            @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            {{csrf_field()}}
   
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
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>
