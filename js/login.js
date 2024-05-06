"use strict";

const button = document.querySelector("button");


let prevText = button.textContent;
button.addEventListener("mouseover",(e)=>{
    e.preventDefault();
    button.innerHTML="&rAarr;";
})

button.addEventListener("mouseout",(e)=>{
    e.preventDefault()
    button.innerHTML=prevText;
})