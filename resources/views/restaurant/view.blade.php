<x-admin-master>
    @section('content')
  
    <div class="card-header py-3">
    <h1 class="h3 mb-4 text-gray-800">Restaurant Details: </h1>

    <button type="button" class="btn btn-link"><a href="{{route('restaurant.show')}}">Cancel</a> </button>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('restaurant.edit',$restaurant->id)}}" style="color:white"> Edit</a></button><br>

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
                          <td>{{$restaurant->id}}</td>
                      </tr>
                      <tr>
                          <td>Name</td>
                          <td>{{$restaurant->name}}</td>
                      </tr>
                      <tr>
                          <td>Address</td>
                          <td>{{$restaurant->address}}</td>
                      </tr>
                      <tr>
                          <td>Mobile</td>
                          <td>{{$restaurant->mobile}}</td>
                      </tr>
                      <tr>
                          <td>city</td>
                          <td>{{$restaurant->city->city}}</td>
                      </tr>
                      <tr>
                          <td>Logo</td>
                          <td><img src="{{$restaurant->logo}}" height="100px" width="100px" alt=""></td>
                      </tr>
                      <tr>
                          <td>Banner</td>
                          <td><img src="{{$restaurant->banner}}"  height="100px" width="100px" alt=""></td>
                      </tr>
                      <tr>
                          <td>Minimum order value</td>
                          <td>  {{$restaurant->min_order_value}}</td>
                      </tr>
                      <tr>
                          <td>cost for two people</td>
                          <td>{{$restaurant->cost_for_two_people}}</td>
                      </tr>
                      <tr>
                          <td>Default preparation time</td>
                          <td>{{$restaurant->default_preparation_time}}</td>
                      </tr>
                      <tr>
                          <td>Cuisines</td>
                          <td>{{$restaurant->cuisine->cuisine}}</td>
                      </tr>
                      <tr>
                          <td>Is open</td>
                          <td>{{$restaurant->is_open}}</td>
                      </tr>
                      <tr>
                          <td>Allow pickup</td>
                          <td>{{$restaurant->allow_pickup}}</td>
                      </tr>
                      <tr>
                          <td>Status</td>
                          <td>{{$restaurant->status}}</td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>

    @endsection
</x-admin-master>