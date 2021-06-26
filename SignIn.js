function signInCheck() {
    let u = document.getElementById("username").value;
    let p = document.getElementById("password").value;
    if (u.length === 0 || p.length === 0)
        alert("Username or password must not be empty!");
    else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                console.log(xmlhttp.responseText);
                alert(xmlhttp.responseText);
                self.location = 'HomePage.php?u=' + u;
            }
        };
        xmlhttp.open("GET", "SignInCheck.php?u=" + u + "&p=" + p);
        // xmlhttp.send("u="+u+"&p="+p);
        xmlhttp.send();
    }
}