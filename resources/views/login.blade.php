<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png" />
    <!-- Author Meta -->
    <meta name="author" content="CodePixar" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Register in Matrix</title>

    @vite('resources/js/userForm.js')

    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>

<body>
    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="img/login.jpg" alt="" />
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>
                                There are advances being made in science and technology
                                everyday, and a good example of this is the
                            </p>
                            <a class="primary-btn" href="{{ url('register') }}">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Log in</h3>
                        <form class="row login_form" method="post" id="loginForm">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Email'" />
                            </div>
                            <div class="d-flex col-md-12 form-group align-items-center">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'" />
                            </div>
                            {{-- <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector" />
                                    <label for="f-option2">Keep me logged in</label>
                                </div>
                            </div> --}}
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">
                                    Log In
                                </button>
                                <a href="{{ url('/forget-password') }}" class="forgot_password">Forgot Password?</a>
                                <div id="errors-list"></div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }} "></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
</body>

</html>
