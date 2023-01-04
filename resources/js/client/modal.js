const modalAlert = document.querySelector(".modal-alert");
const modalContent = modalAlert.querySelector(".modal-content .content");
const btnCloseModal = modalAlert.querySelector("i.btn-close");

const showModal = () => {
    modalAlert.classList.add("show");
    document.querySelector("body").style.overflow = "hidden";
};

const hiddenModal = () => {
    modalAlert.classList.remove("show");
    document.querySelector("body").style = "";
};

btnCloseModal.addEventListener("click", (e) => {
    hiddenModal();
});

export { modalAlert, modalContent, showModal, hiddenModal };
