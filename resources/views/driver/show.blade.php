<x-admin-master>

    @section('content')

    <h2>Drivers</h2>


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
                    
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($drivers as $driver)
                  <tr>
                      <td>{{$driver->first_name}}</td>
                      <td>{{$driver->mobile}}</td>
                      <td>{{$driver->email}}</td>  
                       <td ><button style="float:right" class="btn btn-success "><a style="color:white"  href="{{route('driver.edit',$driver->id)}}">edit</a></button>
                            <button style="float:right" class="btn btn-danger"><a style="color:white"  href="{{route('driver.view',$driver->id)}}">view</a></button>
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
    
</x-admin-master>sssss