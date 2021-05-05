function signInCheck() {
    let u = document.getElementById("username");
    let p = document.getElementById("password");
    if (u.value.length === 0 || p.value.length === 0)
        alert("Username or password must not be empty!");
    else alert("SUCCESS");
}