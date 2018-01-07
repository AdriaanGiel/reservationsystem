@extends('layouts.master')

@section('content')
<div class="container flex flex-column">
    <div class="row">
        <div class="col s12 offset-m3 m6 offset-l2 l8 ">
            <div class="row">
                <div class="col s12">

                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Inloggen</span>

                            <div class="row">
                                <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="input-field col s12">
                                        <input placeholder="gebruikernaam" name="email" id="user_name" type="text" class="validate">
                                        <label for="user_name">Gebruikernaam</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input placeholder="wachtwoord" name="password" id="password" type="password" class="validate">
                                        <label for="password">Wachtwoord</label>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button type="submit" class="waves-effect waves-light btn">Inloggen</button>
                                            <a href="#">Wachtwoord vergeten?</a>
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


    <div class="row" >
        <div class="logo-wrapper flex flex-center">

            <a href="">

                <img src="{{ asset('img/imageedit_4_9567712873.png')  }}" alt="" class="circle responsive-img login-logo">
            </a>
        </div>

    </div>
</div>
@endsection
