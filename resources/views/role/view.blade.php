<x-admin-master>
    @section('content')
  
    <div class="card-header py-3">
    <h1 class="h3 mb-4 text-gray-800">Role Details: {{$role->id}} </h1>

    <button type="button" class="btn btn-link"><a href="{{route('role.show')}}">Cancel</a> </button>

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
                          <td>{{$role->id}}</td>
                      </tr>
                      <tr>
                          <td>Name</td>
                          <td>{{$role->name}}</td>
                      </tr>
                      <tr>
                          <td>Guard Name</td>
                          <td>{{$role->guard_name}}</td>
                      </tr>
                       <tr>
                          <td>Start At </td>
                          <td>{{$role->created_at}}</td>
                      </tr>
                       <tr>
                          <td>Ends At </td>
                          <td>{{$role->updated_at}}</td>
                      </tr>
                      <tr>
                          <td>Permissions</td>
                          <td>
                             @foreach($permissions as $permission)

                           @if($role->permissions->contains($permission->id) =='checked')



                            <i class="fas fa-check-circle" style="color:green;">{{$permission->name}}</i><br>

                         

                           @else

                            <i class="far fa-times-circle" style="color:red;"> {{$permission->name}}</i><br>

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