<x-admin-master>
     @section('styles')
    @parent
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@stop
  @section('content')
  <form method="post" action="{{route('admin.restaurant.store')}}" enctype="multipart/form-data">
    @csrf
    <section>
      <div class="container_fluid">
        <div class="row d-flex justify-content-center align-items-center ">
          <div class="col-xl-11">

            <h1 class="text-black mb-4">Create Restaurant</h1>

            <div class="card" style="border-radius: 15px;">
              <div class="card-body">

                <div class="row align-items-center pt-3 pb-2">
                  <div class="col-md-3 ps-5">

                    <h6 class="mb-0">Name</h6>

                  </div>
                  <div class="col-md-9 pe-5">

                    <input type="text" name="name" id="name" class="form-control form-control-sm" />

                  </div>
                </div>

                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                 
                <h6 class="mb-0">About</h6>

                </div>

                <div class="col-md-9 pe-5">
                    <textarea name="about" id="about"  cols="30" rows="4" placeholder="About" class="form-control form-control-sm" ></textarea>
                </div>
                </div>

                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                 <h6 class="mb-0"> Address</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                        <textarea name="address" id="address"  cols="30" rows="4" placeholder="Address" class="form-control form-control-sm" ></textarea>
                    </div>
                </div>

                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                    <h6 class="mb-0">Amount</h6>

                  </div>
                  <div class="col-md-9 pe-5">

                    <input type="number" name="amount" id="amount" class="form-control form-control-sm" />

                  </div>
                </div>
                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                     <h6 class="mb-0"> Mobile</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="text" name="mobile" id="mobile" value="" placeholder="Phone" class="form-control form-control-sm" />
                    </div>
                </div>
                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                   <h6 class="mb-0"> City</h6>
                    </div>
                   <div class="col-md-9 pe-5">
                    <select name="city_id" id="select" class="form-control form-control-sm">
                    
                    <option selected="selected" disabled="disabled" value="">City</option>

                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->city}}</option>
                    @endforeach
                
                  </select>
                  </div> 
                </div>
                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                  <h6 class="mb-0"> Location</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="text" name="location" id="location" value="" placeholder="Location" class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Logo</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="file" name="logo" id="logo" value="" placeholder="Logo" class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Banner</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="file" name="banner" id="banner" value="" placeholder="Banner" class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Minimum order value</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="number" name="min_order_value" id="min_order_value" value="" placeholder="Minimum order value" class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Cost for Two People </h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="number" name="cost_for_two_people" id="cost_for_two_people" value="" placeholder="Cost for Two People " class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Default Preparation time</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="number" name="default_preparation_time" id="default_preparation_time" value="" placeholder="Default Preparation time" class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0"> Food items</h6>
                      </div>
                      <div class="col-md-9 pe-5">

                     <select id="selectall-tag1" class=" form-control foods" name="food_item_id[]" multiple="multiple">

                      @foreach($fooditems as $food)
                      <option value="{{$food->id}}">{{$food->food_item}}</option>
                      @endforeach

                      </select>

                    </div> 

                    </div>
                     <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0"> Cuisine</h6>
                      </div>
                      <div class="col-md-9 pe-5">

                     <select id="selectall-tag2" class=" form-control categories" name="cuisine_id[]" multiple="multiple">

                      @foreach($cuisines as $cuisine)
                      <option value="{{$cuisine->id}}">{{$cuisine->cuisine}}</option>
                      @endforeach

                      </select>

                    </div> 

                    </div>

                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Is Open </h6>
                    </div>

                    <div class="col-md-9 pe-5">
                      <input type="checkbox" name="is_open" id="is_open" value="1">
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0">Allow Pickup </h6>
                    </div>

                    <div class="col-md-9 pe-5">
                      <input type="checkbox" name="allow_pickup" id="allow_pickup" value="1">
                    </div>

                    </div> 

                    
                    </div>

                    <div class="px-5 py-4" style="float:right;">
              <button type="button" class="btn btn-link"><a href="{{route('admin.restaurant.show')}}">Cancel</a> </button>
              <button type="submit" class="btn btn-primary btn-lg" >Create Restaurant</button>
              
            </div>
                  </div>

                </div>


              </div>
         </div>


          </div>
        </div>
      </div>
    </section>
  </form>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif


  @endsection


@section('javascript')
    @parent
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
    $('.categories').select2();
        $('.foods').select2();

});
  </script>
@stop
</x-admin-master>