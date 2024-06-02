<!-- resources/views/timelines/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Timeline</h2>
    <form action="{{ route('timelines.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input type="datetime-local" name="deadline" id="deadline" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection