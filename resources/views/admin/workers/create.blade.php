@extends('layouts.admin-master')

@section('content')

    <worker-form title="aanmaken"
                 route="{{route('admin.users.store')}}"
                 token="{{csrf_token()}}"
                 :roles="{{$roles}}"
    ></worker-form>

@endsection

