function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
        textbox.addEventListener(event, function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}

setInputFilter(document.getElementById("BoyName"), function (value) {
    return /^[ا-ی]*$/i.test(value) ;
});

setInputFilter(document.getElementById("BoymamName"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});

setInputFilter(document.getElementById("txtMarriage-3"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});


setInputFilter(document.getElementById("txtMarriage-4"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});

setInputFilter(document.getElementById("txtMarriage-5"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});

setInputFilter(document.getElementById("txtMarriage-6"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});

setInputFilter(document.getElementById("txtAbsent-3"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("txtAbsent-4"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});

setInputFilter(document.getElementById("Partnership-13"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});

setInputFilter(document.getElementById("Partnership-14"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Need-15"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Need-16"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Need-17"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Need-18"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Need-19"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Need-20"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Need-21"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Location-22"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Location-19"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Location-24"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("Twin-25"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("ChangeName-26"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("ChangeName-27"), function (value) {
    return /^[ا-ی]*$/i.test(value);
});
setInputFilter(document.getElementById("txtValSarketab-3"), function (value) {
    return /^\d*$/.test(value) && (parseInt(value) <= 1250 || parseInt(value) <= 1500);
});
