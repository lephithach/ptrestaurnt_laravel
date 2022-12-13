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
// const formUpdateMaloai = formDSMonAn.querySelector("#form-update-maloai");

// formUpdateMaloai.addEventListener("submit", (e) => {
//     e.preventDefault();

//     let maLoaiAttr = document
//         .querySelector(".form form")
//         .getAttribute("data-maloai");
//     let maLoai = formDSMonAn.querySelector(".form-group #maloai").value;
//     let tenLoai = formDSMonAn.querySelector(".form-group #tenloai").value;

//     // axios
//     //     .post(`/loai-mon/update/${maLoaiAttr}`, {
//     //         _token: formDSMonAn.querySelector("input[type='hidden']").value,
//     //         maloai: maLoai,
//     //         tenloai: tenLoai,
//     //     })
//     //     .then(function (response) {
//     //         console.log(response);
//     //     });

//     axios({
//         method: "post",
//         url: `/loai-mon/update/${maLoaiAttr}`,
//         data: JSON.stringify({
//             _token: formDSMonAn.querySelector("input[type='hidden']").value,
//             maloai: maLoai,
//             tenloai: tenLoai,
//         }),
//     }).then((response) => {
//         console.log(response);
//     });
// });

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
