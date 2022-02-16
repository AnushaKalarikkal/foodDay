<x-myaccount-master>
    @section('address')

    <script type="text/javascript">
@if (count($errors) > 0)
    $('# address-model').modal('show');
@endif
</script>

  <div class="tab-pane fade show active" id="v-pills-address" 

                                aria-labelledby="v-pills-messages-tab">

                                <div class="my-account-content food-item-cards-wrap">

                                    <h4>Manage Addresses</h4>

                                    <div class="row">



                                       



                                    <button type="button" class="btn btn-primary" data-toggle="modal"

                                        data-target="#exampleModal">Add Address</button>



                                </div>

                            </div>

                             <!-- Address Modal -->
                <div class="modal fade  address-model" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-x btn-close"></i>
                                </button>
                                <h5 class="mb-4">Add Delivery Address</h5>


                                <form method="post" action="{{route('address.store')}}" enctype="multipart/form-data">
                                    <div class="form-row">
                                        @csrf 
                                       @if(Session::get('success'))
                                          <div class="alert alert-success"> 
                                             {{ Session::get('success') }} 
                                           </div>
                                        @endif

                                        <div class="form-group col-lg-12">
                                            <input type="text" name="location" class="form-control" placeholder="Location">
                                               @error("location")
                                                    <p style="color:red">{{$errors->first("location")}}
                                                @enderror
                                        </div>
                                         <div class="form-group col-lg-12">
                                            <input type="text" name="house_name" class="form-control" placeholder="House Name / Flat / Building"> 
                                            @error("house_name")
                                                    <p style="color:red">{{$errors->first("house_name")}}
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="area" class="form-control" placeholder="Area / Street">
                                            @error("area")
                                                    <p style="color:red">{{$errors->first("area")}}
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="city" class="form-control" placeholder="City">
                                            @error("city")
                                                    <p style="color:red">{{$errors->first("city")}}
                                                @enderror
                                        </div>
                                          <div class="form-group col-lg-12">
                                            <input type="text" name="landmark" class="form-control" placeholder="Landmark">
                                        </div>
                                       
                                        <div class="form-group col-lg-6">
                                            <input type="text" name="pincode" class="form-control" placeholder="Pincode">
                                            @error("pincode")
                                                    <p style="color:red">{{$errors->first("pincode")}}
                                                @enderror
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="number" name="home" class="form-control" placeholder="Home">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Note for Driver"></textarea>
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

                <!-- Address Modal End -->
                         
    @endsection
</x-myaccount-master>