<x-admin-master>
    @section('content')
<form method="post" action="{{route('admin.cuisine.update',$cuisines->id)}}" enctype="multipart/form-data" >
@csrf
@method('PATCH')
<section class="vh-100">
  <div class="container_fluid">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-xl-11">

        <h1 class="text-black mb-4" >Update Cuisinesss: {{$cuisines->cuisine}} </h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-3 pb-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0"> Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="cuisine" id="cuisine" value="{{$cuisines->cuisine}}" class="form-control form-control-lg" />

              </div>
            </div>
 

            <div class="px-5 py-4" style="float:right;">
            <button type="button" class="btn btn-link"><a href="{{route('admin.cuisine.show')}}">Cancel</a> </button>
              <button type="submit" class="btn btn-primary btn-lg" >Update Cuisine</button>
              
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