<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id.*' => 'exists:users,id'
        ]);

        $group = Group::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('groups.show', $group->id)->with('success', 'Group created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group) {
        $data = $group->load('users');
        return view('groups.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group) {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'max_user' => 'integer|min:1',
        ]);

        $group->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'max_user' => $request->input('max_user'),
        ]);

        return redirect()->route('groups.show', $group->id)->with('success', 'Group updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group) {
        $group->users()->detach();

        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully!');
    }

}
