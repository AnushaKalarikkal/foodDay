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
    <title>FoodDay</title>
    @livewireStyles
</head>

<body>

    <!-- header -->
       @include('partials.header')

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
                           
                              <a class="nav-link {{Request::is('customer/order_history') ? 'active' :'' ;}}"  href="{{route('customer.order_history')}}"
                                 aria-controls="v-pills-settings" aria-selected="false"><i
                                    class='bx bxs-cart'></i> Order History</a>

                            <a class="nav-link {{Request::is('customer/addresses') ? 'active' :'' ;}}" href="{{route('customer.address')}}"
                                role="tab" aria-controls="v-pills-messages" aria-selected="false"><i
                                    class='bx bxs-home-smile'></i> Addresses</a>

                           <a class="nav-link {{Request::is('customer/Account') ? 'active' :'' ;}}" href="{{route('customer.account')}}"
                                 aria-controls="v-pills-settings" aria-selected="false"><i
                                    class='bx bxs-user-rectangle'></i> Account Details</a>

                            <a class="nav-link {{Request::is('customer/change-password') ? 'active' :'' ;}}"  href="{{route('customer.change')}}"
                                 aria-controls="v-pills-settings" aria-selected="false"><i
                                    class='bx bxs-wallet-alt'></i> Change Password</a>

                            <a class="nav-link" href="{{ route('customer.logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                role="tab" aria-controls="v-pills-settings" aria-selected="false"><i
                                    class='bx bxs-log-out'></i> Logout</a>
                                    <form action="{{ route('customer.logout') }}" id="logout-form" method="post">@csrf</form>

                        </div>
                    </div>

                </div>
                <div class="col-lg-9">
                      @yield('order_history')
                        @yield('address')
                          @yield('content')

                           @yield('change-password')

                          </div> 
                        </div>
                    </div>

                </div>

                             <!-- Address Modal -->
                <div class="modal fade  address-model" id="exampleModaladd" tabindex="-1" role="dialog"
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
@livewireScripts

    
</body>

</html>