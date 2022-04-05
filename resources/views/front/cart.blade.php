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
 @if(Session::get('success'))
                     <div class="alert alert-success"> 
                     {{ Session::get('success') }} 
                    </div>
                      @endif
    <section class="py-60">
        <div class="container cart-page">
            <div class="table-responsive-lg">
                <table class="cart-table table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                         @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
           
                @php
                 $total=0;
                 $total += $details['rate'] * $details['quantity'] 
                 @endphp

                        <tr data-id="{{ $id }}">
                            <td class="product-item">
                                <div class="dish-image">
                                    <a href="#"><img src="images/img1.jpg" alt="product"></a>
                                </div>
                                <div class="product-name">
                                    <a href="#">{{ $details['fooditem'] }}</a>
                                </div>
                            </td>
                            <td>${{ $details['rate'] }}</td>
                            <td>
                                <div class="add-remove-button">
                                         <div class="input-group">
                                            <div>
                                             <a href="{{route('customer.remove.from.cart',$id)}}" class="number-button  plus"></a>

                                            </div>
                                    <a href="{{route('customer.remove.from.cart',$id)}}" class="number-button  plus">-</a>

                                        <input type="number" step="1" max="" value="{{ $details['quantity'] }}" name="quantity"

                                            class="quantity-field">

                                        <a href="{{route('customer.add.to.cart',$id)}}" class="number-button  plus">+</a>

                                    </div>
                                </div>
                            </td>
                            <td>${{$total}}</td>
                            <td>
                                <a href="{{route('customer.cart.delete',$id)}}" class="float-right"><i class='bx bx-trash'></i></a>
                            </td>
                        </tr>
                         @endforeach
                            @endif
                    </tbody>

                </table>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <form action="">
                        <div class="input-group coupon-group">
                            <input type="text" class="form-control" placeholder="Coupon Code"
                                aria-label="delivery location" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button" id="find-food-btn">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h4 class="mb-3 mt-4 mt-lg-0">Cart totals</h4>
                    <table class=" table-responsive-sm subtotal-table w-100">
                        <tbody>
                            @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['rate'] * $details['quantity'] @endphp
                               
                            @endforeach
                            <tr>
                                <th>Sub Total</th>
                                <td>£ {{ $total }}</td>
                            </tr>
                            <tr>
                                <th>Tax(5.0%)</th>
                                <td>£ 00.00</td>
                            </tr>
                            <tr>
                                <th>Delivery Charge </th>
                                <td>£ 0.00</td>
                            </tr>
                            <tr>
                                <th>Order Total </th>
                                <td>£ {{$total}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="login.html" class="btn btn-primary mt-3 float-right check-out-btn">Proceed to
                        checkout</a>
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
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>

     <script>
        $("document").ready(function(){
          setTimeout(function(){
            $("div.alert").remove();
         }, 1000 ); // 5 secs

       });
    </script>

    
</body>

</html>