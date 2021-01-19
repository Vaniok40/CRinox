let limit = 10

function button(){
    if(document.querySelectorAll(".work").length >= 10){
        let works = document.querySelectorAll(".works-grid>div")
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
    let works = document.querySelectorAll(".works-grid>div")
    works = Array.from(works)
    works.map(item => {
        item.style.display = "none";
    })
}


function showProductsByLimit(){
    let works = document.querySelectorAll(".works-grid>div")
    works = Array.from(works)
    works.map((item,index) => {
        if(index < limit){
            item.style.display = "block";
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



let categories = document.getElementsByClassName("category-name")
categories = Array.from(categories)

function deselect(){
    categories.map(item => {
        item.classList.remove("selected-category")
    })
}

categories.map(item => {
    item.addEventListener("click", () =>{
        deselect()
        item.classList.add("selected-category")
    })
})

function AJAX_changeCategory(category){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(this.readyState == 4 && this.status == 200)
        {
            document.querySelector(".works-grid").innerHTML = this.responseText;
            limit = 10
            button()
            hideProducts()
            showProductsByLimit()            
        }
    }
    xhr.open("GET",`userSelectCategory.php?category=${category}`,true);
    xhr.send();
}

let radioButtons = document.querySelectorAll("input[name='category']")
radioButtons = Array.from(radioButtons)
radioButtons.map(item => {
    item.addEventListener("click", () =>{
        AJAX_changeCategory(item.value);
    })
})



