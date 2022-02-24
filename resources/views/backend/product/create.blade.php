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

    



                <form action="{{route('product.store')}}" method="POST">

                @csrf
                    <div class="container">                      
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Title<span class="text-danger">*</span></label>
                                <input name="title" class="form-control" placeholder="Title" value="{{old('title')}}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Summary<span class="text-danger">*</span></label>
                                <textarea id="summary" name="summary" class="form-control" placeholder="Write Something..">{{old('summary')}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Description<span class="text-danger">*</span></label>
                                <textarea id="description" name="description" class="form-control" placeholder="Write Something.."></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Stock<span class="text-danger">*</span></label>
                                <input name="stock" class="form-control" placeholder="Stock" value="{{old('stock')}}" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Price<span class="text-danger">*</span></label>
                                <input name="price" step="any" class="form-control" placeholder="Price" value="{{old('price')}}" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Discount<span class="text-danger">*</span></label>
                                <input name="discount" step="any" class="form-control" placeholder="Discount" value="{{old('discount')}}" type="number">
                            </div>
                        </div>

                        
                        
                        <div class="col-sm-12 col-md-12">
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
                                <label for="">Brands <span></span></label>
                                <select name="brand_id" class="form-control show-tick">
                                    <option value="">Brands</option>
                                    @foreach(App\Models\Brand::get() as $brand)
                                    <option value="{{$brand->id}}">{{$brand->title}}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Category <span></span></label>
                                <select name="cat_id" id="cat_id" class="form-control show-tick">
                                    <option value="">Category</option>
                                    @foreach(App\Models\Category::where('is_parent',1)->get() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 d-none" id="child_cat_div" >
                            <div class="form-group">
                                <label for="">Child Category <span></span></label>
                                <select name="child_cat_id" class="form-control show-tick" id="child_cat_id">
                              
                                    
                                </select>
                            </div>
                        </div>
                        



                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Size <span></span></label>
                                <select name="size" class="form-control show-tick">
                                    <option value="">Size</option>
                                    <option value="S" {{old('size')=='S' ? 'selected' : ''}}>Small</option>
                                    <option value="M" {{old('size')=='M' ? 'selected' : ''}}>Mediam</option>
                                    <option value="L" {{old('size')=='L' ? 'selected' : ''}}>Large</option>
                                    <option value="XL" {{old('size')=='XL' ? 'selected' : ''}}>Extra Large</option>
                
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Conditions <span></span></label>
                                <select name="conditions" class="form-control show-tick">
                                    <option value="">Conditions</option>
                                    <option value="New" {{old('conditions')=='new' ? 'selected' : ''}}>New</option>
                                    <option value="Popular" {{old('conditions')=='popular' ? 'selected' : ''}}>Popular</option>
                                    <option value="Winter" {{old('conditions')=='winter' ? 'selected' : ''}}>Winter</option>
                
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Sellers <span></span></label>
                                <select name="seller_id" class="form-control show-tick">
                                    <option value="">Sellers</option>
                                    @foreach(App\Models\User::where('role', 'seller')->get() as $seller)
                                    <option value="{{$seller->id}}">
                                        {{$seller->full_name}}
                                    </option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
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
    $(document).ready(function() {
        $('#summary').summernote();
    });
</script>
<script>
    $('#cat_id').change(function(){
        var cat_id=$(this).val();
        // alert(cat_id);
        if(cat_id!=null){
            $.ajax({
                url:"/admin/category/"+cat_id+"/child",
                type:"POST",
                data:{
                        _token:'{{csrf_token()}}',
                        cat_id:cat_id
                    },
                success:function(response){
                 
                    var html_option="<option value=''>Child Category</option>";

                    if(response.status){
                        $('#child_cat_div').removeClass('d-none');
                        $.each(response.data,function(id,title){
                            html_option +="<option value='"+id+"'>"+title+"</option>"
                        });
                    }
                    else{
                        $('#child_cat_div').addClass('d-none');
                    }
                    $('#child_cat_id').html(html_option);
                }
            });
        }
    });
</script>

@endsection