@if (Session::has('success'))
    <div class="alert alert-success">
            {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('fail'))
    <div class="alert alert-danger">
        {{ Session::get('fail') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-warning">
        {{ Session::get('error') }}
    </div>
@endif
