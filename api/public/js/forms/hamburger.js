function toggleHamburger(){
    const menu = document.querySelector("#hamburger--content")
    // menu.style.display = menu.style.display == 'block' ? 'none' : 'block';
    menu.style.opacity = menu.style.opacity == '0' || !menu.style.opacity ? '1' : '0';
    menu.style.transform = menu.style.transform == 'translate(0px)' ? "translate(0, -200%)" : "translate(0px)";
}