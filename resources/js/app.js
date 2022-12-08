import "./bootstrap";

const subMenuList = document.querySelectorAll("#menu-left .main-menu .item");

subMenuList.forEach((menu) => {
    menu.onclick = (e) => {
        // Check isset attribute return boolean
        let isSubMenu = menu.getAttribute("sub-menu") ? true : false;

        // is true, show sub menu
        if (isSubMenu === true) {
            // e.preventDefault();
            let subMenuElement = menu.querySelector(".sub-menu");
            subMenuElement.classList.toggle("show");
        }
    };
});
