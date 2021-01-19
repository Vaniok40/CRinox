let feedbackLimit = 5

function button(){
    if(document.querySelectorAll(".one-comment").length >= 5){
        let works = document.querySelectorAll(".one-comment")
        if(works.length > feedbackLimit){
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
    let works = document.querySelectorAll(".one-comment")
    works = Array.from(works)
    works.map(item => {
        item.style.display = "none";
    })
}


function showProductsByLimit(){
    let works = document.querySelectorAll(".one-comment")
    works = Array.from(works)
    works.map((item,index) => {
        if(index < feedbackLimit){
            item.style.display = "block";
        }
    })
}

function increment(){
    feedbackLimit += 5
    button()
    hideProducts()
    showProductsByLimit()
}

window.onload = function(){
    button()
    hideProducts()
    showProductsByLimit()
}
