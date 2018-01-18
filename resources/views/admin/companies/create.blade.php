@extends('layouts.admin-master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')

    <company-form
        :statuses="{{$statuses}}"
        route="{{ route('admin.companies.store') }}"
        method="POST"
        token="{{ csrf_token() }}"
    ></company-form>

@endsection

@section('before_general')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
@endsection