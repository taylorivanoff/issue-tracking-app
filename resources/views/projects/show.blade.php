@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/projects">Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$project->name}}</li>
          </ol>
        </nav>
      <a class="float-right"href="/" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        Delete
      </a>
      <form id="logout-form" action="/" method="POST" style="display: none;">
        @csrf
      </form>
      <h1>{{$project->name}}</h1>
      <p class="text-muted">{{$project->description}}</p>
    </div>
  </div>

 

  <div class="row my-3">
    <div class="col-md-12  col-lg-6">
      <div class="card">
        <div class="card-body">
          <form method="post" action="/issues">
              @csrf
              <input type="hidden" value="{{$project->id}}" name="projectId">
              <div class="form-group">
                  <input type="text" class="form-control" id="projectName" placeholder="Title" name="title">
              </div>
              <div class="form-group">
                  <textarea class="form-control" id="projectDescription" rows="1" placeholder="Description" name="description"></textarea>  
              </div>
              <div class="form-group">
                <select class="form-control" name="type">
                  <option value="bug">Bug</option>
                  <option value="story">Story</option>
                  <option value="task">Task</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    @foreach ($issues as $issue)
        <div class="col-lg-4 col-md-6 my-3">
          <div class="card">
            <div class="card-body">
              <h2>{{$issue->title}}</h2>
              <p class="float-right text-{{ $issue->status->color() }}">{{ $issue->status->status() }}</p>
              <p class="">{{ Str::title($issue->type) }}</p>
              <p>{{$issue->description}}</p>
              <div class="pt-4">
                <p class="float-left">{{$issue->created_at->diffForHumans()}}</p>
              <a href="/issues/{{$issue->id}}" class="float-right">View</a>
              </div>
              
            </div>
          </div>
        </div>
    @endforeach
  </div>
</div>
@endsection
