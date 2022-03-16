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
    <title>FoodDay - Cart</title>
</head>

<body>

    <!-- header -->
 @include('partials.header')
    <!-- Header -->

    <div class="search-nav">
        <div class="container">
            <h3 class="mb-0">Cart</h3>
        </div>
    </div>


    <section class="py-60">
        <div class="container cart-page-new">
            <div class="row cuisine-dish-wrap">
                <div class="col-lg-8 cuisine-col">
                    <div class="rest-menus" id="rest-menus">


                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">

                                <div class="food-item-cards-wrap">
                                    <div class="sub-cat mt-0" id="sub-cat1">
                                        <h4 class="mb-4 mt-0">Your order</h4>
                                        <div class="row">
    @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
           
                @php
                 $total=0;
                 $total += $details['rate'] * $details['quantity'] 
                 @endphp
                                            <div class="col-lg-12">
                                                <div class="food-item-card">
                                                    <div class="food-item-img ct-img" style="
                                                        background-image: url('{{asset('images/img2.jpg')}}');
                                                    "></div>
                                                    <div class="food-item-body">

                                                        <h5 class="card-title">
                                                         {{ $details['fooditem'] }}
                                                        </h5>
                                                       
                                                        <!-- <p class="description">
                                                            Lorem ipsum dolor sit amet consectetur
                                                            adipisicing elit. Expedita?
                                                        </p> -->
                                                        <div class="pricing">
                                                            <span class="price">${{ $details['rate'] }}</span>
                                                            <div class="add-remove-button">
                                                                <div class="input-group">
                                                                    <input type="button" value="-" class="button-minus"
                                                                        data-field="quantity" />
                                                                    <input type="number" step="1" max="" value="0"
                                                                        name="quantity" class="quantity-field" />
                                                                    <input type="button" value="+" class="button-plus"
                                                                        data-field="quantity" data-toggle="modal"
                                                                        data-target="#dishModal" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <p class="text-to-kitchen">
                                                            Text to kitchen. Delete this if you are not using.
                                                            adipisicing elit. Enim illum adipisci natus ducimus,
                                                            voluptatem
                                                        </p>
                                                        <!-- <ul class="modifiers">
                                                            <h6>Toppings</h6>
                                                            <li>Extra chease <span>$5.00</span></li>
                                                            <li>Drinks <span>$6.00</span></li>
                                                            <li>Butter <span>$7.00</span></li>
                                                        </ul> -->

                                                    </div>
                                                </div>
                                            </div>
                        @endforeach
                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 cart-col">
                    
                    <div class="cart">
                           @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['rate'] * $details['quantity'] @endphp
                               
                            @endforeach
                        <div class="cart-head">
                            <span>Price Details</span>
                        </div>

                        <div class="cart-footer mt-4">
                            <ul>
                                <li>
                                    <h5>
                                        <span>SubTotal</span>
                                        <span class="float-right">${{$total}}</span>
                                    </h5>
                                </li>
                                <li>
                                    <p>
                                        <span>Delivery fre</span>
                                        <span class="float-right">$00.00</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <span>Tax</span> <span class="float-right">$00.00</span>
                                    </p>
                                </li>
                                <li>
                                    <h4>
                                        <span>Total</span>
                                        <span class="float-right">${{$total}}</span>
                                    </h4>
                                </li>
                                <button class="btn btn-primary mt-3 w-100"
                                    onclick="window.location.href='empty-cart.html';">Checkout</button>
                            </ul>
                        </div>
                    </div>

                    <!-- Empty cart. Use this when the cart is empty -->

                    <!-- <div class="cart">
                        <div class="empty-cart">
                            <h4>Your cart is empty</h4>
                            <p class="mb-0">Add items to get started.</p>
                        </div>
                    </div> -->

                    <!-- Empty cart end  -->
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