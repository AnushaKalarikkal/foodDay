<x-admin-master>

    @section('content')

    <h2>Discount Codes</h2>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('admin.discount.create')}}" style="color:white"> Create Discount Code</a></button><br><br>


    <div class="card shadow mb-4">
        
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="">
                <table class="table  " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Discount Type</th>
                      <th>Amount</th>
                      <th>Starts At</th>
                      <th>Ends At</th>
                      <th></th>
                    
                    </tr>
                  </thead>
                
                  <tbody>
                  @foreach($discounts as $discount)
                  <tr>
                      <td>{{$discount->name}}</td>
                      <td>{{$discount->code}}</td>
                      <td>{{$discount->discount_type}}</td>  
                      <td>{{$discount->amount}}</td>  
                      <td>{{$discount->start}}</td>  
                      <td>{{$discount->end}}</td>  

                      <td><a href="{{route('admin.discount.edit',$discount->id)}}"><img src="{{asset('image/edit.jpeg')}}" width="20px" alt=""></a>
                      <a href="{{route('admin.discount.view',$discount->id)}}"><img src="{{asset('image/eye.jpeg')}}" width="20px" alt=""></a>
                      
                      <a href="/discountDel/{{$discount->id}}"><img src="{{asset('image/delete.jpeg')}}" width="20px" alt=""></a></td>

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