<x-myaccount-master>
    @section('change-password')
     <div class="tab-pane fade show active" 
                                >
                                <div class="my-account-content">
                                    <h4>Change Password</h4>
                                    
                                    <form action="{{route('update',[$users->id,$users->slug])}}" method="post"  enctype="multipart/form-data">
                                         @csrf
                                           @method('PATCH')
                                        <div class="form-row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="current_password"
                                                        placeholder="Current Password">
                                                                 @if($errors->any('current_password'))
                                                                     <span class="text-danger">{{$errors->first('current_password')}}</span>
                                                                 @endif
                                                                            
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="password" placeholder="New Password">
                                                               @if($errors->any('password'))
                                                                     <span class="text-danger">{{$errors->first('password')}}</span>
                                                                @endif
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="confirm_password"
                                                        placeholder="Confirm New Password">
                                                                    @if($errors->any('confirm_password'))
                                                                     <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                                                                @endif
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
</x-myaccount-master>