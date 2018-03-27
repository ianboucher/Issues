<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\Bug;

class BugsIssuesController extends Controller
{
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

        $issue->issuable()->create([
            'heading' => $request->get('heading'),
            'content' => $request->get('content'),
        ]);

        return redirect()->route('issues.show', $issue);
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

        $issue->issuable->update([
            'heading' => $request->get('heading'),
            'content' => $request->get('content'),
        ]);

        return redirect()->route("issues.show", $issue);
    }
}
