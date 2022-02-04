<x-admin-master>
    @section('content')
  
    <div class="card-header py-3">
    <h1 class="h3 mb-4 text-gray-800">Discount Code Details: {{$discount->name}} </h1>

    <button type="button" class="btn btn-link"><a href="{{route('discount.show')}}">Cancel</a> </button>
    <button class="btn btn-primary  " style="float:right;"><a href="{{route('discount.edit',$discount->id)}}" style="color:white"> Edit</a></button><br>

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
                          <td>{{$discount->id}}</td>
                      </tr>
                      <tr>
                          <td>Name</td>
                          <td>{{$discount->name}}</td>
                      </tr>
                      <tr>
                          <td>Code</td>
                          <td>{{$discount->code}}</td>
                      </tr>
                      <tr>
                          <td>Discount Type</td>
                          <td>{{$discount->discount_type}}</td>
                      </tr>
                      <tr>
                          <td>Amount</td>
                          <td>{{$discount->amount}}</td>
                      </tr>
                
                      <tr>
                          <td>Minimum purchase amount</td>
                          <td>  {{$discount->min_amount}}</td>
                      </tr>
                      <tr>
                          <td>Starts At</td>
                          <td>{{$discount->start}}</td>
                      </tr>
                      <tr>
                          <td>Ends At</td>
                          <td>{{$discount->end}}</td>
                      </tr>
                      <tr>
                          <td>Maximum Uses</td>
                          <td>{{$discount->max_uses}}</td>
                      </tr>
                      <tr>
                          <td>Maximum uses per Customer</td>
                          <td>{{$discount->max_uses_per_cus}}</td>
                      </tr>
                      <tr>
                          <td>Restaurants</td>
                          <td>
                               @foreach($restaurants as $rest)

                           @if($discount->restaurants->contains($rest->id))

                           <b> <a href="{{route('restaurant.view',$rest->id)}}">{{$rest->name}} ,</a></b>
                                   
                          
                           @endif
                           

                        @endforeach  
                            </td>
                      </tr>
                      
                  </tbody>
                </table>
              </div>
            </div>

    @endsection
</x-admin-master>