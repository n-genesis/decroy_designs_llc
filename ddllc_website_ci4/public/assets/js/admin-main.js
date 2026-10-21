/*!
* @file main.js - Main script for the N-Gen Admin Dashboard.
* @author undefined <undefined>
* @copyright Copyright (c) 2026 undefined. All rights reserved.
* @license ISC
*/
// Toggle light and dark themes
function toggleThemeMenu() {
  let themeMenu = document.querySelector('#theme-menu');

  if (!themeMenu) return;

  const rootElement = document.documentElement;

    const savedTheme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const currentTheme = savedTheme || (systemPrefersDark ?? 'light');
    rootElement.setAttribute('data-bs-theme', currentTheme);

  document.querySelectorAll('[data-bs-theme-value]').forEach(value => {
    value.addEventListener('click', () => {
      const theme = value.getAttribute('data-bs-theme-value');
      document.documentElement.setAttribute('data-bs-theme', theme);
      
      // Save the selection to LocalStorage
      localStorage.setItem('theme', theme);
    });
  });
}


toggleThemeMenu();

// Scroll to top button functionality
const scrollTopBtn = document.getElementById("scrollTopBtn");

// 1. Show button when user scrolls down 300px from the top
if (scrollTopBtn) {
  window.onscroll = function () {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
      scrollTopBtn.classList.remove("d-none");
    } else {
      scrollTopBtn.classList.add("d-none");
    }
  };

  // 2. Scroll smoothly to the top of the page when clicked
  scrollTopBtn.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth" // Backup instruction for browsers ignoring CSS rule
    });
  });
}
