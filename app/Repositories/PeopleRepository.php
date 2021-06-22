<?php

namespace App\Repositories;

// Модели
use App\Models\People;
use App\Models\Homeworld;
use App\Models\Films;
use App\Models\Gender;

class PeopleRepository
{

    // Получение всех people
    public function all() {
        return People::all();
    }

    // Получение первых 10 персонажей
    public function paginate($a) {
        return People::simplePaginate($a);
    }

    // Получение people по id
    public function find($id) {
        return People::find($id);
    }

    // Добавление данных в таблицу people
    public function create($name, $height, $mass, $hair_color, $birth_year, $url, $images) {

        // Получаем всех gender
        $allGender = json_decode(Gender::all());

        // Получаем последний gender
        $lastGender = array_pop($allGender);

        // Получаем всех homeworld
        $allHomeworld = json_decode(Homeworld::all());

        // Получаем последний homeworld
        $lastHomeworld = array_pop($allHomeworld);

        // Получаем всех films
        $allFilms = json_decode(Films::all());

        // Получаем последний films
        $lastFilms = array_pop($allFilms);

        // Добавляем данные в таблицу people
        $people = People::create([
            'name' => $name,
            'height' => $height,
            'mass' => $mass,
            'hair_color' => $hair_color,
            'birth_year' => $birth_year,
            'gender_id' => $lastGender->id,
            'homeworld_id' => $lastHomeworld->id,
            'films_id' => $lastFilms->id,
            'url' => $url,
            'images' => implode(',', $images)
        ]);

        // Сохраняем
        $people->save();
    }

    // Редактирование полей из таблицы people
    public function edit($id, $name, $height, $mass, $hair_color, $birth_year, $url, $images, $flags) {

        // Получаем people по id
        $people = People::find($id);

        // Редактируем поля из таблицы people
        $people->name = $name;
        $people->height = $height;
        $people->mass = $mass;
        $people->hair_color = $hair_color;
        $people->birth_year = $birth_year;
        $people->url = $url;

        if (empty($people->images)) {
            $people->images = implode(',', $images);
        } else if(!empty($flags)) {
            $people->images = implode(',', $flags);
        } else {
            $people->images = '';
        }

        // Сохраняем
        $people->save();
    }

    // Удаление данных из таблицы people
    public function delete($id) {

        // Получаем people по id
        $people = People::find($id);

        // Удаляем данные из таблицы people
        $people->delete();

    }

}
