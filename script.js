document.addEventListener("DOMContentLoaded", () => {
    const registerForm = document.getElementById("registerForm");
    if (registerForm) {
        registerForm.addEventListener("submit", function (event) {
            event.preventDefault();
            const firstName = document.getElementById("firstName").value.trim();
            const lastName = document.getElementById("lastName").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value;
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return;
            }
            localStorage.setItem("firstName", firstName);
            localStorage.setItem("lastName", lastName);
            localStorage.setItem("email", email);
            localStorage.setItem("password", password);
            alert("Registration successful!");
            window.location.href = "sign in.html";
        });
    }
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value;
            const savedEmail = localStorage.getItem("email");
            const savedPassword = localStorage.getItem("password");
            if (email === savedEmail && password === savedPassword) {
                const firstName = localStorage.getItem("firstName");
                alert("Welcome back, " + firstName + "!");
                window.location.href = "dashboard.html";
            } else {
                alert("Incorrect email or password.");
            }
        });
    }

});

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value;
            const savedEmail = localStorage.getItem("email");
            const savedPassword = localStorage.getItem("password");
            if (email === savedEmail && password === savedPassword) {
                alert("Welcome back!");
                window.location.href = "dashboard.html";
            } else {
                alert("Incorrect email or password.");
            }
        });
    }
});