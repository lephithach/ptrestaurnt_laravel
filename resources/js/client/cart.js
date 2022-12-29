import axios from "axios";

const btnAddCartList = document.querySelectorAll(".btn-addcart");

const productList = [1, 2, 3, 4];

btnAddCartList.forEach((btnAddCart) => {
    btnAddCart.addEventListener("click", (e) => {
        e.preventDefault();
        let targetElement = e.target.nextSibling.parentNode;
        let IDMonAn = targetElement.getAttribute("data-id");

        axios
            .post(`./cart/add-cart/${IDMonAn}`)
            .then(function (response) {
                if (response.data.status == "success") {
                    alert(response.data.message);
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});
