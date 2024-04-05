function isEmpty(str) {
    return str.length === 0;
}

function isWhiteSpaceOrEmpty(str) {
    return /^[\s\t\r\n]*$/.test(str);
}

function checkString(str, message) {
    if (isWhiteSpaceOrEmpty(str)) {
        alert(message);
        return false;
    }
    return true;
}

function checkEmail(str) {
    let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
    if (email.test(str))
        return true;
    else {
        alert("Podaj właściwy e-mail");
        return false;
    }
}

function validate(form) {
    var res = true;
    res &&= checkString(form.elements["f_imie"].value, "Podaj imię!");
    res &&= checkString(form.elements["f_nazwisko"].value, "Podaj nazwisko!");
    res &&= checkString(form.elements["f_ulica"].value, "Podaj ulicę!");
    res &&= checkString(form.elements["f_miasto"].value, "Podaj miasto!");
    res &&= checkEmail(form.elements["f_email"].value);
    return res;
}