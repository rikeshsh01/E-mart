@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="bg">
            <div class="form">
                <form  method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <h2>Register</h2>
                    <div class="input-box">
                        <i class="fa fa-user"></i>
                        <input id="full_name" type="text" placeholder="Full Name" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="name" autofocus>

                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="input-box">
                        <i class="fa fa-user"></i>
                        <input id="username" type="text" placeholder=" Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="input-box">
                        <i class="fa fa-user"></i>
                        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="input-box">
                        <i class="fa fa-user"></i>
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="input-box">
                        <i class="fa fa-unlock-alt"></i>
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="input-box">
                        <i class="fa fa-user"></i>
                        <input id="country" type="text" placeholder="Country" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="name" autofocus>

                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="input-box">
                        <i class="fa fa-user"></i>
                        <input id="phone" type="text" placeholder="Phone Number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="input-box">
                        <i class="fa fa-user"></i>
                        <input id="address" type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="name" autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                
                    
                    

                    <div class="input-box text-center"> 
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
           
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap');
body {
  margin: 0;
  padding: 0; 
  font-family: 'Poppins', sans-serif;
} 
.bg{
  /* background:url(images/bg.jpg); */
  /* background-size: cover; */
  /* background-repeat: no-repeat; */
  min-height:100vh;
}
.bg::before{

  position: absolute;
  top: 70%;
  left: 50%;
  width:25%;
  height:100%;
  background:#000;
  opacity: 0.4;
}
.form{
  position:absolute;
  top:80%;
  left:50%;
  transform:translate(-50%,-50%);
  width:440px;
  min-height: 400px;
  background:#fff;
  box-shadow: 0 15px 50px rgba(0,0,0,0.5);
  padding:50px;
  box-sizing: border-box;
  border-radius: 12px;
}
.form h2{
  color:#777;
  margin:0 0 40px;
  padding:0;
}
.form .input-box{
  position:relative;
  margin:20px 0;
}
.form .input-box input{
  width:100%;
  font-size: 16px;
  border:none;
  border-bottom:2px solid #777;
  outline:none;
  padding:10px;
  padding-left:30px;
  box-sizing: border-box;
  font-weight: 700;
  color:rgb(15, 15, 15);
}
.form .input-box input:focus,
.form .input-box input:valid{
  border-bottom-color:#5656db;
}
.form .input-box .fa{
  position:absolute;
  top:8px;
  left:5px;
  font-size: 18px;
  color:#777;
}
.form .input-box input[type="submit"]{
  border:none;
  cursor: pointer;
  background:#5656db;
  color:#fff;
  font-weight: bold;
  transition:0.5s;
  border-radius: 8px;
}
.form .input-box input[type="submit"]:hover,
.form a:hover{
  background:#3030ce;
}
.form a{
  text-decoration: none;
  color:#777;
  margin-top:20px;
  font-weight: bold;
  display: inline-block;
  transition:0.5s;
}

@media (max-width:767px){
  .bg::before{
    width:100%;
  }
  .form{
    left:50%;
  }
}

  
</style>
