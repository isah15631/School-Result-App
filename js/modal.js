"use strict";

const modal = document.querySelector(".modal");
const modalInputs = document.querySelectorAll(".modalInput");
const editButtons = document.querySelectorAll(".edit");
const deleteButtons = document.querySelectorAll(".del")
const updateButton = document.querySelector("#updateButton");
const form = document.querySelector("#updateForm")
const searchInput = document.querySelector(".search");
const searchButton = document.querySelector(".upload");
const searchOptions = document.querySelectorAll(".regularSelect");
const promoteButton = document.querySelector(".promote");
const totalStudents = document.querySelector(".totalContainer");



const closeModal = document.querySelector(".closeModal");
editButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{

        e.preventDefault()
        modal.style.display="block";
        document.querySelector("#hidden_id").value=e.target.parentElement.parentElement.children[2].textContent;
        modalInputs[0].value=e.target.parentElement.parentElement.children[1].textContent;
        modalInputs[1].value=e.target.parentElement.parentElement.children[3].textContent;
        modalInputs[2].value=e.target.parentElement.parentElement.children[4].textContent;
        modalInputs[3].value=e.target.parentElement.parentElement.children[5].textContent;
    })
})



closeModal.addEventListener("click",(e)=>{
    e.preventDefault();
    modal.style.display="none";
})



updateButton.addEventListener("click",(e)=>{
    e.preventDefault()

    if (confirm("are you sure you want to update ? ")) {
    
       modal.style.display="none";
      setTimeout(() => {
        
      form.submit()
      }, 1000);
    }
})


deleteButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{
        e.preventDefault()
        document.querySelector("#hidden_id").value=e.target.parentElement.parentElement.children[2].textContent;
        console.log(document.querySelector("#hidden_id").value);
        
        if (confirm("delete this record ? ")) {
            
            e.target.parentElement.parentElement.style.transition="300ms ease-in";
            e.target.parentElement.parentElement.style.left="1500px";
            setTimeout(() => {
                
            e.target.parentElement.parentElement.remove()
            }, 500);
            fetch("deleteStudent.php?id="+document.querySelector("#hidden_id").value,{
                method:"POST"
            }).then((res)=>{})
        }
    })
})

searchInput.addEventListener("keyup",(e)=>{
    let count = 0;
    for (let index = 0; index < document.querySelector("tbody").children.length; index++) {
        if (document.querySelector("tbody").children[index].children[2].textContent.includes(searchInput.value)) {
            document.querySelector("tbody").children[index].style.transition='500ms ease-in';
            document.querySelector("tbody").children[index].style.display='table-row';
            document.querySelector("tbody").children[index].style.left='0px';
            

        }else{
            
            document.querySelector("tbody").children[index].style.left='1500px';
            document.querySelector("tbody").children[index].style.display='none';
            
            
        }
        
    }
   
})



// searchButton.addEventListener("click",(e)=>{
//     e.preventDefault()
  

//     let year = searchOptions[0].value
//     let stud_class = searchOptions[1].value.toLocaleUpperCase();
//     let sub_class = searchOptions[2].value.toLocaleUpperCase();

//     console.log(year);
//     console.log(stud_class);
//     console.log(sub_class);
//     if (year!="" && stud_class!="" && sub_class!="") {
        
//             filterByYearAndClassAndSubClass(year,stud_class,sub_class)

//     }else if (year!="" && stud_class!="") {
        
//      filterByYearAndClass(year,stud_class) 

//     }else if (year!="" && sub_class!="") {

//         filterByYearAndSubClass(year,sub_class)
//     }else if (year!="") {
//      filterByYear(year)  
//     }else{
//         window.location.reload()
//     }

// })


function filterByYear(set) {
 
    for (let index = 0; index < document.querySelector("tbody").children.length; index++) {
        if (document.querySelector("tbody").children[index].children[5].textContent.includes(set)) {
            document.querySelector("tbody").children[index].style.transition='500ms ease-in';
            document.querySelector("tbody").children[index].style.display='table-row';
            
                
            document.querySelector("tbody").children[index].style.left='0px';
            

        }else{
            
            document.querySelector("tbody").children[index].style.left='1500px';
            
                
            document.querySelector("tbody").children[index].style.display='none';
            
        }
        
    }
    
}

function filterByYearAndClass(set,year) {
 
    for (let index = 0; index < document.querySelector("tbody").children.length; index++) {
        console.log(document.querySelector("tbody").children[index].children[3].textContent);
        if (document.querySelector("tbody").children[index].children[5].textContent.includes(set) && 
        document.querySelector("tbody").children[index].children[3].textContent.includes(year)) {
            document.querySelector("tbody").children[index].style.transition='500ms ease-in';
            document.querySelector("tbody").children[index].style.display='table-row';
            
                
            document.querySelector("tbody").children[index].style.left='0px';
            

        }else{
            
            document.querySelector("tbody").children[index].style.left='1500px';
            
                
            document.querySelector("tbody").children[index].style.display='none';
            
        }
        
    }
    
}


function filterByYearAndClassAndSubClass(set,main_class,subclass) {
 
    for (let index = 0; index < document.querySelector("tbody").children.length; index++) {
        if (document.querySelector("tbody").children[index].children[5].textContent.includes(set) && 
        document.querySelector("tbody").children[index].children[3].textContent.includes(main_class) && 
        document.querySelector("tbody").children[index].children[4].textContent.includes(subclass)) {
            document.querySelector("tbody").children[index].style.transition='500ms ease-in';
            document.querySelector("tbody").children[index].style.display='table-row';
            
                
            document.querySelector("tbody").children[index].style.left='0px';
            

        }else{
            
            document.querySelector("tbody").children[index].style.left='1500px';
            
                
            document.querySelector("tbody").children[index].style.display='none';
            
        }
        
    }
    
}
function filterByYearAndSubClass(set,subclass) {
 
    for (let index = 0; index < document.querySelector("tbody").children.length; index++) {
        if (document.querySelector("tbody").children[index].children[5].textContent.includes(set) && 
        document.querySelector("tbody").children[index].children[4].textContent.includes(subclass)) {
            document.querySelector("tbody").children[index].style.transition='500ms ease-in';
            document.querySelector("tbody").children[index].style.display='table-row';
            
                
            document.querySelector("tbody").children[index].style.left='0px';
            

        }else{
            
            document.querySelector("tbody").children[index].style.left='1500px';
            
                
            document.querySelector("tbody").children[index].style.display='none';
            
        }
        
    }
    
}

promoteButton.addEventListener("click",(e)=>{
    e.preventDefault()
    let updateStudents = []
    for (let index = 0; index < document.querySelector("tbody").children.length; index++) {
        const element = document.querySelector("tbody").children[index];
        
        if (element.style.display!="none") {
            updateStudents.push(element.children[2].textContent);
        }
}


        if (confirm("are you sure you want to promote them ?")) {
            
            document.querySelector("#promotion_list").value=updateStudents;
            document.querySelector("#promotion_class").value=prompt("what class do you : ?")
  
           console.log(document.querySelector("#promotion_list").value); 
           console.log(document.querySelector("#promotion_class").value);

           document.querySelector("#promotion_form").submit()

}
})