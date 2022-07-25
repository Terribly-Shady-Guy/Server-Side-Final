var varifyAuthDiv = document.getElementById("verify_auth_result");
var loginForm = document.getElementById("LoginForm");

fetch("src/login_management/verify_auth.php")
.then(response => response.json())
.then(function(data) {
    if(data.auth) {
        loginForm.style.display = 'none';
        varifyAuthDiv.style.display = 'block';
        var welcome = document.getElementById("Welcome");
        welcome.innerHTML = "Welcome back " + data.username;

        var addProductLink = document.getElementById("AddProductLink");
        var updateButtons = document.getElementsByClassName("Update");
        var deleteButtons = document.getElementsByClassName("Delete");

        if (addProductLink != null) {
            addProductLink.style.display = 'block';
        }

        if (updateButtons.length > 0) {
            for (index = 0; index < updateButtons.length; index++) {
                updateButtons[index].style.display = 'block';
                deleteButtons[index].style.display = 'block';
            }
        }
    }
});

function logout() {
    fetch('src/login_management/logout.php')
    .then(function() { 
        location.reload(); 
    });
}