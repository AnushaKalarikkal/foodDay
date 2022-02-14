<x-myaccount-master>
    @section('content')

    <div class="tab-pane fade" id="v-pills-account" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab">
                                <div class="my-account-content">
                                    <h4>Account Details</h4>
                                    <form method="post"  enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="First Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Mobile">
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