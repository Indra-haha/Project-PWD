const destinasiBox = document.getElementById('destinasi-box');
const destinasiArrow = document.getElementById('destinasi-arrow');
const destinasiDetail = document.getElementById('destinasi-detail');
const tiketBox = document.getElementById('tiket-box');
const tiketArrow = document.getElementById('tiket-arrow');
const tiketDetail = document.getElementById('tiket-detail');
const arrow1 = document.getElementById('arrow1');
const hover1 = document.querySelector('ul li:nth-child(3) li:first-child');
const arrow2 = document.getElementById('arrow2');
const hover2 = document.querySelector('ul li:nth-child(4) li:first-child');

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
hover1.addEventListener('mouseover', () => {
    arrow1.classList.remove('arrow-top');
    arrow1.classList.add('arrow-top-hover');
});
hover1.addEventListener('mouseout', () => {
    arrow1.classList.remove('arrow-top-hover');
    arrow1.classList.add('arrow-top');
});
hover2.addEventListener('mouseover', () => {
    arrow2.classList.remove('arrow-top');
    arrow2.classList.add('arrow-top-hover');
});
hover2.addEventListener('mouseout', () => {
    arrow2.classList.remove('arrow-top-hover');
    arrow2.classList.add('arrow-top');
});