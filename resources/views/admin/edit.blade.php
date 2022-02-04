<x-admin-master>
    @section('content')
<form method="post" action="{{route('admin.update',$users->id)}}" enctype="multipart/form-data" >
@csrf
@method('PATCH')
<section>
  <div class="container_fluid">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-xl-11">

        <h1 class="text-black mb-4" >Edit</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-3 pb-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">First Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="first_name" id="first_name" value="{{$users->first_name}}" class="form-control form-control-lg" />

              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Last Name</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input type="text" name="last_name" id="last_name" value="{{$users->last_name}}" class="form-control form-control-lg" />

              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Phone code</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input type="mobile" name="phone_code" id="phone_code" value="{{$users->phone_code}}" class="form-control form-control-lg" />

              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Mobile</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input type="mobile" name="mobile" id="mobile" value="{{$users->mobile}}" class="form-control form-control-lg" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Email</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="email" name="email" id="email" value="{{$users->email}}" class="form-control form-control-lg" placeholder="" />

              </div>
            </div>

            <hr class="mx-n3">

                <div class="row align-items-center py-2">
                <div class="col-md-3 ps-5">

                    <h6 class="mb-0">Password</h6>

                </div>
                <div class="col-md-9 pe-5">

                    <input type="password" name="password" id="password" value="{{$users->password}}" class="form-control form-control-lg" placeholder="" />

                </div>
                </div>

            <hr class="mx-n3">

            <div class="px-5 py-4" style="float:right;">
            <button type="button" class="btn btn-link"><a href="{{route('admin.index')}}">Cancel</a> </button>
              <button type="submit" class="btn btn-primary btn-lg">Update</button>
              
            </div>

            

          </div>
        </div>
        

      </div>
    </div>
  </div>
</section>
</form>


    @endsection
</x-admin-master>