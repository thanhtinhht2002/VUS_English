const openCategoryMobileBlog = document.querySelector('.blog__container .blog__header ion-icon');
const loseCategoryMobileBlog = document.querySelector('.blog__content--category:nth-child(3) .blog__content--category__header ion-icon');
const blogBody = document.querySelector('body');

openCategoryMobileBlog.addEventListener('click',()=>{
    blogBody.classList.add('categoryMobileBlog');
})
loseCategoryMobileBlog.addEventListener('click',()=>{
    blogBody.classList.remove('categoryMobileBlog');
})