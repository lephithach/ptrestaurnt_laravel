import axios from "axios";
import { modalContent, modalButton, showModal, hiddenModal } from "./modal";

// Add cart
const btnAddCartList = document.querySelectorAll(".btn-addcart");

btnAddCartList.forEach((btnAddCart) => {
    btnAddCart.addEventListener("click", (e) => {
        e.preventDefault();
        let targetElement = e.target.nextSibling.parentNode;
        let IDMonAn = targetElement.getAttribute("data-id");

        axios
            .post(`./cart/add-cart/${IDMonAn}`)
            .then(function (response) {
                let status = response.data.status;
                let message = response.data.message;
                let link = response.data.link ?? null;

                switch (status) {
                    case "warning":
                        showModal();
                        modalContent.innerText = message;
                        modalButton.innerHTML = `<a href="${link}" class="btn-primary btn-sm">ĐĂNG NHẬP</a>`;
                        break;

                    case "success":
                        showModal();
                        modalContent.innerText = message;
                        setTimeout(() => hiddenModal(), 1200);
                        break;

                    default:
                        console.log(response.data);
                        break;
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});

const formatNumber = (number) => {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

// Update cart
const cartTable = document.querySelector("table#cart");
const inputSoluongList = cartTable.querySelectorAll("input.soluong");

// Update after change value input
if (cartTable != null) {
    inputSoluongList.forEach((inputSoLuong) => {
        inputSoLuong.addEventListener("change", () => {
            let IDMonAn = inputSoLuong.dataset.id;
            let soluong = inputSoLuong.value;

            if (soluong < 1) {
                deleteCart(IDMonAn);
            } else {
                updateCart(IDMonAn, soluong, inputSoLuong);
            }
        });
    });
}

// // Update after click button increase - decrease
// if (cartTable != null) {
//     const btnDecreaseList = cartTable.querySelectorAll(".btn-tru");
//     const btnIncreaseList = cartTable.querySelectorAll(".btn-cong");

//     btnDecreaseList.forEach((btnDecrease) => {
//         btnDecrease.addEventListener("click", (e) => {
//             // decrease input soluong nextElementSibling
//             let parentNode = btnDecrease.parentNode;
//             let inputSoluong = parentNode.querySelector(".soluong");

//             let decrease = inputSoluong.value - 1;

//             inputSoluong.value = decrease;

//             inputSoluong.setAttribute("value", decrease);
//             console.log(decrease);

//             // let el = btnDecrease.nextElementSibling;
//             // eltru = el.value--;

//             // el = eltru;
//             // el.setAttribute("value", eltru);
//             // console.log(btnDecrease.nextElementSibling.value);
//         });
//     });
// }

const deleteCart = (IDMonAn) => {
    axios
        .get(`./cart/delete-cart/${IDMonAn}`)
        .then(function (response) {
            let status = response.data.status;
            // let message = response.data.message;
            // let link = response.data.link ?? null;

            switch (status) {
                case "warning":
                // showModal();
                // modalContent.innerText = message;
                // modalButton.innerHTML = `<a href="${link}" class="btn-primary btn-sm">ĐĂNG NHẬP</a>`;
                // break;

                case "success":
                    location.reload();
                    break;

                default:
                    break;
            }
        })
        .catch(function (error) {
            console.log(error);
        });
};

const updateCart = (IDMonAn, soluong, inputSoLuong) => {
    axios
        .get(`./cart/update-cart/${IDMonAn}/${soluong}`)
        .then(function (response) {
            let status = response.data.status;

            switch (status) {
                case "success":
                    let parentNode = inputSoLuong.parentNode.parentNode;
                    let donGia =
                        parentNode.querySelector(".dongia").dataset.dongia;
                    let thanhTien = parentNode.querySelector(".thanhtien");

                    // Update thanh tien
                    thanhTien.innerText = formatNumber(soluong * donGia);
                    break;

                default:
                    break;
            }
        })
        .catch(function (error) {
            console.log(error);
        });
};

// Delete product on cart
const btnDeleteList = cartTable.querySelectorAll(".btn-function .btn-delete");

btnDeleteList.forEach((btn) => {
    btn.addEventListener("click", () => {
        let IDMonAn = btn.dataset.maloai;
        deleteCart(IDMonAn);
    });
});
