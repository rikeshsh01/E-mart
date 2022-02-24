<div class="container">
    @if(Session::has('success'))

        <div class="alert alert-success" id="alert">
            <strong>Success:</strong> {{Session::get('success')}}
        </div>

    @elseif(session('error'))
        <div class="alert alert-danger" id="alert">
            
            <strong>Error:</strong>{{Session::get('error')}}
        </div>
    @elseif ($errors->any())
        <div class="alert alert-danger" id="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>