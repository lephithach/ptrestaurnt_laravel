import "./bootstrap";
import axios from "axios";

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

// Modal control
const modalEl = document.querySelector(".modal");
const btnModalClose = document.querySelector(".modal .icon-close");

const openModal = () => {
    modalEl.classList.add("show");
};

const closeModal = () => {
    modalEl.classList.remove("show");
};

btnModalClose.addEventListener("click", () => {
    closeModal();
});

// Modal update dsmonan
const elList = document.querySelectorAll(".icon-edit");
const formDSMonAn = document.querySelector(".form");

if (elList != null) {
    elList.forEach((el) => {
        el.onclick = (e) => {
            let maLoai = e.target.getAttribute("data-maloai");
            openModal();

            axios
                .get(`/loai-mon/${maLoai}/edit`)
                .then(function (response) {
                    // handle success
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
                });

            let dataFetch = fetch(`/loai-mon/${maLoai}/edit`)
                .then((response) => response.json())
                .then((data) => data);

            console.log({ dataFetch });

            // formDSMonAn.querySelector(".maloai").value = dataFetch.maloai;
        };
    });
}
