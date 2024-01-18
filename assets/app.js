/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';


document.addEventListener('DOMContentLoaded', function() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarNav = document.querySelector('#navbarNav');
    navbarToggler.addEventListener('click', () => {
        const isOpen = navbarNav.classList.contains('active');
        navbarNav.classList.toggle('active');
        navbarToggler.classList.toggle('close');
        navbarToggler.setAttribute('aria-expanded', !isOpen); // Actualizar el atributo aria-expanded
    });

    const urlInput = document.getElementsByClassName('utl-input')[0];
    if (urlInput) {
        urlInput.addEventListener('input', () => {
            const formGroup = document.querySelector('.has-error')[0];
            if (formGroup) {
                formGroup.classList.remove('has-error');
            }
            const errorDiv = document.querySelector('.error');
            if (errorDiv) {
                errorDiv.textContent = '';
            }
        });
    }
});