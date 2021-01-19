function writeNew(){
    document.querySelector(".feedback-form").style.display = "block"
}

function resetStarColor(){
    $(".star").removeClass("fa").removeClass("star2").addClass("far");
}

function setStar(max){
    for(let i = 0; i <= max; i++){
        $(".star:eq("+i+")").removeClass("far").addClass("fa").addClass("star2")
    }
}

let ratedIndex = -1

$(document).ready(function(){
    $(".star").on("click", function(){
        resetStarColor()
        ratedIndex = parseInt($(this).data("index"))
        setStar(ratedIndex)
    })

    $(".star").mouseover(function(){
        resetStarColor()
        let currentIndex = parseInt($(this).data("index"))
        setStar(currentIndex)
    })

    $(".star").mouseleave(function(){
        if(ratedIndex == -1){
            resetStarColor()
        }   
    })
})

function addComment(id){
    if(ratedIndex == -1){
        window.location.href = `product.php?id=${id}&err=0`
    }
    else{
        let formData = new FormData()
        formData.append('id', id)
        formData.append('nume', document.getElementById("name").value)
        formData.append('email', document.getElementById("email").value)
        formData.append('comment', document.getElementById("comment").value)
        formData.append('rate', ratedIndex)
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(this.readyState == 4 && this.status == 200){
                window.location.href = `product.php?id=${id}`
                alert("Recenzia Dvs. va fi postată odata ce va trece verificarea")
            }
        }
        xhr.open("POST","feedback.php",true);
        xhr.send(formData);
    }
    
}