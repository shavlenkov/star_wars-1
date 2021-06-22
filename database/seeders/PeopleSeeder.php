<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// HTTP
use Illuminate\Support\Facades\Http;

// Модели
use App\Models\People;
use App\Models\Homeworld;
use App\Models\Films;
use App\Models\Gender;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Адреса на которые нужно отправить GET-запрос и получить данные
        $urls = [
            'http://swapi.dev/api/people/1/', 'http://swapi.dev/api/people/2/',
            'http://swapi.dev/api/people/3/', 'http://swapi.dev/api/people/4/',
            'http://swapi.dev/api/people/5/', 'http://swapi.dev/api/people/6/',
            'http://swapi.dev/api/people/7/', 'http://swapi.dev/api/people/8/',
            'http://swapi.dev/api/people/9/', 'http://swapi.dev/api/people/10/',
            'http://swapi.dev/api/people/11/', 'http://swapi.dev/api/people/12/',
            'http://swapi.dev/api/people/13/', 'http://swapi.dev/api/people/14/',
            'http://swapi.dev/api/people/15/', 'http://swapi.dev/api/people/18/',
            'http://swapi.dev/api/people/19/', 'http://swapi.dev/api/people/20/',
            'http://swapi.dev/api/people/21/', 'http://swapi.dev/api/people/22/',
            'http://swapi.dev/api/people/23/', 'http://swapi.dev/api/people/24/',
            'http://swapi.dev/api/people/25/', 'http://swapi.dev/api/people/26/',
            'http://swapi.dev/api/people/27/', 'http://swapi.dev/api/people/28/',
            'http://swapi.dev/api/people/29/', 'http://swapi.dev/api/people/30/',
            'http://swapi.dev/api/people/31/', 'http://swapi.dev/api/people/32/',
            'http://swapi.dev/api/people/33/', 'http://swapi.dev/api/people/34/',
            'http://swapi.dev/api/people/35/', 'http://swapi.dev/api/people/36/',
            'http://swapi.dev/api/people/37/', 'http://swapi.dev/api/people/38/',
            'http://swapi.dev/api/people/39/', 'http://swapi.dev/api/people/40/',
            'http://swapi.dev/api/people/41/', 'http://swapi.dev/api/people/42/',
            'http://swapi.dev/api/people/43/', 'http://swapi.dev/api/people/44/',
            'http://swapi.dev/api/people/45/', 'http://swapi.dev/api/people/46/',
            'http://swapi.dev/api/people/47/', 'http://swapi.dev/api/people/48/',
            'http://swapi.dev/api/people/49/', 'http://swapi.dev/api/people/50/',
            'http://swapi.dev/api/people/51/', 'http://swapi.dev/api/people/52/'
        ];

        for ($i = 0; $i < count($urls); $i++) {

            // Отправляем GET-запрос и получаем данные
            $data = json_decode(Http::get($urls[$i])->body());

            // Homeworld
            $homeworld = json_decode(Http::get($data->homeworld)->body())->name;

            // Films
            $films = [];

            for ($j = 0; $j < count($data->films); $j++) {
                $films[] = json_decode(Http::get($data->films[$j])->getBody())->title;
            }

            // Добавляем полученные данные в таблицу gender
            Gender::create([
                'gender' => $data->gender
            ]);

            // Добавляем полученные данные в таблицу homeworld
            Homeworld::create([
                'name' => $homeworld
            ]);

            // Добавляем полученные данные в таблицу films
            Films::create([
                'title' => implode(',', $films)
            ]);

            // Проверяем height и mass на 'unknown'
            if($data->height == 'unknown') {
                $data->height = null;
            }
            if($data->mass == 'unknown') {
                $data->mass = null;
            }

            // Добавляем полученные данные в таблицу people
            People::create([
                'name' => $data->name,
                'height' => $data->height,
                'mass' => $data->mass,
                'hair_color' => $data->hair_color,
                'birth_year' => $data->birth_year,
                'gender_id' => $i + 1,
                'homeworld_id' => $i + 1,
                'films_id' => $i + 1,
                'created_at' => $data->created,
                'url' => $data->url,
                'images' => ''
            ]);

        }
    }
}
