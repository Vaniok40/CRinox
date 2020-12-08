
function button(){
    if(document.querySelectorAll(".work").length >= 5){
        document.querySelector(".check-more").style.display = "block";
    }
    
    else{
        document.querySelector(".check-more").style.display = "none";
    }
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
            button()
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



