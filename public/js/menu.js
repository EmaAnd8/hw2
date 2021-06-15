const menu=document.querySelector('#menu');
menu.addEventListener('click',modal);



function modal(event)
{


    const modale=document.querySelector("#modal-view_1");
    modale.classList.remove("hidden");
    const footer=document.querySelector("footer");
    footer.classList.add("hidden");
    const main=document.querySelectorAll('main');
    for (let m of main)
    {
        m.classList.add('hidden');
    }
    document.body.classList.add('no-scroll');

    const header =document.querySelector("header");
    header.classList.add('hidden');
    const sec_2=document.querySelector("#profile");
    sec_2.classList.add("hidden");
    const sec_3 =document.querySelector("#menu");
    sec_3.classList.add("hidden");

    const sec =document.querySelector("#links");
    sec.classList.remove("hidden");
    sec.style.top=window.pageYOffset+'px';
    const img=modale.querySelector('img');
    img.addEventListener('click',ripristino);
    event.currentTarget.removeEventListener('click',modal);
}


function  ripristino(event)
{

    document.body.classList.remove('no-scroll');
    const sec =document.querySelector("#modal-view_1");
    sec.classList.add('hidden');
    const menu =document.querySelector("#menu");
    menu.addEventListener('click',modal);

    const main=document.querySelectorAll('main');
    for (let m of main)
    {
        m.classList.remove('hidden');
    }


    const page=document.querySelector("header");
    page.classList.remove("hidden");
    const footer=document.querySelector("footer");
    footer.classList.remove("hidden");

    const sec_3=document.querySelector("#profile");
    sec_3.classList.remove("hidden");
    const nav=document.querySelector("nav");
    nav.classList.remove("hidden");


}
