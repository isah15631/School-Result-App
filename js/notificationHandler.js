
const flag = document.querySelector("#flag")
const message = document.querySelector(".message");
function hideMessage(message,messageType) {
    
    if (messageType===1) {
        message.style.background="green";
    } else {
        message.style.background="red";
    }
    setTimeout(() => {
        
        message.style.display="none";
    }, 2000);
}



function checkFlag() {
    if (Number(flag.value)===1) {
        message.style.display='block';
        hideMessage(message,1);
    }else if(Number(flag.value)===2){ 
        message.style.display='block';

        hideMessage(message,2);
    }else{

    }
    flag.value=0;
}


checkFlag()