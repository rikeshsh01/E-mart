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

    



                <form action="{{route('product.update',$productEdit->id)}}" method="POST">

                @csrf
                @method('patch')
                    <div class="container">                      
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="">Title<span class="text-danger">*</span></label>
                                <input name="title" class="form-control" placeholder="Title" value="{{$productEdit->title}}" type="text">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Summary<span class="text-danger">*</span></label>
                                <textarea id="summary" name="summary" class="form-control" >{{$productEdit->summary}}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Description<span class="text-danger">*</span></label>
                                <textarea id="description" value=""  name="description" class="form-control" >{{$productEdit->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Stock<span class="text-danger">*</span></label>
                                <input name="stock" class="form-control" placeholder="Stock" value="{{$productEdit->stock}}" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Price<span class="text-danger">*</span></label>
                                <input name="price" step="any" class="form-control" placeholder="Price" value="{{$productEdit->price}}" type="number">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Discount<span class="text-danger">*</span></label>
                                <input name="discount" step="any" class="form-control" placeholder="Discount" value="{{$productEdit->discount}}" type="number">
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
                                <input id="thumbnail" class="form-control" type="text" value="{{$productEdit->photo}}"  name="photo">
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
                                    <option value="{{$brand->id}}" {{$brand->id==$productEdit->brand_id? 'selected':''}}>{{$brand->title}}</option>
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
                                    <option value="{{($cat->id)}}" {{$cat->id==$productEdit->cat_id? 'selected':''}}>{{$cat->title}}</option>
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
                                    <option value="S" {{($productEdit->size=='S' )? 'selected' : ''}}>Small</option>
                                    <option value="M" {{($productEdit->size=='M' )? 'selected' : ''}}>Mediam</option>
                                    <option value="L" {{($productEdit->size=='L' )? 'selected' : ''}}>Large</option>
                                    <option value="XL" {{($productEdit->size=='XL' )? 'selected' : ''}}>Extra Large</option>
                
                                </select>
                            </div>
                        </div>



                        <div class="col-md-12 col-sm-12" >
                            <div class="form-group">
                                <label for="">Condition <span></span></label>
                                <select name="conditions" class="form-control show-tick">
                                    <option value="">Condition</option>
                                    <option value="New" {{($productEdit->conditions=='new' )? 'selected' : ''}}>New</option>
                                    <option value="Popular" {{($productEdit->conditions=='popular' )? 'selected' : ''}}>Popular</option>
                                    <option value="Winter" {{($productEdit->conditions=='winter' )?'selected' : ''}}>Winter</option>
                
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Seller <span></span></label>
                                <select name="seller_id" class="form-control show-tick">
                                    <option value="">Seller</option>
                                    @foreach(App\Models\User::where('role', 'seller')->get() as $seller)
                                    <option value="{{$seller->id}}" {{$seller->id==$productEdit->seller_id? 'selected':''}}>{{$seller->full_name}}
                                    </option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
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


@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
     $('#lfm').filemanager('image');
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
<script>
    $('input[name=toggle]').change(function(){
        var mode=$(this).prop('checked');
        var id=$(this).val();
        // alert(mode);
        $.ajax({
            url:"{{route('product.status')}}",
            type:"POST",
            data:{
                _token:'{{csrf_token()}}',
                mode:mode,
                id:id,
            },
            success:function(response){
                if(response.status){
                    alert(response.msg);
                }
                else
                {
                    alert('Please try again');
                }
            }
        })
    });
</script>

<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
  </script>

@endsection