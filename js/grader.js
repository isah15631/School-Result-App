"use strict";

const grader = document.querySelectorAll(".grader")
const totals = document.querySelectorAll(".totals")
const rank = Number(document.querySelector("#rank").textContent)
const comment_one = document.querySelector(".comment_one");
const comment_two = document.querySelector(".comment_two");

let c = 0;
totals.forEach((mark)=>{
    calculateGrades()
    grader[c].textContent=calculateGrades(mark.textContent)
    c++;
})


function calculateGrades(totalMarksScored) {

    let grade = ""
    totalMarksScored = Number(totalMarksScored)


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

    return grade;

}

function generateComment(position) {
    let comment;

    if (position === 1) {
        comment = "Top student! Keep up the excellent work!";
    } else if (position > 1 && position <= 5) {
        comment = "Great job! You're performing well.";
    } else if (position > 5 && position <= 10) {
        comment = "Good work! Your efforts are noticeable.";
    } else {
        comment = "Doing well, but there's room for improvement. Keep striving!";
    }

    return comment;
}

function generateCommentTwo(positionNumber) {
    let comment;

    if (positionNumber === 1) {
        comment = "Outstanding! Maintain the exceptional performance!";
    } else if (positionNumber > 1 && positionNumber <= 5) {
        comment = "Well done! You're consistently excelling.";
    } else if (positionNumber > 5 && positionNumber <= 10) {
        comment = "Good effort! Your dedication is noticeable.";
    } else {
        comment = "Solid performance, but there's always room to improve. Keep pushing!";
    }

    return comment;
}


function ranker(rank) {
    comment_one.innerHTML = "Principal's Comment : "+generateComment(rank);
    comment_two.innerHTML = "Form Master's Comment :"+generateCommentTwo(rank);
    if (rank<10) {
        if (rank===1) {
            document.querySelector("#rank").textContent="1st"
        }else if (rank===2) {
            
            document.querySelector("#rank").textContent="2nd"
        }else if (rank===3) {
            
            document.querySelector("#rank").textContent="3rd"
        }else{
            
            document.querySelector("#rank").textContent=rank+"th"
        }
    }else{
    
        if (rank<21) {
            document.querySelector("#rank").textContent=rank+"th"
        }else{
            if (rank.toString()[1]=='1') {
                document.querySelector("#rank").textContent=rank+"st"
                
            }else if(rank.toString()[1]=='2') {
                document.querySelector("#rank").textContent=rank+"nd"
                
            }else if(rank.toString()[1]=='3') {
                document.querySelector("#rank").textContent=rank+"rd"
                
            }else{
    
                document.querySelector("#rank").textContent=rank+"th"
            }
        }
    }
}

ranker(rank)



