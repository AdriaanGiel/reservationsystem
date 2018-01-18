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
                                    <form class="form-horizontal" method="POST"
                                          action="{{ route('password.request') }}">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="input-field col s12">
                                            <input name="email" required id="user_name" type="text" value="{{ $email }}">
                                            <label for="password">Email</label>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="input-field col s12">
                                            <input name="password" required id="password" type="password" value="">
                                            <label for="password">Nieuw wachtwoord</label>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="input-field col s12">
                                            <input id="password-confirm" type="password" name="password_confirmation" required>
                                            <label class="active" for="password-confirm">Bevestig wachtwoord</label>
                                            @if ($errors->has('password-confirm'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password-confirm') }}</strong>
                                    </span>
                                            @endif
                                        </div>


                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button type="submit" class="waves-effect waves-light btn">Reset
                                                    wachtwoord
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




@endsection
