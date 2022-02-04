<x-admin-master>

    @section('content')

    <h2>Restaurants</h2>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('restaurant.create')}}" style="color:white"> Create Restaurant</a></button><br><br>


    <div class="card shadow mb-4">
        
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table  table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>City</th>
                      <th>Minimum Order Value</th>
                      <th>Cost For Two People</th>
                      <th>Default Preparation Time</th>
                      <th>Is Open</th>
                      <th>Allow Pickup</th>
                      <th>Status</th>
                      <th>______ </th>
                    
                    </tr>
                  </thead>
                  
                 
                  <tbody>
                  @foreach($restaurants as $restaurant)
                  <tr>
                      <td>{{$restaurant->name}}</td>
                      <td><b><a href="{{route('city.view',$restaurant->city->id)}}">{{$restaurant->city->city}}</a></b></td>
                      <td>${{$restaurant->min_order_value}}</td>
                      <td>${{$restaurant->cost_for_two_people}}</td>
                      <td>{{$restaurant->default_preparation_time}}</td>

                      <td>
                        @if($restaurant->allow_pickup=="1"? 'checked':'' )
                        <i class="fas fa-check-circle" style="color:green;"></i>
                        @else
                        <i class="far fa-times-circle" style="color:red;"></i>
                        @endif
                      </td>


                      <td>
                        @if($restaurant->is_open=="1"? 'checked':'' )
                        <i class="fas fa-check-circle" style="color:green;"></i>
                        @else
                        <i class="far fa-times-circle " style="color:red;"></i>
                        @endif
                      </td>                      <td>{{$restaurant->status}}</td>
                      <td><a href="{{route('restaurant.edit',$restaurant->id)}}"><img src="{{asset('image/edit.jpeg')}}" width="20px" alt=""></a>
                       <a href="{{route('restaurant.view',$restaurant->id)}}"><img src="{{asset('image/eye.jpeg')}}" width="20px" alt=""></a></td>

<!-- 
                       <td ><button style="float:right" class="btn btn-success "><a style="color:white"  href="{{route('restaurant.edit',$restaurant->id)}}">edit</a></button>
                            <button style="float:right" class="btn btn-danger"><a style="color:white"  href="{{route('restaurant.view',$restaurant->id)}}">view</a></button></td> -->
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