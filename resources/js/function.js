// Start - Modal control
const modalElement = document.querySelector(".modal") ?? null;

// Check exist modalElement
if (modalElement) {
    const btnModalClose = modalElement.querySelector(".icon-close");
    btnModalClose.addEventListener("click", () => {
        closeModal();
    });
}

export const openModal = () => {
    modalElement.classList.add("show");
};

export const closeModal = () => {
    modalElement.classList.remove("show");
};
// End - Modal control
