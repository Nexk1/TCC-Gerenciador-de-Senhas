function processForm(){
let userEmail = document.getElementById("email").value;
let userPass = document.getElementById("senha").value;

if (userEmail == "Rafael"){
    if (userPass == 123){
        window.alert("Olá");
    }else if(userPass == ""){
        window.alert("Coloque sua Senha")
    }else{
        window.alert("Senha Incorreta")
    }
}
}