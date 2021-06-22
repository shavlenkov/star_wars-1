<?php

namespace App\Repositories;

// Модель
use App\Models\Homeworld;

class HomeworldRepository
{
    // Получение homeworld по id
    public function find($id) {
        return Homeworld::find($id);
    }

    // Добавление данных в таблицу homeworld
    public function create($name) {

        // Добавляем данные в таблицу homeworld
        $homeworld = new Homeworld ([
            'name' => $name
        ]);

        // Сохраняем
        $homeworld->save();
    }

    // Редактирование данных из таблицы homeworld
    public function edit($id, $name) {

        // Получаем homeworld по id
        $homeworld = Homeworld::find($id);

        // Редактируем поля из таблицы homeworld
        $homeworld->name = $name;

        // Сохраняем
        $homeworld->save();
    }

    // Удаление данных из таблицы homeworld
    public function delete($id) {

        // Получаем homeworld по id
        $homeworld = Homeworld::find($id);

        // Удаляем данные из таблицы homeworld
        $homeworld->delete();

    }

}
