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
            window.location.href=`catalog.php?category=${category}`
        }
    }
    xhr.open("GET",`catalog.php`,true);
    xhr.send();
}

let radioButtons = document.querySelectorAll("input[name='category']")
radioButtons = Array.from(radioButtons)
radioButtons.map(item => {
    item.addEventListener("change", (event) =>{
        AJAX_changeCategory(item.value)
    })
})



