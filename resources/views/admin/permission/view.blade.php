<x-admin-master>
    @section('content')
  
    <div class="card-header py-3">
    <h1 class="h3 mb-4 text-gray-800">Role Details: {{$permission->id}} </h1>

    <button type="button" class="btn btn-link"><a href="{{route('admin.permission.show')}}">Cancel</a> </button>

    </div>

    <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     
                      <th></th>
                      <th></th>
                     
                    </tr>
                  </thead>
               
                  <tbody>
                      <tr>
                          <td>ID</td>
                          <td>{{$permission->id}}</td>
                      </tr>
                      <tr>
                          <td>Name</td>
                          <td>{{$permission->name}}</td>
                      </tr>
                      <tr>
                          <td>Guard Name</td>
                          <td>{{$permission->guard_name}}</td>
                      </tr>
                       <tr>
                          <td>Start At </td>
                          <td>{{$permission->created_at}}</td>
                      </tr>
                       <tr>
                          <td>Ends At </td>
                          <td>{{$permission->updated_at}}</td>
                      </tr>
                      <tr>
                          <td>Roles</td>
                          <td>
                             @foreach($roles as $role)

                           @if($permission->roles->contains($role->id) =='checked')



                            <i class="fas fa-check-circle" style="color:green;">{{$role->name}}</i><br>

                         

                           @else

                            <i class="far fa-times-circle" style="color:red;"> {{$role->name}}</i><br>

                           @endif

                        @endforeach  
                          </td>
                      </tr>


                      
                  
                  </tbody>
                </table>
              </div>
            </div>

    @endsection
</x-admin-master>