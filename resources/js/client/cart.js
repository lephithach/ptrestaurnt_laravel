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
const cartInputSoluong = cartTable.querySelectorAll("input.soluong");

if (cartTable != null) {
    cartInputSoluong.forEach((inputSoLuong) => {
        inputSoLuong.addEventListener("change", () => {
            let IDMonAn = inputSoLuong.dataset.id;
            let soluong = inputSoLuong.value;

            axios
                .get(`./cart/update-cart/${IDMonAn}/${soluong}`)
                .then(function (response) {
                    let status = response.data.status;
                    let message = response.data.message;
                    let link = response.data.link ?? null;

                    switch (status) {
                        case "warning":
                        // showModal();
                        // modalContent.innerText = message;
                        // modalButton.innerHTML = `<a href="${link}" class="btn-primary btn-sm">ĐĂNG NHẬP</a>`;
                        // break;

                        case "success":
                            let parentNode = inputSoLuong.parentNode.parentNode;
                            let donGia =
                                parentNode.querySelector(".dongia").dataset
                                    .dongia;
                            let thanhTien =
                                parentNode.querySelector(".thanhtien");

                            thanhTien.innerText = formatNumber(
                                soluong * donGia
                            );
                            break;

                        default:
                            // console.log(response.data);
                            break;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    });
}
