"use strict"

const isMobile={
    Android: function(){
        return navigator.userAgent.match(/Android/i);
    },
    BlackBarry: function(){
        return navigator.userAgent.match(/BlackBarry/i);
    },
    iOS: function(){
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function(){
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function(){
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function(){
        return(isMobile.Android()||
        isMobile.BlackBarry()||
        isMobile.iOS()||
        isMobile.Opera()||
        isMobile.Windows());
    }
};

if(isMobile.any()){
document.body.classList.add('_touch');

let menuArrows = document.querySelectorAll('.menu__arrow');
if(menuArrows.length > 0){
    for(let index = 0; index < menuArrows.length; index++){
        const menuArrow = menuArrows[index];
        menuArrow.addEventListener("click",function(e){
menuArrow.parentElement.classList.toggle('_active');
        });
    }
}
}else{
    document.body.classList.add('_pc');
}

//Меню бургер
const iconMenu = document.querySelector('.menu__icon');
if(iconMenu){
    const menuBody = document.querySelector('.menu__body');
    iconMenu.addEventListener("click",function(e){
        document.body.classList.toggle('_lock');
        iconMenu.classList.toggle('_active');
        menuBody.classList.toggle('_active');
    });
}

const showAcaunt = document.querySelector('.span-akaunt');
const Acaunt = document.querySelector('.profile');
showAcaunt.addEventListener("click",function(e){
Acaunt.classList.toggle('non-akaunt');
});


