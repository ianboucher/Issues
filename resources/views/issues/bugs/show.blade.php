@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#">{{ $issue->createdBy->name }}</a> posted...&nbsp;&nbsp;
                    {{ $issue->title }} &nbsp;&nbsp; | &nbsp;&nbsp; <span class="badge badge-info">{{ $issue->type() }}</span>
                </div>
                <div class="panel-body">
                    <p>{{ $issue->description }}</p>
                    <p>{{ $issue->severity }}</p>
                    <p>{{ $issue->issuable->heading }}</p>
                    <p>{{ $issue->issuable->content }}</p>
                </div>
            </div>
            <div class="pull-right">
                <a href="{{ route('issues.edit', $issue) }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('issues.destroy', $issue) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection