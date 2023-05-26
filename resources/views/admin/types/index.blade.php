@extends('layouts.admin');
@section('page-title', 'Interfaccia delle Tipologie')

@section('content')

      <div class="col-10">


            <table class="table">
                  <thead>
                        <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Slug</th>
                              <th scope="col">Conteggio</th>
                              <th scope="col">Azione</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($types as $type)
                              <tr>
                                    <th scope="row">{{ $type->id }}</th>
                                    <td>{{ $type->type_name }}</td>
                                    <td>{{ $type->slug }}</td>
                                    <td>{{ count($type->projects) }}</td>



                                    <td class="d-flex align-items-start">
                                          <a class="btn btn-primary"
                                                href="{{ route('admin.types.show', ['type' => $type->slug]) }}">Vedi</a>
                                          <a class="btn btn-warning ms-2 me-2"
                                                href="{{ route('admin.types.edit', ['type' => $type->slug]) }}">Modifica</a>
                                          <form class="form_delete_type"
                                                action="{{ route('admin.types.destroy', ['type' => $type->slug]) }}"
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
@endsection
