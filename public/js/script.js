// Валидация полей с числовым форматом
for(let i = 0; i < document.getElementsByClassName('numberFormat').length; i++) {
  let numberFormat = document.getElementsByClassName('numberFormat')[i];

  numberFormat.oninput = function() {
    if(numberFormat.value <= 0) {
      document.getElementsByClassName('numberFormat')[i].style.border = '1px solid #ff0000';
    } else  {
      document.getElementsByClassName('numberFormat')[i].style.border = '';
    }
  }
}

// Валидация поля homeworld
let homeworld = document.getElementById('homeworld');

homeworld.oninput = function () {
  if(!homeworld.value) {
    document.getElementById('homeworld').style.border = '1px solid #ff0000';
  } else  {
    document.getElementById('homeworld').style.border = '';
  }
}

// Валидация поля films
let films = document.getElementById('films');

films.oninput = function () {
  if(!films.value) {
    document.getElementById('films').style.border = '1px solid #ff0000';
  } else  {
    document.getElementById('films').style.border = '';
  }
}

// Валидация поля birth_year
let birth_year = document.getElementById('birth_year');

birth_year.oninput = function () {
    if(birth_year.value.indexOf('BBY') < 0) {
        document.getElementById('birth_year').style.border = '1px solid #ff0000';
    } else  {
        document.getElementById('birth_year').style.border = '';
    }
}
