<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::orderBy('deadline', 'asc')->get();
        return view('timelines.index', compact('timelines'));
    }

    public function create()
    {
        return view('timelines.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'deadline' => 'required|date',
        ]);

        Timeline::create($request->all());

        return redirect()->route('timelines.index')
            ->with('success', 'Timeline created successfully.');
    }

    public function edit(Timeline $timeline)
    {
        return view('timelines.edit', compact('timeline'));
    }

    public function update(Request $request, Timeline $timeline)
    {
        $request->validate([
            'title' => 'required',
            'deadline' => 'required|date',
        ]);

        $timeline->update($request->all());

        return redirect()->route('timelines.index')
            ->with('success', 'Timeline updated successfully');
    }

    public function destroy(Timeline $timeline)
    {
        $timeline->delete();

        return redirect()->route('timelines.index')
            ->with('success', 'Timeline deleted successfully');
    }
}
