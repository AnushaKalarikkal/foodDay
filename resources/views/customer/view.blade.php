<x-admin-master>
    @section('content')
  
    <div class="card-header py-3">
    <h1 class="h3 mb-4 text-gray-800">Customer Details: </h1>

    <button type="button" class="btn btn-link"><a href="{{route('customer.show')}}">Cancel</a> </button>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('customer.edit',$customer->id)}}" style="color:white"> Edit</a></button><br>

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
                          <td>{{$customer->id}}</td>
                      </tr>
                      <tr>
                          <td>Name</td>
                          <td>{{$customer->first_name}}</td>
                      </tr>
                      <tr>
                          <td>Mobile</td>
                          <td>{{$customer->mobile}}</td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td>{{$customer->email}}</td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>

    @endsection
</x-admin-master>