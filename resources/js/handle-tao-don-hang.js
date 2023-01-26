import axios from "axios";

// click active tab filter
const tabFilter = document.querySelector(".tab-filter");
const tabItem = tabFilter?.querySelectorAll(".tab-item");

tabItem.forEach((item) => {
    item.addEventListener("click", () => {
        let index = item.getAttribute("tabindex");

        // check click self no action
        tabItem.forEach((item) => {
            let indexTemp = item.getAttribute("tabindex");

            if (index === indexTemp) return;

            item.classList.remove("active");
        });

        item.classList.add("active");

        getData(searchInput.value, item.dataset.maloai);
    });
});

// search
const searchInput = document.querySelector("#search");

searchInput.addEventListener("input", () => {
    tabItem.forEach((item) => {
        if (item.classList.contains("active")) {
            getData(searchInput.value, item.dataset.maloai);
        }
    });
});

const getData = (searchInput, maloai = "all") => {
    axios
        .post("./search", {
            searchInput: searchInput,
            maloai: maloai,
        })
        .then(function (respone) {
            let data = respone.data;
            let html = "";
            console.log(respone.data);

            let sectionMonAn = document.querySelector(".monan");

            data.forEach((item) => {
                html += `
                <div class="items">
                    <img src="http://127.0.0.1:8000/storage/images/products/${item.hinh}" alt="${item.tenmon}" />
                    <p>${item.tenmon}</p>
                </div>
                `;
            });

            sectionMonAn.innerHTML = html;
        });
};
