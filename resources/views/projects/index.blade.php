@extends('layouts.app')

@section('content')
<div class="container">
  <div class="py-3">
    <h1>Projects</h1>
  </div>

  <div class="row my-3">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form method="post" action="/projects">
            @csrf
            <div class="row">
              <div class="col-md-5">
                  <input type="text" class="form-control" id="projectName" placeholder="Name" name="name">
              </div>
              <div class="col-md-5">
                  <textarea class="form-control" id="projectDescription" rows="1" placeholder="Description" name="description"></textarea>
              </div>
              <div class="col-md-2">
                  <button type="submit" class="btn btn-primary btn-block">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    @foreach ($projects as $project)
        <div class="col-lg-4 col-md-6 my-3">
          <div class="card">
            <div class="card-body">
              <h2>{{$project->name}}</h2>
              <p>{{$project->description}}</p>
              <ul>
                @foreach ($project->issues()->get()->take(3) as $issue)
                <li><a href="/issues/{{$issue->id}}">{{$issue->title}}</a></li>
                @endforeach
              </ul>
              <a class="float-right"href="/projects/{{$project->id}}">Manage</a>
            </div>
          </div>
        </div>
    @endforeach
  </div>

</div>
@endsection
