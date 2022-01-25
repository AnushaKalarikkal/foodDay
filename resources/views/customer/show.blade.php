<x-admin-master>

    @section('content')

    <h2>Customers</h2>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('customer.create')}}" style="color:white"> Create Customer User</a></button><br><br>


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
                  <tfoot>
                    <tr>
                    <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($customers as $customer)
                  <tr>
                      <td>{{$customer->first_name}}</td>
                      <td>{{$customer->mobile}}</td>
                      <td>{{$customer->email}}</td>  
                      <td><a href="{{route('customer.edit',$customer->id)}}"><img src="{{asset('image/edit.jpeg')}}" width="20px" alt=""></a>
                      <a href="{{route('customer.view',$customer->id)}}"><img src="{{asset('image/eye.jpeg')}}" width="20px" alt=""></a></td>

                       <!-- <td ><button style="float:right" class="btn btn-success "><a style="color:white"  href="{{route('customer.edit',$customer->id)}}">edit</a></button>
                            <button style="float:right" class="btn btn-danger"><a style="color:white"  href="{{route('customer.view',$customer->id)}}">view</a></button> -->
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