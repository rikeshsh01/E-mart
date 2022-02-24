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


                <form action="{{route('category.store')}}" method="POST">

                @csrf
                <div class="container">
                    <div class="row">
                                        
                    <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Title<span class="text-danger">*</span></label>
                                <input name="title" class="form-control" placeholder="Title" value="" type="text">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Summary<span class="text-danger">*</span></label>
                                <textarea id="description" name="summary" class="form-control" placeholder="Write Something.."></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Is Parent : <span class="text-danger">*</span></label>
                                <input id="is_parent" type="checkbox" name="is_parent" value="1" checked>Yes
                            </div>
                        </div>
                        

                        <div class="col-md-12 col-sm-12 d-none" id="parent_cat">
                            <div class="form-group  ">
                                <label for="">Category
                                     <span></span></label>
                                <select name="parent_id"  class="form-control show-tick ">
                                    <option value="">Category</option>
                                    @foreach($parent_cats as $pcats)
                                        <option value="{{$pcats->id}}">{{$pcats->title}}</option>

                                    @endforeach


                                </select>
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

                        <div col-md-12 col-sm-12 >
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

                        <div class="col-md-12 col-sm-12" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="cancel" class="btn btn-outline-secondary" >Cancel</button>
                        </div>
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

  <script>
    $('#is_parent').change(function(e){
        e.preventDefault();
        var is_checked=$('#is_parent').prop('checked');
        // alert(is_checked);
        if(is_checked)
        {
            $('#parent_cat').addClass('d-none');
        }
        else
        {
            $('#parent_cat').removeClass('d-none');
        }
    })
  </script>

@endsection