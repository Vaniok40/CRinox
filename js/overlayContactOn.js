function overlayContactOn(){
        document.querySelector(".overlay").style.background = "rgba(0, 0, 0, 0.7)";
        document.querySelector(".x").style.display = "block";
        document.querySelector(".contact-us-overlay").style.display = "block";
}

function closeOverlay(){
    document.querySelector(".overlay").style.background = "rgba(0, 0, 0, 0.0)";
    document.querySelector(".x").style.display = "none";
    document.querySelector(".contact-us-overlay").style.display = "none";
}
