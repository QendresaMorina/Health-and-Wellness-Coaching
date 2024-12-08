function validateLoginForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Verifikoni që emri i përdoruesit dhe fjalëkalimi janë të plotësuara
    if (username == "" || password == "") {
        alert("Të dyja fushat janë të kërkuara!");
        return false;
    }

    // Shtoni kontrolle të tjera nëse është e nevojshme, siç është validimi i fjalëkalimit
    if (password.length < 6) {
        alert("Fjalëkalimi duhet të ketë të paktën 6 karaktere.");
        return false;
    }

    // Mund të shtoni validim të mëtejshëm këtu për të kontrolluar nëse emri dhe fjalëkalimi janë të sakta me një backend

    // Nëse gjithçka është në rregull, formulari dërgohet
    return true;
}
// Function to display the current day
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

// Call the function on page load
displayCurrentDay();

