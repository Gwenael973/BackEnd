

// admin-box sav-box hotline-box
const adminBox = document.getElementById('admin-box');
const savBox = document.getElementById('sav-box');
const hotlineBox = document.getElementById('hotline-box');

function hideOrShow(){
    if(adminBox.hasChildNodes() != true){
        adminBox.classList.add('hidden');
    } else {
        adminBox.classList.remove('hidden');
    }
    if(savBox.hasChildNodes() != true){
        savBox.classList.add('hidden');
    } else {
        savBox.classList.remove('hidden');
    }
    if(hotlineBox.hasChildNodes() != true){
        hotlineBox.classList.add('hidden');
    } else {
        hotlineBox.classList.remove('hidden');
    }
}

const body = document.querySelector('body');

body.addEventListener('load', () => hideOrShow);
