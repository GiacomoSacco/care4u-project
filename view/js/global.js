function showCommands(){
    let form = document.querySelector('.inputForm');
    let menu = document.querySelector("#menuIcon");
    console.log(form)
    if(form.style.display == 'none'){
        form.style.display = 'block';
        menu.className = "fa fa-angle-down";
    }else{
        form.style.display = 'none';
        menu.className = "fa fa-angle-up";
    }
}

//doctor
function showMyMeasurements(idpat){
    let cards = document.querySelectorAll('.card');
    cards.forEach((item, i) => {
        if(item.getAttribute("value") == idpat){item.style.display = "block";}
        else{item.style.display = "none";}
    });
    let showpatbutton = document.querySelector("#showpat");
    showpatbutton.disabled = false;
}
function showPatients(){
    let cards = document.querySelectorAll('.card');
    cards.forEach((item, i) => {
        if(item.getAttribute("value") == "patient"){item.style.display = "block";}
        else{item.style.display = "none";} 
    });
    let showpatbutton = document.querySelector("#showpat");
    showpatbutton.disabled = true;
}
function linkThisPat(codpat){
    if(confirm("Are you sure to link this patient?")){
        console.log("SIII")
        let input = document.querySelector('#linkPatInput');
        input.value = codpat;
        let form = document.querySelector('#linkPatForm');
        form.submit()
    }
}

//ADMIN
function showLinkUnlink() {
    var link = document.querySelectorAll(".linkcard");
    var unlink = document.querySelectorAll(".unlinkcard");
    var checkbox = document.querySelector("#checkboxLink");
    console.log(checkbox.checked);
    if (!checkbox.checked) {
        link.forEach((item, i) => {
            item.style.display = "block";
        });
        unlink.forEach((item, i) => {
            item.style.display = "none";
        });
    } else {
        link.forEach((item, i) => {
            item.style.display = "none";
        });
        unlink.forEach((item, i) => {
            item.style.display = "block";
        });
    }
  }

//LOGIN REGISTER
function showRegLog(c){
    let login = document.querySelector("#login")
    let register = document.querySelector("#register")
    let loginBTN = document.querySelector("#loginBTN")
    let registerBTN = document.querySelector("#registerBTN")

    switch(c){
        case "login":
            login.style.display = "block"
            register.style.display = "none"
            loginBTN.style.backgroundColor = "#5CDB95"
            registerBTN.style.backgroundColor = "#333"
            loginBTN.style.color = "#333"
            registerBTN.style.color = "#5CDB95"
            break;
        case "register":
            register.style.display = "block"
            login.style.display = "none"
            registerBTN.style.backgroundColor = "#5CDB95"
            loginBTN.style.backgroundColor = "#333"
            loginBTN.style.color = "#5CDB95"
            registerBTN.style.color = "#333"
            break;
    }
}