function signUpCheck() {
    let u = document.getElementById("username");
    let p = document.getElementById("password");
    let cp = document.getElementById("confirm_password");
    if (u.value.length === 0) {
        alert("Username should not be empty!");
        return;
    }
    if (p.value.length === 0) {
        alert("Password should not be empty!");
        return;
    }
    if (cp.value.length === 0) {
        alert("You should confirm your password!");
        return;
    }
    if (!(p.value === cp.value)) {
        alert("Inconsistent passwords!");
        return;
    }

    let l = p.value.length;
    let hasNum = false;
    let hasAlphabet = false;
    for (let i = 0; i < l; i++) {
        let c = p.value.charAt(i);
        if ('0' <= c && c <= '9') hasNum = true;
        if (('a' <= c && c <= 'z') || ('A' <= c && c <= 'Z')) hasAlphabet = true;
        if (hasNum && hasAlphabet) break;
    }
    if (!(hasNum && hasAlphabet))
        alert("Your password should include both numbers and alphabets!");
    else
        alert("SUCCESS");
}