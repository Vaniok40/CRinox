function openConfirm(id){
    document.querySelector(".background").style.display = "block"
    document.querySelector(".overlay").style.display = "block"
    document.querySelector(".confirm-delete").addEventListener("click", function(e) {
        e.preventDefault()
        window.location.href = `deleteProduct.php?id=${id}`
    })
}

function closeConfirm(){
    document.querySelector(".background").style.display = "none"
    document.querySelector(".overlay").style.display = "none"
}


