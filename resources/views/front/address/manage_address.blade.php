<x-myaccount-master>
    @section('address')

    <script type="text/javascript">
// @if (count($errors) > 0)
//     $('# address-model').modal('show');
// @endif
</script>

  <div class="tab-pane fade show active" id="v-pills-address"  role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">

                               

                                <div class="my-account-content food-item-cards-wrap">

                                    <h4>Manage Addresses</h4>

                                    <div class="row">
                                    @foreach($address as $value)
                                    @if(Auth::user()->id==$value->customer_id)
                                        <div class="col-md-6">
                                            <div class="card address-card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$value->home}}</h5>
                                                    <h6> {{$value->house_name}} ,  {{$value->area}}, {{$value->city}}, {{$value->pincode}}</h6>
                                                    <p class="card-text">
                                                       {{$value->landmark}}
                                                    </p>
                                                    <button type="button" class="btn-link" id="edit-item"
                                                        data-toggle="modal"
                                                        data-target="#exampleModal{{$value->id}}">
                                                        <i class='bx bx-edit'></i>Edit</button>
                                                    <button class="btn-link"><i class='bx bx-trash'></i>
                                                    
                                                    <a href="{{route('customer.address.delete', $value->id)}}" style="color: #d43f3a ">
                                                    Delete</a></button>

                                                     @if($value->default==0)
                                                    <button class="btn-link" name="default"><i class='bx bx-location-plus'></i>
                                                    <a href="{{route('customer.address.default', $value->id)}}" style="color: #d43f3a ">Set as
                                                        default</a></button>
                                                        @else
                                                          <button class="btn-link" ><i class='bx bx-location-plus'></i>
                                                    <a href="{{route('customer.address.remove', $value->id)}}" style="color: #d43f3a ">Remove
                                                        default</a></button>
                                                        @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

                                    </div>

                        <button type="button" class="btn btn-outline-primary mb-lg-auto mb-4" data-toggle="modal"
                                        data-target="#exampleModaladd">Add Address</button>
                                </div>

                            </div>

                             <!-- Address EDIT Modal -->
                              @foreach($address as $value)
                <div class="modal fade  " id="exampleModal{{$value->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="edit-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-x btn-close"></i>
                                </button>
                                <h5 class="mb-4">Edit Delivery Address</h5>


                                <form method="post" action="{{route('customer.address.update',$value->id)}}" enctype="multipart/form-data">
                                    <div class="form-row">
                                        @csrf 
                                          @method('PATCH')
                                       <!-- @if(Session::get('success'))
                                          <div class="alert alert-success"> 
                                             {{ Session::get('success') }} 
                                           </div>
                                        @endif -->

                                        <div class="form-group col-lg-12">
                                            <input type="text" name="location" class="form-control" id="location" placeholder="Location" value="{{$value->location}}">
                                               @error("location")
                                                    <p style="color:red">{{$errors->first("location")}}
                                                @enderror
                                        </div>
                                         <div class="form-group col-lg-12">
                                            <input type="text" name="house_name" class="form-control" placeholder="House Name / Flat / Building" value="{{$value->house_name}}"> 
                                            @error("house_name")
                                                    <p style="color:red">{{$errors->first("house_name")}}
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="area" class="form-control" placeholder="Area / Street" value="{{$value->area}}">
                                            @error("area")
                                                    <p style="color:red">{{$errors->first("area")}}
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="city" class="form-control" placeholder="City" value="{{$value->city}}">
                                            @error("city")
                                                    <p style="color:red">{{$errors->first("city")}}
                                                @enderror
                                        </div>
                                          <div class="form-group col-lg-12">
                                            <input type="text" name="landmark" class="form-control" placeholder="Landmark" value="{{$value->landmark}}">
                                        </div>
                                       
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="pincode" class="form-control" placeholder="Pincode" value="{{$value->pincode}}">
                                            @error("pincode")
                                                    <p style="color:red">{{$errors->first("pincode")}}
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <select name="home" id="home" class="form-control" >

                                                <option value="0" disabled selected >Address Type</option>

                                                <option value="Home" {{ $value->home === 'Home' ? 'selected' : '' }}>Home</option>

                                                <option value="Office"  {{ $value->home === 'Office' ? 'selected' : '' }}>Office</option>

                                                <option value="Other"  {{ $value->home === 'Other' ? 'selected' : '' }}>Other</option>

                                            </select>                                        </div>
                                        <div class="form-group col-lg-12">
                                            <textarea class="form-control" name="note" id="note" rows="3"
                                                placeholder="Note for Driver" value="{{$value->note}}">{{$value->note}}</textarea>
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
                @endforeach
        <!-- Address Modal End -->
                         
    @endsection

      @section('editJs')
    @parent
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>

     <script>
        $("document").ready(function(){
          setTimeout(function(){
            $("div.alert").remove();
         }, 3000 ); // 5 secs

       });

    @if (count($errors) > 0)
    $('#exampleModaladd').modal('show');
    @endif
    </script>
  
@stop
</x-myaccount-master>