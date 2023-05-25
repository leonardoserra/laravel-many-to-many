@extends('layouts.admin')
@section('page-title', $project->title)

@section('content')
      <div class="col-10">
            <div class="card">
                  @if ($project->image_src)
                        <img src="{{ $project->image_src }}" class="card-img-top" alt="{{ $project->title }}">
                  @endif
                  <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <h6 class="card-text">
                              Tipologia:
                              {{ $project->type_id ? $project->type->type_name : 'Nessuna Tipologia Di Progetto Selezionata' }}
                              </h5>
                              <p class="card-text">
                                    {{ $project->description }}</p>
                              <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}"
                                    class="btn btn-primary">Modifica</a>
                  </div>
            </div>
      </div>
@endsection
