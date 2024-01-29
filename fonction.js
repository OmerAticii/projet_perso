function validatePassword() {
    let mdp1 = document.getElementById("password").value;
    let mdp2 = document.getElementById("confirm-password").value;
    let errM = document.getElementById("errorMess")
    if (mdp1 !== mdp2) {
        errM.textContent="Les mots de passes ne sont pas identiques";
        return false;
    }
}