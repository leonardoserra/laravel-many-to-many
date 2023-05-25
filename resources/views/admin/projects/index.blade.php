@extends('layouts.admin')
@section('page-title', 'Lista Projects')
@section('content')
      <div class="col-10">


            <table class="table">
                  <thead>
                        <tr>
                              <th scope="col">#</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">Slug</th>
                              <th scope="col">Azione</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($projects as $project)
                              <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->slug }}</td>
                                    <td class="d-flex">
                                          <a class="btn btn-primary"
                                                href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">Vedi</a>
                                          <a class="btn btn-warning ms-2 me-2"
                                                href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">Modifica</a>
                                          <form class="form_delete_project"
                                                action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Elimina</button>
                                          </form>
                                    </td>
                              </tr>
                        @endforeach
                  </tbody>
            </table>

      </div>


      {{-- sezione modale --}}
      <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              Sicuro di voler eliminare il Project?
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                              <button type="button" class="btn btn-danger">Conferma eliminazione</button>
                        </div>
                  </div>
            </div>
      </div>

@endsection
