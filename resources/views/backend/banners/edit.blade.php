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


                <form action="{{route('banner.update',$bannerEdit->id)}}" method="POST">

                @csrf
                @method('patch')
                    <div class="container">                      
                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Title<span class="text-danger">*</span></label>
                                <input name="title" class="form-control" placeholder="Title" value="{{$bannerEdit->title}}" type="text">
                            </div>
                        </div>

                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Description<span class="text-danger">*</span></label>
                                <textarea id="description" value=""  name="description" class="form-control" placeholder="Write Something..">{{$bannerEdit->description}}</textarea>
                            </div>
                        </div>
                        
                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                            <label for="">Photo<span class="text-danger">*</span></label>
                            
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" value="{{$bannerEdit->photo}}"  name="photo">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                        </div>



                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Condition <span></span></label>
                                <select name="condition" class="form-control show-tick">
                                    <option value="">Condition</option>
                                    <option value="Banner" {{$bannerEdit->condition=='banner' ? 'selected' : ''}}>Banner</option>
                                    <option value="Promo" {{$bannerEdit->condition=='promo' ? 'selected' : ''}}>Promo</option>
                
                                </select>
                            </div>
                        </div>

                        <div col-md-12 col-sm-12 >
                            <div class="form-group">
                                <label for="">Status <span></span></label>
                                <select name="status" class="form-control show-tick">
                                    <option value="">Status</option>
                                    <option value="Active" {{$bannerEdit->status=='active' ? 'selected' : ''}}>Active</option>
                                    <option value="Inactive" {{$bannerEdit->status=='inactive' ? 'selected' : ''}}>Inactive</option>
                
                                </select>
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