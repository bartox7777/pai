function isWhiteSpaceOrEmpty(str) {
    return /^[\s\t\r\n]*$/.test(str);
}


function checkEmail(str) {
    return !/^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/.test(str);
}

function checkStringAndFocus(obj, msg, func) {
    let str = obj.value;
    let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
    if (func(str)) {
        document.getElementById(errorFieldName).innerHTML = msg;
        obj.focus();
        return false;
    }
    else {
        document.getElementById(errorFieldName).innerHTML = "";
        return true;
    }
}

function showElement(e) {
    document.getElementById(e).style.visibility = 'visible';
}
function hideElement(e) {
    document.getElementById(e).style.visibility = 'hidden';
}

function alterRows(i, e) {
    if (e) {
        if (i % 2 == 1) {
            e.setAttribute("style", "background-color: Aqua;");
        }
        e = e.nextSibling;
        while (e && e.nodeType != 1) { // nodetype != 1 -> nie jest elementem np. <p> czy <div>
            e = e.nextSibling;
        }
        alterRows(++i, e);
    }
}

function nextNode(e) {
    while (e && e.nodeType != 1) {
        e = e.nextSibling;
    }
    return e;
}
function prevNode(e) {
    while (e && e.nodeType != 1) {
        e = e.previousSibling;
    }
    return e;
}
function swapRows(b) {
    let tab = prevNode(b.previousSibling); // tabela
    let tBody = nextNode(tab.firstChild); // tbody
    let lastNode = prevNode(tBody.lastChild); // ostatni wiersz
    tBody.removeChild(lastNode); // usuwamy ostatni wiersz
    let firstNode = nextNode(tBody.firstChild); // pierwszy wiersz
    tBody.insertBefore(lastNode, firstNode); // wstawiamy na początek
}

function cnt(form, msg, maxSize) {
    if (form.value.length > maxSize)
        form.value = form.value.substring(0, maxSize);
    else
        msg.innerHTML = maxSize - form.value.length;
}

function validate(form) {
    let res = 0;
    res &= checkStringAndFocus(form.elements["f_imie"], "Podaj imię!", isWhiteSpaceOrEmpty); // implicit int cast
    res &= checkStringAndFocus(form.elements["f_nazwisko"], "Podaj nazwisko!", isWhiteSpaceOrEmpty);
    res &= checkStringAndFocus(form.elements["f_email"], "Podaj właściwy e-mail!", checkEmail);
    res &= checkStringAndFocus(form.elements["f_ulica"], "Podaj ulicę!", isWhiteSpaceOrEmpty);
    res &= checkStringAndFocus(form.elements["f_miasto"], "Podaj miasto!", isWhiteSpaceOrEmpty);
    return !!res; // implicit bool cast
}