
const searchInput = document.querySelector(".search");

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
