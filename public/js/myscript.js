const profile = document.querySelector('#drop-down-profile');
const tblFoto = document.querySelector('#tombol-foto');
const tblMobile = document.querySelector('#btn-mobile');
const menuMobile = document.querySelector('#mobile-menu');
const clsNotif = document.querySelector('#btn-notif');
const notif = document.querySelector('#hilangkan');



tblFoto.onclick = function(){
    profile.classList.toggle('hidden');
}

tblMobile.onclick = function(){
    menuMobile.classList.toggle('hidden');
}

clsNotif.onclick = function(){
      notif.classList.add("hidden");
    }

