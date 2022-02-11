<x-admin-master>

    @section('content')

    <h2>Permission</h2>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('admin.permission.create')}}" style="color:white"> Create Permission</a></button><br><br>


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
                  @foreach($permissions as $permission)
                  <tr>
                      <td>{{$permission->id}}</td>
                      <td>{{$permission->name}}</td>
                      <td>{{$permission->created_at}}</td>  
                      <td>{{$permission->updated_at}}</td>  
                     
                     

                      <td><a href="{{route('admin.permission.edit',$permission->id)}}"><img src="{{asset('image/edit.jpeg')}}" width="20px" alt=""></a>
                      <a href="{{route('admin.permission.view',$permission->id)}}"><img src="{{asset('image/eye.jpeg')}}" width="20px" alt=""></a>
                      
                      <a href="{{route('admin.permission.delete',$permission->id)}}"><img src="{{asset('image/delete.jpeg')}}" width="20px" alt=""></a></td>

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