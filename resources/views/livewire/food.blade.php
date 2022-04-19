<div class="row">
@foreach($fooditems as $food)

  @if($restaurant->contains($food->id))

    <div wire:key="$food->id" class="col-lg-6"   >
            <div class="food-item-card " >
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
                                                                   
                                                                @if(($this->itemQuantity($food->id)) > 0)
                                                                    <input wire:click.prevent="decrementItem({{$food->id}})" type="button" value="-" class="button-minus changeQuantity" id="changeQuantity"

                                                                        data-field="quantity" />
                                                                        @else
                                                                          <input  type="button" disabled value="-" class="button-minus changeQuantity" id="changeQuantity"

                                                                        data-field="quantity" />
                                                                        @endif

                                                                    <input type="number" step="1"  min="1" value="{{ $this->itemQuantity($food->id)}}"

                                                                        name="quantity" readonly class="quantity-field qty-input" />

                                                                   <input type="button" value="+" class="button-plus"
                                                                        wire:click.prevent="addToCart({{$food->id}} )" data-field="quantity"/>

                                                                </div>
                                                     
                                                            </div>
                                                          
                        </div>
                </div>
             </div>
         </div>
                  @endif
           
                          @endforeach
                          
                                        </div>