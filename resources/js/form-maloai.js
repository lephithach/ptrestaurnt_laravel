import axios from "axios";
import { openModal } from "./function";

// Modal update dsmonan
const btnUpdateMaLoaiList = document.querySelectorAll(".icon-edit") ?? null;
const formDSMonAn = document.querySelector(".form") ?? null;

if (btnUpdateMaLoaiList != null) {
    btnUpdateMaLoaiList.forEach((el) => {
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

// Handle form delete maloai
const iconDeleteMaLoaiList = document.querySelectorAll(
    ".btn-function .icon-delete"
);
iconDeleteMaLoaiList.forEach((iconDelete) => {
    iconDelete.addEventListener("click", (e) => {
        let maLoaiAttr = e.target.getAttribute("data-maloai");
        let token = document.head.querySelector('meta[name="csrf-token"]');

        let isComfirm = confirm(
            `Bạn có chắc chắn muốn xoá mã loại "${maLoaiAttr}"\nĐiều này sẽ khiến dữ liệu sẽ không thể khôi phục`
        );
        if (isComfirm == true) {
            axios
                .post(`./delete/${maLoaiAttr}`, {
                    _token: token,
                })
                .then(function (response) {
                    let data = response.data;

                    data.status == "success"
                        ? (alert("Xoá thành công"), location.reload())
                        : "";
                });
        }
    });
});
