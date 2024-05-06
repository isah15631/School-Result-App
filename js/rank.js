"use strict";


const totalHolders = document.querySelectorAll(".total");
const positionHolders =  document.querySelectorAll(".rank");
const printButtons = document.querySelectorAll(".print");
const tbody = document.querySelector("tbody");
const subjects = document.querySelector("#subjects")
const subjects_ca1 = document.querySelector("#subjects_ca1")
const subjects_ca2 = document.querySelector("#subjects_ca2")
const subjects_exams = document.querySelector("#subjects_exam")
const subjects_total = document.querySelector("#subjects_total")
const subjects_position = document.querySelector("#subjects_positions")
const reportsheetform  = document.querySelector("#reportsheetform")
const exam_details = document.querySelectorAll(".exam_details")

let total_marks = []
totalHolders.forEach((total)=>{
    total_marks.push(Number(total.textContent))
})

function positioner(scores = [],originalPositions = []) {
    scores.sort((a, b) => b - a)
    let pos = [1]
    let itemInPos = [scores[0]]
    let offset =1
    for (let index = 0; index < scores.length-1; index++) {
        if (scores[index]===scores[index+1]) {
            pos.push(pos[index])
            itemInPos.push(itemInPos[index])
            offset+=1
        }else{
            pos.push(offset+1)
            itemInPos.push(scores[index+1])
            offset++
        }       
    }
    
    for (let i = 0; i < document.querySelectorAll(".total").length; i++) {
        const element = Number(document.querySelectorAll(".total")[i].textContent);
        
        for (let j = 0;  j < itemInPos.length; j++) {
            const ele = itemInPos[j];

            if (ele===element) {
                positionHolders[i].innerHTML=pos[j]
                printButtons[i].parentElement.setAttribute("href",
                printButtons[i].parentElement.getAttribute("href")+"&rank="+pos[j])
            }
        }
    }
}


positioner(total_marks,total_marks)
// printButtons.forEach((button)=>{
//     button.addEventListener("mouseover",(e)=>{
//         button.parentElement.setAttribute("href",button.parentElement.getAttribute("href")+)
//     })
// })

// printButtons.forEach((button)=>{


//     button.addEventListener("click",(e)=>{
//         e.preventDefault()

//     let subject_len = subjects_total.childElementCount
        
//     let stud_index = Number(e.target.parentElement.parentElement.children[0].textContent)-1;
//     removeElements()
//     const studentNameElement = createInput("student_name",e.target.parentElement.parentElement.children[1].textContent)
//     const studentRegnoElement = createInput("student_regno",e.target.parentElement.parentElement.children[2].textContent)
//     const studentRankElement = createInput("student_rank",positionHolders[stud_index].textContent)
//     const examTerm = createInput("exam_term",exam_details[0].value)
//     const examYear = createInput("exam_year",exam_details[1].value)
//     const examClass = createInput("exam_class",exam_details[2].value)
//     const examSubclass = createInput("exam_subclass",exam_details[3].value)
//     reportsheetform.appendChild(studentNameElement)
//     reportsheetform.appendChild(studentRegnoElement)
//     reportsheetform.appendChild(studentRankElement)
//     reportsheetform.appendChild(examTerm)
//     reportsheetform.appendChild(examYear)
//     reportsheetform.appendChild(examClass)
//     reportsheetform.appendChild(examSubclass)
//     console.log("ex -- 1ca -- 2ca ");
//     for (let index = 0; index < subject_len; index++) {
//         const exam_total = subjects_total.children[index].value.split(",")[stud_index];
//         const exam_score = subjects_exams.children[index].value.split(",")[stud_index];
//         const first_ca = subjects_ca1.children[index].value.split(",")[stud_index];
//         const second_ca = subjects_ca2.children[index].value.split(",")[stud_index];
//         const subjects_positions = subjects_position.children[index].value.split(",")[stud_index];

//         let subjectElement = createInput("subjects",subjects.children[index].value)
//         let firstCaElement = createInput("first_ca",first_ca)
//         let secondCaElement = createInput("second_ca",second_ca)
//         let examElement = createInput("exams",exam_score)
//         let totalElement = createInput("total_marks",exam_total)
//         let subjectPositionElement = createInput("subject_position",subjects_positions)


//         reportsheetform.appendChild(subjectElement)
//         reportsheetform.appendChild(firstCaElement)
//         reportsheetform.appendChild(secondCaElement)
//         reportsheetform.appendChild(examElement)
//         reportsheetform.appendChild(totalElement)
//         reportsheetform.appendChild(subjectPositionElement)
//         console.log(subjects.children[index].value +" -- "+exam_total +" -- "+first_ca +" -- "+second_ca +" - "+exam_score +" - "+subjects_positions)
//     }

    
//     reportsheetform.submit()
//     })
    

// })


function createInput(inputName,data) {
    const element = document.createElement("input")
    element.setAttribute("type","hidden")
    element.setAttribute("name",inputName)
    element.setAttribute("value",data)

    return element
}

function removeElements() {
    while (reportsheetform.childElementCount>0) {
        
        reportsheetform.lastElementChild.remove()
    }
}