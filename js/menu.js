"use strict";


const forms = document.querySelectorAll(".contentContainer");

const menuButtons = document.querySelectorAll(".menuItem");
const flag = document.querySelector("#flag")
const message = document.querySelector(".message");
const hour = document.querySelector(".hour");
const minute = document.querySelector(".minute");
const second = document.querySelector(".second");
const section = document.querySelector(".section");
const dayHolder = document.querySelector(".day");
const addTermForm = document.querySelector("#addTermForm")
const display = document.querySelector(".display");


// menuButtons[0].addEventListener("click",(event)=>{

//     // add term details form controller
//     event.preventDefault();
//     hideAllForms();
//     forms[0].style.display="block";
// })

// menuButtons[1].addEventListener("click",(event)=>{

//     //add single student form controller
//     event.preventDefault();
//     hideAllForms();
//     forms[1].style.display="block";
// })


// menuButtons[2].addEventListener("click",(event)=>{
//     //redirects to the student upload page
//     event.preventDefault();
//     window.location.href="students-upload.php";
// })


// menuButtons[3].addEventListener("click",(event)=>{
//     //redirects to the student records page
//     event.preventDefault();
//     window.location.href="view-students.php";
// })


// menuButtons[4].addEventListener("click",(event)=>{

//     //add single student form controller
//     event.preventDefault();
//     hideAllForms();
//     forms[2].style.display="block";
// })


// menuButtons[5].addEventListener("click",(event)=>{
//     //redirects to the student records page
//     event.preventDefault();
//     window.location.href="subjects.php";
// })


// menuButtons[6].addEventListener("click",(event)=>{

//     //process students scores in a subject
//     event.preventDefault();
//     hideAllForms();
//     forms[3].style.display="block";
//     // removeOptions(subjectsFetcher)
// })
// menuButtons[7].addEventListener("click",(event)=>{

//     //process student pyschomotor perfromance
//     event.preventDefault();
//     hideAllForms();
//     forms[4].style.display="block";
// })


// menuButtons[8].addEventListener("click",(event)=>{
//     event.preventDefault()
//     // check results of students
//     hideAllForms();
//     forms[5].style.display="block";
// })


// menuButtons[9].addEventListener("click",(event)=>{

//     //register new admin
//     event.preventDefault();
//     hideAllForms();
//     forms[6].style.display="block";
// })



// menuButtons[10].addEventListener("click",(event)=>{
//     event.preventDefault()
//     //view registered admins

//     window.location.href="admins.php";
// })


function hideAllForms() {
    forms.forEach((form)=>{
        form.style.display="none";
    })

    document.querySelector(".display").style.display="none";
}


function formatTime(timeData) {
    if (timeData<10) {
        timeData = "0"+timeData;
    }
    return timeData;
}


function hours() {
    hour.textContent= formatTime(new Date().getHours());
    // setDay()
}

function minutes() {
    minute.textContent=formatTime(Number(new Date().getMinutes()));
}

function seconds() {
    second.textContent=formatTime(Number(new Date().getSeconds())+1);
}

function sections(){

    section.textContent=new Date().toLocaleTimeString().split(" ")[1];
}

function setDay() {
    let today = new Date().getDay();

    if (today===0) {
        today = "SUNDAY";
    }else if (today===1) {
        today = "MONDAY";
    }else if (today===2) {
        today = "TUESDAY";
    }else if (today===3) {
        today = "WEDNESDAY";
    }else if (today===4) {
        today = "THURSDAY";
    }else if (today===5) {
        today = "FRIDAY";
    }else{
        today = "SATURDAY";
    }
    dayHolder.textContent=today+" "+new Date().getDate()+", "+ new Date().getFullYear();
}

setInterval(() => {
    hours()
    minutes()
    seconds()
    sections()
}, 100);




// addTermForm.addEventListener("submit",(e)=>{
    
  
    
// })




// function hideMessage(message,messageType) {
    
//     if (messageType===1) {
//         message.style.background="green";
//     } else {
//         message.style.background="red";
//     }
//     setTimeout(() => {
        
//         message.style.display="none";
//     }, 2000);
// }



// function checkFlag() {
//     if (Number(flag.value)===1) {
//         message.style.display='block';
//         hideMessage(message,1);
//     }else if(Number(flag.value)===2){ 
//         message.style.display='block';

//         hideMessage(message,2);
//     }else{

//     }
//     flag.value=0;
// }


// checkFlag()


// const subjectsFetcher = document.querySelector("#grabSubjects")

// subjectsFetcher.addEventListener("click",(e)=>{
//     fetch("/fetch-subjects",{
//         method:"GET"
//     }).then((response)=>{return response.json()
//     }).then((data)=>{
//         if (((data.length+1)>subjectsFetcher.childElementCount) && subjectsFetcher.childElementCount!=1) {
//             removeOptions(subjectsFetcher)
//         }
//         if (subjectsFetcher.childElementCount===1) {
         
//         data.forEach((subject)=>{
//             let newOption = subjectOptionsMaker(subject.subject_name,subject.subject_name)
//             subjectsFetcher.appendChild(newOption)
//         })   
//         }
        
//     })
    
// })


// function subjectOptionsMaker(subject_name,subject_value) {
//     const optionElement = document.createElement("option");
//     optionElement.setAttribute("value",subject_value)
//     optionElement.innerHTML=subject_name
//     return optionElement
// }


// function removeOptions(subject) {
//     while(subject.children.length>1){
//         subject.lastElementChild.remove()        
//     }
    
// }

