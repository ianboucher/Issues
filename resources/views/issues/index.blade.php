
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Issues</div>

                <div class="panel-body">
                    @foreach ($issues as $issue)
                        <article>
                            <div class="level">
                                <h4 class="flex">
                                <a href="{{ route('issues.show', $issue) }}">{{ $issue->title}}</a>
                                </h4>
                            </div>

                            <div class="body">
                                {{ $issue->description }}
                            </div>
                        </article>
                        <hr/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection