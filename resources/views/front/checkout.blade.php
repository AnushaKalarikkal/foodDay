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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
            <h3 class="mb-0">Checkout</h3>
        </div>
    </div>

    <section class="py-60">
        <div class="container">
 <form method="post" action="{{route('customer.order_store')}}" enctype="multipart/form-data" >
                        @csrf
                       
            <div class="row cuisine-dish-wrap">
                <div class="col-lg-8 cuisine-col">

                   
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <h6 class="checkout-title">Delivery Type</h6>
                                    <select class="form-control " name="order_type" id="select" onchange="status(this)">
                                        <option value="delivery" selected="delivery">Delivery</option>
                                        <option value="pickup">Pickup</option>
                                    </select>
                                </div>
                            </div>
                            <h6 class="checkout-title">Payment</h6>
                            <div class="form-group col-lg-12">
                                <div class="custom-radio">
                                    <input type="radio" id="radio1" name="payment-type" checked="checked">
                                    <label for="radio1">Pay via Cash</label>
                                    <img src="{{asset('images/cash.png')}}" alt="Icon">
                                </div>
                             </div>

         

                        <div class="checkout-delivery-address food-item-cards-wrap" id="sub1">
                        <h6 class="checkout-title">Delivery Address</h6>
                          <div class="row">
                            @foreach($address as $value)
                            <div class="col-xl-6">
                                <div class="card address-card">
                                    <div class="card-body deliverable">
                                        <div class="delivery">
                                            <i class='bx bxs-check-circle'></i>
                                            <h5 class="card-title">{{$value->home}}</h5>
                                        </div>
                                        <h6>{{$value->location}}, {{$value->pincode}}</h6>
                                        <p class="card-text">
                                           {{$value->landmark}}
                                          
                                        </p>
                                      <button class="btn btn-primary btn-sm" ><a href="{{route('customer.address_store', $value->id)}}" style="color:white" >Deliver here </a></button>
                                      
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Edit</button>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <a href="customer/AddressDel/{{$value->id}}"> Delete</a></button>
                                    </div>
                                </div>
                            </div>

                             
                        @endforeach
                           
                        </div>

                        <button type="button" class="btn btn-outline-primary mb-lg-auto mb-4" data-toggle="modal"
                            data-target="#exampleModal">Add New Address</button>

                       </div>
                
                      <div class="checkout-delivery-address" id="sub2">

                        <h6 class="checkout-title">Pick up</h6>
                         @if(session('rest'))
                         @foreach(session('rest') as $id => $details)
           
                
                       
                        <p>This is a Pickup order. You'll need to go to
                            <strong>{{ $details['name'] }}</strong> to
                            pick up this order.
                            Pick up at <strong>{{ $details['name'] }} {{ $details['location'] }}</strong>.Contact
                            <strong>{{ $details['mobile'] }}</strong> </p>
                            @endforeach
                            @endif
                     
                     </div>
                  
                      </div>

           

                              
                               <div class="col-lg-4 cart-col">
                    <div class="cart d-none d-md-block">
                        <div class="cart-head">
                   
                            <span>Your order</span>
                        </div>
                            @php $total = 0 @endphp
                          @if(session('cart'))
                         @foreach(session('cart') as $id => $details)
           
                @php
                 $total=0;
                 $total += $details['rate'] * $details['quantity'] 
                 @endphp
                        <div class="cart-body">
                            <div class="cart-item">
                                <div class="details">
                                    <h6> {{ $details['fooditem'] }}</h6>
                                  
                                   
                                </div>
                                <div class="price">
                                    <h6>${{ $total }}.00</h6>
                                  
                                </div>
                            </div>

                        </div>
                @endforeach
                            @endif
                        <div class="cart-footer">
                              @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['rate'] * $details['quantity'] @endphp
                               
                            @endforeach
                            <ul>
                                <li>
                                    <h5>
                                        <span>SubTotal</span>
                                        <span class="float-right">${{$total}}.00</span>
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
                                        <span class="float-right">${{$total}}.00</span>
                                    </h4>
                                
                                </li>
                                <li>
                                    <p>
                                         <span>Please keep the exact change for <b>${{$total}}</b> handy to help us serve you better.</span>

                                    </p>
                                </li>
                                <button type="submit" class="btn btn-primary mt-3 w-100"
                                 >Checkout</button>
                            </ul>
                        </div>
                    </div>
              
                </div>
            </div>
  </form>
        </div>
    </section>



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


                                <form method="post" action="{{route('customer.address.store')}}" enctype="multipart/form-data">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>


<script type="text/javascript">
$(document).ready(function(){
        document.getElementById('sub2').style.display = "none";

})
function status(select){
   if(select.value=='delivery'){
    document.getElementById('sub1').style.display = "block";
    document.getElementById('sub2').style.display = "none";

   }else
   {
    document.getElementById('sub1').style.display = "none";
    document.getElementById('sub2').style.display = "block";

   }
} 
</script>
       

</body>

</html>