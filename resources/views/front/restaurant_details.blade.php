@extends('front.layouts.app')
@section('contents')
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
                                 
                                      @if($restaurant->is_open == 1)
                                  <livewire:food :restaurant="$restaurant" /> 
                                    @else
                                    <div class="row">
                                    @foreach($restaurant->fooditems as $food)

                                    <div class="col-lg-6"   >
                                            <div class="food-item-card unavailable " >
                                                <div class="food-item-img" style="background-image: url('{{asset('images/img3.jpg')}}');"></div>
                                                    <div class="food-item-body">
                                                            <h5 class="card-title">
                                                                {{$food->food_item}}
                                                                
                                                            </h5>
                                                                <div class="pricing">
                                                                <div class="price-wrap">
                                                                        <div class="non-div food-type-div">
                                                                            <i class="bx bxs-circle"></i>
                                                                        </div>
                                                                            <span class="price">${{$food->rate}}</span>
                                                                            <span class="actual-price">$499.00</span>
                                                                        </div>
                                                                                    <div class="add-remove-button">
                                
                                                                                                <div class="input-group">
                                                                                                
                                                                                                <button class="unavailable">Unavailable</button>

                                                                                                </div>
                                                                                    
                                                                                    </div>
                                                                                        
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                                        </div>
                                                        
                                    @endif
                  

                                              
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
@stop