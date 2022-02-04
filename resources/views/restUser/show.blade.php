<x-admin-master>

    @section('content')

    <h2>Restaurant Users</h2>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('restUser.create')}}" style="color:white"> Create Restaurant User</a></button><br><br>


    <div class="card shadow mb-4">
        
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                    
                    </tr>
                  </thead>
                 
                  <tbody>
                  @foreach($restaurantusers as $restaurantuser)
                  <tr>
                      <td>{{$restaurantuser->first_name}}</td>
                      <td>{{$restaurantuser->mobile}}</td>
                      <td>{{$restaurantuser->email}}</td> 
                     
                      <td><a href="{{route('restUser.create')}}"><img src="{{asset('image/edit.jpeg')}}" width="20px" alt=""></a>
                      <a href=""><img src="{{asset('image/eye.jpeg')}}" width="20px" alt=""></a></td>

                     
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