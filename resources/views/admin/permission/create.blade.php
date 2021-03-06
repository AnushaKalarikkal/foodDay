<x-admin-master>
    @section('content')
<form method="post" action="{{route('admin.permission.store')}}" enctype="multipart/form-data" >
@csrf
<section>
  <div class="container_fluid">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-xl-11">

        <h1 class="text-black mb-4" >Create Permission</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-3 pb-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="name" id="name" class="form-control form-control-lg" />

              </div>
            </div>



            <hr class="mx-n3">

                <div class="row align-items-center py-2">
                <div class="col-md-3 ps-5">

                    <h6 class="mb-0">Guard Name</h6>

                </div>
                <div class="col-md-9 pe-5">
                <select name="" id="" class="form-control form-control-lg">
                    <option value="web">web</option>
                    <option value="api">api</option>

                </select>

                </div>
                </div>

            <hr class="mx-n3">

             <div class="row align-items-center py-2">
                <div class="col-md-3 ps-5">

                    <h6 class="mb-0">Roles</h6>

                </div>
                <div class="col-md-9 pe-5">
                      @foreach($roles as $item)
                    <input type="checkbox" name="role_id[]" value="{{$item->id}}">{{$item->name}} <br/>
               @endforeach
                </div>
               
                </div>
              


          </div>
          
        </div>
        <div class="px-5 py-4">

            <button type="button" class="btn btn-link"><a href="{{route('admin.permission.show')}}">Cancel</a> </button>
              <button type="submit" class="btn btn-primary btn-lg">Create Permission</button>
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