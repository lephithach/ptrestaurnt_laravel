<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT Restaurant | {{ $metaTitle ?? 'Sang trọng, ấm cúng' }}</title>
    @vite(['resources/css/app.css', 'resources/scss/index.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
</head>
<body>
    <div class="container client mx-auto">
        {{-- Navbar --}}
        <nav class="navbar px-4">
            <div class="logo-container">
                <p class="brand-name">PT Restaurant</p>
            </div>

            <div class="menu-container hidden lg:block">
                <ul class="menu">
                    <li class="menu-item{{ request()->routeIs('client.trangchu') ? ' active' : '' }}"><a class="menu-link" href="./">Trang chủ</a></li>
                    <li class="menu-item{{ request()->routeIs('client.gioithieu') ? ' active' : '' }}"><a class="menu-link" href="{{ route('client.gioithieu') }}">Giới thiệu</a></li>
                    <li class="menu-item{{ request()->routeIs('client.danhsachmonan') ? ' active' : '' }}"><a class="menu-link" href="{{ route('client.danhsachmonan') }}">Danh sách món ăn</a></li>
                    <li class="menu-item"><a class="menu-link" href="#">Góp ý</a></li>
                </ul>
            </div>

            <div class="hidden lg:block call-now">
                <a href="tel:+84929626424">Gọi ngay</a>
            </div>

            <div class="lg:hidden">
                <button class="border py-2 px-3"><i class="bi bi-list"></i></button>
            </div>
        </nav>

        {{-- Banner --}}
        <section class="banner">
            {{-- https://github.com/lephithach/Bethany-Wedding/blob/main/index.html --}}
            <img class="img" src="{{ asset('storage/images/banner/image-nha-hang.jpg') }}" alt="banner">
        </section>

        {{-- Root --}}
        <section class="root my-3 mx-container"> 
            @yield('root')
        </section>

        {{-- Line break --}}
        <hr class=" my-2 mx-container">
        {{-- Footer --}}
        <footer class="mx-5 py-3 mx-container">
            <div class="grid sm:grid-cols-1 xl:grid-cols-2 gap-2">
                {{-- Info --}}
                <div class="text-center xl:text-left">
                    <p class="brand-name">PT Restaurant</p>
                    <div class="social my-2">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-telegram"></i></a>
                        <a href="#"><i class="bi bi-envelope"></i></a>
                    </div>
                    <div class="address">
                        <p>Email: lephithach00@gmail.com</p>
                        <p>Điện thoại: 0929-626-424 | 038-3431-380</p>
                        <p>Địa chỉ: 123, Võ Thị Sáu, Thống Nhất, TP. Biên Hòa, Đồng Nai</p>
                    </div>
                </div>
    
                {{-- Google Maps --}}
                <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d869.5928033235059!2d106.8427941919293!3d10.95732864981353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1671628865901!5m2!1svi!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <hr class="my-4">
            <p class="text-center">Copyright © 2021 - 2022 | Designed by <a href="#">Lê Phi Thạch</a></p>
        </footer>
    </div>

    <script>        
    // Change backgroundColor navbar on scroll
        document.addEventListener("scroll", (e) => {
            if(window.scrollY > 200) {
                document.querySelector(".container .navbar").classList.add("active"); 
            } else {
                document.querySelector(".container .navbar").classList.remove("active"); 
            }
        });
    </script>
</body>
</html>