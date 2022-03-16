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
    <title>FoodDay - My Account</title>
</head>

<body>

    <!-- header -->
    <header>
        <div class="container-fluid">
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light fixed-top">
                <a class="navbar-brand" href="home.html"><img src="{{asset('images/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="/my_home">Home <span class="sr-only">(current)</span></a>
                        </li>



                        <li class="nav-item active">
                            <a class="nav-link" href="/Account">
                                <i class='bx bx-user mr-1'></i>
                                My Account</a>
                        </li>
                        <li class="nav-item">
                           @if(count((array) session('cart'))==0)
                            <a class="nav-link" href="/empty_cart">
                                <span class="cart-badge-wrap">
                                    <span class="cart-badge">{{ count((array) session('cart')) }}</span>
                                    <i class='bx bx-shopping-bag mr-1'></i>
                                </span>
                                Cart</a>
                     @else
                                <a class="nav-link" href="/cart_items">
                                <span class="cart-badge-wrap">
                                    <span class="cart-badge">{{ count((array) session('cart')) }}</span>
                                    <i class='bx bx-shopping-bag mr-1'></i>
                                </span>
                                Cart</a>
                    @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header -->

    <div class="search-nav">
        <div class="container">
            <h3 class="mb-0">My Account</h3>
        </div>
    </div>

    <section class="py-60">
        <div class="container">

            <div class="row">

                <div class="col-lg-3">

                    <div class="my-account-menu">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                           

                            <a class="nav-link {{Request::is('addresses') ? 'active' :'' ;}}" href="{{route('address')}}"

                                role="tab" aria-controls="v-pills-messages" aria-selected="false"><i

                                    class='bx bxs-home-smile'></i> Addresses</a>

                           <a class="nav-link {{Request::is('Account') ? 'active' :'' ;}}" href="{{route('account')}}"
                                 aria-controls="v-pills-settings" aria-selected="false"><i
                                    class='bx bxs-user-rectangle'></i> Account Details</a>

                            <a class="nav-link {{Request::is('change-password') ? 'active' :'' ;}}"  href="{{route('change')}}"
                                 aria-controls="v-pills-settings" aria-selected="false"><i
                                    class='bx bxs-wallet-alt'></i> Change Password</a>

                            <a class="nav-link" href="/Logout"
                                role="tab" aria-controls="v-pills-settings" aria-selected="false"><i
                                    class='bx bxs-log-out'></i> Logout</a>

                        </div>
                    </div>

                </div>
                
                        @yield('address')
                          @yield('content')

                           @yield('change-password')

                           
                        </div>
                    </div>

                </div>

                             <!-- Address Modal -->
                <div class="modal fade  address-model" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-x btn-close"></i>
                                </button>
                                <h5 class="mb-4">Add Delivery Address</h5>


                                <form method="post" action="{{route('address.store')}}" enctype="multipart/form-data">
                                    <div class="form-row">
                                        @csrf 
                                       @if(Session::get('success'))
                                          <div class="alert alert-success"> 
                                             {{ Session::get('success') }} 
                                           </div>
                                        @endif

                                        <div class="form-group col-lg-12">
                                            <input type="text" name="location" class="form-control" placeholder="Location">
                                               @error("location")
                                                    <p style="color:red">{{$errors->first("location")}}
                                                @enderror
                                        </div>
                                         <div class="form-group col-lg-12">
                                            <input type="text" name="house_name" class="form-control" placeholder="House Name / Flat / Building"> 
                                            @error("house_name")
                                                    <p style="color:red">{{$errors->first("house_name")}}
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="area" class="form-control" placeholder="Area / Street">
                                            @error("area")
                                                    <p style="color:red">{{$errors->first("area")}}
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="city" class="form-control" placeholder="City">
                                            @error("city")
                                                    <p style="color:red">{{$errors->first("city")}}
                                                @enderror
                                        </div>
                                          <div class="form-group col-lg-12">
                                            <input type="text" name="landmark" class="form-control" placeholder="Landmark">
                                        </div>
                                       
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="pincode" class="form-control" placeholder="Pincode">
                                            @error("pincode")
                                                    <p style="color:red">{{$errors->first("pincode")}}
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <select name="home" id="home" class="form-control">

                                                <option value="0" disabled selected>Address Type</option>

                                                <option value="Home">Home</option>

                                                <option value="Office">Office</option>

                                                <option value="Other">Other</option>

                                            </select>                                        </div>
                                        <div class="form-group col-lg-12">
                                            <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Note for Driver"></textarea>
                                        </div>

                                        <div class="form-group col-md-6 mb-md-0 d-none d-md-block">
                                            <button type="button" class="btn btn-outline-primary w-100"
                                                data-dismiss="modal" aria-label="Close">Close</button>
                                        </div>
                                        <div class="form-group col-md-6 mb-0">
                                            <button class="btn btn-secondary w-100">Save</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Address Modal End -->

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
  
    @yield('javascript')
    @yield('editJs')

    

    
</body>

</html>