<x-admin-master>
    @section('content')
  
    <div class="card-header py-3">
    <h1 class="h3 mb-4 text-gray-800">Order Details: {{$order->id}} </h1>

    <button type="button" class="btn btn-link"><a href="{{route('admin.order.show')}}">Cancel</a> </button>

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
                          <td>{{$order->id}}</td>
                      </tr>
                      <tr>
                          <td>Order Date</td>
                          <td>{{$order->order_date}}</td>
                      </tr>
                      <tr>
                          <td>Restaurant</td>
                          <td><b><a href="{{route('admin.restaurant.view',$order->restaurant->id)}}">{{$order->restaurant->name}}</a></b></td>
                      </tr>
                      <tr>
                          <td>Customer</td>
                          <td><b><a href="{{route('admin.customer.view',$order->customer->id)}}">{{$order->customer->first_name}}</a></b></td>  
                      </tr>
                      <tr>
                          <td>mobile</td>
                          <td>{{$order->mobile}}</td>
                      </tr>
                
                      <tr>
                          <td>Order Type  </td>
                          <td>  {{$order->order_type}}</td>
                      </tr>
                      <tr>
                          <td>Order Status </td>
                          <td>{{$order->order_status}}</td>
                      </tr>
                      <tr>
                          <td>Delivery Status</td>
                          <td>{{$order->delivery_status}}</td>
                      </tr>
                      <tr>
                          <td>Payment Status</td>
                          <td>{{$order->payment_status}}</td>
                      </tr>
                      <tr>
                          <td>Payment Method</td>
                          <td>{{$order->payment_method}}</td>
                      </tr>
                      <tr>
                          <td>Channel</td>
                          <td>{{$order->channel}}</td>
                      </tr>
                       <tr>
                          <td>Item Total</td>
                          <td>{{$order->item_total}}</td>
                      </tr>
                       <tr>
                          <td>Subtotal</td>
                          <td>{{$order->sub_total}}</td>
                      </tr>
                       <tr>
                          <td>Delivery Fee</td>
                          <td>{{$order->delivery_fee}}</td>
                      </tr>
                       <tr>
                          <td>Tax</td>
                          <td>{{$order->tax}}</td>
                      </tr>
                       <tr>
                          <td>Discount</td>
                          <td>{{$order->discount}}</td>
                      </tr>
                       <tr>
                          <td>Grand Total</td>
                          <td>{{$order->grand_total}}</td>
                      </tr>
                      
                  </tbody>
                </table>
              </div>
            </div>

    @endsection
</x-admin-master>