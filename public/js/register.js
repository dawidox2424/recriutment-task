const nameInput = document.querySelector('input[name = "name"]');
const surnameInput = document.querySelector('input[name = "surname"]');
const peselInput = document.querySelector('input[name = "pesel"]');
const emailInput = document.querySelector('input[name = "email"]');
const confirmedEmailInput = document.querySelector('input[name = "confirmedEmail"]');
const passwordInput = document.querySelector('input[name = "password"]');
const confirmedPasswordInput = document.querySelector('input[name = "confirmedPassword"]');
const phoneInput = document.querySelector('input[name = "phone"]');
const zipcodeInput = document.querySelector('input[name = "zipcode"]');
const streetInput = document.querySelector('input[name = "street"]');
const buildingNumberInput = document.querySelector('input[name = "buildingNumber"]');
const apartmentNumberInput = document.querySelector('input[name = "apartmentNumber"]');
const districtNumberInput = document.querySelector('select[name = "district"]');
const form = document.querySelector('form[name="form"]');
let error = 0;

function empty(temp){
    return (temp.value.length === 0 || !temp);
}

function isValidEmail(email) {
    return /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(email);
}

function isValidPassword(password1, password2) {
    return password1 === password2;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('not-valid') : element.classList.remove('not-valid');
}

function validateEmail(){
    if(empty(emailInput)){
        markValidation(emailInput, false);
        return false;
    } else if (isValidEmail(emailInput.value)){
        markValidation(emailInput, true);
        return true;
    } else {
        return false;
    }
}

function arePasswordsTheSame() {
    const condition = isValidPassword(
        passwordInput.value,
        confirmedPasswordInput.value
    );
    markValidation(passwordInput, condition);
    markValidation(confirmedPasswordInput, condition);
    return condition;
}

function areEmailsTheSame() {
    const condition = isValidPassword(
        emailInput.value,
        confirmedEmailInput.value
    );
    markValidation(confirmedEmailInput, condition);
    return condition;
}

function validateName(){
    if(empty(nameInput)){
        markValidation(nameInput, false);
        return false;
    } else{
        markValidation(nameInput, true);
        return true;
    }
}

function validateSurname(){
    if(empty(surnameInput)){
        markValidation(surnameInput, false);
        return false;
    }else{
        markValidation(surnameInput, true);
        return true;
    }
}

function validatePhone(){
    if(empty(phoneInput)){
        markValidation(phoneInput, false);
        return false;
    }else if (!/\d+\d+\d+\d+\d+\d+\d+\d+\d/.test(phoneInput.value) || phoneInput.value.length !== 9){
        markValidation(phoneInput, false);
        return false;
    } else {
        markValidation(phoneInput, true);
        return true;
    }
}

function validateStreet(){
    if(empty(streetInput)){
        markValidation(streetInput, false);
        return false;
    }else{
        markValidation(streetInput, true);
        return true;
    }
}

function validateBuildingNumber(){
    if(empty(buildingNumberInput)){
        markValidation(buildingNumberInput, false);
        return false;
    }else{
        const number = Number(buildingNumberInput.value);
        if (number > 0 && Number.isInteger(number)){
            markValidation(buildingNumberInput, true);
            return true;
        } else {
            markValidation(buildingNumberInput, false);
            return false;
        }
    }
}

function validateApartmentNumber(){
    if(empty(apartmentNumberInput)){
        markValidation(apartmentNumberInput, true);
        return false;
    }else{
        const number = Number(apartmentNumberInput.value);
        if (number > 0 && Number.isInteger(number)){
            markValidation(buildingNumberInput, true);
            return true;
        } else {
            markValidation(buildingNumberInput, false);
            return false;
        }
    }
}

function validateDistrictNumberInput(){
    if(empty(districtNumberInput)){
        markValidation(districtNumberInput, false);
        return false;
    }else{
        markValidation(districtNumberInput, true);
        return true;
    }
}
function validatePesel() {
    if (empty(peselInput)) {
        markValidation(peselInput, true);
        return true;
    } else {
        let checkA = /\d+\d+\d+\d+\d+\d+\d+\d+\d+\d+\d/.test(peselInput.value);
        let checkB = peselInput.value.length === 11;
        if (checkA && checkB) {
            markValidation(peselInput, true);
            return true;
        } else {
            markValidation(peselInput, false);
            return false;
        }
    }
}

function validatePassword(){
    if(empty(passwordInput)){
        markValidation(passwordInput, false);
        return false;
    } else{
        markValidation(passwordInput, true);
        return true;
    }
}
function checkPassword() {
    let A = passwordInput.value.length > 7;
    let B = checkPolishSigns(passwordInput);
    let C = checkForChar(passwordInput);
    let D = validatePassword();
    let E = hasCapitalLetter(passwordInput.value);
    let F = checkNumber(passwordInput);
    let G = hasLowerLetter(passwordInput.value);

    if (D && A && !B && E && G && (F || C)){
        markValidation(passwordInput, true);
        return true;
    } else{
        markValidation(passwordInput, false);
        return false;
    }
}

function checkPolishSigns(element){
    let A = /ą/.test(element.value);
    let B = /Ą/.test(element.value);
    let C = /ć/.test(element.value);
    let D = /Ć/.test(element.value);
    let E = /ę/.test(element.value);
    let F = /Ę/.test(element.value);
    let G = /ł/.test(element.value);
    let H = /Ł/.test(element.value);
    let I = /ń/.test(element.value);
    let J = /Ń/.test(element.value);
    let K = /ó/.test(element.value);
    let L = /Ó/.test(element.value);
    let M = /ś/.test(element.value);
    let N = /Ś/.test(element.value);
    let O = /ź/.test(element.value);
    let P = /Ź/.test(element.value);
    let Q = /ż/.test(element.value);
    let R = /Ż/.test(element.value);

    return A || B || C || D || E || F || G || H || I || J || H || K || L || M || N || O || P || Q || R;
}

function checkForChar(element){
    let A = /!/.test(element.value);
    let B = /,/.test(element.value);
    let C = /:/.test(element.value);
    let D = /;/.test(element.value);
    let E = /\?/.test(element.value);
    let F = /@/.test(element.value);
    let G = /#/.test(element.value);
    let H = /\$/.test(element.value);
    let I = /%/.test(element.value);
    let J = /&/.test(element.value);
    let K = /~/.test(element.value);
    let L = /'/.test(element.value);
    let M = /`/.test(element.value);
    let N = /\*/.test(element.value);
    let O = /\^/.test(element.value);
    let P = /\+/.test(element.value);
    let Q = /=/.test(element.value);
    let R = /\(/.test(element.value);
    let S = /\)/.test(element.value);
    let T = /\[/.test(element.value);
    let U = /]/.test(element.value);
    let V = /</.test(element.value);
    let W = />/.test(element.value);
    let X = /\//.test(element.value);
    let Y = /\|/.test(element.value);
    let Z = /_/.test(element.value);
    let AA = /\./.test(element.value);
    let AB = /-/.test(element.value);
    let AC = /\\/.test(element.value);

    return A || B || C || D || E || F || G || H || I || J || H || K || L || M || N || O || P || Q || R || S || T || U || V || W || X || Y || Z || AB || AA || AC;
}

function checkNumber(element){
    let A = /1/.test(element.value);
    let B = /2/.test(element.value);
    let C = /3/.test(element.value);
    let D = /4/.test(element.value);
    let E = /5/.test(element.value);
    let F = /6/.test(element.value);
    let G = /7/.test(element.value);
    let H = /8/.test(element.value);
    let I = /9/.test(element.value);
    let J = /0/.test(element.value);

    return A || B || C || D || E || F || G || H || I || J;
}

function hasCapitalLetter(element) {
    for(let i = 0; i < element.length; i++) {
        if (element[i].charCodeAt() > 64 && element[i].charCodeAt() < 91) {
            return true;
        }
    }
    return false;
}

function hasLowerLetter(element) {
    for(let j = 0; j < element.length; j++) {
        if (element[j].charCodeAt() > 96 && element[j].charCodeAt() < 123) {
            return true;
        }
    }
    return false;
}

function validateZipcode() {
    if (empty(zipcodeInput)) {
        markValidation(zipcodeInput, true);
        return true;
    } else {
        let checkA = /[0-9]{2}\-[0-9]{3}/.test(zipcodeInput.value);
        let checkB = zipcodeInput.value.length === 6;

        if (checkA && checkB) {
            markValidation(zipcodeInput, true);
            return true;
        } else {
            markValidation(zipcodeInput, false);
            return false;
        }
    }
}

nameInput.addEventListener('keyup', validateName);
surnameInput.addEventListener('keyup', validateSurname);
peselInput.addEventListener('keyup', validatePesel);
emailInput.addEventListener('keyup', validateEmail);
confirmedEmailInput.addEventListener('keyup', areEmailsTheSame);
passwordInput.addEventListener('keyup', checkPassword);
confirmedPasswordInput.addEventListener('keyup', arePasswordsTheSame);
phoneInput.addEventListener('keyup', validatePhone);
streetInput.addEventListener('keyup', validateStreet);
buildingNumberInput.addEventListener('keyup', validateBuildingNumber);
apartmentNumberInput.addEventListener('keyup', validateApartmentNumber);
districtNumberInput.addEventListener('keyup', validateDistrictNumberInput);
zipcodeInput.addEventListener('keyup', validateZipcode);

form.addEventListener('submit', (event) =>{
    error = 0;
    if(!validateName()) { alert("Proszę podać swoje imię!"); error = 1; }
    if(!validateSurname()){alert("Proszę podać swoje nazwisko!"); error = 1; }
    if(!validatePesel()){alert("Proszę podać prawidłowy numer PESEL!"); error = 1; }
    if(!validateEmail()) { alert("Sprawdź proszę swój adres e-mail!"); error = 1; }
    if(!checkPassword()) { alert("Sprawdź proszę swoje hasło!"); error = 1; }
    if(!arePasswordsTheSame()) { alert("Sprawdź proszę czy podane przez ciebie hasła są takie same!"); error = 1; }
    if(!validatePhone()) { alert("Sprawdź proszę czy podany przez ciebie numer telefonu jest poprawny!"); error = 1; }
    if(!validateZipcode()) { alert("Sprawdź proszę czy podany przez ciebie kod pocztowy jest poprawny!"); error = 1; }
    if(!validateStreet()) { alert("Sprawdź proszę czy podałeś nazwę ulicy!"); error = 1; }
    if(!validateBuildingNumber()) { alert("Sprawdź proszę czy podałeś numer budynku!"); error = 1; }
    if(!validateApartmentNumber()) { alert("Sprawdź proszę czy podałeś poprawny numer lokalu!"); error = 1; }
    if(!validateDistrictNumberInput()) { alert("Sprawdź proszę czy wybrałeś z listy dzielnicęw której mieszkasz!"); error = 1; }
    if(!document.getElementById('rodo0').checked) { alert("Zaznacz proszę odpowiednie zgody!"); error = 1; }

    if(error) event.preventDefault();
})