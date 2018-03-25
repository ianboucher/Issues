@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update this Issue for {{ $organisation->name }}</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('issues.update', $issue) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ $issue->title }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="8" required>{{ $issue->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="severity">Severity</label>
                            <input name="severity" type="number" class="form-control" id="severity" placeholder="Severity" value="{{ $issue->severity }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input name="heading" type="text" class="form-control" id="heading" placeholder="Heading" value="{{ $issue->issuable->heading }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" id="content" rows="8" required>{{ $issue->issuable->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>

                        @if (count($errors))
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection