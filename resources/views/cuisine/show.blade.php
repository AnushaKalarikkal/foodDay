<x-admin-master>

    @section('content')

    <h2>Cuisines</h2>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('cuisine.create')}}" style="color:white"> Create</a></button><br><br>


    <div class="card shadow mb-4">
        
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th></th>
                    
                    </tr>
                  </thead>
                 
                  <tbody>
                  @foreach($cuisines as $cuisine)
                  <tr>
                      <td>{{$cuisine->cuisine}}</td>
                     
                       <td><button style="float:right" class="btn btn-success "><a style="color:white"  href="{{route('cuisine.edit',$cuisine->id)}}">edit</a></button>
                            <button style="float:right" class="btn btn-danger"><a style="color:white"  href="{{route('cuisine.view',$cuisine->id)}}">view</a></button>
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
    
</x-admin-master>ss