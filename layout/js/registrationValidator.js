
const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

function validateEmail() {
    inp = $('emailInput').value;

    if(!inp.match(
        re
    )) {
        $('emailSpan').innerHTML = 'This is not correct email';
    }
    else {
        if(inp === '') {
            $('emailSpan').innerHTML = '';
        }
        else {
            $('emailSpan').innerHTML = 'Email is correct';
        }
    }
}

function validatePassword1() {
    inp = $('pass1Input').value

    span = $('passSpan');

    if(!inp.match(/[A-Z]/)) {
        span.innerHTML = "Password must contain uppercase letter"
    }
    else if(!inp.match(/[a-z]/)) {
        span.innerHTML = "Password must contain lowercase letter";
    }
    else if(!inp.match(/\d/)) {
        span.innerHTML = "Password must contain digit";
    }
    else if(!inp.match(/[^\w]/)) {
        span.innerHTML = "Password must contain special character";
    }
    else if(inp.length < 8) {
        span.innerHTML = "Password is too short. Must be at least 8 characters long."
    }
    else {
        span.innerHTML = '';
    }
}

function validatePassword2() {
    span = $('passSpan');

    pass1 = $('pass1Input').value;
    pass2 = $('pass2Input').value;

    if(span.innerHTML === '') {
        span.innerHTML = (pass1 === '')
            ? ''
            : ((pass1 === pass2)
                ? 'Password is okay :)'
                : 'Passwords arent matching')
    }
}

window.addEventListener('load', () => {
    document.getElementById('emailInput')
        .addEventListener('change', validateEmail);

    document.getElementById('pass1Input')
        .addEventListener('change', validatePassword1);

    document.getElementById('pass2Input')
        .addEventListener('change', validatePassword2);

    validateEmail();
    validatePassword1();
    validatePassword2();
});