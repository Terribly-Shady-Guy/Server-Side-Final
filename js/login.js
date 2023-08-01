fetch("src/login_management/verify_auth.php")
.then(response => response.json())
.then(data => {
    if (!data.auth) {
        return;
    }
    
    const varifyAuthDiv = document.querySelector("#verify_auth_result");
    const loginForm = document.querySelector("#LoginForm");

    loginForm.style.display = 'none';
    varifyAuthDiv.style.display = 'block';

    const welcome = document.querySelector("#Welcome");
    welcome.innerText = `Welcome back ${data.username}`;

    const addProductLink = document.querySelector("#AddProductLink");
    const updateButtons = document.querySelectorAll(".Update");
    const deleteButtons = document.querySelectorAll(".Delete");

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
});

const logoutBtn = document.querySelector("#logout");
logoutBtn.addEventListener("click", () => {
    fetch('src/login_management/logout.php')
        .then(() => location.reload());
});