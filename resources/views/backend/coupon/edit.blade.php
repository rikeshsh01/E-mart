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



                <form action="{{route('coupon.update',$couponEdit->id)}}}" method="POST">
                @csrf
                @method('patch')
                    <div class="container">                      
                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Coupon Code<span class="text-danger">*</span></label>
                                <input name="code" class="form-control" placeholder="Coupon Code" value="{{$couponEdit->code}}" type="text">
                            </div>
                        </div>

                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Coupon Value<span class="text-danger">*</span></label>
                                <input name="value" class="form-control" placeholder="Coupon value" value="{{$couponEdit->value}}" type="text">

                            </div>
                        </div>
                        
                
                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Coupon Type <span></span></label>
                                <select name="type" class="form-control show-tick">
                                    <option value="">Type</option>
                                    <option value="fixed" {{$couponEdit->type=='fixed' ? 'selected' : ''}}>Fixed</option>
                                    <option value="percent" {{$couponEdit->type=='percent' ? 'selected' : ''}}>Percentage</option>
                
                                </select>
                            </div>
                        </div>

                        <div col-sm-12 col-md-12>
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