@extends('layouts.app')
@section('content')
@if (session('message'))
<div class="alert alert-info">
    {{ session('message') }}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">User Login</h3>
                </div>
                <div class="panel-body p-3">
                    <form action="login_script.php" method="POST">
                        <div class="text-center pt-4 text-muted">Don't have an account?
                        </div>
                    </form>
                </div>
                <div class="mx-3 my-2 py-2 bordert">
                    <div class="text-center py-3">
                        <a href="{{url('/auth/github/redirect')}}" target="_blank" class="px-2">
                            <img src="{{asset('images/github.png')}}" alt="">
                            GitHub
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection