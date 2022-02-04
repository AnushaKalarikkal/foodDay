<x-admin-master>
    @section('content')
<form method="post" action="{{route('role.update',$roles->id)}}" enctype="multipart/form-data" >
@csrf
@method('PATCH')
<section class="">
  <div class="container_fluid">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-xl-11">

        <h1 class="text-black mb-4" >Update Role</h1>

        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-3 pb-2">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="name" id="name" value="{{$roles->name}}" class="form-control form-control-lg" />

              </div>
            </div>



            <hr class="mx-n3">

                <div class="row align-items-center py-2">
                <div class="col-md-3 ps-5">

                    <h6 class="mb-0">Guard Name</h6>

                </div>
                <div class="col-md-9 pe-5">
                <select name="guard_name" id="" value ="{{$roles->guard_name}}"class="form-control form-control-lg">
                    <option value="web">web</option>
                    <option value="api">api</option>
                  
                </select>

                </div>
                </div>

            <hr class="mx-n3">

             <div class="row align-items-center py-2">

              <div class="col-md-3 ps-5">



                <h6 class="mb-0">Permissions </h6>



              </div>

              <div class="col-md-9 pe-5">

              @foreach($permissions as $permission)

             

              <label><input type="checkbox" name="permission_id[]" value="{{$permission->id}}"  

               @if($roles->permissions->contains($permission->id))

               checked='checked'

               @endif >{{$permission->name}}</label><br>

             

              @endforeach

     

            </div>

            </div>

            

            

          </div>
          
        </div>
        <div class="px-5 py-4">

            <button type="button" class="btn btn-link"><a href="{{route('role.show')}}">Cancel</a> </button>
              <button type="submit" class="btn btn-primary btn-lg">Create Role</button>
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