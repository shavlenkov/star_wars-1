<?php

// Headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Origin, Access-Control-Allow-Headers, X-Requested-With, Content-Type, Authorization');

// Репозиторий
use App\Repositories\PeopleRepository;

$peopleRepository = (new App\Repositories\PeopleRepository);

if(empty($id)) {
  echo $peopleRepository->all();
  exit();
} else {
  echo $peopleRepository->find($id);
  exit();
}

?>
