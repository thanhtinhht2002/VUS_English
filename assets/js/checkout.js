
const infoCheckoutMobile= document.querySelector('.checkout__container--form__header ion-icon');
const checkoutBody = document.querySelector('body');

infoCheckoutMobile.addEventListener('click',()=>{
    checkoutBody.classList.toggle('infoCheckoutMobile');
})