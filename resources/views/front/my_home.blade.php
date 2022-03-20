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
    <title>FoodDay - Home</title>
</head>

<body>

    <!-- header -->
    @include('partials.header')
    <!-- Header -->

    <!-- Banner -->

    <div class="home-banner d-flex align-items-center">
        <div class="container">
            <div class="banner-content">
                <h2>Delivering your favorite food to your door step.</h2>
                <form action="{{route('customer.search')}}" method="get" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group search-location-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter your delivery location"
                            aria-label="delivery location" aria-describedby="button-addon2">
                        <a href="" class="btn-locate"><i class='bx bx-target-lock'></i> Locate Me</a>
                        <!-- <button class="btn-locate"><i class='bx bx-target-lock'></i> Locate Me</button> -->

                        <div class="input-group-append btn-find-food">
                            <button class="btn btn-danger" type="submit"
                               >Find Food</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Banner End -->

    <!-- How it works -->

     <section class="how-it-works pb-0">
        <div class="container">
            <h4>How It Works</h4>
            <div class="row">
                <div class="col-lg-4">
                    <div class="item">
                        <div class="item-image">
                            <img src="{{asset('images//meal.svg')}}" alt="">
                        </div>
                        <div class="item-desc">
                            <h4>Choose Your Dish</h4>
                            <p>Choose your favorite meals and order online or by phone. It's easy to customize your
                                order
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="item-image">
                            <img src="{{asset('images//delivery.svg')}}" alt="">
                        </div>
                        <div class="item-desc">
                            <h4>We Deliver Your Meals</h4>
                            <p>We prepared and delivered meals arrive at your door. Duis autem vel eum iriure dolor in
                                hendrerit in vulputate.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="item-image">
                            <img src=" {{asset('images//eat-enjoy.svg')}}" alt="">
                        </div>
                        <div class="item-desc">
                            <h4>Eat And Enjoy</h4>
                            <p>No shooping, no cooking, no counting and no cleaning. Enjoy your healthy meals with your
                                family.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- location listing section -->

    <div class="location-listing-section">
        <div class="container">
            <h4 class="mb-4">Top cities</h4>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <ul class="delivery-ul">
                        <li><a href="">Tokyo</a></li>
                        <li><a href="">Singapore</a></li>
                        <li><a href="">Berlin</a></li>
                        <li><a href="">Seoul</a></li>
                        <li><a href="">Toronto</a></li>
                        <li><a href="">Paris</a></li>
                        <li><a href="">Munich</a></li>
                        <li><a href="">London</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <ul class="delivery-ul">
                        <li><a href="">Toronto</a></li>
                        <li><a href="">Paris</a></li>
                        <li><a href="">Munich</a></li>
                        <li><a href="">London</a></li>
                        <li><a href="">Tokyo</a></li>
                        <li><a href="">Singapore</a></li>
                        <li><a href="">Berlin</a></li>
                        <li><a href="">Seoul</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <ul class="delivery-ul">
                        <li><a href="">Tokyo</a></li>
                        <li><a href="">Singapore</a></li>
                        <li><a href="">Berlin</a></li>
                        <li><a href="">Seoul</a></li>
                        <li><a href="">Toronto</a></li>
                        <li><a href="">Paris</a></li>
                        <li><a href="">Munich</a></li>
                        <li><a href="">London</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <ul class="delivery-ul">
                        <li><a href="">Toronto</a></li>
                        <li><a href="">Paris</a></li>
                        <li><a href="">Munich</a></li>
                        <li><a href="">London</a></li>
                        <li><a href="">Tokyo</a></li>
                        <li><a href="">Singapore</a></li>
                        <li><a href="">Berlin</a></li>
                        <li><a href="">Seoul</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- download app section -->

    <section class="download-app-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="app-image">
                        <img src="{{asset('images//mobile-app.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contents">
                        <h3>Download Our App</h3>
                        <p>Now you can make food happen pretty much wherever you are. Get our app, it's the fastest way
                            to order food on the go.</p>
                        <div>
                            <a href=""><img src="{{asset('images//play.png')}}" alt=""></a>
                            <a href=""><img src="{{asset('images//app-store.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
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
</body>

</html>