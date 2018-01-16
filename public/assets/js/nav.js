function hamburger_click()
{
  var hamburgerElement = document.getElementById("hamburger");
  var menuElement = document.getElementById("menu");
 
  if(menuElement.style.display == "block"){
      console.log("ok");
      hamburgerElement.display = "block"
      menuElement.style.display = "none";
  }
    else{
        console.log("!!!!");
        menuElement.style.display = "block";

    }   
}

var hamburgerImg = document.getElementById("hamburger-img");
    hamburgerImg.addEventListener('click', hamburger_click);

