@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/projects">Projects</a></li>
            <li class="breadcrumb-item"><a href="/projects/{{$project->id}}">{{$project->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$issue->title}}</li>
          </ol>
        </nav>
      <a class="float-right"href="/" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        Delete
      </a>
      <form id="logout-form" action="/" method="POST" style="display: none;">
        @csrf
      </form>
       {{-- <a href="/projects/{{$project->id}}">Back to {{$project->name}}</a> --}}

    </div>
  </div>

  <div class="row my-3">
    <div class="col-md-12  col-lg-9">
      <div class="card pb-4">
        <div class="card-body">
          
      <h1>{{$issue->title}}</h1>
      <p class="text-muted">{{$issue->description}}</p>
        </div>
      </div>
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

</div>
@endsection
