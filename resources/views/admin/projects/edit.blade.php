@extends('layouts.admin')
@section('page-title', "Modifica $project->title")

@section('content')
      <div class="col-10 mt-5">
            <form method="POST" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}">

                  @csrf
                  @method('PUT')
                  <div class="form-floating mb-3">

                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                              id="title" value="{{ old('title', $project->title) }}">
                        <label for="title">Titolo</label>
                        @error('title')
                              <div class="invalid-feedback">
                                    {{ $message }}
                              </div>
                        @enderror
                  </div>


                  <div class="form-floating mb-3">
                        <input name="image_src" type="text" class="form-control @error('image_src') is-invalid @enderror"
                              id="image_src" value="{{ old('image_src', $project->image_src) }}">
                        <label for="image_src">Url Immagine</label>
                        @error('image_src')
                              <div class="invalid-feedback">
                                    {{ $message }}
                              </div>
                        @enderror
                  </div>

                  <div class="form-floating mb-3">
                        <select class="form-select" name="type_id" id="type_id">
                              <option @selected(old('type_id') == '') value="">Nessuna Tipologia Assegnata</option>

                              @foreach ($types as $type)
                                    <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->type_name }}
                                    </option>
                              @endforeach
                        </select>
                        <label for="type_id">Tipologia Project</label>
                        @error('type_id')
                              <div class="invalid-feedback">
                                    {{ $message }}
                              </div>
                        @enderror
                  </div>

                  <div class="form-floating mb-3">
                        <input name="description" type="text"
                              class="form-control @error('description') is-invalid @enderror" id="description"
                              value="{{ old('image_src', $project->description) }}">
                        <label for="description">Descrizione</label>
                        @error('description')
                              <div class="invalid-feedback">
                                    {{ $message }}
                              </div>
                        @enderror
                  </div>



                  <button class="btn btn-warning" type="submit">Applica Modifiche</button>
            </form>

      </div>
@endsection
