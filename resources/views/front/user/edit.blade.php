@extends('layouts.app')

@section('content')

    <div class="row">
        @include('front.partial.sidebar')
        <profile-password-form
                edit-url="{{ route('user.update') }}"
                csrf-token="{{ csrf_token() }}"
        ></profile-password-form>
    </div>

@endsection