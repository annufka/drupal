"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const registerButton = document.getElementById("btn-submit-register");
    if (registerButton) {
        registerButton.addEventListener("click", function () {
            var oReq = new XMLHttpRequest();
            let user_email_input = document.getElementById("user-email");
            let user_password_input = document.getElementById("user-password");
            oReq.addEventListener("load", function () {
                let status = oReq.status;
                if (status == 201) {
                    window.location.href="index.php";
                    // console.log(status);
                } if (status == 400) {
                    console.log(status);
                }
            });
            let user_email = user_email_input.value;
            let user_password = user_password_input.value;
            let data = new FormData();
            data.append("email", user_email);
            data.append("password", user_password);
            oReq.open("POST", "add_user.php");
            oReq.send(data);
        });
    }

    const loginButton = document.getElementById("btn-submit-login");
    if (loginButton) {
        loginButton.addEventListener("click", function () {
            var oReq = new XMLHttpRequest();
            let user_email_input = document.getElementById("user-email");
            let user_password_input = document.getElementById("user-password");
            oReq.addEventListener("load", function () {
                let status = oReq.status;
                if (status == 200) {
                    window.location.href="index.php";
                    // console.log(status);
                } if (status == 401) {
                    console.log(status);
                } if (status == 404) {
                    console.log(status);
                }
            });
            let user_email = user_email_input.value;
            let user_password = user_password_input.value;
            let data = new FormData();
            data.append("email", user_email);
            data.append("password", user_password);
            oReq.open("POST", "login.php");
            oReq.send(data);
        });
    }

    const logoutButton = document.getElementById("btn-submit-logout");
    if (logoutButton) {logoutButton.addEventListener("click", function () {
        var oReq = new XMLHttpRequest();
        oReq.addEventListener("load", function () {
            let status = oReq.status;
            if (status === 401) {
                window.location.href="login_page.php";
            }
        });
        let data = new FormData();
        oReq.open("GET", "logout.php");
        oReq.send(data);
    });
}
})