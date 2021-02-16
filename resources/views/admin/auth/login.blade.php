<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/admin/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/admin/assets/images/favicon.png')}}" type="image/x-icon">
    <title>Admin Login</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/feather-icon.css')}}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('assets/admin/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/style/css/toastr.css')}}">
  </head>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <div class="container-fluid p-0">
        <!-- login page with video background start-->
        <div class="auth-bg-video">
          <video id="bgvid" poster="{{asset('assets/admin/assets/images/other-images/coming-soon-bg.jpg')}}" playsinline="" autoplay="" muted="" loop="">
            <source src="{{asset('assets/admin/assets/video/auth-bg.mp4')}}" type="video/mp4">
          </video>
          <div class="authentication-box">
            <div class="mt-4">
              <div class="card-body">
                <div class="cont text-center">
                  <div> 
                    <form class="theme-form" action="{{ route('admin.login.submit') }}" method="post">
                      @csrf
                      <h4>LOGIN</h4>
                      <h6>Enter your Username and Password</h6>
                      <div class="form-group">
                        <label class="col-form-label pt-0">Your Name</label>
                        <input class="form-control" type="email" required="" name="email">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" required="" name="password">
                      </div>
                      <div class="checkbox p-0">
                        <input id="checkbox1" type="checkbox">
                        <label for="checkbox1">Remember me</label>
                      </div>
                      <div class="form-group row mt-3 mb-0">
                        <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                      </div>
                      <div class="login-divider"></div>
                     
                    </form>
                  </div>
                  <div class="sub-cont">
                    <div class="img">
                      <div class="img__text m--up">
                        <h2>New User?</h2>
                        <p>Sign up and discover great amount of new opportunities!</p>
                      </div>
                      <div class="img__text m--in">
                        <h2>One of us?</h2>
                        <p>If you already has an account, just sign in. We've missed you!</p>
                      </div>
                      <div class="img__btn"><span class="m--up">Sign up</span><span class="m--in">Sign in</span></div>
                    </div>
                    <div>
                      <form class="theme-form">
                        <h4 class="text-center">NEW USER</h4>
                        <h6 class="text-center">Enter your Username and Password For Signup</h6>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <input class="form-control" type="text" placeholder="First Name">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <input class="form-control" type="text" placeholder="Last Name">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <input class="form-control" type="text" placeholder="User Name">
                        </div>
                        <div class="form-group">
                          <input class="form-control" type="password" placeholder="Password">
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <button class="btn btn-primary" type="submit">Sign Up</button>
                          </div>
                          <div class="col-sm-8">
                            <div class="text-left mt-2 m-l-20">Are you already user?  <a class="btn-link text-capitalize" href="login.html">Login</a></div>
                          </div>
                        </div>
                        <div class="form-divider"></div>
                        <div class="social mt-3">
                          <div class="row btn-showcase">
                            <div class="col-sm-4">
                              <button class="btn social-btn btn-fb">Facebook</button>
                            </div>
                            <div class="col-sm-4">
                              <button class="btn social-btn btn-twitter">Twitter</button>
                            </div>
                            <div class="col-sm-4">
                              <button class="btn social-btn btn-google">Google +</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- login page with video background end-->
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('assets/admin/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('assets/admin/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/bootstrap/bootstrap.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('assets/admin/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('assets/admin/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('assets/admin/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('assets/admin/assets/js/login.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('assets/admin/assets/js/script.js')}}"></script>
    <script src="{{asset('assets/admin/style/js/toastr.js')}}"></script>
    @include('admin.layouts.inc.toastr_sweet')
  </body>
</html>