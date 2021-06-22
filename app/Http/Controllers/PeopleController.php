<?php

namespace App\Http\Controllers;

// Request
use Illuminate\Http\Request;

// Репозитории
use App\Repositories\PeopleRepository;
use App\Repositories\HomeworldRepository;
use App\Repositories\FilmsRepository;
use App\Repositories\GenderRepository;

class PeopleController extends Controller
{
    protected $peopleRepository;
    protected $homeworldRepository;
    protected $filmsRepository;
    protected $genderRepository;

    // Конструктор для репозиториев
    public function __construct() {
        $this->peopleRepository = new PeopleRepository();
        $this->homeworldRepository = new HomeworldRepository();
        $this->filmsRepository = new FilmsRepository();
        $this->genderRepository = new GenderRepository();
    }

    public function index() {

        // Получаем из таблицы people первых 10 персонажей
        $tenPeople = $this->peopleRepository->paginate(config('app.paginate'));

        // Вывод главной страницы
        return view('people.index')->with('tenPeople', $tenPeople);
    }

    public function create() {

        // Вывод страницы для создания персонажа
        return view('people.create');
    }

    public function store(Request $request) {

        // Валидация
        $request->validate([
            'name' => 'required|min: 2|max: 40',
            'height' => 'required|numeric|min: 1|max: 300',
            'mass' => 'required|numeric|min: 1|max: 300',
            'hair_color' => 'required|min: 1|max: 20',
            'birth_year' => 'required|min: 1|max: 10',
            'gender' => 'required',
            'homeworld' => 'required',
            'films' => 'required',
            'url' => 'required'
        ]);

        // Получаем картинки
        $images = [];

        if (!empty($request->file('images'))) {
            foreach ($request->file('images') as $image) {
                $images[] = asset('/storage/' . $image->store('images', 'public'));
            }
        }

        // Добавляем введенные данные в таблицу gender
        $this->genderRepository->create(
            $request->get('gender')
        );

        // Добавляем введенные данные в таблицу homeworld
        $this->homeworldRepository->create(
            $request->get('homeworld')
        );

        // Добавляем введенные данные в таблицу films
        $this->filmsRepository->create(
            $request->get('films')
        );

        // Добавляем введенные данные в таблицу people
        $this->peopleRepository->create(
            $request->get('name'),
            $request->get('height'),
            $request->get('mass'),
            $request->get('hair_color'),
            $request->get('birth_year'),
            $request->get('url'),
            $images
        );

        // Редирект
        return redirect('/people');
    }

    public function edit($id) {

        // Получаем people по id
        $people = $this->peopleRepository->find($id);

        // Проверка people на пустоту
        if(empty($people)) {
          return redirect('/people');
        }

        // Вывод страницы для редактирования персонажа
        return view('people.edit')->with('people', $people);
    }

    public function update($id, Request $request) {

        // Валидация
        $request->validate([
            'name' => 'required|min: 2|max: 40',
            'height' => 'required|numeric|min: 1|max: 300',
            'mass' => 'required|numeric|min: 1|max: 300',
            'hair_color' => 'required|min: 1|max: 20',
            'birth_year' => 'required|min: 1|max: 10',
            'gender' => 'required',
            'homeworld' => 'required',
            'films' => 'required',
            'url' => 'required'
        ]);

        // Получаем people по id
        $people = $this->peopleRepository->find($id);

        // Проверка people на пустоту
        if(empty($people)) {
            return redirect('/people');
        }

        // Получаем картинки
        $images = [];

        if (empty($people->images) && !empty($request->file('images'))) {
            foreach ($request->file('images') as $image) {
                $images[] = asset('/storage/'.$image->store('images', 'public'));
            }
        }

        // Редактируем поля из таблицы gender
        $this->genderRepository->edit(
            $id,
            $request->get('gender')
        );

        // Редактируем поля из таблицы homeworld
        $this->homeworldRepository->edit(
            $id,
            $request->get('homeworld')
        );

        // Редактируем поля из таблицы films
        $this->filmsRepository->edit(
            $id,
            $request->get('films')
        );

        // Редактируем поля из таблицы people
        $this->peopleRepository->edit(
            $id,
            $request->get('name'),
            $request->get('height'),
            $request->get('mass'),
            $request->get('hair_color'),
            $request->get('birth_year'),
            $request->get('url'),
            $images,
            $request->input('flags')
        );

        // Редирект
        return redirect('/people');
    }

    public function destroy($id) {

        // Удаляем people, homeworld, films, gender
        $this->peopleRepository->delete($id);
        $this->homeworldRepository->delete($id);
        $this->filmsRepository->delete($id);
        $this->genderRepository->delete($id);

        // Редирект
        return redirect('/people');
    }

    public function show($id) {

        // Получаем всех people
        $allPeople = $this->peopleRepository->all();

        // Получаем people, homeworld, films по id
        $people = $this->peopleRepository->find($id);
        $homeworld = $this->homeworldRepository->find($id);
        $films = $this->filmsRepository->find($id);

        // Проверка people, homeworld, films на пустоту
        if(empty($people) || empty($homeworld) || empty($films)) {
            return redirect('/people');
        }

        // Массив с всеми персонажами на одной планете
        $allPeopleOnPlanet = [];

        // Получаем всех персонажей на одной планете
        foreach ($allPeople as $onePeople) {
            if ($onePeople->homeworld->name == $homeworld->name && $onePeople->name != $people->name) {
                $allPeopleOnPlanet[] = $onePeople->name;
            }
        }

        // Массив с картинками
        $images = [];

        // Получаем картинки
        if (!empty($people->images)) {
            $images = explode(',', $people->images);
        }

        // Вывод страницы для показа конкретного персонажа
        return view('people.show')
            ->with('people', $people)
            ->with('homeworld', $homeworld)
            ->with('films', $films)
            ->with('allPeopleOnPlanet', $allPeopleOnPlanet)
            ->with('images', $images);
    }
}
