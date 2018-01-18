@extends('layouts.app',['profile_var' => true])

@section('content')
    <div class="row">
    @include('front.partial.sidebar')


        <router-view></router-view>

        {{--<profile-dashboard--}}
        {{--email="{{ $user->email }}"--}}
        {{--firstname="{{ $user->profile->firstname }}"--}}
        {{--lastname="{{ $user->profile->lastname }}"--}}
        {{--phonenumber="{{ $user->profile->phonenumber }}"--}}
        {{--:hours="{{ $user->profile->hours }}"--}}
        {{--edit-url="{{ route('user.profile.update') }}"--}}
        {{--csrf-token="{{ csrf_token() }}"--}}
        {{--></profile-dashboard>--}}
    </div>

@endsection

@section('nav-item')
    <li><a @click="removeSideBar" href="{{route('user.profile')}}#/password">Change password</a></li>
@endsection    