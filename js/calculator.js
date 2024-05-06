"use strict";

const calculateButton = document.querySelector("#calculate");
const saveComputations = document.querySelector("#save");
const form = document.querySelector("#form")
saveComputations.setAttribute("disabled","disabled")
saveComputations.style.opacity=".3"

let firstCaScoreHolders = document.querySelectorAll(".ca1");
let secondCaScoreHolders = document.querySelectorAll(".ca2");
let examsScore = document.querySelectorAll(".exams");
let totalScoreHolders = document.querySelectorAll(".total");
let gradeHolders = document.querySelectorAll(".grade");
let positionHolders = document.querySelectorAll(".position");
let footer = document.querySelector(".footer");


if (firstCaScoreHolders.length===1) {
    window.location.reload()
}

calculateButton.addEventListener("click",(e)=>{
    e.preventDefault();
    saveComputations.removeAttribute("disabled")
    saveComputations.style.opacity="1"
    let first_ca_scores = [];
    let second_ca_scores = [];
    let exam_scores = [];
    let grades = [];
    let totalscores = []


    first_ca_scores =  filterScores(firstCaScoreHolders);
    second_ca_scores =  filterScores(secondCaScoreHolders);
    exam_scores = filterScores(examsScore);

    for (let index = 0; index < first_ca_scores.length; index++) {
        grades.push(calculateGrades(first_ca_scores[index],second_ca_scores[index],exam_scores[index])[0]);
        totalscores.push(calculateGrades(first_ca_scores[index],second_ca_scores[index],exam_scores[index])[1]);
    }

    displayer(gradeHolders,grades);
    displayer(totalScoreHolders,totalscores);
    positioner(totalscores,totalscores)

})


function filterScores(items) {
    let filteredScores = []
    items.forEach((item)=>{

            filteredScores.push(Number(item.value))

    })

    return filteredScores
}


function calculateGrades(ca1_score,ca2_score,exam_score) {

    let grade = ""
    let totalMarksScored = ca1_score+ca2_score+exam_score;

    let data = []

    if (totalMarksScored>=75) {
        grade = "A";
    } else if(totalMarksScored>=65){
        grade="B";
    } else if(totalMarksScored>=55){
        grade="C";
    } else if(totalMarksScored>=45){
        grade="D";
    } else if(totalMarksScored>=40){
        grade="E";
    }else{
        grade="F";
    }

    data[0] = grade;
    data[1]=totalMarksScored
    return data;

}


function displayer(item,data) {
    let index = 0;
    item.forEach((element)=>{

        element.value=data[index];
        index++;

    })
}


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
        const element = Number(document.querySelectorAll(".total")[i].value);
        
        for (let j = 0;  j < itemInPos.length; j++) {
            const ele = itemInPos[j];

            if (ele===element) {
                positionHolders[i].value=pos[j]
            }
        }
    }
}


saveComputations.addEventListener("click",(e)=>{
    
    if (confirm("submit records ? ")) {
        
    document.querySelector(".message").style.display="block";
    setTimeout(() => {
        
        form.submit()
    }, 1500);
    }else{e.preventDefault()}
    // fetch("/test-it/"+prev_count1+"/"+prev_count2,{
    //     method:"POST",
    // }).then((res)=>{}).then((data)=>{})
    
})



const prev_count1 = document.querySelector("#previous_result_ca1").value.split(",");
const prev_count2 = document.querySelector("#previous_result_ca2").value.split(",");
const prev_count3 = document.querySelector("#previous_result_exam").value.split(",");
const prev_count4 = document.querySelector("#previous_result_total").value.split(",");
const prev_count5 = document.querySelector("#previous_result_grade").value.split(",");
const prev_count6 = document.querySelector("#previous_result_position").value.split(",");

if (prev_count1[0]!="" && prev_count1.length!=1) {
    for (let index = 0; index < prev_count1.length; index++) {
        firstCaScoreHolders[index].value = Number(prev_count1[index]);
        secondCaScoreHolders[index].value = Number(prev_count2[index]);
        examsScore[index].value = Number(prev_count3[index]);
        totalScoreHolders[index].value = Number(prev_count4[index]);
        gradeHolders[index].value = prev_count5[index];
        positionHolders[index].value = Number(prev_count6[index])
    }
}

footer.innerHTML = "TOTAL = " + firstCaScoreHolders.length;




