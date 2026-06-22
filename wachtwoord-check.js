function controleerWachtwoord() {
    let wachtwoord = document.getElementById("wachtwoord").value;
    let herhaling = document.getElementById("wachtwoord_bevestig").value;

    if (wachtwoord !== herhaling) {
        alert("Wachtwoorden komen niet overeen!");
        return false;
    }

    return true;
}
