<x-myaccount-master>
    @section('content')

                    <div class="tab-pane fade show active" 
                               >
                                <div class="my-account-content">
                                    <h4>Account Details</h4>
                                    <form action="{{route('customer.save-changes',$customer->id)}}" method="post"  enctype="multipart/form-data">
                                          @csrf
                                            @method('PATCH')

                                            @if(Session::get('success'))
                                            <div class="alert alert-success"> 
                                            {{ Session::get('success') }} 
                                            </div>
                                            @endif

                                        <div class="form-row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                                    value="{{ Auth::guard('customer')->user()->first_name }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                                    value="{{ Auth::guard('customer')->user()->last_name }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email" placeholder="Email"
                                                    value="{{ Auth::guard('customer')->user()->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile"
                                                    value="{{ Auth::guard('customer')->user()->mobile }}">
                                                </div>
                                                <div class="form-group  mb-0">
                                                    <button class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
        
    @endsection
    @section('javascript')
    @parent
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>

     <script>
        $("document").ready(function(){
          setTimeout(function(){
            $("div.alert").remove();
         }, 1000 ); // 5 secs

       });
    </script>
@stop

  
    

</x-myaccount-master>