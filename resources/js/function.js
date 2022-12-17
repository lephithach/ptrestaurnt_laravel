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

// Section Preview product
const readURL = (input, output) => {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            output.setAttribute("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
};

// Change input image
const imageInput = document.querySelector("#hinh");
const imageOutput = document.querySelector("#product-image");
// Check exist
if (imageInput) {
    imageInput.addEventListener("change", () =>
        readURL(imageInput, imageOutput)
    );
}

// Change product name, product price realtime
const productNameInput = document.querySelector(".form .form-group #tenmon");
const productNameOutput = document.querySelector(
    ".preview-product .product-name"
);
const productPriceInput = document.querySelector(".form .form-group #dongia");
const productPriceOutput = document.querySelector(
    ".preview-product .product-price"
);

export const formatNumber = (number) => {
    let NumberFormat = new Intl.NumberFormat();
    return NumberFormat.format(number);
};

// Check exist
if (productNameInput)
    productNameInput.addEventListener("input", () => {
        productNameOutput.innerHTML = productNameInput.value;
    });
if (productPriceInput)
    productPriceInput.addEventListener("input", () => {
        productPriceOutput.innerHTML = formatNumber(productPriceInput.value);
    });

// EndSection Preview product
