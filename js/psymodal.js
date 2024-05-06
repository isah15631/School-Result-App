"use strict";

const modal = document.querySelector(".modal");
const modalInputs = document.querySelectorAll(".modalInput");
const editButtons = document.querySelectorAll(".edit");
const deleteButtons = document.querySelectorAll(".del")
const updateButton = document.querySelector("#updateButton");
const form = document.querySelector("#psyForm")
const searchInput = document.querySelector(".search");
const searchButton = document.querySelector(".upload");
const searchOptions = document.querySelectorAll(".regularSelect");
const saveButton = document.querySelector(".modalSubmit");
const psydom = document.querySelectorAll(".psydom");
const affdom = document.querySelectorAll(".affdom");


saveButton.addEventListener("click",(e)=>{
    let psy_flag = 0;
    let aff_flag = 0;

    for (let index = 0; index < psydom.length; index++) {
        const element = psydom[index];
        if (element.value=="") {
            psy_flag=1
        }
    }
    for (let index = 0; index < affdom.length; index++) {
        const element = affdom[index];
        if (element.value=="") {
            aff_flag=1n 
        }
    }
    if ((psy_flag==1) || (aff_flag==1)) {
        alert("You have to fill all fields before saving")
        e.preventDefault();
    }else{
        if (confirm("are you sure you want to save ?")) {
            form.submit();
        }else{
            e.preventDefault();
        }
    }
   
})

const closeModal = document.querySelector(".closeModal");
editButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{
      
        e.preventDefault()
        modal.style.display="block";
        document.querySelector("#nameOfStudent").innerHTML=e.target.parentElement.parentElement.children[1].textContent;
        document.querySelector("#hidden_id").value=e.target.parentElement.parentElement.children[2].textContent;
        document.querySelector("#hidden_class").value=e.target.parentElement.parentElement.children[3].textContent;
        document.querySelector("#hidden_subclass").value=e.target.parentElement.parentElement.children[4].textContent;
        document.querySelector("#hidden_year").value=e.target.parentElement.parentElement.children[5].textContent;
    
    })
})



closeModal.addEventListener("click",(e)=>{
    e.preventDefault();
    modal.style.display="none";
})

deleteButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{
        e.preventDefault()
        document.querySelector("#hidden_id").value=e.target.parentElement.parentElement.children[2].textContent;
        console.log(document.querySelector("#hidden_id").value);
        
        if (confirm("delete this record ? ")) {
            e.target.parentElement.parentElement.style.transition="300ms ease-in";
            e.target.parentElement.parentElement.style.left="1500px";
            console.log(document.querySelector("#hidden_id").value);
            setTimeout(() => {
                window.location.href="psychomotor.php";
            }, 500);
            fetch("deletePsychomotor.php?id="+document.querySelector("#hidden_id").value,{
                method:"POST"
            }).then((res)=>{})
        }
    })
})



// updateButton.addEventListener("click",(e)=>{
//     e.preventDefault()

//     if (confirm("are you sure you want to update ? ")) {
    
//        modal.style.display="none";
//       setTimeout(() => {
         
//       form.submit()
//       }, 1000);
//     }
// })




