let acc = document.getElementsByClassName("plus-container");
acc = Array.from(acc);

acc.map(item => {
    item.addEventListener("click", () => {
        let panel = item.nextElementSibling;
        if (panel.style.display == "block") {
            item.firstElementChild.src = "img/blue-plus.svg"
            panel.style.display = "none";
          } 
        else {
            item.firstElementChild.src = "img/blue-minus.svg"
            panel.style.display = "block";
        }
    })
})
