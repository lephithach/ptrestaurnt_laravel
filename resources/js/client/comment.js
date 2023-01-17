import axios from "axios";
import { modalProduct, showComment } from "./show-modal-product";
import { modalAlert, modalContent, showModalAlert } from "./modal";

const commentBox = modalProduct.querySelector(".comment-container #comment");
const btnAddComment = modalProduct?.querySelector(".btn-addcomment");

// add new comment
btnAddComment?.addEventListener("click", () => {
    let commentText = commentBox.value.trim();
    let IDMonAn = modalProduct.querySelector(".btn-addcart").dataset.id;

    if (commentText.length == 0) {
        commentBox.classList.add("is-invalid");
        showModal();
        modalContent.innerText = "Không được để trống";
    } else {
        commentBox.classList.remove("is-invalid");

        axios
            .post(`./comment/add`, {
                commentText,
                IDMonAn,
            })
            .then(function (response) {
                let data = response.data;

                if (data.status == "danger") {
                    showModalAlert();
                    modalContent.innerText = data.message;
                } else {
                    showComment(IDMonAn);
                    commentBox.value = "";
                }

                // showModal();
                // modalContent.innerText = "Thêm bình luận thành công, ";
            })
            .catch(function (error) {
                console.log(error.response.data);
                commentBox.classList.add("is-invalid");
                showModalAlert();
                modalContent.innerText = error.response.data.message;
            });
    }
});
