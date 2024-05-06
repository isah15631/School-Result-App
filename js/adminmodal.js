"use strict";

const modal = document.querySelector(".modal");
const modalInputs = document.querySelectorAll(".modalInput");
const editButtons = document.querySelectorAll(".edit");
const deleteButtons = document.querySelectorAll(".del")
const updateButton = document.querySelector("#updateButton");

const closeModal = document.querySelector(".closeModal");
editButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{

        e.preventDefault()
        modal.style.display="block";
        document.querySelector("#hidden_id").value=e.target.parentElement.parentElement.children[1].textContent;
        modalInputs[0].value=e.target.parentElement.parentElement.children[2].textContent;
        modalInputs[1].value=e.target.parentElement.parentElement.children[3].textContent;
        modalInputs[2].value=e.target.parentElement.parentElement.children[4].textContent;
        modalInputs[3].value=e.target.parentElement.parentElement.children[1].textContent;

        console.log(e.target.parentElement.parentElement.children[1].textContent);
    })
})

closeModal.addEventListener("click",(e)=>{
    e.preventDefault();
    modal.style.display="none";
})


deleteButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{
        if (confirm("delete record ?")) {
            fetch("deleteAdmin.php?id="+e.target.parentElement.parentElement.children[1].textContent,{
                method:"POST"
            }).then((res)=>{}).then((data)=>{
                e.target.parentElement.parentElement.remove()
            })    
        }
        
    })
})



updateButton.addEventListener("click",(e)=>{
    

    
    if (confirm("update record ?")) {
    
        document.querySelector("#updateForm").submit() 
    }else{
        e.preventDefault()
    }
})