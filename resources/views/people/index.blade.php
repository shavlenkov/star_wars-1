@extends('layouts.app')

@section('title', 'Star Wars')

@section('scripts')
  <script src="https://kit.fontawesome.com/a92211bf3b.js"></script>
@endsection

@section('content')
  <a href="{{ route('people.create') }}" class="btn btn-success">Создать</a>
  <br/><br/>
  <table class="table table-dark table-hover table-bordered text-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Height</th>
        <th>Mass</th>
        <th>Hair color</th>
        <th>Birth year</th>
        <th>Gender</th>
        <th>Homeworld</th>
        <th>Films</th>
        <th>Created</th>
        <th>URL</th>
        <th colspan="2">Действия</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tenPeople as $people)
        <tr>
          <td>{{ $people->id }}</td>
          <td>{{ $people->name }}</td>
          <td>{{ $people->height }}</td>
          <td>{{ $people->mass }}</td>
          <td>{{ $people->hair_color }}</td>
          <td>{{ $people->birth_year }}</td>
          <td>{{ $people->gender->gender }}</td>
          <td>{{ $people->homeworld->name}}</td>
          <td>{{ $people->films->title }}</td>
          <td>{{ $people->created_at }}</td>
          <td>{{ $people->url }}</td>
          <td><a class="btn btn-warning" href="{{ route('people.edit', $people->id) }}"><i class="fas fa-edit"></i></a></td>
          <td><a class="btn btn-info" href="{{ route('people.show', $people->id) }}"><i class="fas fa-eye"></i></a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!--Пагинация-->
  {{ $tenPeople->links() }}
@endsection
