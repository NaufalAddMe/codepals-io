<!-- resources/views/timelines/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Timeline List</h2>
    <a href="{{ route('timelines.create') }}" class="btn btn-primary">Add New Timeline</a> <!-- Button to create new timeline -->
    <br><br>
    @if ($timelines->isEmpty())
    <p>No timelines found.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Deadline</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timelines as $timeline)
            <tr>
                <td>{{ $timeline->title }}</td>
                <td>{{ $timeline->deadline }}</td>
                <td>
                    <a href="{{ route('timelines.edit', $timeline->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('timelines.destroy', $timeline->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this timeline?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection