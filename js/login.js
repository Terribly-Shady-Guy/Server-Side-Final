fetch("src/login_management/verify_auth.php")
.then(response => response.json())
.then(data => displayControls(data));

const logoutBtn = document.getElementById("logout");
logoutBtn.onclick = function() {
    fetch('src/login_management/logout.php')
    .then(() => location.reload());
}

function displayControls(data) {
    if (!data.auth) {
        return;
    }
    
    const varifyAuthDiv = document.getElementById("verify_auth_result");
    const loginForm = document.getElementById("LoginForm");

    loginForm.style.display = 'none';
    varifyAuthDiv.style.display = 'block';

    const welcome = document.getElementById("Welcome");
    welcome.innerHTML = `Welcome back ${data.username}`;

    const addProductLink = document.getElementById("AddProductLink");
    const updateButtons = document.getElementsByClassName("Update");
    const deleteButtons = document.getElementsByClassName("Delete");

    if (addProductLink != null) {
        addProductLink.style.display = 'block';
    }

    if (updateButtons.length <= 0) {
        return;
    }

    for (index = 0; index < updateButtons.length; index++) {
        updateButtons[index].style.display = 'block';
        deleteButtons[index].style.display = 'block';
    }
}