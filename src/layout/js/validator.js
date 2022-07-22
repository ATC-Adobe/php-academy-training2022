console.log('Validator loaded');

//GLOBAL TEMP VARIABLE
let timeout;

//GLOBAL USE FUNCTIONS
function getCurrentFormatDate () {
    let currentDate = new Date();
    let year    = currentDate.getFullYear();
    let month   = formatDataValue(currentDate.getMonth() + 1);
    let day     = formatDataValue(currentDate.getUTCDate());
    let hour    = formatDataValue(currentDate.getHours());
    let minutes = formatDataValue(currentDate.getMinutes());

    return new Date(year + "-" + month + "-" + day + "T" + hour + ":" + minutes);
}

function formatDataValue (param) {
    if (param < 10) {
        param = "0" + param;
    }
    return param;
}

//PASSWORD VALIDATOR
let password = document.getElementById('password');
let strengthBadge = document.getElementById('strength');
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})');
let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))');

function strengthChecker (PasswordParameter) {
    if (strongPassword.test(PasswordParameter)) {
        strengthBadge.style.backgroundColor = "green";
        strengthBadge.textContent = 'Strong';
    } else if (mediumPassword.test(PasswordParameter)) {
        strengthBadge.style.backgroundColor = 'blue';
        strengthBadge.textContent = 'Medium';
    } else {
        strengthBadge.style.backgroundColor = 'red';
        strengthBadge.textContent = 'Weak';
    }
}

if (password) {
    password.addEventListener("input", () => {

        strengthBadge.style.display = 'block';
        clearTimeout(timeout);

        timeout = setTimeout(() => strengthChecker(password.value), 500);

        if (password.value.length !== 0) {
            strengthBadge.style.display !== 'block';
        } else {
            strengthBadge.style.display = 'none';
        }
    });
}

//DATE VALIDATOR
let startDate   = document.getElementById('date-from');
let endDate     = document.getElementById('date-to');
let dateBadge   = document.getElementById('dateSpan');

function dateChecker (startDateParameter, endDateParameter) {
    let currentDate = getCurrentFormatDate().getTime();
    let startDate   = new Date(startDateParameter).getTime();
    let endDate     = new Date(endDateParameter).getTime();

    if (startDate < currentDate) {
        dateBadge.style.backgroundColor = "red";
        dateBadge.textContent = 'The start date cannot be earlier than the current time!';
    } else if (endDate < currentDate) {
        dateBadge.style.backgroundColor = "red";
        dateBadge.textContent = 'The end date cannot be earlier than the current time!';
    } else if (startDateParameter >= endDateParameter) {
        dateBadge.style.backgroundColor = "red";
        dateBadge.textContent = 'The start date of the reservation cannot be older than the end date!';
    } else {
        dateBadge.style.backgroundColor = "green";
        dateBadge.textContent = 'Date correct you can book a room!';
    }
}

if (startDate && endDate) {
    endDate.addEventListener("input", () => {

        dateBadge.style.display = 'block';
        clearTimeout(timeout);

        timeout = setTimeout(() => dateChecker(startDate.value, endDate.value), 500);

    });

    startDate.addEventListener("input", () => {

        dateBadge.style.display = 'block';
        clearTimeout(timeout);

        timeout = setTimeout(() => dateChecker(startDate.value, endDate.value), 500);

    });
}

//

function preventSubmit () {

}

