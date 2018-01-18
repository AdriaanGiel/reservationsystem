@extends('layouts.admin-master')

@section('content')

    <worker-form title="bewerken"
                 :user-object="{{ $worker }}"
                 :edit="true"
                 route="{{route('admin.users.update',$worker->id)}}"
                 method="PATCH"
                 token="{{csrf_token()}}"
                 :roles="{{$roles}}"
    ></worker-form>

@endsection

@section('javascript')

    @if(Session::has('success-message'))
        @include('partial.success-message',[
        'message_title' => "Gelukt!",
        'message_body' => session('success-message'),
        'message_type' => 'success'
        ])
    @endif

@endsection