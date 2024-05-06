"use strict";

const fileChooser = document.querySelector(".fileUploadInput");
const uploadButton = document.querySelector(".upload");
const tableBody = document.querySelector("tbody");
const header = document.querySelector(".datahead");
const uploaderButton = document.querySelector("#completeUpload")

uploaderButton.addEventListener("click",(e)=>{
    
    if (confirm("are you sure you want to save ?")) {
        document.querySelector("form").submit()
    }else{
        e.preventDefault()
    }
})

const reader =  new FileReader();

let csvData = [];


reader.onload =function (event) {
    csvData[0]=event.target.result;
}

uploadButton.addEventListener("click",(e)=>{
    e.preventDefault()
    reader.readAsText(fileChooser.files[0])

    header.style.visibility="visible";
    setTimeout(() => {
        let loopLength = csvData[0].split("\r\n").length-1
        for (let index = 0; index < loopLength; index++) {
            const element = csvData[0].split("\r\n")[index];
            
            const row = createTableRow()
            const column1 = createTableData()
            const column2= createTableData()
            const column3 = createTableData()
            const deleteButton = createNewDeleteButton()
            const newInput = createNewInput(element)

            column1.textContent=(index+1)
            column2.appendChild(newInput)
            column3.appendChild(deleteButton)
            

            row.appendChild(column1)
            row.appendChild(column2)
            row.appendChild(column3)

            
            tableBody.appendChild(row);  
            
        }
    }, 100);


    setTimeout(() => {
        document.querySelectorAll(".del").forEach((element)=>{
            element.addEventListener("click",(event)=>{
                event.preventDefault()
                if (confirm("are you sure you want to delete ?")) {
                    event.target.parentElement.parentElement.remove();
                }
        })
        })
    }, 200);
})


function createTableRow() {
    const newRow = document.createElement("tr")
    return newRow
}

function createTableData() {
    const newTd = document.createElement("td")
    return newTd   
}

function createNewDeleteButton() {
    const button = document.createElement("button");

    button.setAttribute("class","del");
    button.innerHTML="&times;";
    return button
}


function createNewInput(data){
    const input = document.createElement("input");
    input.setAttribute("type","text");
    input.setAttribute("class","regularInput");
    input.setAttribute("name","student_name[]");
    input.setAttribute("value",data.toLocaleUpperCase());
    return input
}

