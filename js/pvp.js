var points = document.getElementById("points");
var points2 = document.getElementById("points2");
var ppg = document.getElementById("ppg");
var ppg2 = document.getElementById("ppg2");
var expected = document.getElementById("expected");
var expected2 = document.getElementById("expected2");
if (points.innerHTML > points2.innerHTML) {
    points.style.color = '#02894e';
    points2.style.color = 'rgb(255, 0, 90)';
} else if (points2.innerHTML > points.innerHTML) {
    points2.style.color = '#02894e';
    points.style.color = 'rgb(255, 0, 90)';
} else {
    points.style.color = '#02894e';
    points2.style.color = '#02894e';
}

if (ppg.innerHTML > ppg2.innerHTML) {
    ppg.style.color = '#02894e';
    ppg2.style.color = 'rgb(255, 0, 90)';
} else if (ppg2.innerHTML > ppg.innerHTML) {
    ppg2.style.color = '#02894e';
    ppg.style.color = 'rgb(255, 0, 90)';
} else {
    ppg.style.color = '#02894e';
    ppg2.style.color = '#02894e';
}

if (expected.innerHTML > expected2.innerHTML) {
    expected.style.color = '#02894e';
    expected2.style.color = 'rgb(255, 0, 90)';
} else if (ppg2.innerHTML > ppg.innerHTML) {
    expected2.style.color = '#02894e';
    expected.style.color = 'rgb(255, 0, 90)';
} else {
    expected.style.color = '#02894e';
    expected2.style.color = '#02894e';
}

var bps = document.getElementById("bps");
var bps2 = document.getElementById("bps2");
var influence = document.getElementById("influence");
var influence2 = document.getElementById("influence2");
var creativity = document.getElementById("creativity");
var creativity2 = document.getElementById("creativity2");
var threat = document.getElementById("threat");
var threat2 = document.getElementById("threat2");
var ict = document.getElementById("ict");
var ict2 = document.getElementById("ict2");

if (bps.innerHTML > bps2.innerHTML) {
    bps.style.color = '#02894e';
    bps2.style.color = 'rgb(255, 0, 90)';
} else if (points2.innerHTML > points.innerHTML) {
    bps2.style.color = '#02894e';
    bps.style.color = 'rgb(255, 0, 90)';
} else {
    bps.style.color = '#02894e';
    bps2.style.color = '#02894e';
}

if (influence.innerHTML > influence2.innerHTML) {
    influence.style.color = '#02894e';
    influence2.style.color = 'rgb(255, 0, 90)';
} else if (influence2.innerHTML > influence.innerHTML) {
    influence2.style.color = '#02894e';
    influence.style.color = 'rgb(255, 0, 90)';
} else {
    influence.style.color = '#02894e';
    influence2.style.color = '#02894e';
}

if (creativity.innerHTML > creativity2.innerHTML) {
    creativity.style.color = '#02894e';
    creativity2.style.color = 'rgb(255, 0, 90)';
} else if (creativity2.innerHTML > creativity.innerHTML) {
    creativity2.style.color = '#02894e';
    creativity.style.color = 'rgb(255, 0, 90)';
} else {
    creativity.style.color = '#02894e';
    creativity2.style.color = '#02894e';
}

if (threat.innerHTML > threat2.innerHTML) {
    threat.style.color = '#02894e';
    threat2.style.color = 'rgb(255, 0, 90)';
} else if (creativity2.innerHTML > creativity.innerHTML) {
    threat2.style.color = '#02894e';
    threat.style.color = 'rgb(255, 0, 90)';
} else {
    threat.style.color = '#02894e';
    threat2.style.color = '#02894e';
}

if (ict.innerHTML > ict2.innerHTML) {
    ict.style.color = '#02894e';
    ict2.style.color = 'rgb(255, 0, 90)';
} else if (creativity2.innerHTML > creativity.innerHTML) {
    ict2.style.color = '#02894e';
    ict.style.color = 'rgb(255, 0, 90)';
} else {
    ict.style.color = '#02894e';
    ict2.style.color = '#02894e';
}