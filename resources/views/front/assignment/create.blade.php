@extends('layouts.app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')

    <assignments-form
        create-url="{{ route('assignments.store')  }}"
        csrf-token="{{ csrf_token() }}"
        :assignment-types="{{ $types }}"
        date-object="{{$date}}"
        time-object="{{$time}}"
    ></assignments-form>

@endsection

@section('before_general')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
@endsection