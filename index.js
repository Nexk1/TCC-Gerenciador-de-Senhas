var cadastro = document.getElementById('Cadastro')

cadastro.addEventListener('submit', function(event){
    event.preventDefault()

    var email = document.getElementById('usuario').value
    var username = document.getElementById('email').value
    var password = document.getElementById('senha').value
    var confirm_password = document.getElementById('confirm-senha').value


    console.log(username)
    console.log(email)
    console.log(password)
    console.log(confirm_password)
})








const sqlite3 = require('sqlite3').verbose();

const db = new sqlite3.Database('user.db', sqlite3.OPEN_READWRITE, (err)=>{
    if (err) return console.error(err.message);
    
    console.log("connection successful");
});

db.close((err) => {
    if (err) return console.error(err.message);
});

