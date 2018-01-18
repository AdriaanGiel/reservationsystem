@extends('layouts.admin-master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')

    <assignments-form
            title="maken"
    ></assignments-form>

@endsection


@section('before_general')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
@endsection