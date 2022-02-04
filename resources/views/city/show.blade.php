<x-admin-master>

    @section('content')

    <h2>Cities</h2>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('city.create')}}" style="color:white"> Create</a></button><br><br>


    <div class="card shadow mb-4">
        
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>Name</th>
                      
                      
                    
                    </tr>
                  </thead>
                 
                  <tbody>
                  @foreach($cities as $city)
                  <tr>
                      <td>{{$city->city}}
                       <a style="float:right ; margin-left:10px;" href="{{route('city.edit',$city->id)}}"><img src="{{asset('image/edit.jpeg')}}" width="20px" alt=""></a>
                      <a style="float:right;" href="{{route('city.view',$city->id)}}"><img src="{{asset('image/eye.jpeg')}}" width="20px" alt=""></a></td>
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