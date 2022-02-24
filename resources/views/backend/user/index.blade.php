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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">S.N</th>
                                            <th class="border-top-0">Full Name</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">Country</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">Photo</th>
                                            <th class="border-top-0">Role</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userIndex as $items)
                                        <tr>
                                            <th class="border-top-0">{{$loop->iteration}}</th>
                                            <th class="border-top-0">{{$items->full_name}}</th>
                                            <th class="border-top-0">{{$items->username}}</th>
                                            <th class="border-top-0">{{$items->email}}</th>
                                            <th class="border-top-0">{{$items->address}}</th>
                                            <th class="border-top-0">{{$items->country}}</th>
                                            <th class="border-top-0">{{$items->phone}}</th>
                                    
                                            <th class="border-top-0"><img src="{{$items->photo}}" alt="banner image" style="max-height:100px; max-width:120px;"></th>
                                           
                                            <th class="border-top-0">{{$items->role}}</th>

                                            <th>
                                                <input type="checkbox" name="toggle" value="{{$items->id}}" {{$items->status=='active' ? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="small">
                                            </th>
                                            <th>
                                                <a href="{{route('user.edit',$items->id)}}" data-toggle="tooltip" class="btn btn-sm btn btn-outline-warning" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                                <form action="{{route('user.destroy',$items->id)}}" method ="POST">
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
            url:"{{route('user.status')}}",
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

