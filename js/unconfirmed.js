let limit = 5

function button(){
    if(document.querySelectorAll(".comment").length >= 5){
        let works = document.querySelectorAll(".comment")
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
    let works = document.querySelectorAll(".comment")
    works = Array.from(works)
    works.map(item => {
        item.style.display = "none";
    })
}


function showProductsByLimit(){
    let works = document.querySelectorAll(".comment")
    works = Array.from(works)
    works.map((item,index) => {
        if(index < limit){
            item.style.display = "grid";
        }
    })
}

function increment(){
    limit += 5
    button()
    hideProducts()
    showProductsByLimit()
}

window.onload = function(){
    button()
    hideProducts()
    showProductsByLimit()
}
