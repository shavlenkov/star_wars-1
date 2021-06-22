<?php

namespace App\Repositories;

// Модель
use App\Models\Gender;

class GenderRepository
{
    // Получение gender по id
    public function find($id) {
        return Gender::find($id);
    }

    // Редактирование данных из таблицы gender
    public function create($param_gender) {

        // Добавляем данные в таблицу gender
        $gender = new Gender ([
            'gender' => $param_gender
        ]);

        // Сохраняем
        $gender->save();
    }

    // Редактирование данных из таблицы gender
    public function edit($id, $param_gender) {

        // Получаем gender по id
        $gender = Gender::find($id);

        // Редактируем поля из таблицы gender
        $gender->gender = $param_gender;

        // Сохраняем
        $gender->save();
    }

    // Удаление данных из таблицы gender
    public function delete($id) {

        // Получаем gender по id
        $gender = Gender::find($id);

        // Удаляем данные из таблицы gender
        $gender->delete();

    }


}
