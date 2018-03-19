<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organisation;

class OrganisationIssuesController extends Controller
{
    public function index(Organisation $organisation)
    {
        $issues = $organisation->issues()->get();

        return view('issues.index', ['issues' => $issues]);
    }
}
