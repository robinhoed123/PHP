window.onload = function() {
    // Add any initialization code if needed
};

function validateProductForm(event) {
    var productAfbeelding = document.forms["bewerkProductFormulier"]["productAfbeelding"];
    var productNaam = document.forms["bewerkProductFormulier"]["productNaam"];
    var productBeschrijving = document.forms["bewerkProductFormulier"]["productBeschrijving"];
    var productVissoort = document.forms["bewerkProductFormulier"]["productvissoort"];
    var productGewicht = document.forms["bewerkProductFormulier"]["productgewicht"];
    var productPrijs = document.forms["bewerkProductFormulier"]["productPrijs"];
    var productHoeveelheid = document.forms["bewerkProductFormulier"]["productHoeveelheid"];
    var valid = true;

    if (productAfbeelding.files.length === 0) {
        productAfbeelding.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        productAfbeelding.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (productNaam.value.length < 1) {
        productNaam.placeholder = 'Dit veld is verplicht in te vullen';
        productNaam.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        productNaam.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (productBeschrijving.value.length < 1) {
        productBeschrijving.placeholder = 'Dit veld is verplicht in te vullen';
        productBeschrijving.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        productBeschrijving.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (productVissoort.value.length < 1) {
        productVissoort.placeholder = 'Dit veld is verplicht in te vullen';
        productVissoort.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        productVissoort.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (productGewicht.value < 1) {
        productGewicht.placeholder = 'Dit veld is verplicht in te vullen';
        productGewicht.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        productGewicht.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (productPrijs.value < 0.01) {
        productPrijs.placeholder = 'Dit veld is verplicht in te vullen';
        productPrijs.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        productPrijs.style.backgroundColor = '#90ee90'; // lichtgroen
    }

    if (productHoeveelheid.value < 1 || productHoeveelheid.value > 69) {
        productHoeveelheid.placeholder = 'Dit veld is verplicht in te vullen';
        productHoeveelheid.style.backgroundColor = '#faa0a0'; // licht rood
        valid = false;
    } else {
        productHoeveelheid.style.backgroundColor = '#90ee90'; // lichtgroen
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