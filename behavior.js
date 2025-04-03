const destinasiBox = document.getElementById('destinasi-box');
const destinasiArrow = document.getElementById('destinasi-arrow');
const destinasiDetail = document.getElementById('destinasi-detail');
const tiketBox = document.getElementById('tiket-box');
const tiketArrow = document.getElementById('tiket-arrow');
const tiketDetail = document.getElementById('tiket-detail');
const arrowDestinasi = document.getElementById('arrow1');
const hoverDestinasi = document.querySelector('ul li:nth-child(3) li:first-child');
const arrowTiket = document.getElementById('arrow2');
const hoverTiket = document.querySelector('ul li:nth-child(4) li:first-child');

destinasiBox.addEventListener('mouseover', () => {
    destinasiArrow.classList.add('invisible');
    destinasiDetail.classList.remove('invisible');
    destinasiDetail.classList.add('visible');
});
destinasiBox.addEventListener('mouseout', () => {
    destinasiArrow.classList.remove('invisible');
    destinasiDetail.classList.remove('visible');
    destinasiDetail.classList.add('invisible');
});
tiketBox.addEventListener('mouseover', () => {
    tiketArrow.classList.add('invisible');
    tiketDetail.classList.remove('invisible');
    tiketDetail.classList.add('visible');
});
tiketBox.addEventListener('mouseout', () => {
    tiketArrow.classList.remove('invisible');
    tiketDetail.classList.remove('visible');
    tiketDetail.classList.add('invisible');
});
hoverDestinasi.addEventListener('mouseover', () => {
    arrowDestinasi.classList.remove('arrow-top');
    arrowDestinasi.classList.add('arrow-top-hover');
});
hoverDestinasi.addEventListener('mouseout', () => {
    arrowDestinasi.classList.remove('arrow-top-hover');
    arrowDestinasi.classList.add('arrow-top');
});
hoverTiket.addEventListener('mouseover', () => {
    arrowTiket.classList.remove('arrow-top');
    arrowTiket.classList.add('arrow-top-hover');
});
hoverTiket.addEventListener('mouseout', () => {
    arrowTiket.classList.remove('arrow-top-hover');
    arrowTiket.classList.add('arrow-top');
});