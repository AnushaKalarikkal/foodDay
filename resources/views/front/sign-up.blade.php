<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>FoodDay - Signup</title>
</head>

<body>

    <!-- header -->
    <header>
        <div class="container-fluid">
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light fixed-top">
                <a class="navbar-brand" href="home.html"><img src="assets/images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/front">Home <span class="sr-only">(current)</span></a>
                        </li>
                     
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.signIn')}}">Sign In</a>
                        </li>

                         <li class="nav-item">
                            <a class="nav-link" href="/empty_cart">
                                <span class="cart-badge-wrap">
                                    <span class="cart-badge">0</span>
                                    <i class='bx bx-shopping-bag mr-1'></i>
                                </span>
                                Cart</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header -->

    <!-- <div class="search-nav">
        <div class="container">
            <h3 class="mb-0">Sign in</h3>
        </div>
    </div> -->

    <section class="log-reg-sec">
        <div class="content">
            <div class="form-content">
                <img src="assets/images/logo-round.png" alt="" class="form-logo">
                <h1 class="text-center">Sign up to FoodDay</h1>
                <form method="post" action="{{route('customer.register.store')}}" enctype="multipart/form-data">
                   @csrf

                    @if(Session::get('success'))
                     <div class="alert alert-success"> 
                     {{ Session::get('success') }} 
                    </div>
                      @endif
                    <div class="form-group ">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}">
                        @error("first_name")
                            <p style="color:red">{{$errors->first("first_name")}}
                         @enderror
                    </div>
                    <div class="form-group ">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
                        @error("last_name")
                            <p style="color:red">{{$errors->first("last_name")}}
                         @enderror
                    </div>
                    <div class="form-group ">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                          @error("email")
                            <p style="color:red">{{$errors->first("email")}}
                         @enderror
                    </div>
                    <div class="form-group ">
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" value="{{ old('mobile') }}">
                          @error("mobile")
                            <p style="color:red">{{$errors->first("mobile")}}
                         @enderror
                    </div>
                    <div class="form-group ">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                           @error("password")
                            <p style="color:red">{{$errors->first("password")}}
                         @enderror
                    </div>
                     <div class="form-group ">
                        <input type="password" name="c_password" class="form-control" placeholder="Confirm Password" >
                           @error("confirm_password")
                            <p style="color:red">{{$errors->first("confirm_password")}}
                         @enderror
                    </div>
                    <div class="form-group  text-center">
                        <span class="d-inline-block">By clcking Sign up, Continue with Faecbook or Continue with
                            Google, you agree to our <a href="">Terms and Conditions</a> and <a href="">Privacy
                                Statement</a></span>
                    </div>

                    <div class="form-group ">
                        <button class="btn btn-primary w-100">Sign up</button>
                    </div>
                    <div class="form-group text-center mb-0">
                        <span>Already have an account?</span>
                        <a href="/sign_in">Sign In</a>
                    </div>

                </form>
            </div>
        </div>
    </section>



    <!-- footer -->

    @include('partials.footer')

    <!-- footer end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
    <script src="{{('js/custom.js')}}"></script>
</body>

</html>