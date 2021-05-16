function showLinkUnlink() {
    console.log("funzia");
    var link = document.querySelectorAll(".linkcard");
    var unlink = document.querySelectorAll(".unlinkcard");
    if (link[0].style.display === "none") {
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