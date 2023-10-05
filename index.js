const sqlite3 = require('sqlite3').verbose();

const db = new sqlite3.Database('user.db', sqlite3.OPEN_READWRITE, (err)=>{
    if (err) return console.error(err.message);
    
    console.log("connection successful");
});


//db.run('CREATE TABLE users(username, email, password)')




db.close((err) => {
    if (err) return console.error(err.message);
});

