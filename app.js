document.addEventListener("DOMContentLoaded", function () {
    function validateLoginForm() {
        var email = document.getElementById('login-email');
        var password = document.getElementById('login-password');
        var errorMessage = document.getElementById('login-error-message');

        if (!email || !password || !errorMessage) return false;

        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var passwordRegex = /.{8,}/;

        if (!emailRegex.test(email.value) || !passwordRegex.test(password.value)) {
            errorMessage.style.display = 'block';
            return false;
        } else {
            errorMessage.style.display = 'none';
            return true;
        }
    }

    function validateRegisterForm() {
        var name = document.getElementById('register-name');
        var email = document.getElementById('register-email');
        var password = document.getElementById('register-password');
        var confirmPassword = document.getElementById('register-confirm-password');
        var errorMessage = document.getElementById('register-error-message');

        if (!name || !email || !password || !confirmPassword || !errorMessage) return false;

        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var passwordRegex = /.{8,}/;

        if (!emailRegex.test(email.value) || password.value !== confirmPassword.value || !passwordRegex.test(password.value)) {
            errorMessage.style.display = 'block';
            return false;
        } else {
            errorMessage.style.display = 'none';
            return true;
        }
    }

    function showRegisterForm() {
        document.getElementById('login-form-section').style.display = 'none';
        document.getElementById('register-form-section').style.display = 'block';
    }

    function showLoginForm() {
        document.getElementById('register-form-section').style.display = 'none';
        document.getElementById('login-form-section').style.display = 'block';
    }

    let currentIndex = 0;

    function moveSlide(direction) {
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        if (!slider || slides.length === 0) return;

        currentIndex += direction;

        if (currentIndex < 0) {
            currentIndex = slides.length - 1;
        } else if (currentIndex >= slides.length) {
            currentIndex = 0;
        }

        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');

    if (prevButton && nextButton) {
        prevButton.addEventListener('click', function () {
            moveSlide(-1);
        });

        nextButton.addEventListener('click', function () {
            moveSlide(1);
        });
    }


    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");

    if (loginForm) {
        loginForm.onsubmit = validateLoginForm;
    }
    if (registerForm) {
        registerForm.onsubmit = validateRegisterForm;
    }


    window.showRegisterForm = showRegisterForm;
    window.showLoginForm = showLoginForm;
});



const addToCart = (productId, productName, productPrice) => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push({ productId, productName, productPrice });
    localStorage.setItem('cart', JSON.stringify(cart));
    window.location.href = 'cart.html'; 
};

const buyNowButtons = document.querySelectorAll('.buy-now');
buyNowButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        const productCard = e.target.closest('.product-card');
        const productId = productCard.dataset.id;
        const productName = productCard.querySelector('h3').innerText;
        const productPrice = productCard.querySelector('.price').innerText.replace('$', '');
        

        addToCart(productId, productName, productPrice);
    });
});
