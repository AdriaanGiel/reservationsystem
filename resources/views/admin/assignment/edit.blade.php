@extends('layouts.admin-master')

@section('content')

    <assignments-form
            title="bewerken"
            hours="{{ $assignment->hours }}"
            date="{{ $assignment->formatted_date }}"
            time="{{ $assignment->start_time }}"
            :types="{{ $types }}"
            :statuses="{{ $statuses }}"
            description="{{ $assignment->description  }}"
            method="PATCH"
            token="{{csrf_token()}}"
            route="{{route('admin.assignments.update',$assignment->id)}}"
            company="{{ $assignment->company->name  }}",
            :editForm="true"
    ></assignments-form>

@endsection