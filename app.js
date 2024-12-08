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

