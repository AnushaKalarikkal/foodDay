<x-admin-master>
    @section('content')
<form method="post" action="" enctype="multipart/form-data" >
@csrf
<section class="vh-100">
  <div class="container_fluid">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-xl-11">

        <h1 class="text-black mb-4" >Update Discount Code</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-3 pb-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="name" id="name" value="{{$discounts->name}}" class="form-control form-control-sm" />

              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Code</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input type="text" name="code" id="code" value="{{$discounts->code}}" class="form-control form-control-sm" />

              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Discount Type</h6>

              </div>
              <div class="col-md-9 pe-5">

              <select name="status" class="form-control form-control-sm" id="status" aria-describedby="">
                          <option value="{{$discounts->status}}" disabled>Choose an Option</option>
                          <option>Fixed</option>
                          <option>Percentage</option>
                    </select>
              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Amount</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input type="number" name="amount" value="{{$discounts->amount}}" id="amount" class="form-control form-control-sm" />

              </div>
            </div>
            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Minimum Purchase Amount</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input type="number" name="min_amount" value="{{$discounts->min_amount}}" id="min_amount" class="form-control form-control-sm" />

              </div>
            </div>
            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Starts At</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input type="date" name="start" id="start" value="{{$discounts->start}}" class="form-control form-control-sm" />

              </div>
            </div>
            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Ends At</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input type="date" name="end" id="end" value="{{$discounts->end}}" class="form-control form-control-sm" />

              </div>
            </div>
            
            <hr class="mx-n3">

            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Maximum Users</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="number" name="max_users" id="max_users" value="{{$discounts->max_uses}}" class="form-control form-control-sm" placeholder="" />

              </div>
            </div>

            <hr class="mx-n3">
            <div class="row align-items-center py-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Maximum uses per Customer</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input type="number" name="max_user_per_cus" value="{{$discounts->max_uses_per_cus}}" id="max_user_per_cus" class="form-control form-control-sm" />

              </div>
            </div>

            <hr class="mx-n3">

                    <div class="row align-items-center pt-3 pb-2">

                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0"> Restaurants</h6>
                      </div>
                      <div class="col-md-9 pe-5">
                      <select  name="restaurant[]" id="restaurant" class="form-control form-control-sm" multiple>
                      
                      <option selected="selected" disabled="disabled" value="">Restaurants</option>

                    </select>
                    </div> 

                    </div>


            <div class="px-5 py-4">
              <button type="submit" class="btn btn-primary btn-lg">Create</button>
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
</x-admin-master>