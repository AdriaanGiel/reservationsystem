@extends('layouts.admin-master')

@section('content')

    <companies-dashboard :companies-object="{{$companies}}"></companies-dashboard>

@endsection

@section('before_general')
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
@endsection

