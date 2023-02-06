import axios from "axios";
import { formatNumber } from "./function";
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

// get list order render to bill preview
const billEl = document.querySelector(".bill");
const inputTongTienEl = document.querySelector(".total #tongtien");

const renderBillPreview = (soBan = 1) => {
    axios
        .get("./", {
            params: {
                soBan,
            },
        })
        .then(function (respone) {
            let data = respone.data;
            let html = "";
            let tongtien = 0;

            if (data != "") {
                // Loop data
                data.forEach((item) => {
                    tongtien += item.dongia * item.soluong;

                    html += `
                        <tr>
                            <td class="text-left">${item.tenmon}</td>

                            <td class="text-center">
                                <input
                                    class="w-full soluong"
                                    type="number"
                                    value="${item.soluong}"
                                    data-mamon="${item.mamon}"
                                />
                            </td>

                            <td class="text-right">${formatNumber(
                                item.dongia * item.soluong
                            )}</td>
                            
                            <td class="text-center">
                                <span class="btn-delete" data-mamon="${
                                    item.mamon
                                }">
                                    <i class="bi bi-x-square-fill icon-delete cursor-pointer text-red-500"></i>
                                </span>
                            </td>
                        </tr>
                    `;
                });
            } else {
                html = `<tr class="italic">
                        <td class="text-left">Chưa có món ăn</td>
                        <td class="text-center">0</td>
                        <td class="text-right">0</td>
                        <td class="text-center">
                            &nbsp;
                        </td>
                </tr>`;
            }

            // render list order
            billEl.querySelector("tbody").innerHTML = html;
            // render tongtien
            inputTongTienEl.value = formatNumber(tongtien);
            inputTongTienEl.dataset.tongtien = tongtien;

            // handle change value soluong
            const listInputSoLuong = billEl.querySelectorAll(".soluong");
            listInputSoLuong.forEach((inputSoLuong) => {
                inputSoLuong.addEventListener("change", () => {
                    let maMon = inputSoLuong.dataset.mamon;

                    axios
                        .get(`./update`, {
                            params: {
                                maMon,
                                soBan,
                                soLuong: inputSoLuong.value,
                            },
                        })
                        .then(function (respone) {
                            let data = respone.data;

                            if (data.status == "success") {
                                // callback function render
                                renderBillPreview(soBan);
                            }
                        });
                });
            });

            // Handle delete product
            const listBtnDelete = billEl.querySelectorAll(".btn-delete");
            listBtnDelete.forEach((btnDelete) => {
                btnDelete.addEventListener("click", () => {
                    let maMon = btnDelete.dataset.mamon;

                    axios
                        .get(`./delete`, {
                            params: {
                                maMon,
                                soBan,
                            },
                        })
                        .then(function (respone) {
                            let data = respone.data;

                            if (data.status == "success") {
                                // callback function render
                                renderBillPreview(soBan);
                            }
                        });
                });
            });
        });
};

// Auto load
renderBillPreview();

// handle input trakhach
const inputPhuThuEl = document.querySelector("#phuthu");
const inputKhachDuaEl = document.querySelector("#khachdua");
const inputTraKhachEl = document.querySelector("#trakhach");

inputPhuThuEl.addEventListener("change", () => {
    calcTraKhach(
        inputTongTienEl.dataset.tongtien,
        inputKhachDuaEl.dataset.khachdua,
        inputPhuThuEl.value
    );
});

inputKhachDuaEl.addEventListener("change", () => {
    inputKhachDuaEl.dataset.khachdua = inputKhachDuaEl.value;

    inputKhachDuaEl.value = formatNumber(inputKhachDuaEl.value);

    calcTraKhach(
        inputTongTienEl.dataset.tongtien,
        inputKhachDuaEl.dataset.khachdua
    );
});

const calcTraKhach = (tongtien = 0, khachdua = 0, phuthu = 0) => {
    tongtien = parseInt(tongtien);
    khachdua = parseInt(khachdua);
    phuthu = parseInt(phuthu);
    let trakhach = 0;

    if (phuthu > 0) {
        phuthu = (tongtien * phuthu) / 100;
    }

    trakhach = khachdua - (tongtien + phuthu);

    inputTraKhachEl.value = formatNumber(trakhach);
};

// handle order
const listMonAn = document.querySelectorAll(".monan .items");

listMonAn.forEach((product) => {
    product.addEventListener("click", () => {
        let maMon = product.dataset.mamon;
        let soBan = document.querySelector("#ban").value;
        let donGia = product.dataset.dongia;

        axios
            .post("./order", {
                maMon,
                soBan,
                donGia,
                action: "add",
            })
            .then(function (respone) {
                // let data = respone.data;
                renderBillPreview(soBan);
                // console.log(data);
            });
    });
});

// handle change table order
const banEl = document.querySelector("#ban");

banEl.addEventListener("change", () => {
    let soBan = banEl.value;
    renderBillPreview(soBan);
    // console.log(banEl.value);
});

// handle button function
const btnLuu = document.querySelector("#btn-luu");

btnLuu.addEventListener("click", () => {
    console.log("lưu");
});

// handle hot key function
window.addEventListener("keydown", (e) => {
    let preventDefault = () => {
        e.preventDefault();
    };

    switch (e.which) {
        // F1
        case 112:
            preventDefault();
            btnLuu.click();
            break;
        // F2
        case 113:
            preventDefault();
            break;
        // F3
        case 114:
            preventDefault();
            break;

        default:
            break;
    }
    // console.log(e.which);
});
