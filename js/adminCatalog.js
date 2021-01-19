let limit = 10

function button(){
    if(document.querySelectorAll(".product").length >= 10){
        let works = document.querySelectorAll(".product")
        if(works.length > limit){
            document.querySelector(".check-more").style.display = "block";
        }
        else{
            document.querySelector(".check-more").style.display = "none";
        }
    }
    
    else{
        document.querySelector(".check-more").style.display = "none";
    }
}

function hideProducts(){
    let works = document.querySelectorAll(".product")
    works = Array.from(works)
    works.map(item => {
        item.style.display = "none";
    })
}

function showProductsByLimit(){
    let works = document.querySelectorAll(".product")
    works = Array.from(works)
    works.map((item,index) => {
        if(index < limit){
            item.style.display = "grid";
        }
    })
}

function increment(){
    limit += 10
    button()
    hideProducts()
    showProductsByLimit()
}

window.onload = function(){
    button()
    hideProducts()
    showProductsByLimit()
}

function addNew() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       window.location.href = "addNew.php"
      }
    };
    xhttp.open("POST", "addNew.php", true);
    xhttp.send();
}

function select(item) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector(".products-grid").innerHTML = this.responseText
        limit = 10
            button()
            hideProducts()
            showProductsByLimit()    
      }
    };
    xhttp.open("GET", `selectCategoryController.php?category=${item.value}`, true);
    xhttp.send();
}

function find(item) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector(".products-grid").innerHTML = this.responseText
      }
    };
    xhttp.open("GET", `findByNameController.php?name=${item.value}`, true);
    xhttp.send();
}

