function toonWachtwoord() {
    let veld = document.getElementById("wachtwoord");

    if (veld.type === "password") {
        veld.type = "text";
    } else {
        veld.type = "password";
    }
}