var button = document.querySelector("#submit");

if (button){
    button.addEventListener("click", function(event){
        cadastrar()
    })
}else {
    console.log("DEU RUIM")
}


function cadastrar(){

    var user = document.getElementById('usuario').value
    var email = document.getElementById('email').value
    var password = document.getElementById('password').value
    var confirm_password = document.getElementById('confirm_password').value

    console.log(user, email, password, confirm_password)
}






//
//const sqlite3 = require('sqlite3').verbose();

//const db = new sqlite3.Database('user.db', sqlite3.OPEN_READWRITE, (err)=>{
//    if (err) return console.error(err.message);
    
//    console.log("connection successful");
//});

//db.close((err) => {
//    if (err) return console.error(err.message);
//})

