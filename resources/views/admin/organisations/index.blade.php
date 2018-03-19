
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Organisations</div>

                <div class="panel-body">
                    @foreach ($organisations as $organisation)
                        <article>
                            <div class="level">
                                <h4 class="flex">
                                    <a href="{{ route('organisations.show', $organisation) }}">{{ $organisation->name}}</a>
                                </h4>
                                <a href="{{ route('organisation.issues.index', $organisation) }}" class="btn btn-primary pull-right">View Issues</a>
                                <p>Organisation ID: {{ $organisation->id }}
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