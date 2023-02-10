import "./bootstrap";

const subMenuList = document.querySelectorAll("#menu-left .main-menu .item");
const listText = document.querySelectorAll(
    "#menu-left .main-menu .item .btn-menu span"
);

subMenuList.forEach((menu) => {
    menu.addEventListener("click", (e) => {
        // Show sub menu
        // Check isset attribute return boolean
        let isSubMenu = menu.getAttribute("sub-menu") ? true : false;

        // is true, show sub menu
        if (isSubMenu === true) {
            // e.preventDefault();
            let subMenuElement = menu.querySelector(".sub-menu");
            subMenuElement.classList.toggle("show");
        }
        // End show sub menu

        // Minimize menu left
        let isMinimize = menu.dataset.minimize ? true : false;

        if (isMinimize) {
            document.querySelector("#menu-left").style.maxWidth = "40px";
            listText.forEach((item) => {
                item.style.display = "none";
            });
        }
    });
});

// Toast control
const containerToast = document.querySelector(".container-toast");
const toastList = containerToast?.querySelectorAll(".toast");

if (toastList?.length > 0) {
    toastList.forEach((toast) => {
        // Click button close toast
        // toast.querySelector(".icon-close").addEventListener("click", () => {
        //     closeToast(toast);
        // });
        toast.querySelector(".icon-close").onclick = () => {
            closeToast(toast);
        };

        // Auto hide after 5s
        setTimeout(() => {
            closeToast(toast);
        }, 5000);
    });
}

const closeToast = (toastElement) => {
    toastElement.classList.remove("show");
};

// Minimize menu left
// const listItemMenuLeft = document.querySelectorAll("#menu-left .item");
