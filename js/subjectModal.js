"use strict";

const modal = document.querySelector(".modal");
const modalInputs = document.querySelectorAll(".modalInput");
const editButtons = document.querySelectorAll(".edit");
const deleteButtons = document.querySelectorAll(".del");
const updateButton = document.querySelector("#updateSubject");
const closeModal = document.querySelector(".closeModal");
const form = document.querySelector("#updateForm")
editButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{

        e.preventDefault()
        modal.style.display="block";
        document.querySelector("#hidden_id").value=e.target.parentElement.parentElement.children[1].textContent;
        modalInputs[0].value=e.target.parentElement.parentElement.children[2].textContent;
    })
})


closeModal.addEventListener("click",(e)=>{
    e.preventDefault();
    modal.style.display="none";
})

updateButton.addEventListener("click",(e)=>{
    e.preventDefault()
    if (confirm("are you sure you want to update ? ")) {
        form.submit()
    }
})


deleteButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{
        e.preventDefault();
        document.querySelector("#hidden_id").value=e.target.parentElement.parentElement.children[1].textContent;
        if (confirm("are you sure you want to delete ? ")) {
            fetch("deleteSubject.php?id="+document.querySelector("#hidden_id").value,{
                method:"POST"
            }).then((res)=>{}).then((res)=>{
                e.target.parentElement.parentElement.remove()
            })
        }
    })
})