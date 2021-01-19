let imgs = []
let number = 0
let images = document.querySelectorAll(".additive-images>img")
images = Array.from(images)

function closeDropdown(){
    document.querySelector(".dropdown-content").style.display = "none"
}

function firstInMain(){
    let initial = document.getElementById("img1").src
    document.getElementById("main-image").src = initial
}

function hideShowAdditive(){
    let additive = document.querySelectorAll(".additive-images>img");
    additive = Array.from(additive)
    let counter = 0
    additive.map(item => {
        if(item.getAttribute("src") == ""){
            item.style.display = "none"
        }
        else{
            item.style.display = "block"
            counter++
        }
    })
    if(counter == 4){
        document.getElementById("label").style.display="none"
    }
    else{
        document.getElementById("label").style.display="block"
    }
}

hideShowAdditive()

images.map(function(item, index){
    item.addEventListener("click", () =>{
        document.getElementById("main-image").src = item.src
        number = index
    })
})

document.querySelector(".options").addEventListener("click", function(){
    if(document.querySelector(".dropdown-content").style.display == "block"){
        document.querySelector(".dropdown-content").style.display = "none"
    }
    else{
        document.querySelector(".dropdown-content").style.display = "block"
    }
})

function loadFile(event, id) {
    let formData = new FormData();
    formData.append("id", id);
    formData.append("file", file.files[0])
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            window.location.reload()
       }
    };
    xhttp.open("POST", `addImgController.php`, true);
    xhttp.send(formData);
}

function deleteImage(id){
    let formData = new FormData();
    formData.append("id", id)
    formData.append("index", number)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            window.location.reload()
       }
    };
    xhttp.open("POST", `deleteImgController.php`, true);
    xhttp.send(formData);
}

function setMain(id){
    let formData = new FormData();
    formData.append("id", id)
    formData.append("index", number)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            window.location.reload()
       }
    };
    xhttp.open("POST", `setMainController.php`, true);
    xhttp.send(formData);
}





