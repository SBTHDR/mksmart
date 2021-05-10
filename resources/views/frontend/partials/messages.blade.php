@if($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
        @foreach($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('errors'))
    <div class="alert alert-danger">
        {{ Session::get('errors') }}
    </div>
@endif

@if(Session::has('login_errors'))
    <div class="alert alert-danger">
        {{ Session::get('login_errors') }}
    </div>
@endif
