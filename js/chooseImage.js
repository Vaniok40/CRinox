let images = document.querySelectorAll(".additive-images>img")
images = Array.from(images)

images.map(function(item, index){
    item.addEventListener("click", () =>{
        document.querySelector(".product-image").src = item.src
    })
})