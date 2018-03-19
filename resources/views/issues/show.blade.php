@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#">{{ $issue->createdBy->name }}</a> posted...&nbsp;&nbsp;
                    {{ $issue->title }}
                </div>
                <div class="panel-body">
                    {{ $issue->description }}
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