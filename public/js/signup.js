
const divMain = document.querySelector("#checker");

const usernameCheck = document.querySelector("#user");
const form_reg=document.querySelector("form");
const passwordCheck = document.querySelector("#pwd");
const mailField = document.querySelector("#e-mail");
const checkRules = document.querySelector("#accettazione");
const verifyMail = document.querySelector("#conferma_mail");
const verifyPassword = document.querySelector("#conferma_pwd");
verifyMail.addEventListener('blur', checkConfirmEmail);
verifyPassword.addEventListener('blur', checkConfirmPassword);
usernameCheck.addEventListener('blur', checkUsername);
passwordCheck.addEventListener('blur', checkPassword);
mailField.addEventListener('blur', checkMail);
form_reg.addEventListener('submit', checker);


function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function isEmpty(Field){

    return !/^[a-zA-Z0-9_]{1,15}$/.test(Field.value);
}

let errors =[];
errors['UsernameNonValido'] = 1;
errors['Emailnonvalida'] = 1;
errors['Password'] = 1;
errors['ConfirmMail'] = 1;
errors['ConfirmPassword'] = 1;

function checkUsername(event){

    const padre =event.currentTarget.parentNode.parentNode;
    if(isEmpty(usernameCheck)){
        errors['UsernameNonValido']=1;
        const successMessage = document.querySelector("#SuccessUsername");
        if(successMessage !== null){
            successMessage.remove();
        }

        const errorMessage = document.querySelector("#EmptyUser");
        if(errorMessage !== null){
            errorMessage.remove();
        }
        const error = document.createElement("span");
        error.textContent ="Il campo username non può essere vuoto!";
        error.id ="EmptyUser"
        error.classList.add("error");
        padre.appendChild(error);

    }else{
        const errorMessage = document.querySelector("#EmptyUser");
        if(errorMessage !== null){
            errorMessage.remove();

        }
        fetch('register/username/'+encodeURIComponent(usernameCheck.value)).then(onResponse).then(jsonCheckUsername);

    }

}

function jsonCheckUsername(json){
     const figlio =document.querySelector("#user");

    const padre=figlio.parentNode.parentNode;

    if(json.exists === true && !isEmpty(usernameCheck)){
        errors['UsernameNonValido']=1;
        const successMessage = document.querySelector("#SuccessUsername");
        if(successMessage !== null){
            successMessage.remove();
        }
        const errorMessage = document.querySelector("#ExistingUser");
        if(errorMessage === null){
            const error = document.createElement("span")
            error.textContent ="Username già esistente";
            error.id ="ExistingUser";
            error.classList.add("error");
            padre.appendChild(error);
        }


    }else{
        errors['UsernameNonValido']=0;
        const errorMessage = document.querySelector("#ExistingUser");
        if(errorMessage !== null){
            errorMessage.remove();
        }
        const successMessage = document.querySelector("#SuccessUsername");
        if(successMessage === null){
            const success = document.createElement("span");

            success.classList.add("ok");
            success.id = "SuccessUsername";
            success.textContent ="Username disponibile!";
            padre.appendChild(success);
        }

    }
}




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

function checkMail(event) {

    const mailDiv = event.currentTarget.parentNode.parentNode;

    if (event.currentTarget.value === '') {

       errors['Emailnonvalida']=1;

        const successMessage = document.querySelector("#SuccessMail");
        if (successMessage !== null) {
            successMessage.remove();
        }

        const errorMessage2 = document.querySelector("#NotValidEmail");
        if(errorMessage2 !== null){

            errorMessage2.remove();
        }

        const errorMessage = document.querySelector("#EmptyMail");
        if (errorMessage === null) {

            const error = document.createElement("span");
            error.textContent = "Il campo email non può essere vuoto!";
            error.id = "EmptyMail"
            error.classList.add("error");
            mailDiv.appendChild(error);

        }

    }else if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(mailField.value).toLowerCase())){

        errors['Emailnonvalida']=1;

        const successMessage = document.querySelector("#SuccessMail");
        if(successMessage !== null){
            successMessage.remove();
        }

        const errorMessage2 = document.querySelector("#NotValidEmail");
        if (errorMessage2 === null) {

            const error = document.createElement("span");
            error.classList.add("error");
            error.id = "NotValidEmail";
            error.textContent = "Formato non valido";
            mailDiv.appendChild(error);

        }

        const errorMessage3 = document.querySelector("#ExistingMail");
        if(errorMessage3 !== null){

            errorMessage3.remove();
        }
        const errorMessage4 = document.querySelector("#EmptyMail");
        if(errorMessage4 !== null){

            errorMessage4.remove();
        }

    } else {

        const errorRemove = document.querySelector("#EmptyMail");
        if (errorRemove !== null) {
            errorRemove.remove();

        }


        const errorRemove2 = document.querySelector("#NotValidEmail");
        if(errorRemove2 !==  null){
            errorRemove2.remove();
        }

        fetch("register/email/"+encodeURIComponent(event.currentTarget.value)).then(onResponse).then(jsonCheckMail);

    }



}


function jsonCheckMail(json){

    const mail = document.querySelector("#e-mail");
    const mailDiv =mail.parentNode.parentNode;
    console.log(json);
    if(json.exists === true && mail.value !== ''){

      errors['Emailnonvalida']=1;


        const successMessage = document.querySelector("#SuccessMail");
        if(successMessage !== null){
            successMessage.remove();
        }

        const errorMessage = document.querySelector("#ExistingMail");
        if(errorMessage !== null){

            errorMessage.remove();
        }



        const error = document.createElement("span");
        error.textContent ="Mail già in uso!";
        error.id = "ExistingMail";
        error.classList.add("error");
        mailDiv.appendChild(error);

    }else{
        errors['Emailnonvalida']=0;

        const errorMessage = document.querySelector("#ExistingMail");
        if(errorMessage !== null){
            errorMessage.remove();
        }

        const errorMessage2 = document.querySelector("#NotValidEmail");
        if(errorMessage2 !== null){

            errorMessage2.remove();
        }

        const successMessage = document.querySelector("#SuccessMail");
        if(successMessage === null){

            const success = document.createElement("span");
            success.classList.add("ok");
            success.id ="SuccessMail";
            success.textContent ="Email ok!";
            mailDiv.appendChild(success);
        }

    }

}




function checker(event){

    const checkbox = document.getElementById('accettazione');
    const div =checkbox.parentNode.parentNode;
    if(checkbox.checked === false){

        event.preventDefault();
        const not_accept=document.querySelector('#accepted');
        if(not_accept===null) {
            const error = document.createElement("span");
            error.id='accepted';
            error.classList.add("error");
            error.textContent = "accetta l'utilizzo dei dati personali";
            div.appendChild(error);
        }

    }else{
        const error=document.querySelector('#accepted');
        if (error!==null){
            error.remove();
        }
        for (let key in errors)
        {
            if(errors[key]===1){
                console.log(key+'='+errors[key]);
                event.preventDefault();
            }
        }
    }

}

function checkConfirmEmail(event){

   const padre=event.currentTarget.parentNode.parentNode;

    if(mailField.value === verifyMail.value){

        errors['ConfirmMail']=0;
        if(document.querySelector("#EmailsEqual") === null){
            const success = document.createElement("span");
            success.classList.add("ok");
            success.textContent ="Le email coincidono";
            success.id = "EmailsEqual";
            padre.appendChild(success);
        }

        const error = document.querySelector("#EmailsNotEqual");
        if(error !== null){
            error.remove();
        }

    }else{
        errors['ConfirmMail']=1;
        const success = document.querySelector("#EmailsEqual");
        if(success !== null){
            success.remove();
        }

        if(document.querySelector("#EmailsNotEqual") === null){
            const error = document.createElement("span");
            error.classList.add("error");

            error.textContent ="Le email non coincidono";
            error.id = "EmailsNotEqual";
            padre.appendChild(error);
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
