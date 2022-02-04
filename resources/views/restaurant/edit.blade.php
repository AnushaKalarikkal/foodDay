<x-admin-master>
       @section('styles')
    @parent
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@stop
  @section('content')
<form method="post" action="{{route('restaurant.update',$restaurants->id)}}" enctype="multipart/form-data" >
    @csrf
    @method('PATCH')
    <section class="">
      <div class="container_fluid">
        <div class="row d-flex justify-content-center align-items-center ">
          <div class="col-xl-11">

            <h1 class="text-black mb-4">Update Restaurant</h1>

            <div class="card" style="border-radius: 15px;">
              <div class="card-body">

                <div class="row align-items-center pt-3 pb-2">
                  <div class="col-md-3 ps-5">

                    <h6 class="mb-0">Name</h6>

                  </div>
                  <div class="col-md-9 pe-5">

                    <input type="text" name="name" id="name" value="{{$restaurants->name}}" class="form-control form-control-sm" />

                  </div>
                </div>

                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                 
                <h6 class="mb-0">About</h6>

                </div>

                <div class="col-md-9 pe-5">
                    <textarea name="about" id="about"  cols="30" rows="4" placeholder="About" class="form-control form-control-sm" >{{$restaurants->about}}</textarea>
                </div>
                </div>

                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                 <h6 class="mb-0"> Address</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                        <textarea name="address" id="address"  cols="30" rows="4" placeholder="Address" class="form-control form-control-sm" >{{$restaurants->address}}</textarea>
                    </div>
                </div>

              
                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                     <h6 class="mb-0"> Mobile</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="text" name="mobile" id="mobile" value="{{$restaurants->mobile}}"  placeholder="Phone" class="form-control form-control-sm" />
                    </div>
                </div>
                <hr class="mx-n3">
                <div class="row align-items-center py-2">
                  <div class="col-md-3 ps-5">

                <h6 class="mb-0"> City</h6>
                    </div>
                   <div class="col-md-9 pe-5">
                    <select name="city" id="select" class="form-control form-control-sm">
                    
                    <option value="{{$restaurants->city->id}}">{{$restaurants->city->city}}</option>

                    @foreach($cities as $city)
                      @if($city->city != $restaurants->city->city)
                         <option value="{{$city->id}}">{{($city->city)}}</option>
                      @endif
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
                    <input type="text" name="location" id="location" value="{{$restaurants->location}}"  placeholder="Location" class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Logo</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="file" name="logo" id="logo" value="{{$restaurants->logo}}" placeholder="Logo" class="form-control form-control-sm" />
                    <img src="{{$restaurants->logo}}"  width="200px" hight="100px" alt="image"> 
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Banner</h6>
                    </div>

                    <div class="col-md-9 pe-5">
           <input type="file" name="banner" id="banner" value="{{ asset('/images/'.$restaurants->banner) }}" placeholder="Banner" class="form-control form-control-sm" />
                    <img src="{{$restaurants->banner}}" width="200px" hight="100px" alt="">                     </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Minimum order value</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                     <input type="number" name="min_order_value" id="min_order_value" value="{{$restaurants->min_order_value}}" placeholder="Minimum order value" class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Cost for Two People </h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="number" name="cost_for_two_people" id="cost_for_two_people" value="{{$restaurants->min_order_value}}" placeholder="Cost for Two People " class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                    <h6 class="mb-0"> Default Preparation time</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                    <input type="number" name="default_preparation_time" id="default_preparation_time" value="{{$restaurants->default_preparation_time}}" placeholder="Default Preparation time" class="form-control form-control-sm" />
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0"> Cuisine</h6>
                      </div>
                      <div class="col-md-9 pe-5">
                     <select id="selectall-tag" class=" form-control categories" name="cuisine_id[]" multiple="multiple">
                        @foreach($cuisines as $cuisine)

                      @if($restaurants->cuisines->contains($cuisine->id))

                      <option value="{{$cuisine->id}}" selected='selected'>{{$cuisine->cuisine}}</option>

                      @endif

                      @if($restaurants->cuisines->contains($cuisine->id)!=$cuisine->id)

                      <option value="{{$cuisine->id}}">{{$cuisine->cuisine}}</option>

                      @endif

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
                      <input type="checkbox" name="is_open" id="is_open"  value="{{$restaurants->is_open}}" {{ $restaurants->is_open=="1"? 'checked':'' }}>
                    </div>

                    </div> 
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0">Allow Pickup </h6>
                    </div>

                    <div class="col-md-9 pe-5">
                      <input type="checkbox" name="allow_pickup" id="allow_pickup" value="{{$restaurants->allow_pickup}}" {{ $restaurants->allow_pickup=="1"? 'checked':'' }}>
                    </div>

                    </div> 

                    <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0">Status </h6>
                    </div>
                    <div class="col-md-9 pe-5">
                    <select name="status" class="form-control form-control-sm" id="status" aria-describedby="">
                          <option value="" disabled>Choose an Option</option>
                          <option {{ old('status',$restaurants->status) == 'active'? 'selected':'' }} value="Active">Active</option>
                          <option {{ old('status',$restaurants->status) == 'blocked'? 'selected':'' }} value="blocked">Blocked</option>
                    </select>

                    </div> 
                    <div class="px-5 py-4" style="float:right;">
                    <button type="button" class="btn btn-link"><a href="{{route('restaurant.show')}}">Cancel</a> </button>
                    <button type="submit" class="btn btn-primary btn-lg" >Update Restaurant</button>
                    </div>

                 
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
});
  </script>
@stop
</x-admin-master>