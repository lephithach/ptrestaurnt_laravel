import axios from "axios";
import { stringify } from "postcss";

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
            // console.log(respone.data);

            let sectionMonAn = document.querySelector(".monan");

            data.forEach((item) => {
                html += `
                <div class="items">
                    <img src="${item.hinh}" alt="${item.tenmon}" />
                    <p>${item.tenmon}</p>
                </div>
                `;
            });

            sectionMonAn.innerHTML = html;
        });
};

// handle order
const listMonAn = document.querySelectorAll(".monan .items");
// var orderArray = [];

listMonAn.forEach((product) => {
    product.addEventListener("click", () => {
        let maMon = product.dataset.mamon;
        let soBan = document.querySelector("#ban").value;
        let orderArray = [];

        // get local storage
        if (localStorage.getItem(`orderTempBan${soBan}`)) {
            let orderTemp = JSON.parse(
                localStorage.getItem(`orderTempBan${soBan}`)
            );
            orderArray = orderTemp;

            orderArray += { maMon, soluong: 1 };

            console.log(orderArray);

            localStorage.setItem(
                `orderTempBan${soBan}`,
                JSON.stringify(orderArray)
            );
        } else {
            orderArray = { maMon, soluong: 1 };

            // save local storage
            localStorage.setItem(
                `orderTempBan${soBan}`,
                JSON.stringify(orderArray)
            );
        }

        // console.log(orderArray);

        // Dùng local storage :))

        // axios
        //     .post("./order", {
        //         maMon,
        //     })
        //     .then(function (respone) {
        //         console.log(respone);
        //     });

        // console.log(product);
    });
});
