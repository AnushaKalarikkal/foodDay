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
    @livewireStyles
</head>

<body>

    <!-- header -->
       @include('partials.header')

    <!-- Header -->

    <div class="search-nav">
        <div class="container">
            
            

            <h3>All restaurants delivering to {{ app('request')->input('location')}}</h3>

            
            <p>Change location</p>
            <div class="row">
                <div class="col-lg-8 col-xl-6">
                    <form action="{{route('customer.search')}}" method="get" enctype="multipart/form-data">
                    @csrf
                        <div class="input-group search-location-group">
                            <input type="text" name="location" class="form-control" placeholder="Enter your delivery location"
                                aria-label="delivery location" aria-describedby="button-addon2">
                            <a href="" class="btn-locate"><i class='bx bx-target-lock'></i> Locate Me</a>
                            <div class="input-group-append btn-find-food">
                                <button class="btn btn-primary" type="submit">Find Food</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            @unless(app('request')->has('location'))
           <div class="location-popup">
                <h5 class="mb-3">Add your delivery address</h5>
                <p class="mb-4">To find out if we can delivery at your location, please enter your address
                </p>
                <form action="">
                    <button class="btn btn-light" onclick="locationPopup()">Set Location</button>
                </form>
            </div>
            @endunless
  

        </div>
    </div>

    <section class="py-60">
        <div class="container">
             @if (app('request')->has('location'))
            <h4 class="mb-4">Popular Restaurants</h4>
            <div class="row rest-listing-row">

              @foreach($restaurant as $value)
              @if($value->is_open==1)
                <div class="col-md-4 col-sm-6">
                    <a href="{{route('customer.restaurant_details',$value->id)}}" class="card restaurant-card available">

                       
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
<div class="cuisines">
                              @foreach($cuisines as $cuisine)

                                   @if($value->cuisines->contains($cuisine->id))
                                        
                                            <span>
                                                {{$cuisine->cuisine}}
                                            </span>
                                    
                                    @endif
                              @endforeach
</div>
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
              @else
              <div class="col-md-4 col-sm-6">
                    <a href="{{route('customer.restaurant_details',$value->id)}}" class="card restaurant-card unavailable">

                       
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
                  @endif
               @endforeach

            </div>
            @else
            <div class="my-account-content">
    <div class="empty-status-div">
        <h4>Sorry! We couldn't find any results. </h4>
    </div>
</div>
@endif
          
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
    <script type="text/javascript">

        function locationPopup() {
    document.getElementById('location').focus();
    document.getElementById('location-popup').style.display = "none";
}

    </script>
    @livewireScripts
</body>

</html>