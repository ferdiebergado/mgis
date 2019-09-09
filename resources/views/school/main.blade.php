@extends('layouts.app')

@section('cardtitle')

{{ $sch->name }}

@endsection

@section('content')

        <p><strong>SCHID</strong> {{ $sch->schid }}</p>
        <p><strong>Type</strong> {{ $sch->type }}</p>
        <p><strong>Region</strong> {{ $sch->region()->first()->name }}</p>
        <p><strong>Division</strong> {{ $sch->division()->first()->name }}</p>
        <p><strong>District</strong> {{ $sch->district()->first()->name }}</p>

    <p class="mt-3"><strong>Enrolment</strong></p>
    <table class="table">
        <thead>
            <tr>
                <th>Grade 1</th>
                <th>Grade 2</th>
                <th>Grade 3</th>
                <th>Grade 4</th>
                <th>Grade 5</th>
            <th>Grade 6</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row">{{ $sch->g1 }}</td>
            <td>{{ $sch->g2 }}</td>
            <td>{{ $sch->g3 }}</td>
            <td>{{ $sch->g4 }}</td>
            <td>{{ $sch->g5 }}</td>
            <td>{{ $sch->g6 }}</td>
        </tr>
    </tbody>
</table>

<p><strong>Teachers</strong></p>

<table class="table">
    <thead>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>MI</th>
            <th>Sex</th>
            <th>Date of Birth</th>
            <th>Task(s)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sch->teachers as $teacher)
        <tr>
            <td scope="row">{{ $teacher->last_name }}</td>
            <td>{{ $teacher->first_name }}</td>
            <td>{{ $teacher->MI }}</td>
            <td>{{ $teacher->sex }}</td>
            <td>{{ $teacher->birth_date }}</td>
            <td><a class="btn btn-sm btn-info" href="{{ route('teachers.edit', ['teacher' => $teacher->id])}}" role="button" title="Edit">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
