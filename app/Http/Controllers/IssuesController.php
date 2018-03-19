<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Organisation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Issue::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin') && session()->has('org_id')) {
            $organisation = Organisation::find(session('org_id'));
        } else {
            $organisation = Organisation::find(Auth::user()->organisation_id);
        }
        
        $issues = $organisation->issues->all();

        return view('issues.index', ['issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisation = Organisation::find(session('org_id'));

        return view('issues.create', ['organisation' => $organisation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organisation = Organisation::find(session('org_id'));

        $issue = $organisation->issues()->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'severity' => $request->get('severity'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('issues.show', $issue);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        return view('issues.show', ['issue' => $issue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        $organisation = Organisation::find(session('org_id'));

        return view('issues.edit', [
            'issue' => $issue,
            'organisation' => $organisation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        $issue->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'severity' => $request->get('severity'),
        ]);

        return redirect()->route('issues.show', $issue);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();

        return redirect()->route('issues.index');
    }
}
