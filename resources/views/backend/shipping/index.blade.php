@extends('backend.layouts.master')

@section('content')

        

            <!-- success message -->

            
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">S.N</th>
                                            <th class="border-top-0">Shipping Address</th>
                                            <th class="border-top-0">Delivery Time</th>
                                            <th class="border-top-0">Delivery Charge</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($shippingIndex as $items)
                                        <tr>
                                            <th class="border-top-0">{{$loop->iteration}}</th>
                                            <th class="border-top-0">{{$items->shipping_address}}</th>
                                            <th class="border-top-0">{{$items->delivery_time}}</th>
                                            <th class="border-top-0">{{$items->delivery_charge}}</th>
                                            <th>
                                                <input type="checkbox" name="toggle" value="{{$items->id}}" {{$items->status=='active' ? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="small">
                                            </th>
                                            <th>
                                                <a href="{{route('shipping.edit',$items->id)}}" data-toggle="tooltip" class="btn btn-sm btn btn-outline-warning" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                                <form action="{{route('shipping.destroy',$items->id)}}" method ="POST">
                                                @csrf
                                                @method('DELETE')
                                                
                                                <!-- <a href="" data-toggle="tooltip" class="btn btn-sm btn btn-outline-danger" title="delete" data-placement="bottom"><i class="fas fa-trash-alt"></i></a> -->
                                                <button type="submit" data-toggle="tooltip" class="btn btn-sm btn btn-outline-danger" title="delete" data-placement="bottom">
                                                <i class="fas fa-trash-alt"></i>
                                                </button>
                                            
                                                   
                                                
                                                </form>
                                                </form>
                                                
                                            
                                            </th>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

@endsection

@section('scripts')
<script>
    $('input[name=toggle]').change(function(){
        var mode=$(this).prop('checked');
        var id=$(this).val();
        // alert(mode);
        $.ajax({
            url:"{{route('shipping.status')}}",
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

@endsection

