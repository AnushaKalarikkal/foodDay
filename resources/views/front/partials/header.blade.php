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
                            <a class="nav-link" href="{{route('customer.my_home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>

                     <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.account')}}">
                                <i class='bx bx-user mr-1'></i>
                                My Account</a>
                        </li>
                      <li class="nav-item">
                    @if(count((array) session('cart'))==0)
                            <a class="nav-link" href="{{route('customer.empty.cart')}}">
                                <span class="cart-badge-wrap">
                                    <span class="cart-badge">{{ count((array) session('cart')) }}</span>
                                    <i class='bx bx-shopping-bag mr-1'></i>
                                </span>
                                Cart</a>
                     @else
                                <a class="nav-link" href="{{route('customer.cart_items')}}">
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