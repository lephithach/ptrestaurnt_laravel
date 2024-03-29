<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT Restaurant | {{ $metaTitle ?? 'Sang trọng, ấm cúng' }}</title>
    @vite(['resources/css/app.css', 'resources/scss/index.css', 'resources/js/client/modal.js', 'resources/js/client/show-modal-product.js', 'resources/js/client/comment.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
</head>
<body>
    <div class="modal-alert">
        <div class="modal-alert-container">
            <div class="modal-header">
                <p class="alert-title">Thông báo</p>
                <i class="bi bi-x btn-close"></i>
            </div>

            <div class="modal-content">
                <p class="content">&nbsp;</p>
            </div>

            <div class="modal-button">
                {{-- button function render JS --}}
            </div>
        </div>
    </div>

    {{-- Modal show product --}}
    <div class="modal-product">
        <div class="modal-product-container text-center min-w-[300px] lg:min-w-[700px] md:text-left flex-wrap lg:flex-nowrap relative">
            <span class="absolute right-1 top-0 text-lg cursor-pointer btn-close"><i class="bi bi-x-circle"></i></span>
            <div class="left">
                <img src="" alt="images">
                <div class="mt-1 star-vote text-yellow-400">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <small class="text-black">(1.000)</small>
                </div>
            </div>

            <div class="right">
                <div class="header">
                    <h3 class="product-title">CUA RANG ME</h3>
                    <p class="product-price">350.000</p>
                    
                    <div class="btn-addcart-container">
                        <button class="btn-success btn-sm mt-1 btn-addcart" data-id="">THÊM VÀO GIỎ</button>
                        <span class="text-green-700 alert-message hidden"><i class="bi bi-check2"></i>Thêm thành công</span>
                    </div>
                </div>

                <ul class="comment text-left">
                    {{-- <li class="comment-container">
                        <div class="user-img">
                            <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="">
                        </div>
                        
                        <div class="user-comment">
                            <div class="user-name">Phi Thạch</div>
                            <div class="user-content">Lorem ipsum dolor sit amet, consectetur adipiscing elitsed do eiusmod tempor incididunt</div>
                        </div>
                    </li>
                    <li class="comment-container">
                        <div class="user-img">
                            <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="">
                        </div>
                        
                        <div class="user-comment">
                            <div class="user-name">Phi Thạch</div>
                            <div class="user-content">minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                        </div>
                    </li>
                    <li class="comment-container">
                        <div class="user-img">
                            <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="">
                        </div>
                        
                        <div class="user-comment">
                            <div class="user-name">Phi Thạch</div>
                            <div class="user-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</div>
                        </div>
                    </li>

                    <p class="text-sm loadmore cursor-pointer">Xem thêm nhận xét</p> --}}
                </ul>
                    {{-- <p>Chưa có nhận xét nào, bạn hãy để lại nhận xét nhé!</p> --}}

                {{-- Check login comment --}}
                @if(session()->has('userClient'))
                <div class="comment-container mt-1">
                    <div class="user-img">
                        <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="avatar">
                    </div>

                    <div class="flex items-center w-full relative">
                        <textarea class="border rounded-lg flex-1 p-1 resize-none" name="comment" id="comment" rows="2" placeholder="Bạn thấy món này như thế nào?"></textarea>
                        <span class="absolute right-1 cursor-pointer text-green-700 text-lg btn-addcomment"><i class="bi bi-arrow-up-circle-fill"></i></span>
                    </div>
                </div>
                @else
                <div class="comment-container mt-1">
                    <div class="user-img">
                        <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="avatar">
                    </div>

                    <div class="flex items-center w-full relative">
                        <textarea class="border rounded-lg flex-1 p-1 resize-none" rows="2" placeholder="Vui lòng đăng nhập để viết bình luận" disabled readonly></textarea>
                        <span class="absolute right-1 cursor-pointe text-lg text-gray-500"><i class="bi bi-arrow-up-circle-fill"></i></span>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container client mx-auto">
        {{-- Navbar --}}
        <nav class="navbar px-4 mx-container">
            <div class="logo-container">
                <a class="brand-name" href="{{ route('client.trangchu') }}">PT Restaurant</a>
            </div>

            <div class="menu-container hidden lg:block">
                <ul class="menu">
                    <li class="menu-item{{ request()->routeIs('client.trangchu') ? ' active' : '' }}"><a class="menu-link" href="{{ route('client.trangchu') }}">Trang chủ</a></li>
                    <li class="menu-item{{ request()->routeIs('client.gioithieu') ? ' active' : '' }}"><a class="menu-link" href="{{ route('client.gioithieu') }}">Giới thiệu</a></li>
                    <li class="menu-item{{ request()->routeIs('client.danhsachmonan') ? ' active' : '' }}"><a class="menu-link" href="{{ route('client.danhsachmonan') }}">Món ăn</a></li>
                    <li class="menu-item{{ request()->routeIs('client.giohang') ? ' active' : '' }}"><a class="menu-link" href="{{ route('client.giohang') }}">Giỏ hàng</a></li>
                    <li class="menu-item"><a class="menu-link" href="#">Góp ý</a></li>
                </ul>
            </div>

            <div class="hidden lg:block user">
                @if (session()->get('userClient'))         
                    <div class="user-container">
                        <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="avatar" width="30px" height="30px" class="user-img" />
                        <i class="bi bi-arrow-down-short"></i>
                    </div>

                    <div class="user-detail">
                        @foreach (session()->get('userClient') as $user)
                        <p class="user-name">Xin chào: {{$user['ten']}}</p>
                        
                        <div class="user-avatar">
                            <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-23.jpg" alt="avatar" width="60px" height="60px" class="user-img" />
                        </div>
                        @endforeach

                        <div class="user-btn">
                            <a href="{{ route('client.dangxuat') }}" class="btn-logout">Đăng xuất</a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('client.dangnhap') }}">Đăng nhập</a>
                    
                @endif
            </div>

            <div class="lg:hidden">
                <button class="border py-2 px-3"><i class="bi bi-list"></i></button>
            </div>
        </nav>

        {{-- Banner --}}
        <section class="banner mx-container">
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
                        <p><span class="font-bold">Email:</span> lephithach00@gmail.com</p>
                        <p><span class="font-bold">Điện thoại:</span> 0929-626-424 | 038-3431-380</p>
                        <p><span class="font-bold">Địa chỉ:</span> 123, Võ Thị Sáu, Thống Nhất, TP. Biên Hòa, Đồng Nai</p>
                        <p><span class="font-bold">Giờ đón khách:</span> 09:30 - 23:00</p>
                    </div>
                </div>
    
                {{-- Google Maps --}}
                <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d869.5928033235059!2d106.8427941919293!3d10.95732864981353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1671628865901!5m2!1svi!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <hr class="my-4">
            <p class="text-center">Copyright © 2021 - {{ date('Y') }} | Designed by <a href="https://www.facebook.com/lephiithach/">Lê Phi Thạch</a></p>
        </footer>
    </div>

    <script>
    // Change backgroundColor navbar on scroll
        document.addEventListener("scroll", (e) => {
            if(window.scrollY > 70) {
                document.querySelector(".container .navbar").classList.add("active"); 
            } else {
                document.querySelector(".container .navbar").classList.remove("active"); 
            }
        });

    // Show user detail
    if(document.querySelector(".user .user-container")) {
        document.querySelector(".user .user-container").addEventListener("click", () => {
            document.querySelector(".user .user-detail").classList.toggle("show");
        });
    }
    </script>
</body>
</html>