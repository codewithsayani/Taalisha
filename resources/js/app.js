import './bootstrap';
import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

window.Alpine = Alpine;
window.gsap = gsap;
Alpine.start();

// Navbar scroll effect
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (navbar) {
        if (window.scrollY > 20) {
            navbar.classList.add('shadow-lg', 'bg-dark-900/90', 'backdrop-blur-md');
            navbar.classList.remove('bg-transparent');
        } else {
            navbar.classList.remove('shadow-lg', 'bg-dark-900/90', 'backdrop-blur-md');
            navbar.classList.add('bg-transparent');
        }
    }
});

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
gsap.registerPlugin(ScrollTrigger);

const initAnimations = () => {
    // Hero animations
    if (document.querySelector(".gsap-hero-content")) {
        gsap.fromTo(".gsap-hero-content > *", 
            { y: 30, opacity: 0 },
            { y: 0, opacity: 1, duration: 1, stagger: 0.15, ease: "power3.out", clearProps: "all" }
        );
    }
    if (document.querySelector(".gsap-hero-visual")) {
        gsap.fromTo(".gsap-hero-visual",
            { scale: 0.9, opacity: 0 },
            { scale: 1, opacity: 1, duration: 1.5, ease: "power2.out", clearProps: "all" }
        );
    }

    // Section headers
    gsap.utils.toArray('.gsap-section-header').forEach(header => {
        gsap.fromTo(header, 
            { y: 30, opacity: 0 },
            {
                scrollTrigger: {
                    trigger: header,
                    start: "top 85%",
                },
                y: 0,
                opacity: 1,
                duration: 0.8,
                clearProps: "all"
            }
        );
    });

    // Stagger Cards (Services, Articles)
    gsap.utils.toArray('.gsap-stagger-card').forEach((card, i) => {
        gsap.fromTo(card, 
            { y: 50, opacity: 0 },
            {
                scrollTrigger: {
                    trigger: card,
                    start: "top 90%",
                },
                y: 0,
                opacity: 1,
                duration: 0.6,
                clearProps: "all"
            }
        );
    });

    // Tech items
    gsap.utils.toArray('.gsap-stagger-tech').forEach((tech, i) => {
        gsap.fromTo(tech, 
            { y: 30, opacity: 0 },
            {
                scrollTrigger: {
                    trigger: tech,
                    start: "top 90%",
                },
                y: 0,
                opacity: 1,
                duration: 0.5,
                clearProps: "all"
            }
        );
    });

    // Fade Right
    gsap.utils.toArray('.gsap-fade-right').forEach(el => {
        gsap.fromTo(el, 
            { x: -40, opacity: 0 },
            {
                scrollTrigger: {
                    trigger: el,
                    start: "top 85%",
                },
                x: 0,
                opacity: 1,
                duration: 1,
                clearProps: "all"
            }
        );
    });

    // Fade Up
    gsap.utils.toArray('.gsap-fade-up').forEach(el => {
        gsap.fromTo(el, 
            { y: 40, opacity: 0 },
            {
                scrollTrigger: {
                    trigger: el,
                    start: "top 85%",
                },
                y: 0,
                opacity: 1,
                duration: 1,
                clearProps: "all"
            }
        );
    });

    // List items (Why Talisha)
    gsap.utils.toArray('.gsap-list-item').forEach((item, i) => {
        gsap.fromTo(item, 
            { x: 30, opacity: 0 },
            {
                scrollTrigger: {
                    trigger: item,
                    start: "top 90%",
                },
                x: 0,
                opacity: 1,
                duration: 0.5,
                clearProps: "all"
            }
        );
    });

    // Industry Cards
    gsap.utils.toArray('.gsap-industry-card').forEach((card, i) => {
        gsap.fromTo(card, 
            { scale: 0.95, opacity: 0 },
            {
                scrollTrigger: {
                    trigger: card,
                    start: "top 90%",
                },
                scale: 1,
                opacity: 1,
                duration: 0.6,
                clearProps: "all"
            }
        );
    });
};

const runPreloaderAndInit = () => {
    const preloader = document.getElementById('talisha-intro');
    
    // If no preloader or already played this session, skip intro and init animations
    if (!preloader || sessionStorage.getItem('talisha_intro_v5_played')) {
        if (preloader) preloader.style.display = 'none';
        document.documentElement.classList.remove('intro-locked');
        initAnimations();
        return;
    }

    if (prefersReducedMotion) {
        preloader.style.display = 'none';
        document.documentElement.classList.remove('intro-locked');
        sessionStorage.setItem('talisha_intro_v5_played', 'true');
        initAnimations();
        return;
    }

    // Lock scroll during preloader
    document.documentElement.classList.add('intro-locked');
    
    const tl = gsap.timeline({
        onComplete: () => {
            document.documentElement.classList.remove('intro-locked');
            sessionStorage.setItem('talisha_intro_v5_played', 'true');
            initAnimations();
            
            // Fade out the preloader element smoothly
            gsap.to(preloader, {
                opacity: 0,
                duration: 0.8,
                ease: 'power2.inOut',
                onComplete: () => {
                    preloader.style.display = 'none';
                }
            });
        }
    });

    const percentageEl = document.getElementById('intro-progress-text');
    let progressObj = { value: 0 };

    // Sequence perfectly matching the premium requirement
    tl.to(['#intro-glow', '#intro-glow-core'], { opacity: 1, duration: 1.5, ease: 'power2.out' }, 0.2)
      .to('#intro-logo', { y: 0, opacity: 1, duration: 1.2, ease: 'power3.out' }, '-=1.0')
      .to('#intro-tagline-1', { opacity: 1, duration: 1, ease: 'power2.out' }, '-=0.6')
      .to('#intro-tagline-2', { opacity: 1, duration: 1, ease: 'power2.out' }, '-=0.8')
      .to('#intro-progress-container', { opacity: 1, duration: 0.8, ease: 'power2.out' }, '-=0.4')
      .to('#intro-values', { opacity: 1, duration: 1.5, ease: 'power2.out' }, '-=0.8')
      .to(progressObj, {
          value: 100,
          duration: 2.5,
          ease: 'power1.inOut',
          onUpdate: () => {
              document.getElementById('intro-progress-bar').style.width = progressObj.value + '%';
              if (percentageEl) percentageEl.textContent = Math.round(progressObj.value) + '%';
          }
      }, '-=1.5')
      .to({}, { duration: 0.3 }); // Brief hold at 100%
      
    // Subtle cinematic breathing animation for the glow
    gsap.to(['#intro-glow', '#intro-glow-core'], {
        scale: 1.03,
        opacity: 0.9,
        duration: 2.5,
        yoyo: true,
        repeat: -1,
        ease: 'sine.inOut',
        delay: 1.5
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', runPreloaderAndInit);
} else {
    runPreloaderAndInit();
}
