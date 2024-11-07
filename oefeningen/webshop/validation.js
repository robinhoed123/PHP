var voornaam = document.getElementById('voornaam');
var achternaam = document.getElementById('achternaam');
var email = document.getElementById('email');
var bericht = document.getElementById('bericht');
var tel = document.getElementById('caracters')
document.getElementById('contactForm').addEventListener('submit', function() {
    //voorwaarde voornaam
    if (voornaam.value.length < 3) {
        event.preventDefault();
        voornaam.value = '';
        voornaam.placeholder = 'voornaam te kort minstens 3 letters';
        voornaam.style.backgroundColor = '#faa0a0';
    } else if (voornaam.value.length > 12) {
        event.preventDefault();
        voornaam.value = '';
        voornaam.placeholder = 'voornaam te lang max 12 letters';
        voornaam.style.backgroundColor = '#faa0a0';
    } else if (!/^[a-zA-Z]+$/.test(voornaam.value)) {
        event.preventDefault();
        voornaam.value = '';
        voornaam.placeholder = 'geen speciale tekens of cijfers toegestaan';
        voornaam.style.backgroundColor = '#faa0a0';//licht rood 
    } else {
        voornaam.style.backgroundColor = '#90ee90'; // lichtgroen
    }
    //voorwaarde achternaam
    if (achternaam.value.length < 3) {
        event.preventDefault();
        achternaam.value = '';
        achternaam.placeholder = 'achternaam te kort minstens 3 letters';
        achternaam.style.backgroundColor = '#faa0a0';
    } else if (achternaam.value.length > 12) {
        event.preventDefault();
        achternaam.value = '';
        achternaam.placeholder = 'achternaam te lang max 12 letters';
        achternaam.style.backgroundColor = '#faa0a0';
    } else if (!/^[a-zA-Z]+$/.test(achternaam.value)) {
        event.preventDefault();
        achternaam.value = '';
        achternaam.placeholder = 'geen speciale tekens of cijfers toegestaan';
        achternaam.style.backgroundColor = '#faa0a0';//licht rood 
    } else {
        achternaam.style.backgroundColor = '#90ee90'; // lichtgroen
    }
    //voorwaarde email addres het moet een @ bevatten en het moet een . bevatten na @ en het mag niet lannger zijn dan 30 caracters
    if (email.value.length < 1) {
        email.placeholder = 'dit veld is verpilcht in te vullen';
        email.style.backgroundColor = '#faa0a0';//licht rood
    }
    else if (email.value.length > 30 || !/^[^@]+@[^@]+\.[^@]+$/.test(email.value)) {
        event.preventDefault();
        email.value = '';
        email.placeholder = 'ongeldig e-mailadres';
        email.style.backgroundColor = '#faa0a0';//licht rood 
    } 
    else if (email.value.length > 30) {
        email.placeholder = 'e-mail te lang, maximaal 20 tekens';
        email.style.backgroundColor = '#faa0a0';//licht rood 
        }
    else {
        email.style.backgroundColor = '#90ee90'; // lichtgroen
    }
    //voorwaarden textbox

    if (bericht.value.length < 20) {
        event.preventDefault();
        bericht.value = '';
        bericht.placeholder = 'bericht is te kort minstens 20 letters';
        bericht.style.backgroundColor = '#faa0a0';}//licht rood 
    else if(bericht.value.length > 200) {
        event.preventDefault();
    }  
    else {
        bericht.style.backgroundColor = '#90ee90'; // lichtgroen
    }
    
});

document.getElementById('contactForm').addEventListener('reset', function() {
   if(confirm('wil je echt alles verwijderen?'))
   {
    voornaam.style.backgroundColor = 'white';
    voornaam.placeholder = '';
    achternaam.style.backgroundColor = 'white';
    achternaam.placeholder = '';
    email.style.backgroundColor = 'white'; 
    email.placeholder = '';
    bericht.style.backgroundColor = 'white'; 
    bericht.placeholder = '';
    tel.innerHTML='0/200'
    tel.style.color = 'black';
   }
   else
   {
    event.preventDefault();
   }
});

bericht.addEventListener('input', function() {
    tel.innerHTML = bericht.value.length + '/200';
    if(bericht.value.length > 200) {
        tel.style.color = 'red';
    } else {
        tel.style.color = 'black';
    }
});
