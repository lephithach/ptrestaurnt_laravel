import axios from "axios";
import { modalContent, showModal } from "./modal";

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

                switch (status) {
                    case "warning":
                        showModal();
                        modalContent.innerText = response.data.message;
                        break;

                    case "success":
                        showModal();
                        modalContent.innerText = response.data.message;
                        break;

                    default:
                        break;
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});
