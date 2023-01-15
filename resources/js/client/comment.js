import axios from "axios";
import { modalProduct, alertMessage } from "./show-modal-product";

const commentBox = modalProduct.querySelector(".comment-container #comment");
const btnAddComment = modalProduct?.querySelector(".btn-addcommet");

// lỗi
btnAddComment.addEventListener("click", () => {
    let commentText = commentBox.value;

    axios
        .post(`./comment/add`, {
            commentText: commentText,
        })
        .then(function (response) {
            let data = response.data;

            console.log(data);
        });
});
