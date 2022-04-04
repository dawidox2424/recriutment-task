const notifierEmailInput = document.querySelector('input[name = "notifierEmail"]');
const id_propertyInput = document.querySelector('select[name = "id_property"]');
const locationInput = document.querySelector('select[name = "location"]');
const photoInput = document.querySelector('input[name = "photo"]');
const findingDateInput = document.querySelector('input[name = "findingDate"]');
const typeInput = document.querySelector('select[name = "type"]');

const form = document.querySelector('form[name="form"]');
let error = 0;

function empty(temp){
    return (temp.value.length === 0 || !temp);
}

function isValidEmail(email) {
    return /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(email);
}


function markValidation(element, condition) {
    !condition ? element.classList.add('not-valid') : element.classList.remove('not-valid');
}

function validateEmail(){
    if(empty(notifierEmailInput)){
        markValidation(notifierEmailInput, true);
        return true;
    } else if (isValidEmail(notifierEmailInput.value)){
        markValidation(notifierEmailInput, true);
        return true;
    } else {
        markValidation(notifierEmailInput, false);
        return false;
    }
}

function validateId_Property(){
    if((id_propertyInput.value === "0")){
        markValidation(id_propertyInput, false);
        return false;
    } else{
        markValidation(id_propertyInput, true);
        return true;
    }
}

function validateLocation(){
    if((locationInput.value === "0")){
        markValidation(locationInput, false);
        return false;
    } else{
        markValidation(locationInput, true);
        return true;
    }
}

function validatePhoto(){
    if(empty(photoInput)){
        markValidation(photoInput, false);
        return false;
    } else{
        markValidation(photoInput, true);
        return true;
    }
}

function validateFindingDate(){
    if(isFuture(new Date(findingDateInput.value))){
        markValidation(findingDateInput, false);
        return false;
    } else {
        markValidation(findingDateInput, true);
        return true;
    }
}

function isFuture(date) {
    const today = new Date();
    today.setHours(23, 59, 59, 998);

    return date > today;
}


function validateType(){
    if((typeInput.value === "0")){
        markValidation(typeInput, false);
        return false;
    } else{
        markValidation(typeInput, true);
        return true;
    }
}

notifierEmailInput.addEventListener('keyup', validateEmail);
id_propertyInput.addEventListener('change', validateId_Property);
locationInput.addEventListener('change', validateLocation);
//photoInput.addEventListener('keyup', validatePhoto);
findingDateInput.addEventListener('change', validateFindingDate);
typeInput.addEventListener('change', validateType);

form.addEventListener('submit', (event) =>{
    error = 0;
    if(!validateEmail()) { alert("Proszę sprawdź poprawność adresu email!"); error = 1; }
    if(!validateId_Property()){alert("Sprawdź, czy wybrałeś adres nieruchomości !"); error = 1; }
    if(!validateLocation()){alert("Sprawdź, czy wybrałeś lokalizację grafitti!"); error = 1; }
    //if(!validatePhoto()) { alert("Sprawdź, czy poprawnie załączyłeś zdjęcia!"); error = 1; }
    if(!validateFindingDate()) { alert("Podano przyszłą datę znalezienia nielegalnych napisów!"); error = 1; }
    if(!validateType()) { alert("Sprawdź, czy wybrałeś rodzaj nielegalnych napisów!"); error = 1; }

    if(!document.getElementById('rodo0').checked) { alert("Zaznacz proszę zgodę na przetwarzanie danych osobowych!"); error = 1; }

    if(error) event.preventDefault();
})