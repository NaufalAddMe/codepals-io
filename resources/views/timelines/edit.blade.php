<!-- resources/views/timelines/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Timeline</h2>
    <form action="{{ route('timelines.update', $timeline->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $timeline->title }}">
        </div>
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input type="datetime-local" class="form-control" id="deadline" name="deadline" value="{{ date('Y-m-d\TH:i', strtotime($timeline->deadline)) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Timeline</button>
    </form>
</div>
@endsection