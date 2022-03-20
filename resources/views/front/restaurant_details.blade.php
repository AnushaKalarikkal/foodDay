<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>FoodDay - Restaurant Page</title>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @livewireStyles
</head>

<body>
    <!-- header -->
 @include('partials.header')
    <!-- Header -->

    <div class="search-nav restaurant-head">
        <div class="container">
            <div class="rest-info-wrap">
                <div class="rest-logo" style="
            background-image: url('{{$restaurant->banner}}');
          "></div>
                <div>
                    <h3>{{$restaurant->name}}</h3>
                    <!-- <span class="rest-unserviceable">Restaurant Unserviceable</span> -->
                    <div class="cuisines">
                       @foreach($cuisines as $cuisine)

                                   @if($restaurant->cuisines->contains($cuisine->id))
                                        <div class="cuisines ">
                                            <span>{{$cuisine->cuisine}}</span>
                                        </div>
                                    @endif
                              @endforeach
                    </div>
                    <p><i class="bx bx-location-plus"></i> {{$restaurant->location}}</p>
                </div>
            </div>
            <div class="details">
                <div class="detail-block">
                    <h5><i class="bx bxs-star"></i> 4.2</h5>
                    <span>25+ Ratings</span>
                </div>
                <div class="detail-block">
                    <h5>{{$restaurant->default_preparation_time}} Mins</h5>
                    <span>Delivery Time</span>
                </div>
                <div class="detail-block">
                    <h5>${{$restaurant->cost_for_two_people}}</h5>
                    <span>Cost For Two</span>
                </div>
                <div class="detail-block">
                    <h5>${{$restaurant->min_order_value}}</h5>
                    <span>Minimum Order Amount</span>
                </div>
                <div class="detail-block">
                    @if($restaurant->allow_pickup==1)
                    <h5><i class="bx bx-walk"></i>Pick Up</h5>
                                  <span>Pick Up Available</span>

                               @else
                               <h5><i class="bx bx-walk"></i> No Pick Up</h5>
                                  <span>Pick Up Not Available</span>
                                @endif
                    
                   
                </div>
                
            </div>

        </div>
    </div>

    <section class="py-60">
        <div class="container">
            <div class="row cuisine-dish-wrap">
                <div class="col-lg-8 cuisine-col">
                    <div class="rest-menus" id="rest-menus">
                     
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <ul class="nav sub-cat-nav">
                                   @foreach($fooditems as $food)

                                   @if($restaurant->fooditems->contains($food->id))
                                        <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger " href="#sub-cat2">{{$food->food_item}}</a>
                                    </li>
                                    @endif
                              @endforeach
                                </ul>

                       
                                    <div class="sub-cat" id="sub-cat2">
                                       
                                        <div class="row">
                                            
                                         <livewire:food :restaurant="$restaurant"/> 

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  
                           </div>       

               <div class="col-lg-4 cart-col">
                    <div class="cart d-none d-md-block">
                        <livewire:cart /> 
            </div>
        </div>

    </section>
 

    
    <!-- footer -->

@include('partials.footer')

    <!-- footer end -->

    <!-- Optional JavaScript -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset('js/custom.js')}}"></script>


 <!-- <script type="text/javascript">
     

    $(document).ready(function () {

    $(".changeQuantity").on("click", function () {

    var $button = $(this);
    alert($button);
    var oldValue = $button.parent().find("input .quntity-input").val();

    if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }

    $button.parent().find("input .quntity-input").val(newVal);

});



        $('.changeQuantity').click(function (e) {
            e.preventDefault();

            var quantity = $(this).closest(".food-item-card").find('.qty-input').val();
            var product_id = $(this).closest(".food-item-card").find('.product_id').val();
            // alert(quantity);

            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity':quantity,
                'product_id':product_id,
            };
            //console.log(JSON.stringify(data))
            $.ajax({
                url: '/update-cart',
                type: 'POST',
                data: data,
                success: function (response) {
                    // alert(response)
                    window.location.reload();
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        });

    });

   </script> -->
  
     @livewireScripts

</body>

</html>