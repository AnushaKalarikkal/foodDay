<x-admin-master>

    @section('content')

    <h2>Roles</h2>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('role.create')}}" style="color:white"> Create Role</a></button><br><br>


    <div class="card shadow mb-4">
        
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      
                      
                
                    </tr>
                  </thead>
                
                  <tbody>
                  @foreach($roles as $role)
                  <tr>
                      <td>{{$role->id}}</td>
                      <td>{{$role->name}}</td>
                      <td>{{$role->created_at}}</td>  
                      <td>{{$role->updated_at}}</td>  
                     
                     

                      <td><a href="{{route('role.edit',$role->id)}}"><img src="{{asset('image/edit.jpeg')}}" width="20px" alt=""></a>
                      <a href="{{route('role.view',$role->id)}}"><img src="{{asset('image/eye.jpeg')}}" width="20px" alt=""></a>
                      
                      <a href="{{route('role.delete',$role->id)}}"><img src="{{asset('image/delete.jpeg')}}" width="20px" alt=""></a></td>

                  </tr>
                  @endforeach
                  </tbody>
                 
                </table>
              </div>
            </div>
          </div>

    @endsection
    @section('scripts')
 <!-- Page level plugins -->
 <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
    
</x-admin-master>