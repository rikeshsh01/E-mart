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


                <form action="{{route('shipping.update',$shippingEdit->id)}}" method="POST">

                @csrf
                @method('patch')
                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Shipping Address<span class="text-danger">*</span></label>
                                <input name="shipping_address" class="form-control" placeholder="Shipping Address" value="{{$shippingEdit->shipping_address}}" type="text">
                            </div>
                        </div>

                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Delivery TIme<span class="text-danger">*</span></label>
                                <input name="delivery_time" class="form-control" placeholder="Delivery Time" value="{{$shippingEdit->delivery_time}}" type="text">
                            </div>
                        </div>
                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Delivery Charge<span class="text-danger">*</span></label>
                                <input name="delivery_charge" class="form-control" placeholder="Delivery Charge" value="{{$shippingEdit->delivery_charge}}" type="text">
                            </div>
                        </div>


                        <div col-sm-12 col-md-12>
                            <button type="submit" class="btn btn-primary">Update</button>
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