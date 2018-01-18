@extends('layouts.admin-master')

@section('content')

    <company-form
        :statuses="{{$statuses}}"
        :company="{{$company}}"
        :edit="true"
        route="{{ route('admin.companies.update',$company->id)  }}"
        method="PATCH"
        token="{{ csrf_token() }}"
    ></company-form>

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