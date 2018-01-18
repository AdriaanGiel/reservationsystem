@extends('layouts.admin-master')

@section('content')

    <assignment-detail
        :assignment-object="{{ $assignment }}"
    ></assignment-detail>

@endsection