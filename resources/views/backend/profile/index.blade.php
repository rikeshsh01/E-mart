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
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <div class="white-box">
                    <div class="user-bg">
                        <img width="100%" alt="user" src="{{ $profileIndex->photo }}">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="{{ $profileIndex->photo }}"
                                        class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white mt-2">{{ $profileIndex->full_name }}</h4>
                                <h5 class="text-white mt-2">{{ $profileIndex->email }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="user-btm-box mt-5 d-md-flex">
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>258</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>125</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>556</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material"
                            action="{{ route('profile.update', $profileIndex->id) }}" method="POST">
                            @csrf

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Full Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input class="form-control p-0 border-0" name="full_name"
                                        value="{{ $profileIndex->full_name }}">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Username</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input class="form-control p-0 border-0" name="username"
                                        value=" {{ $profileIndex->username }}">
                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Email</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input class="form-control p-0 border-0" value="{{ $profileIndex->email }}" disabled>

                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Old Password</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input class="form-control p-0 border-0" name="old_password" value="">

                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">New Password</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input class="form-control p-0 border-0" name="new_password" value="">

                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Address</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input class="form-control p-0 border-0" name="address"
                                        value="{{ $profileIndex->address }}">

                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Phone No</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input class="form-control p-0 border-0" name="phone"
                                        value="{{ $profileIndex->phone }}">

                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <label class="col-sm-12 p-0">Country</label>
                                <div class="col-sm-12 border-bottom">
                                    <input class="form-control p-0 border-0" name="country"
                                        value="{{ $profileIndex->country }}">

                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12 border-bottom">
                                    <button>
                                        <input class="form-control p-0 border-0" type="submit" value="Save Changes">
                                    </button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
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
    <script>
        $('input[name=toggle]').change(function() {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            // alert(mode);
            $.ajax({
                url: "{{ route('banner.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id,
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.msg);
                    } else {
                        alert('Please try again');
                    }
                }
            })
        });

    </script>

@endsection
