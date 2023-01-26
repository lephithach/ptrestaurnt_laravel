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
