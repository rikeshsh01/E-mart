@extends('backend.layouts.master')

@section('content')
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                
                

                <!-- error message with validation -->



                <form action="{{route('user.store')}}" method="POST">

                @csrf
                    <div class="container">                      
                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Name<span class="text-danger">*</span></label>
                                <input name="full_name" class="form-control" placeholder="Full Name" value="{{old('full_name')}}" type="text">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Username<span class="text-danger">*</span></label>
                                <input name="username" class="form-control" placeholder="Username" value="{{old('username')}}" type="text">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Email<span class="text-danger">*</span></label>
                                <input name="email" class="form-control" placeholder="Email" value="{{old('email')}}" type="text">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Password<span class="text-danger">*</span></label>
                                <input name="password" class="form-control" placeholder="Passowrd" value="{{old('password')}}" type="text">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Address<span class="text-danger">*</span></label>
                                <input name="address" class="form-control" placeholder="Address" value="{{old('address')}}" type="text">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Phone<span class="text-danger">*</span></label>
                                <input name="phone" class="form-control" placeholder="Phone Number" value="{{old('phone')}}" type="text">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Country<span class="text-danger">*</span></label>
                                <input name="country" class="form-control" placeholder="Country" value="{{old('country')}}" type="text">
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                            <label for="">Photo<span class="text-danger">*</span></label>
                            
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Role <span></span></label>
                                <select name="role" class="form-control show-tick">
                                    <option value="">Role</option>
                                    <option value="admin" {{old('role')=='admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="seller" {{old('role')=='seller' ? 'selected' : ''}}>Seller</option>
                                    <option value="customer" {{old('role')=='customer' ? 'selected' : ''}}>Customer</option>
                
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Status <span></span></label>
                                <select name="status" class="form-control show-tick">
                                    <option value="">Status</option>
                                    <option value="Active" {{old('status')=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="Inactive" {{old('status')=='inactive' ? 'selected' : ''}}>Inactive</option>
                                    
                                    <!-- <option value="{{old('status')=='active' ? 'selected'=='active' : ''}}">Active</option>
                                    <option value=" {{old('status')=='inactive' ? 'selected'=='inactive' : ''}}">Inactive</option> -->

                
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="cancel" class="btn btn-outline-secondary" >Cancel</button>
                        </div>
                    </div>
                </form>


                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->


@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
     $('#lfm').filemanager('image');
</script>

<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
  </script>

@endsection