window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error') && urlParams.get('error') === 'email_in_use') {
        var email = document.forms["createAccountForm"]["email"];
        email.placeholder = 'mail al in gebuik';
        email.style.backgroundColor = '#faa0a0'; // licht rood
        alert('Het e-mailadres is al in gebruik. Probeer een ander e-mailadres.');
    }
};

function validateLoginForm(event) {
    var email = document.forms["loginForm"]["email"];
    var password = document.forms["loginForm"]["wachtwoord"];
    var valid = true;

    if (email.value.length < 1) {
        email.placeholder = 'Dit veld is verplicht in te vullen';
        email.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else if (email.value.length > 30 || !/^[^@]+@[^@]+\.[^@]+$/.test(email.value)) {
        email.value = '';
        email.placeholder = 'Ongeldig e-mailadres';
        email.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        email.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (password.value.length < 1) {
        password.placeholder = 'Dit veld is verplicht in te vullen';
        password.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        password.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (!valid) {
        event.preventDefault();
    }
}


function validateCreateAccountForm(event) {
    var voornaam = document.forms["createAccountForm"]["voornaam"];
    var achternaam = document.forms["createAccountForm"]["achternaam"];
    var adres = document.forms["createAccountForm"]["adres"];
    var email = document.forms["createAccountForm"]["email"];
    var wachtwoord = document.forms["createAccountForm"]["wachtwoord"];
    var bevestigWachtwoord = document.forms["createAccountForm"]["bevestig-wachtwoord"];
    var valid = true;

    if (voornaam.value.length < 3) {
        voornaam.value = '';
        voornaam.placeholder = 'Voornaam te kort, minstens 3 letters';
        voornaam.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else if (voornaam.value.length > 12) {
        voornaam.value = '';
        voornaam.placeholder = 'Voornaam te lang, max 12 letters';
        voornaam.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else if (!/^[a-zA-Z]+$/.test(voornaam.value)) {
        voornaam.value = '';
        voornaam.placeholder = 'Geen speciale tekens of cijfers toegestaan';
        voornaam.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        voornaam.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (achternaam.value.length < 3) {
        achternaam.value = '';
        achternaam.placeholder = 'Achternaam te kort, minstens 3 letters';
        achternaam.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else if (achternaam.value.length > 12) {
        achternaam.value = '';
        achternaam.placeholder = 'Achternaam te lang, max 12 letters';
        achternaam.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else if (!/^[a-zA-Z]+$/.test(achternaam.value)) {
        achternaam.value = '';
        achternaam.placeholder = 'Geen speciale tekens of cijfers toegestaan';
        achternaam.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        achternaam.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (adres.value.length < 1) {
        adres.placeholder = 'Dit veld is verplicht in te vullen';
        adres.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        adres.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (email.value.length < 1) {
        email.placeholder = 'Dit veld is verplicht in te vullen';
        email.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else if (email.value.length > 30 || !/^[^@]+@[^@]+\.[^@]+$/.test(email.value)) {
        email.value = '';
        email.placeholder = 'Ongeldig e-mailadres';
        email.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        email.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (wachtwoord.value.length < 1) {
        wachtwoord.placeholder = 'Dit veld is verplicht in te vullen';
        wachtwoord.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        wachtwoord.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (bevestigWachtwoord.value.length < 1) {
        bevestigWachtwoord.placeholder = 'Dit veld is verplicht in te vullen';
        bevestigWachtwoord.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else if (wachtwoord.value !== bevestigWachtwoord.value) {
        bevestigWachtwoord.value = '';
        bevestigWachtwoord.placeholder = 'Wachtwoorden komen niet overeen';
        bevestigWachtwoord.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        bevestigWachtwoord.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (!valid) {
        event.preventDefault();
    }
}

function confirmReset(event) {
    if (!confirm('Wil je echt alles verwijderen?')) {
        event.preventDefault();
    } else {
        var formElements = event.target.elements;
        for (var i = 0; i < formElements.length; i++) {
            formElements[i].style.backgroundColor = 'white';
            formElements[i].placeholder = '';
        }
    }
}

function showDiv(divId) {
    document.getElementById('inloggen').style.display = 'none';
    document.getElementById('aanmaken').style.display = 'none';
    document.getElementById('kies').style.display = 'none';
    document.getElementById(divId).style.display = 'block';
}