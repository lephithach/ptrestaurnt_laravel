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
const modalEl = document.querySelector(".modal") ?? null;
const btnModalClose = document.querySelector(".modal .icon-close") ?? null;

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
const elList = document.querySelectorAll(".icon-edit") ?? null;
const formDSMonAn = document.querySelector(".form") ?? null;

if (elList != null) {
    elList.forEach((el) => {
        el.onclick = (e) => {
            let maLoai = e.target.getAttribute("data-maloai");
            document
                .querySelector(".form form")
                .setAttribute(
                    "data-maloai",
                    e.target.getAttribute("data-maloai")
                );
            openModal();

            axios.get(`/loai-mon/${maLoai}/edit`).then(function (response) {
                // handle success
                formDSMonAn.querySelector(".form-group #maloai").value =
                    response.data[0].maloai;

                formDSMonAn.querySelector(".form-group #tenloai").value =
                    response.data[0].tenloai;

                formDSMonAn
                    .querySelector("form")
                    .setAttribute("action", `/loai-mon/update/${maLoai}`);
            });
        };
    });
}

// Handle form update maloai
const formUpdateMaloai = document.querySelector(".modal #form-update-maloai");

formUpdateMaloai.addEventListener("keyup", () => {
    let maLoaiInput = formUpdateMaloai.querySelector(".form-group #maloai");
    let tenLoaiInput = formUpdateMaloai.querySelector(".form-group #tenloai");
    let errorMaLoai = false;
    let errorTenLoai = false;

    // Validation maloai
    if (maLoaiInput.value == "") {
        errorMaLoai = true;
        maLoaiInput.classList.add("is-invalid");
        maLoaiInput.nextElementSibling.innerHTML = "Không được để trống";
    } else if (maLoaiInput.value.length < 3) {
        errorMaLoai = true;
        maLoaiInput.classList.add("is-invalid");
        maLoaiInput.nextElementSibling.innerHTML = "Không được nhỏ hơn 3 ký tự";
    } else if (maLoaiInput.value.length > 10) {
        errorMaLoai = true;
        maLoaiInput.classList.add("is-invalid");
        maLoaiInput.nextElementSibling.innerHTML =
            "Không được lớn hơn 10 ký tự";
    } else {
        errorMaLoai = 0;
        maLoaiInput.classList.remove("is-invalid");
        maLoaiInput.nextElementSibling.innerHTML = null;
    }

    // Validation tenloai
    if (tenLoaiInput.value == "") {
        errorTenLoai = true;
        tenLoaiInput.classList.add("is-invalid");
        tenLoaiInput.nextElementSibling.innerHTML = "Không được để trống";
    } else if (tenLoaiInput.value.length < 3) {
        errorTenLoai = true;
        tenLoaiInput.classList.add("is-invalid");
        tenLoaiInput.nextElementSibling.innerHTML =
            "Không được nhỏ hơn 3 ký tự";
    } else {
        errorTenLoai = false;
        tenLoaiInput.classList.remove("is-invalid");
        tenLoaiInput.nextElementSibling.innerHTML = null;
    }

    if (errorMaLoai == false && errorTenLoai == false) {
        formUpdateMaloai
            .querySelector("input[type='submit']")
            .classList.remove("disabled");
        formUpdateMaloai
            .querySelector("input[type='submit']")
            .removeAttribute("disabled");
    } else {
        formUpdateMaloai
            .querySelector("input[type='submit']")
            .classList.add("disabled");
        formUpdateMaloai
            .querySelector("input[type='submit']")
            .setAttribute("disabled", true);
    }
});

// Toast control
const containerToast = document.querySelector(".container-toast");
const toastList = containerToast.querySelectorAll(".toast");

if (toastList.length > 0) {
    toastList.forEach((toast) => {
        // Click button close toast
        toast.querySelector(".icon-close").addEventListener("click", () => {
            closeToast(toast);
        });

        // Auto hide after 5s
        setTimeout(() => {
            closeToast(toast);
        }, 5000);
    });
}

const closeToast = (toastElement) => {
    toastElement.classList.remove("show");
};
