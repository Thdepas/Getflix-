
function CheckPassword(){
        let checkExpression=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
        let pass1 = document.getElementById("password");
        let pass2 = document.getElementById("confirmPassword");
        if (pass1.value=="") {
            pass1.style.borderColor = 'black';
        } else {
        if (pass1.value.match(checkExpression)){
            pass1.style.borderColor = 'green';
            if (pass1.value==pass2.value) {
                pass2.style.borderColor = 'green';
            } else {
                pass2.style.borderColor = 'red';
            }
        }else {
            pass1.style.borderColor = 'red';
        }
    
    }
}
setInterval(CheckPassword,100);
