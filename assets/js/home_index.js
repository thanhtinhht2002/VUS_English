document.addEventListener('scroll', function() {
    const element = document.querySelector('.show-on-small');
    const targets = document.querySelectorAll('.home__person--top');

    const element2 = document.querySelector('.show-on-last');
    const targets2 = document.querySelectorAll('.home__person--bot');


    const rect = element.getBoundingClientRect();
    const isInViewport = rect.top < window.innerHeight && rect.bottom >= 0;

    targets.forEach(target => {
        if (isInViewport) {
            target.style.marginTop = '0';
            target.style.opacity = '1';
        } else {
            target.style.marginTop = '-70px';
            target.style.opacity = '0';
        }
    });

    const rect2 = element2.getBoundingClientRect();
    const isInViewport2 = rect2.top < window.innerHeight && rect2.bottom >= 0;

    targets2.forEach(target => {
        if (isInViewport2) {
            target.style.marginTop = '0';
            target.style.opacity = '1';
        } else {
            target.style.marginTop = '70px';
            target.style.opacity = '0';
        }
    });
});