const modalProduct = document.querySelector(".modal-product");
const productList = document.querySelectorAll(".product-container");
const alertMessage = modalProduct.querySelector(".alert-message");

export { modalProduct, alertMessage };

// Close modal
modalProduct
    .querySelector(".btn-close")
    .addEventListener("click", () => closeModalProduct());

const openModalProduct = (id, imgSrc, productName, productPrice) => {
    // add class show modal
    modalProduct.classList.add("show");

    // add btn id
    modalProduct.querySelector(".right .btn-addcart").dataset.id = id;
    // add link image
    modalProduct.querySelector(".left img").setAttribute("src", imgSrc);
    // add name product
    modalProduct.querySelector(".right .product-title").innerText = productName;
    // add price product
    modalProduct.querySelector(".right .product-price").innerText =
        productPrice;
};

const closeModalProduct = () => {
    modalProduct.classList.remove("show");

    // remove btn id
    modalProduct.querySelector(".right .btn-addcart").dataset.id = "";
    // remove link image
    modalProduct.querySelector(".left img").setAttribute("src", "");
    // remove name product
    modalProduct.querySelector(".right .product-title").innerText = "";
    // remove price product
    modalProduct.querySelector(".right .product-price").innerText = "";

    // hidden alert message
    alertMessage.classList.add("hidden");
};

productList.forEach((productEl) => {
    productEl.addEventListener("click", () => {
        let id = productEl.dataset.id;
        let imgSrc = productEl
            .querySelector(".product-image img")
            .getAttribute("src");
        let productName = productEl.querySelector(".product-title").textContent;
        let productPrice =
            productEl.querySelector(".product-price").textContent;

        openModalProduct(id, imgSrc, productName, productPrice);
    });
});
