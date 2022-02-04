<x-admin-master>

    @section('content')

    <h2>Orders </h2>
<form >
  <div class="input-group" style="margin-bottom:25px;">
    <input type="text" name="id" placeholder="Search" value="{{ old('name') }}">
    <span>
       <button type="submit" class="btn btn-outline-primary"> <i class="fas fa-search"></i></button>
    </span>
  </div>
</form>

    <div class="card shadow mb-4">
        
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Restaurant</th>
                      <th>Customer</th>
                      <th>Mobile</th>
                      <th>Order Type</th>
                      <th>Order Status</th>
                      <th>Payment Status</th>
                      <th>Grand Total</th>
                      <th>Order Date</th>
                      <th></th>
                      <th></th>
                      
                    
                    </tr>
                  </thead>
                
                  <tbody>
                  @foreach($orders as $order)
                  <tr>
                      <td><b><a href="{{route('order.view',$order->id)}}">{{$order->id}}</a></b></td>
                      <td><b><a href="{{route('restaurant.view',$order->restaurant->id)}}">{{$order->restaurant->name}}</a></b></td>
                      <td><b><a href="{{route('customer.view',$order->customer->id)}}">{{$order->customer->first_name}}</a></b></td>  
                      <td>{{$order->mobile}}</td>  
                      <td>{{$order->order_type}}</td>  
                      <td>{{$order->order_status}}</td>  
                      <td>{{$order->payment_status}}</td>  
                      <td>{{$order->grand_total}}</td> 
                      <td>{{$order->order_date}}</td>  

                      <td><a href="{{route('order.edit',$order->id)}}"><img src="{{asset('image/edit.jpeg')}}" width="20px" alt=""></a>
                      <a href="{{route('order.view',$order->id)}}"><img src="{{asset('image/eye.jpeg')}}" width="20px" alt=""></a></td>

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