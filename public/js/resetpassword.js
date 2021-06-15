
const form_reg=document.querySelector("form");
const passwordCheck = document.querySelector("#password");
const verifyPassword = document.querySelector("#conferma_password");
verifyPassword.addEventListener('blur', checkConfirmPassword);
passwordCheck.addEventListener('blur', checkPassword);
form_reg.addEventListener('submit', checker);



let errors =[];
errors['Password'] = 1;
errors['ConfirmPassword'] = 1;



function checkPassword(event){

    const padre= event.currentTarget.parentNode.parentNode;
    const regExp = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,15})");

    if(!regExp.test(passwordCheck.value)){
        errors['Password']=1;
        const errorMessage = document.querySelector("#NotValidPassword");
        if(errorMessage === null){
            const error = document.createElement("span");
            error.classList.add("error");
            error.id = "NotValidPassword";
            error.textContent = "La password non rispetta i criteri. ";

            padre.appendChild(error);

        }
        const successMessage = document.querySelector("#SuccessPassword");
        if(successMessage !== null){
            successMessage.remove();
        }

    }else{
        errors['Password']=0;
        const errorMessage = document.querySelector("#NotValidPassword");
        if(errorMessage !== null){
            errorMessage.remove();
        }
        const successMessage = document.querySelector("#SuccessPassword");
        if(successMessage === null){

            const success = document.createElement("span");
            success.classList.add("ok");
            success.id ="SuccessPassword";
            success.textContent ="Password buona! ";
            padre.appendChild(success);

        }
    }

}


function checkConfirmPassword(event){

    const  padre= event.currentTarget.parentNode.parentNode;

    if(passwordCheck.value === verifyPassword.value) {
        errors['ConfirmPassword']=0;
        if (document.querySelector("#PasswordEqual") === null) {
            const success = document.createElement("span");
            success.classList.add('ok');
            success.textContent = "Le password coincidono";
            success.id = "PasswordEqual";
            padre.appendChild(success);
        }

        const error = document.querySelector("#PasswordNotEqual");
        if (error !== null) {

            error.remove();
        }


    }else{
        errors['ConfirmPassword']=1;
        const success = document.querySelector("#PasswordEqual")

        if(success !== null){

            success.remove();

        }

        if(document.querySelector("#PasswordNotEqual") === null){

            const error = document.createElement("span");
            error.classList.add("error");
            error.textContent ="Le password non coincidono";
            error.id = "PasswordNotEqual";
            padre.appendChild(error);

        }

    }

}


function checker(event){


        for (let key in errors)
        {
            if(errors[key]===1){
                console.log(key+'='+errors[key]);
                event.preventDefault();
            }
        }


}
