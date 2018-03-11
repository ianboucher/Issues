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
        </div>
    </div>
</div>
@endsection