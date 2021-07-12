function encriptar(){
    document.getElementById('pass').value=sha256_digest(document.getElementById('pass').value);
}