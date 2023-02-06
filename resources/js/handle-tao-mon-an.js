import axios from "axios";
import { formatNumber } from "./function";

// search ten mon an
const productNameInput = document.querySelector(".form .form-group #tenmon");
const productNameOutput = document.querySelector(
    ".preview-product .product-name"
);
const productPriceInput = document.querySelector(".form .form-group #dongia");
const productPriceOutput = document.querySelector(
    ".preview-product .product-price"
);
const imageInput = document.querySelector("#hinh");
const imageOutput = document.querySelector("#product-image");
const goiYElement = productNameInput.nextElementSibling;

const handleGoiY = (data = null) => {
    // Check data is not null
    if (data.length > 0) {
        goiYElement.classList.remove("hidden");
        let html = "";
        data.forEach((item) => {
            html += `
                <li
                    class="item"
                    data-tenmon="${item.tenmon}"
                    data-maloai="${item.maloai}"
                    >
                    ${item.tenmon}
                </li>`;
        });

        // Render HTML
        goiYElement.innerHTML = html;

        // click fill name
        productNameInput.nextElementSibling
            .querySelectorAll("li")
            .forEach((li) => {
                li.addEventListener("click", (e) => {
                    let tenmon = li.dataset.tenmon;
                    let maloai = li.dataset.maloai;
                    let maloaiEl = document.querySelectorAll("#maloai option");

                    // fill product name
                    productNameInput.value = tenmon;

                    maloaiEl.forEach((item) => {
                        if (item.getAttribute("value") === maloai) {
                            item.setAttribute("selected", "selected");
                        }
                    });

                    // console.log(tenmon, maloai);
                    goiYElement.classList.add("hidden");
                });
            });
    } else {
        goiYElement.classList.add("hidden");
    }
};

productNameInput.addEventListener("input", () => {
    if (productNameInput.value.length > 0) {
        axios
            .post("/admin/mon-an/get-name", {
                tenmon: productNameInput.value,
            })
            .then(function (response) {
                let data = response.data;
                console.log(data);
                // Call function
                handleGoiY(data);
            })
            .catch(function (error) {
                console.log(error);
            });
    } else {
        goiYElement.innerHTML = null;
        goiYElement.classList.add("hidden");
    }
});

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
// Check exist
if (imageInput) {
    imageInput.addEventListener("change", () =>
        readURL(imageInput, imageOutput)
    );
}

// Check exist
if (productNameInput)
    productNameInput.addEventListener("input", () => {
        productNameOutput.innerHTML = productNameInput.value;
    });
if (productNameInput)
    productNameInput.addEventListener("change", () => {
        productNameOutput.innerHTML = productNameInput.value;
    });
if (productPriceInput)
    productPriceInput.addEventListener("input", () => {
        productPriceOutput.innerHTML = formatNumber(productPriceInput.value);
    });

// EndSection Preview product
