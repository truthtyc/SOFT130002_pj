function signUpCheck() {
    let u = document.getElementById("username").value;
    let p = document.getElementById("password").value;
    let cp = document.getElementById("confirm_password").value;
    let em = document.getElementById("email").value;
    let tel = document.getElementById("tel").value;
    let ad = document.getElementById("address").value;


    u = "tyc";
    p = 'tyc123456';
    cp = 'tyc123456';
    em = '123@qq.com';
    tel = '123456';
    ad = 'shanghai';
    if (u.length === 0) {
        alert("Username should not be empty!");
        return;
    }
    if (p.length === 0) {
        alert("Password should not be empty!");
        return;
    }
    if (cp.length === 0) {
        alert("You should confirm your password!");
        return;
    }
    if (em.length === 0) {
        alert("Email should not be empty");
        return;
    }
    if (tel.length === 0) {
        alert("Telephone number should not be empty");
        return;
    }
    if (ad.length === 0) {
        alert("Address should not be empty");
        return;
    }
    if (!(p === cp)) {
        alert("Inconsistent passwords!");
        return;
    }
    let l = p.length;
    let hasNum = false;
    let hasAlphabet = false;
    for (let i = 0; i < l; i++) {
        let c = p.charAt(i);
        if ('0' <= c && c <= '9') hasNum = true;
        if (('a' <= c && c <= 'z') || ('A' <= c && c <= 'Z')) hasAlphabet = true;
        if (hasNum && hasAlphabet) break;
    }
    if (!(hasNum && hasAlphabet))
        alert("Your password should include both numbers and alphabets!");
    else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                console.log(xmlhttp.responseText);
                alert(xmlhttp.responseText);
            }
        };
        console.log(u, p, em, tel, ad);
        xmlhttp.open("GET", "SignUpService.php?u=" + u + "&p=" + p
            + "&em=" + em + "&tel=" + tel + "&ad=" + ad);
        xmlhttp.send();
    }
}