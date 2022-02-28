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
    <title>FoodDay - Restaurant listing</title>
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
                            <a class="nav-link" href="/my_home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="restaurant-listing.html">Restaurants</a>
                        </li> -->

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="login.html">Sign In</a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link" href="/Account">
                                <i class='bx bx-user mr-1'></i>
                                My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.html">
                                <span class="cart-badge-wrap">
                                    <span class="cart-badge">9</span>
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

    <div class="search-nav">
        <div class="container">
            
            <h3>All restaurants delivering to  </h3>
            <p>Change location</p>
            <div class="row">
                <div class="col-lg-8 col-xl-6">
                    <form action="{{route('search')}}" method="get" enctype="multipart/form-data">
                    @csrf
                        <div class="input-group search-location-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter your delivery location"
                                aria-label="delivery location" aria-describedby="button-addon2">
                            <a href="" class="btn-locate"><i class='bx bx-target-lock'></i> Locate Me</a>
                            <div class="input-group-append btn-find-food">
                                <button class="btn btn-primary" type="submit">Find Food</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

  

        </div>
    </div>

    <section class="py-60">
        <div class="container">
            <h4 class="mb-4">Popular Restaurants</h4>
            <div class="row rest-listing-row">

              @foreach($restaurant as $value)
                <div class="col-md-4 col-sm-6">
                    <a href="{{route('restaurant_details',$value->id)}}" class="card restaurant-card">

                       
                            @if($value->is_open==1)
                             <span class="restaurant-status">
                            <em class="ribbon"></em>Open</span>
                            @else
                                <span class="restaurant-status closed"><em class="ribbon"></em>Closed</span>
                                @endif
                        <div class="restaurant-image" style="
                                background-image: url('{{$value->banner}}');
                              ">
                        </div>
                      
                        <div class="card-body">
                            <h5 class="card-title">{{$value->name}}</h5>

                              @foreach($cuisines as $cuisine)

                                   @if($value->cuisines->contains($cuisine->id))
                                        <div class="cuisines ">
                                            <span>{{$cuisine->cuisine}}</span>
                                        </div>
                                    @endif
                              @endforeach

                            <p class="location"><i class="bx bx-location-plus"></i> 
                                {{$value->location}}</p>
                            <div class="details">
                                <span class="badge"><i class='bx bxs-star'></i> 4.2</span>
                                <span class="badge">{{$value->default_preparation_time}} Mins</span>
                                <span class="badge">${{$value->cost_for_two_people}} for two</span><br>
                               <span class="badge">Minimum order of  ${{$value->min_order_value}}</span>
                               @if($value->allow_pickup==1)
                                  <span class="badge">Pick Up Available</span>

                               @else
                                  <span class="badge">Pick Up Not Available</span>
                                @endif
                            </div>
                        </div>
                             
                    </a>
                </div>
           
               @endforeach

            </div>
        </div>
    </section>


    <!-- footer -->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <h3>Quick links</h3>
                        <ul>
                            <li><a href="home.html">Home</a></li>
                            <li><a href="restaurant-listing.html">Restaurants</a></li>
                            <li><a href="about-us.html">About us</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="cart.html">Cart</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h3>Quick links</h3>
                        <ul>
                            <li><a href="enrol-your-restaurant.html">Enroll as Restaurant</a></li>
                            <li><a href="enrol-delivery-boy.html">Enroll as Delivery Boy</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="terms-and-conditions.html">Terms and Conditions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <h3>Contact us</h3>
                        <ul class="contact">
                            <li><i class='bx bx-location-plus'></i><span>Down Town Building, MG Road, Toronto, Canada,
                                    784578</span></li>
                            <li><i class='bx bx-mail-send'></i><span>hello@cedextech.com</span></li>
                            <li><i class='bx bx-phone'></i><span>+91-8129881750</span></li>
                        </ul>
                        <div class="social">
                            <i class='bx bxl-facebook-circle'></i>
                            <i class='bx bxl-twitter'></i>
                            <i class='bx bxl-youtube'></i>
                            <i class='bx bxl-instagram-alt'></i>
                        </div>
                    </div>
                </div><!-- End row -->
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">

                <div class="text-center">
                    <p class="mb-0 copy-right">© 2021 FoodDay All Rights Reserved</p>
                </div>
            </div>
        </div>

        <!-- mobile footer -->

        <div class="mobile-footer">
            <div class="row">
                <div class="col-4 item">
                    <a href="home.html">
                        <i class='bx bx-search'></i>
                        <span>Search</span>
                    </a>
                </div>
                <div class="col-4 item">
                    <a href="cart.html">
                        <i class='bx bx-cart'><span class="badge badge-light">22</span></i>
                        <span>Cart</span>
                    </a>
                </div>
                <div class="col-4 item">
                    <a href="my-account.html">
                        <i class='bx bx-user'></i>
                        <span>Account</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- mobile footer end -->

    </footer>

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
</body>

</html>