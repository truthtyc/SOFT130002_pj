function signInCheck() {
    let u = document.getElementById("username");
    let p = document.getElementById("password");
    if (u.value.length === 0 || p.value.length === 0)
        alert("Username or password must not be empty!");
    else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                console.log(xmlhttp.responseText);
                alert(xmlhttp.responseText);
                self.location = 'HomePage.php';
            }
        };
        xmlhttp.open("POST","SignInCheck.php?u="+u+"&p="+p);
        xmlhttp.send();
    }
}