@extends('layouts.master')

@section('content')
    <div class="container flex flex-column">
        <div class="row">
            <div class="col s12 offset-m3 m6 offset-l2 l8 ">
                <div class="row">
                    <div class="col s12">

                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Reset wachtwoord</span>

                                <div class="row">

                                    @if (session('status'))
                                        <div class="col s12">
                                        {{ session('status') }}
                                        </div>
                                    @endif

                                    <form class="form-horizontal" method="POST"
                                          action="{{ route('password.email') }}">
                                        {{ csrf_field() }}

                                        <div class="input-field col s12">
                                            <input name="email" required id="user_name" type="text" value="">
                                            <label for="password">Email</label>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn">
                                                    Stuur wachtwoord reset link
                                                </button>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="row">
            <div class="logo-wrapper flex flex-center">

                <a href="">
                    <img src="{{ asset('img/imageedit_4_9567712873.png')  }}" alt=""
                         class="circle responsive-img login-logo">
                </a>
            </div>

        </div>
    </div>



    {{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Reset Password</div>--}}

                {{--<div class="panel-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--<form class="form-horizontal" method="POST" action="{{ route('password.email') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Send Password Reset Link--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
