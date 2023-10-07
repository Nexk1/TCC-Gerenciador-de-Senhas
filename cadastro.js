function cadastrar(){
    var user = document.getElementById('usuario').value;
    var teste = document.getElementById('teste');

    teste.innerHTML = (user);
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

