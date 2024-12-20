function validateLoginForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username == "" || password == "") {
        alert("Të dyja fushat janë të kërkuara!");
        return false;
    }

    if (password.length < 6) {
        alert("Fjalëkalimi duhet të ketë të paktën 6 karaktere.");
        return false;
    }


    return true;
}

function displayCurrentDay() {
    const daysOfWeek = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday"
    ];

    const today = new Date();
    const currentDay = daysOfWeek[today.getDay()];

    document.getElementById("current-day").textContent = currentDay;
}


displayCurrentDay();

function validateForm() {
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let message = document.getElementById("message").value;
    
   
    if (name.trim() === "") {
        alert("Emri është i detyrueshëm!");
        return false;
    }


    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        alert("Ju lutemi futni një adresë të vlefshme emaili!");
        return false;
    }

  
    if (message.trim().length < 10) {
        alert("Mesazhi duhet të ketë të paktën 10 karaktere!");
        return false;
    }

  
    return true;
}

function validateLoginForm() {
    let email = document.getElementById("login-email").value;
    let password = document.getElementById("login-password").value;

    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        alert("Ju lutemi futni një adresë të vlefshme emaili!");
        return false;
    }

    if (password.trim().length < 6) {
        alert("Fjalëkalimi duhet të ketë të paktën 6 karaktere!");
        return false;
    }

    return true;
}

function validateRegisterForm() {
    let name = document.getElementById("register-name").value;
    let email = document.getElementById("register-email").value;
    let password = document.getElementById("register-password").value;
    let confirmPassword = document.getElementById("register-confirm-password").value;

    if (name.trim() === "") {
        alert("Emri është i detyrueshëm!");
        return false;
    }

    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        alert("Ju lutemi futni një adresë të vlefshme emaili!");
        return false;
    }

    
    if (password.length < 6) {
        alert("Fjalëkalimi duhet të ketë të paktën 6 karaktere!");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Fjalëkalimi dhe konfirmimi i fjalëkalimit nuk përputhen!");
        return false;
    }

    return true;
}

function validateLoginForm() {
   
    var email = document.getElementById('login-email').value;
    var password = document.getElementById('login-password').value;
    
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var passwordRegex = /.{8,}/; //

    var errorMessage = document.getElementById('login-error-message');

    if (!emailRegex.test(email) || !passwordRegex.test(password)) {
    
        errorMessage.style.display = 'block';
        return false; 
    } else {
    
        errorMessage.style.display = 'none';
        return true; 
    }
}

function validateRegisterForm() {
    var name = document.getElementById('register-name').value;
    var email = document.getElementById('register-email').value;
    var password = document.getElementById('register-password').value;
    var confirmPassword = document.getElementById('register-confirm-password').value;

    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var passwordRegex = /.{8,}/; 

    var errorMessage = document.getElementById('register-error-message');

    if (!emailRegex.test(email) || password !== confirmPassword || !passwordRegex.test(password)) {
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


