<x-admin-master>
    @section('content')
    <h1 class="h3 mb-4 text-gray-800">Admin Users</h1>
    <div class="card-header py-3">

    <button class="btn btn-primary  " style="float:right;"><a href="{{route('admin.create')}}" style="color:white"> Create Admin User</a></button><br>

    </div>
    <div class="card shadow mb-4">
    
            <div class="card-header py-3">
           
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th></th>
                     
                    </tr>
                  </thead>
                  <tfoot>
                    
                  </tfoot>
               
                  <tbody>
                  @foreach($users as $user)
                  <tr>
                      <td>{{$user->first_name}}</td>
                      <td>{{$user->mobile}}</td>
                      <td>{{$user->email}}</td>
                      <td ><button style="float:right" class="btn btn-success "><a style="color:white"  href="{{route('admin.edit',$user->id)}}">edit</a></button>
                      <button style="float:right" class="btn btn-danger"><a style="color:white"  href="{{route('admin.view',$user->id)}}">view</a></button>
                    </td>
                      
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