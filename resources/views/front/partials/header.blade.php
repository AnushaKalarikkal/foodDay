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
                        @if(Auth::check())
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('customer.my_home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @else
                        <li class="nav-item active">
                            <a class="nav-link" href="/front">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @endif

                   @if(Auth::check())
                     <li class="nav-item">
                         
                            <a class="nav-link" href="{{route('customer.account')}}">
                                <i class='bx bx-user mr-1'></i>
                                My Account</a>
                                 
                        </li>
                        @else
                         <li class="nav-item  ">
                            <a class="nav-link" href="{{route('customer.signIn')}}">Sign In</a>
                        </li>
                        @endif
                      <li class="nav-item">
                         
                  <livewire:cart-button/>
                 
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>