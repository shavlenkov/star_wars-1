<?php

namespace App\Repositories;

// Модель
use App\Models\Films;

class FilmsRepository
{
    // Получение films по id
    public function find($id) {
        return Films::find($id);
    }

    // Добавление данных в таблицу films
    public function create($title) {

        // Добавляем данные в таблицу films
        $films = new Films([
            'title' => implode(',', $title),
        ]);

        // Сохраняем
        $films->save();
    }

    // Редактирование данных из таблицы films
    public function edit($id, $title) {

        // Получаем films по id
        $films = Films::find($id);

        // Редактируем поля из таблицы films
        $films->title = implode(',', $title);

        // Сохраняем
        $films->save();
    }

    // Удаление данных из таблицы films
    public function delete($id) {

        // Получаем films по id
        $films = Films::find($id);

        // Удаляем данные из таблицы films
        $films->delete();

    }


}
