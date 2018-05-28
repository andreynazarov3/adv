import './stylesheets/main.scss';
import Swiper from 'swiper';
import { TweenMax, TimelineMax } from 'gsap';

require('./scripts/selectors');

const init = () => {
    // flash curtain animation
    let scene = new TimelineMax();
    scene.to(
        '.flash-curtain__item',
        0.5,
        { borderColor: '#ebebeb' }
    ).to(
        '.flash-curtain__item span',
        0.5,
        { opacity: 1 }, '-=0.5'
    )
        .staggerTo('.flash-curtain__spacer:not(.flash-curtain__spacer--static)', 0.5, { width: '100%', ease: Power2.easeInOut }, -0.1)
        .staggerTo('.flash-curtain__spacer:not(.flash-curtain__spacer--active)', 0.4, { width: '0%', ease: Power2.easeInOut }, -0.07, '-=0.5')
        .to(
            '.flash-curtain',
            0.5,
            { autoAlpha: 0 },
            '-=0.2'
        );

    let aboutCompanySwiper,
        animatedItems = document.querySelectorAll('.animate'),
        k = window.innerWidth > 1024 ? 0.5 : 0.8,
        //Для мобильных устройств кап выше
        checkBgList = document.querySelectorAll('.full-bg'),
        linksLeft = document.querySelectorAll('[data-cool-transition-top]'),
        linksTop = document.querySelectorAll('[data-cool-transition-second]'),
        linksNews = document.querySelectorAll('[data-cool-transition-news]');
    document.querySelectorAll('.common_button, .header-back, .adv_s__soc__item, .contacts_bottom__man').on('mousedown', function (e) {
        let ink = this.querySelector('.ink');
        if (!ink) {
            ink = document.createElement('span');
            ink.className = 'ink';
            this.appendChild(ink);
        }
        ink.classList.remove("animated");
        if (!ink.offsetWidth && !ink.offsetHeight) {
            let d = Math.max(this.offsetWidth, this.offsetHeight);
            ink.style.height = d + 'px';
            ink.style.width = d + 'px';
        }
        ink.style.top = `${e.offsetY - ink.offsetHeight / 2}px`;
        ink.style.left = `${e.offsetX - ink.offsetWidth / 2}px`;
        setTimeout(function (e) {
            ink.classList.add('animated');
        }, 100);
    });
    if (window.innerWidth < 500) {
        document.querySelectorAll('.share_button').on('click', function (e) {
            let target = e.currentTarget;
            target.classList.add('active');
        });
        document.querySelectorAll('.share_button').on('mouseleave', function (e) {
            let target = e.currentTarget;
            target.classList.remove('active');
        });
    }
    const checkBg = () => {
        checkBgList.forEach(item => {
            let b = item.getBoundingClientRect(),
                menu = item.querySelector('.menu--bg');
            if (menu) {
                // wp fix
                menu.style.transform = `translate3d(0, ${-b.top}px, 0)`;
            }
        });
    };
    const checkAnim = () => {
        let heightCap = window.innerHeight * k;
        for (let i = 0; i < animatedItems.length; i++) {
            let item = animatedItems[i],
                b = item.getBoundingClientRect();
            if (b.top - heightCap <= 0) {
                item.classList.add('show');
            } else {
                // item.classList.remove('show');
            }
        }
    };
    checkAnim();
    if (window.innerWidth > 1024) {
        if (checkBgList.length) {
            let menuCopy = document.querySelector('.menu').cloneNode(true);
            menuCopy.classList.remove('black');
            menuCopy.classList.add('menu--bg');
            checkBgList.forEach(t => {
                t.appendChild(menuCopy.cloneNode(true));
            })
        }
        checkBg();
        setInterval(checkBg, 5);
    }
    window.addEventListener('scroll', function (e) {
        checkAnim();
    });


    document.addEventListener("click", function (e) {
        for (let target = e.target; target && target !== this; target = target.parentNode) {
            // loop parent nodes from the target to the delegation node
            if (target.matches('[data-cool-transition-top]')) {
                // .call(target, e);
                e.preventDefault();
                let href = target.href,
                    transitionBg = document.createElement('div'),
                    direction = target.getAttribute('data-cool-transition-top');
                if (direction === 'r') {
                    transitionBg.className = 'transition-bg transition-bg--right';
                } else {
                    transitionBg.className = 'transition-bg transition-bg--left';
                }
                document.body.appendChild(transitionBg);
                setTimeout(() => {
                    transitionBg.classList.add('active');
                }, 250);
                setTimeout(() => {

                    window.location.href = href;
                }, 500);
                break;
            }
            if (target.matches('[data-cool-transition-second]')) {
                if (target.parentNode.parentNode.classList.contains('ready')) {
                    let href = target.getAttribute('data-href'),
                        transitionBg = document.createElement('div');
                    transitionBg.className = 'transition-bg transition-bg--top';
                    document.body.appendChild(transitionBg);
                    setTimeout(() => {
                        transitionBg.classList.add('active');
                    }, 250);
                    setTimeout(() => {
                        window.location.href = href;
                    }, 500);
                }
                break;
            }
            if (target.matches('[data-cool-transition-news]')) {
                let href = target.href,
                    transitionBg = document.createElement('div');
                transitionBg.className = 'transition-bg transition-bg--top';
                document.body.appendChild(transitionBg);
                setTimeout(() => {
                    transitionBg.classList.add('active');
                }, 250);
                setTimeout(() => {
                    window.location.href = href;
                }, 500);
            }
        }
    }, false);

    if (document.querySelector('.info__clients')) {
        let clients = document.querySelector('.info__clients');
        clients.style.transform = 'translateX(0)';
        clients.addEventListener('mousemove', function (ev) {
            let currTransf = parseInt(clients.style.transform.match(/-?\d+/g)[0]);
            clients.style.transform = `translateX(${currTransf - ev.movementX * 0.5}px)`;
        });
    }
    if (document.querySelector('.adv_s__slider')) {
        let bulletClass = 'adv_s__bullet--orange';
        if (document.querySelector('.adv_s__slider--red')) {
            bulletClass = 'adv_s__bullet--red';
        }
        let slidersImages = document.querySelectorAll('.adv_s__slide__image img');
        aboutCompanySwiper = new Swiper('.adv_s__slider', {
            effect: 'fade',
            centeredSlides: true,
            speed: 1000,
            slidesPerView: 1,
            crossFade: true,
            noSwiping: true,
            noSwipingClass: 'adv_s__pagination',
            pagination: {
                el: '.adv_s__pagination',
                clickable: true,
                bulletActiveClass: bulletClass + '--active',
                bulletClass: bulletClass,
                renderBullet: function (i, c) {
                    return `<div class="${c}"><img src="${slidersImages[i].src}"></div>`;
                }
            }
        });
        if (document.querySelector('.adv_s__slider--orange')) {
            let circle = document.createElement('div');
            circle.className = 'circle';
            circle.style.transform = 'rotate(0deg)';
            document.querySelector('.adv_s__slider').appendChild(circle);
        }
        aboutCompanySwiper.on('slideChangeTransitionStart', function () {
            let prevSlide = this.slides[this.previousIndex],
                activeSlide = this.slides[this.activeIndex],
                circle = document.querySelector('.adv_s__slider--orange .circle');
            if (circle) {
                let angle = parseInt(circle.style.transform.match(/-?\d+/g)[0]);
                angle += 30;
                circle.style.transform = `rotate(${angle}deg)`
            }
            prevSlide.querySelector('.adv_s__slide__image').classList.remove('here');
            prevSlide.querySelector('.adv_s__slide__image').classList.add('away');
            activeSlide.querySelector('.adv_s__slide__image').classList.add('here');
            activeSlide.querySelector('.adv_s__slide__image').classList.remove('away');
            setTimeout(function () {
                document.querySelectorAll('.adv_s__slide__image.away').forEach(t => {
                    t.classList.remove('away');
                });
            }, 300);
        });
    }
    document.querySelectorAll('[data-menu]').forEach(item => {
        item.addEventListener('click', e => {
            let target = e.currentTarget,
                action = target.getAttribute('data-menu');
            if (action === 'open') {
                document.querySelector('.menu_m').classList.add('menu_m--show');
            } else {
                document.querySelector('.menu_m').classList.remove('menu_m--show');
            }
        });
    });
    document.querySelectorAll('[data-hover-id]').forEach(item => {
        item.addEventListener('mouseenter', function (e) {
            let target = e.target,
                id = target.getAttribute('data-hover-id');
            document.querySelector('.tech__rounded__text__main').classList.remove('tech__rounded__text__main');
            document.querySelector(`[data-hover-text-id="${id}"]`).classList.add('tech__rounded__text__main');
        });
        item.addEventListener('mouseleave', function (e) {
            let target = e.target,
                id = target.getAttribute('data-hover-id');
            document.querySelector('.tech__rounded__text__main').classList.remove('tech__rounded__text__main');
            document.querySelector(`[data-hover-text-id="0"]`).classList.add('tech__rounded__text__main');
        });
    });

    document.querySelectorAll('.agencies__main__title_main').on('mouseenter', function (e) {
        e.preventDefault();
        let target = e.currentTarget.parentNode.parentNode;
        target.classList.add('active');
        setTimeout(() => {
            target.classList.add('ready');
        }, 500)
    });
    document.querySelectorAll('.agencies__main').on('mouseleave', function (e) {
        e.preventDefault();
        let target = e.currentTarget;
        target.classList.remove('active');
        setTimeout(() => {
            target.classList.remove('ready');
        }, 500)
    });

    if (document.querySelector('.about__team__item__images__item')) {
        let teamSlider = [],
            slider = document.querySelector('.about__team__item__images__item'),
            onScreen = false;
        teamSlider.push(new Swiper('.about__team__item__images__item:nth-child(1)', {
            speed: 1000,
            centeredSlides: true,
            slidesPerView: 1,
            crossFade: true,
            noSwiping: true,
            loop: true
        }));
        teamSlider.push(new Swiper('.about__team__item__images__item:nth-child(2)', {
            speed: 1000,
            centeredSlides: true,
            slidesPerView: 1,
            crossFade: true,
            noSwiping: true,
            loop: true
        }));
        teamSlider.push(new Swiper('.about__team__item__images__item:nth-child(3)', {
            speed: 1000,
            centeredSlides: true,
            slidesPerView: 1,
            crossFade: true,
            noSwiping: true,
            loop: true
        }));
        teamSlider.push(new Swiper('.about__team__item__images__item:nth-child(4)', {
            speed: 1000,
            centeredSlides: true,
            slidesPerView: 1,
            crossFade: true,
            noSwiping: true,
            loop: true
        }));
        window.addEventListener('scroll', function (ev) {
            let pos = slider.getBoundingClientRect();
            if (pos.y > 0 && pos.y < window.innerHeight * 0.5 && !onScreen) {
                onScreen = true;
                teamSlider.forEach((item) => {
                    let i = Math.round(Math.random() * 5 + 1);
                    item.slideToLoop(i, i * 300);
                })
            }
            else if (pos.y < 0 || pos.y > window.innerHeight) {
                onScreen = false;
            }
        });
    }

    let detailTitle = document.querySelector('.news-detail h1, .news-detail h2');
    if (detailTitle) {
        let text = detailTitle.innerText,
            newRound = document.createElement('div'),
            newRoundP = document.createElement('p'),
            newExtP = document.createElement('p');
        detailTitle.innerText = '';
        detailTitle.className = 'detail_top__rounded';
        newRound.className = 'round';
        newExtP.className = 'round-bottom';
        newRoundP.innerText = text;
        newExtP.innerText = text;
        newRound.appendChild(newRoundP);
        detailTitle.appendChild(newRound);
        detailTitle.appendChild(newExtP);
    }

    if (window.navigator.platform === 'Win32') {
        document.querySelectorAll('.menu--bg').forEach(item => {
            item.querySelector('.menu_left').style.left = '8px';
            item.querySelector('.menu_right').style.right = '8px';
        });
    }

    /*let ytIframes = document.querySelectorAll('.ytIframe');
    if (ytIframes.length) {
        let tag = document.createElement('script');
        tag.src = "https://www.youtube.com/player_api";
        let firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        window.onYouTubePlayerAPIReady = function () {
            ytIframes.forEach(t => {
                console.log(t);
                let id = t.id,
                    videoId = t.getAttribute('data-video-id');
                let player = new YT.Player(id, {
                    videoId: videoId,
                    autoplay: 1,
                    controls: 0,
                    enablejsapi: 1,
                    loop: 1
                });
            });
        }
    }*/
};

document.addEventListener('DOMContentLoaded', init);