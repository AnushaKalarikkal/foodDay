<x-admin-master>
    @section('content')
  
    <div class="card-header py-3">
    <h1 class="h3 mb-4 text-gray-800">City Details: {{$cities->city}} </h1>

    <button type="button" class="btn btn-link"><a href="{{route('city.show')}}">Cancel</a> </button>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('city.edit',$cities->id)}}" style="color:white"> Edit</a></button><br>

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
                          <td>{{$cities->id}}</td>
                      </tr>
                      <tr>
                          <td>Name</td>
                          <td>{{$cities->city}}</td>
                      </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>

    @endsection
</x-admin-master>