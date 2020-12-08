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

