    <div>
    @if(count((array) session('cart'))!=0)
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
                                    <div class="add-remove-button">
                                      
                                                         
                                         <div class="input-group">
                               @if($details['quantity'] > 0)
                                  <input wire:click.prevent="decrementCartItem('{{$details['id']}}')" 
                                           type="button" value="-" class="button-minus changeQuantity" data-field="quantity" />
                                @else
                                  <input  type="button" disabled value="-" class="button-minus changeQuantity" id="changeQuantity"
                                                                        data-field="quantity" />
                                @endif
                                 <input type="number" step="1"  value="{{ $details['quantity'] }}"
                                                 name="quantity" class="quantity-field qty-input" />

                                    <input wire:click.prevent="addToCartItem('{{$details['id']}}')" type="button" value="+"
                                      class="button-plus"  />

                                    </div>
                                                 
                                    </div>
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
                                <button class="btn btn-primary mt-3 w-100"
                                    onclick="window.location.href='{{route('customer.checkout')}}';">Proceed to Buy</button>
                            </ul>
                        </div>
                    </div>
                     <div class="col-lg-4 cart-col">
                         @else
                    <div class="cart d-none d-md-block">
                      
                        <div class="cart-body">
</div>

                    <!-- Empty cart. Use this when the cart is empty -->

                    <div class="cart">
                        <div class="empty-cart text-center">
                            <h4>Your cart is empty</h4>
                            <p class="mb-0">Add items to get started.</p>
                        </div>
                    </div> 

                    <!-- Empty cart end  -->
                </div>
                @endif
                </div>