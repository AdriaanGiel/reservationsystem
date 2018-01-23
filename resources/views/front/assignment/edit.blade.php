@extends('layouts.app')

@section('content')

    <assignments-form
            title="bewerken"
            create-url="{{ route('assignments.update',$assignment->id)  }}"
            csrf-token="{{ csrf_token() }}"
            :assignment-types="{{ $types }}"
            :edit-assignement="true"

            date-object="{{ $assignment->date }}"
            time-object="{{ $assignment->start_time }}"
            :hours="{{ $assignment->hours }}"
            :reason="{{ $assignment->assignment_type_id }}"
            description="{{ $assignment->description }}"
            company="{{ $assignment->company->name }}"
    ></assignments-form>

@endsection