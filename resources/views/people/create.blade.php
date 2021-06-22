@extends('layouts.app')

@section('title', 'Создать персонажа')

@section('scripts')
  <script src="{{ asset('js/script.js') }}"></script>
@endsection

@section('content')

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br/>
  @endif

  <h1>Создать персонажа</h1>

  <form class="form-group" method="POST" action="{{ route('people.store') }}" enctype="multipart/form-data">
    @csrf
    <input class="form-control w-25" name="name" type="text" value="{{ old('name') }}" placeholder="Name"/><br/><br/>
    <input class="form-control w-25 numberFormat"  name="height" type="number" value="{{ old('height') }}" placeholder="Height"/><br/><br/>
    <input class="form-control w-25 numberFormat"  name="mass" type="number" value="{{ old('mass') }}" placeholder="Mass"/><br/><br/>
    <input class="form-control w-25" name="hair_color" type="text" value="{{ old('hair_color') }}" placeholder="Hair color"/><br/><br/>
    <input class="form-control w-25" id="birth_year" name="birth_year" type="text" value="{{ old('birth_year') }}" placeholder="Birth year"/><br/><br/>
    <select class="form-control w-25" name="gender">
      <option></option>
      <option>male</option>
      <option>female</option>
      <option>n/a</option>
    </select><br/><br/>
    <select class="form-control w-25" id="homeworld" name="homeworld">
      <option></option>
      <option>Tatooine</option>
      <option>Naboo</option>
      <option>Alderaan</option>
      <option>Stewjon</option>
      <option>Eriadu</option>
      <option>Kashyyyk</option>
      <option>Corellia</option>
      <option>Rodia</option>
      <option>Nal Hutta</option>
      <option>Bestine IV</option>
      <option>Kamino</option>
      <option>Trandosha</option>
      <option>Socorro</option>
      <option>Bespin</option>
      <option>Mon Cala</option>
      <option>Chandrila</option>
      <option>Endor</option>
      <option>Sullust</option>
      <option>Cato Neimoidia</option>
      <option>Coruscant</option>
      <option>Toydaria</option>
      <option>Malastare</option>
      <option>Dathomir</option>
      <option>Ryloth</option>
      <option>Aleen Minor</option>
      <option>Vulpter</option>
      <option>Troiken</option>
      <option>Tund</option>
    </select><br/><br/>
    <select class="form-control w-25" id="films" name="films[]" multiple>
      <option>A New Hope</option>
      <option>The Empire Strikes Back</option>
      <option>Return of the Jedi</option>
      <option>Revenge of the Sith</option>
      <option>The Phantom Menace</option>
      <option>Attack of the Clones</option>
    </select><br/><br/>
    <input class="form-control w-25" name="url" type="url" value="{{ old('url') }}" placeholder="URL"/><br/><br/>
    <input class="form-control w-25" type="file" name="images[]" multiple/><br/><br/>
    <button type="submit" class="btn btn-success">Создать</button>
  </form>
@endsection
