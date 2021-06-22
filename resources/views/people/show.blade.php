@extends('layouts.app')

@section('title', 'Показать персонажа')

@section('content')
  <table class="table table-dark table-hover table-bordered text-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>Персонаж</th>
        <th>Планета</th>
        <th>Все фильмы</th>
        <th>Все персонажы на одной планете</th>
        <th>Картинки</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $people->id }}</td>
        <td>{{ $people->name }}</td>
        <td>{{ $homeworld->name }}</td>
        <td>{{ $films->title }}</td>

        <!--Все персонажы на одной планете-->
        <td>
          @foreach($allPeopleOnPlanet as $onePeople)
            {{ $onePeople }}<br/>
          @endforeach
        </td>

        <!--Картинки-->
        <td>
          @foreach($images as $image)
            <img src="{{ $image }}" width="350" class="img-thumbnail">
            <br/><br/><br/>
          @endforeach
        </td>
      </tr>
    </tbody>
  </table>
@endsection
