// Import all our styles.
import AOS from 'aos';
import * as bootstrap from 'bootstrap';
import './index.css';

document.addEventListener('DOMContentLoaded', () => {
    // Initialise the animate on scroll library.
    AOS.init({
        duration: 800,
        delay: 200,
        disable: 'phone'
    });

    // When the user scrolls down from the top, adjust navbar, page and logo styling.
    const page = document.getElementById('page');
    const pagePadding = page.style.paddingTop;
    const nav = document.getElementById('navbar');
    window.onscroll = function() {
        if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
            nav.style.padding = '5px 0';
            nav.style.borderBottomWidth = '0.2rem';
            page.style.paddingTop = '0';
        } else {
            nav.style.padding = '25px 0';
            nav.style.borderBottomWidth = '0.4rem';
            page.style.paddingTop = pagePadding;
        }
    };
    
});