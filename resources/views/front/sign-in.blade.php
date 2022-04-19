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
    <title>FoodDay - Login</title>
        @livewireStyles

</head>

<body>

    <!-- header -->
         @include('partials.header')

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
                <h1 class="text-center">Sign in to FoodDay</h1>


                <form method="post" action="{{route('customer.sign_in_fun')}}" enctype="multipart/form-data">
                   @csrf
                   @if(Session::get('fail'))
                    <div class="alert alert-danger" role="alert"> 
                     {{ Session::get('fail') }} 
                    </div>
                      @endif
                  
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                         @error("email")
                            <p style="color:red">{{$errors->first("email")}}
                         @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                         @error("password")
                            <p style="color:red">{{$errors->first("password")}}
                         @enderror
                    </div>  

                    <div class="form-group">
                        <a href="{{route('customer.forget.password.form')}}">Forgot password?</a>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary w-100">Sign in</button>
                    </div>
                    <div class="form-group text-center mb-0">
                        <span>Don't have an account?</span>
                        <a href="{{route('customer.register')}}">Sign up</a>
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
    <script src="{{asset('js/custom.js')}}"></script>
        @livewireScripts

</body>

</html>