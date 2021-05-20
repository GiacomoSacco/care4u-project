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

function showLink(doctor){
    console.log(doctor);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "AJAXindex.php?function=", true);
    xhttp.send();
}
