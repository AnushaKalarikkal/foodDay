@extends('front.layouts.app')
@section('contents')
  <div class="search-nav">
        <div class="container">
            <h3 class="mb-0">Order Summary</h3>
        </div>
    </div>

 <section class="py-60">
        <div class="container">

            <div class="row cuisine-dish-wrap">

                <div class="col-lg-8 w-100 cuisine-col">

                    <div class="order-status">

 
                        <div class="order-tracking-status-head">
                       
                          @if(($order->address_id) !=0)
                            <p class="mb-0">Thanks for shopping! Your order number is #{{$order->id}}. The restaurant will deliver your order by 10:22 PM.</p>
                            <span>For any questions, reach out to us on hello@foodday.co</span>
                            <h6 class="mt-3">Delivery Address</h6>
                            <div class="card address-card">
                                <div class="card-body deliverable">
                                   
                                    <div class="delivery">
                                        <i class="bx bxs-check-circle"></i>
                                        <h5 class="card-title">{{$order->address->home}}</h5>
                                    </div>
                                    <h6>{{Auth::user()->first_name}}, {{Auth::user()->mobile}}</h6>
                                    <p class="card-text">{{$order->address->location}}  ,
                                          {{$order->address->area}}, {{$order->address->city}}, {{$order->address->pincode}}
                                    </p>
                                    
                                    
                                </div>
                            </div>
                           @else

                           <p>Thanks for shopping! Your order number is #889. Pickup the order from the 
                               Malabar Cafe by 1:35 PM

                                </p>
                                @endif
                           
                        </div>
                       
              
                        <ul class="timeline">
                            <li class="active">
                                <div class="timeline-item">
                                    <h6>Order Placed</h6>
                                    <div class="delivery-date">
                                        <span class="time">{{$order->created_at->format('H:m')}} PM</span>
                                    </div>
                                </div>
                            </li>
                            <li class="next">
                                <div class="timeline-item">
                                    <h6>Order Packed</h6>
                                  
                                </div>
                            </li>
                            <li class="next">
                                <div class="timeline-item">
                                    <h6>Order Shipped</h6>
                                   
                                </div>
                            </li>
                            <li class="next">
                                <div class="timeline-item">
                                    <h6>Order delivered</h6>
                                   
                                </div>
                            </li>
                            <li class="next">
                                <div class="timeline-item">
                                    <h6>Order delivered</h6>
                                   
                                </div>
                            </li>

                        </ul>
                  

                      


                    </div>

                </div>

                <div class="col-lg-4 cuisine-col">

                    <div class="cart">
                        <div class="cart-head">
                              <span>Your order</span>
                        </div>
                        
           
            
                        <div class="cart-footer">
                          
                            <ul>
                                <li>
                                    <h5>
                                        <span>SubTotal</span>
                                        <span class="float-right">${{$order->sub_total}}.00</span>
                                    </h5>
                                </li>
                                <li>
                                    @if($order->order_type == "delivery")
                                    <p>
                                        <span>Delivery fee</span>
                                        <span class="float-right">$00.00</span>
                                    </p>
                                    @endif
                                </li>
                                <li>
                                    <p>
                                        <span>Tax</span> <span class="float-right">$00.00</span>
                                    </p>
                                </li>
                                <li>
                                    <h4>
                                        <span>Total</span>
                                        <span class="float-right">${{$order->sub_total}}.00</span>
                                    </h4>
                                
                                </li>
                                <li>
                                    <p>
                                         <span>Please keep the exact change for <b>${{$order->sub_total}}</b> handy to help us serve you better.</span>

                                    </p>
                                </li>
                               
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection