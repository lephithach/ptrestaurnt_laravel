import axios from "axios";

const modalProduct = document.querySelector(".modal-product");
const productList = document.querySelectorAll(".product-container");
const alertMessage = modalProduct.querySelector(".alert-message");
const commentElement = modalProduct.querySelector(".comment");

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

    document.querySelector("body").style.overflow = "hidden";

    // Show Comment
    // axios
    //     .get(`./comment`, { params: { id } })
    //     .then(function (response) {
    //         let data = response.data;
    //         let html = "";

    //         if (data.length > 0) {
    //             data.forEach((comment) => {
    //                 html += `
    //                     <li class="comment-container">
    //                         <div class="user-img">
    //                             <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="">
    //                         </div>

    //                         <div class="user-comment">
    //                             <div class="user-name">${comment.sdt["ten"]}</div>
    //                             <div class="user-content">${comment.comment}</div>
    //                         </div>
    //                     </li>
    //                 `;
    //             });

    //             commentElement.innerHTML = html;
    //         } else {
    //             commentElement.innerHTML = `<p>Chưa có nhận xét nào, bạn hãy để lại nhận xét nhé!</p>`;
    //         }
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //         // commentBox.classList.add("is-invalid");
    //         // showModal();
    //         // modalContent.innerText = error.response.data.message;
    //     });

    showComment(id);
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

    document.querySelector("body").style.overflow = "";
    commentElement.innerHTML = "";
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

const showComment = (id) => {
    axios
        .get(`./comment`, { params: { id } })
        .then(function (response) {
            let data = response.data;
            let html = "";

            if (data.length > 0) {
                data.forEach((comment) => {
                    html += `
                        <li class="comment-container">
                            <div class="user-img">
                                <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="">
                            </div>

                            <div class="user-comment">
                                <div class="user-name">${comment.sdt["ten"]}</div>
                                <div class="user-content">${comment.comment}</div>
                            </div>
                        </li>
                    `;
                });

                return (commentElement.innerHTML = html);
            } else {
                return (commentElement.innerHTML = `<p>Chưa có nhận xét nào, bạn hãy để lại nhận xét nhé!</p>`);
            }
        })
        .catch(function (error) {
            console.log(error);
            // commentBox.classList.add("is-invalid");
            // showModal();
            // modalContent.innerText = error.response.data.message;
        });
};

export { modalProduct, alertMessage, showComment };
