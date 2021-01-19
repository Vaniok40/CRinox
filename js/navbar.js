let url = window.location.href;
if(!url.includes("index.php") && url.charAt(url.length-1) != "/"){
     document.querySelector("#logo>img").src = "img/black-logo.svg";
    document.querySelector("nav>span>img").src = "img/phone-call-gray.svg";
    document.querySelector("nav>span>a").style.color = "#191B24";
    document.querySelector("div.nav").classList.add("nav-scroll");
    let links = document.querySelectorAll(".nav-list>li>a");
    links = Array.from(links);
    links.forEach(item => {
      item.style.color = "#191B24";
    })
    document.querySelector("div.nav").style.background = "white";
    document.querySelector(".burger").style.color = "black";
}

window.onscroll = function() {scroll()};

function scroll() {
  if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
    document.querySelector("#logo>img").src = "img/black-logo.svg";
    document.querySelector("nav>span>img").src = "img/phone-call-gray.svg";
    document.querySelector("nav>span>a").style.color = "#191B24";
    document.querySelector("div.nav").classList.add("nav-scroll");
    let links = document.querySelectorAll(".nav-list>li>a");
    links = Array.from(links);
    links.forEach(item => {
      item.style.color = "#191B24";
    })
    document.querySelector("div.nav").style.background = "white";
    document.querySelector(".burger").style.color = "black";
  } 
  else {
    if(url.includes("index.php") || url.charAt(url.length-1) == "/"){
    document.querySelector("#logo>img").src = "img/logo.svg";
    document.querySelector("nav>span>img").src = "img/phone-call.svg";
    document.querySelector("nav>span>a").style.color = "white";
    document.querySelector("div.nav").style.background = "transparent";
    document.querySelector("div.nav").classList.remove("nav-scroll");
    let links = document.querySelectorAll(".nav-list>li>a");
    links = Array.from(links);
    links.forEach(item => {
      item.style.color = "white";
    })
    document.querySelector(".burger").style.color = "white";
  }
  }
}