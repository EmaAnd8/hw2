


const mailField = document.querySelector("#email");
const form_reg=document.querySelector("form")
const desc=document.querySelector("textarea");

mailField.addEventListener('blur', checkMail);
desc.addEventListener('blur', checkdesc);
form_reg.addEventListener('submit', checkAgreement);

let errors=[];

errors['Emailnonvalida']=1;
errors['desc non valida']=1;

function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkMail(event) {

    const mailDiv = event.currentTarget.parentNode.parentNode;

    if (event.currentTarget.value === '') {
        errors['Emailnonvalida']=1;
        console.log("Campo vuoto...")

        console.log(event.currentTarget.value);

        const successMessage = document.querySelector("#SuccessMail");
        if (successMessage !== null) {
            successMessage.remove();
        }

        const errorMessage2 = document.querySelector("#NotValidEmail");
        if(errorMessage2 !== null){

            errorMessage2.remove();
        }
        const errorMessage3= document.querySelector('#ExistingMail')

        if(errorMessage3!==null)
        {
            errorMessage3.remove();

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

    const mail = document.querySelector("#email");
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
        error.textContent ="Corri a login!";
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




function checkAgreement(event){

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


function checkdesc(event){
    const dsc=event.currentTarget.value;
    const div =event.currentTarget.parentNode.parentNode;
    const span=div.querySelectorAll('span');

    for(let sp of span)
    {
        sp.remove();
    }



    if(dsc===''){
        const error = document.createElement("span");
        error.classList.add("error");
        error.id = "NotValiddesc";
        error.textContent = "il campo descrizione non dovrebbe essere vuoto";
        div.appendChild(error);
        errors['desc non valida']=1;

    }else if(dsc.length<10)
    {
        const error = document.createElement("span");
        error.classList.add("error");
        error.id = "Notdesc";
        error.textContent = "il campo descrizione deve avere almeno 10 caratteri";
        div.appendChild(error);
        errors['desc non valida']=1;
    }
    else{
        errors['desc non valida']=0;
        const success = document.createElement("span");
        success.classList.add("ok");
        success.id ="Success";
        success.textContent ="desc ok";
        div.appendChild(success);
    }
}
