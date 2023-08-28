function scrollNav(){
    var navbar = document.getElementById('nav');
    console.log(navbar);
    var scrollValue = window.scrollY;
    if(scrollValue >70){
      navbar.style.backgroundColor ='violet';
    }
    else{
        navbar.style.backgroundColor='aqua';
    }
 
}

window.addEventListener('scroll',scrollNav);

