@extends('layouts.admin-master')

@section('content')

    <worker-detail
        :worker="{{$worker}}"
    ></worker-detail>

@endsection