<div> 
    
    <div class="search-nav">
        <div class="container">
            <h3 class="mb-0">Cart</h3>
        </div>
    </div>
     @if(session('cart'))
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
                                                                    <input wire:click.prevent="DecrementItem('{{$details['id']}}')"
                                                                        type="button" value="-" class="button-minus" data-field="quantity" />
                              
                                                                     <input type="number" step="1"  value="{{ $details['quantity'] }}"

                                                                       name="quantity" readonly class="quantity-field qty-input" />

                                                                    <input  type="button" value="+" wire:click.prevent="IncrementItem('{{$details['id']}}')"
                                                                    class="button-plus"  />
                                                                </div>
                                                            </div>
                                                        </div>

                                                       
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
                                    onclick="window.location.href='{{route('customer.checkout')}}';">Checkout</button>
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
     
      @else
      
    <section class="py-60 min-window-height">
        <div class="container">

            <div class="empty-orders-div">
                <!-- <img src="assets/images/cart.svg" alt="" class="mt-0"> -->
                <i class="bx bx-shopping-bag"></i>
                <h4 class="mb-3">Your Cart is Empty</h4>
                <p class="mb-2">Looks like you haven't added anything to your cart yet.</p>
                <a href="{{route('customer.restaurant_list')}}" class="btn btn-primary mt-3">See Restaurants Near You</a>
            </div>

        </div>
    </section>
@endif
</div>
