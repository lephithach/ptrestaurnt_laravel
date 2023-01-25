import axios from "axios";
import { modalContent, modalButton, showModalAlert } from "./modal";
import { modalProduct, alertMessage } from "./show-modal-product";
("./show-modal-product");

modalProduct.querySelector(".btn-addcart").addEventListener("click", (e) => {
    let IDMonAn = e.target.dataset.id;

    axios
        .post(`./cart/add-cart/${IDMonAn}`)
        .then(function (response) {
            let status = response.data.status;
            let message = response.data.message;
            let link = response.data.link ?? null;

            switch (status) {
                case "warning":
                    showModalAlert();
                    modalContent.innerText = message;
                    modalButton.innerHTML = `<a href="${link}" class="btn-primary btn-sm">ĐĂNG NHẬP</a>`;
                    break;

                case "success":
                    alertMessage.classList.remove("hidden");
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

// Add cart
// const btnAddCartList = document.querySelectorAll(".btn-addcart");

// btnAddCartList.forEach((btnAddCart) => {
//     btnAddCart.addEventListener("click", (e) => {
//         e.preventDefault();
//         let targetElement = e.target.nextSibling.parentNode;
//         let IDMonAn = targetElement.getAttribute("data-id");

//         axios
//             .post(`./cart/add-cart/${IDMonAn}`)
//             .then(function (response) {
//                 let status = response.data.status;
//                 let message = response.data.message;
//                 let link = response.data.link ?? null;

//                 switch (status) {
//                     case "warning":
//                         showModalAlert();
//                         modalContent.innerText = message;
//                         modalButton.innerHTML = `<a href="${link}" class="btn-primary btn-sm">ĐĂNG NHẬP</a>`;
//                         break;

//                     case "success":
//                         showModalAlert();
//                         modalContent.innerText = message;
//                         setTimeout(() => hiddenModal(), 1200);
//                         break;

//                     default:
//                         console.log(response.data);
//                         break;
//                 }
//             })
//             .catch(function (error) {
//                 console.log(error);
//             });
//     });
// });

const formatNumber = (number) => {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

// Update cart
const cartTable = document.querySelector("table#cart");

// Update after change value input
if (cartTable != null) {
    let inputSoluongList = cartTable?.querySelectorAll("input.soluong");

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
                // showModalAlert();
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
                    // Selector
                    let parentNode = inputSoLuong.parentNode.parentNode;
                    let donGia =
                        parentNode.querySelector(".dongia").dataset.dongia;
                    let thanhTien = parentNode.querySelector(".thanhtien");

                    // Update thanh tien
                    thanhTien.dataset.thanhtien = soluong * donGia;
                    thanhTien.innerText = formatNumber(soluong * donGia);

                    // Update tong tien
                    let thanhTienAll = cartTable.querySelectorAll(".thanhtien");
                    let tongTienEl = cartTable.querySelector(".tongtien");
                    let tongTien = 0;

                    thanhTienAll.forEach((item) => {
                        tongTien += item.dataset.thanhtien * 1;
                    });
                    tongTienEl.innerText = formatNumber(tongTien);
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
const btnDeleteList = cartTable?.querySelectorAll(".btn-function .btn-delete");

btnDeleteList?.forEach((btn) => {
    btn.addEventListener("click", () => {
        let IDMonAn = btn.dataset.maloai;
        deleteCart(IDMonAn);
    });
});

// Sort by
const filter = document.querySelector(".filter");
const sortBy = filter?.querySelector("#sortby");
const loaiMon = filter?.querySelector("#loaimon");

// console.log(filter);
if (filter) {
    filter.addEventListener("change", (e) => {
        // location.reload();
        window.location.href = `?sortby=${sortBy.value}&loaimon=${loaiMon.value}`;
    });

    // sortBy.addEventListener("change", (e) => {
    //     console.log(sortBy.value);
    // });

    // loaiMon.addEventListener("change", (e) => {
    //     console.log(loaiMon.value);
    // });
}
