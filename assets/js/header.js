const mobileMenuOpen = document.querySelector('.navbar__mobile');
const mobileMenuClose = document.querySelector('.header__blur');
const headerBody = document.querySelector('body');

mobileMenuOpen.addEventListener('click',()=>{
    headerBody.classList.add('headerMobile');
})
mobileMenuClose.addEventListener('click',()=>{
    headerBody.classList.remove('headerMobile');
})
function categoryBlog() {
    headerBody.classList.toggle('categoryBlog');
}
function categoryProduct() {
    headerBody.classList.toggle('categoryProduct');
}