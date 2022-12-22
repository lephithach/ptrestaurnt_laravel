@extends('client.include.layout')
@section('root')
<h3 class="font-bold text-xl text-center">GIỚI THIỆU VỀ NHÀ HÀNG</h3>
<hr class="my-2">
<div class="about py-2 grid lg:grid-cols-2 gap-10">
    <div class="my-3 xl:my-0 about-content">
        <p class="text-center xl:text-left title">Sơ lược về nhà hàng</p>
        <p class="content">Nhà hàng PT Restaurant tự hào khi được trở thành một trong những điểm hẹn lý tưởng của những doanh nhân thành đạt, những bạn trẻ năng động hay những bữa cơm gia đình ấm cúng sau mỗi ngày làm việc căng thẳng. Không gian nơi đây được trang trí và thiết kế đầy ấn tượng nổi bật với tông màu ấm. Cảm giác ấy đến từ không gian nổi bật với lối thiết kế kiến trúc Đông Dương hài hòa với những món ăn biểu tượng của món ngon Việt Nam hiện đại và ẩm thực phương Tây.</p>
    </div>

    <div class="about-picture">
        <img src="{{ asset('storage/images/banner/theatrer-bar.jpeg') }}" alt="picture">
    </div>            
</div>

<div class="about py-2 grid lg:grid-cols-2 gap-10">
    <div class="my-3 xl:my-0 xl:order-2 about-content">
        <p class="text-center xl:text-left title">Đội ngũ nhân viên thân thiện</p>
        <p class="content">Đến với nơi đây bạn sẽ được thưởng thức những món ăn ngon phong phú, đa dạng cùng với những chai rượu đặc sắc. Bên cạnh đó chúng tôi sở hữu một đội ngũ nhân viên chuyên nghiệp, nhanh nhẹn và nhiệt tình. Đảm bảo cho các món ăn đưa lên quý khách được đảm bảo chất lượng và hương vị thơm ngon nhất. Chăm lo cho khách hàng đến từng chi tiết nhỏ. Đem lại cho bạn sự thoải mái như đang ở một nơi quen thuộc.</p>
    </div>

    <div class="xl:order-1 about-picture">
        <img src="{{ asset('storage/images/banner/nhan-vien.jpg') }}" alt="picture">
    </div>
</div>

<div class="about py-2 grid lg:grid-cols-2 gap-10">
    <div class="my-3 xl:my-0 about-content">
        <p class="text-center xl:text-left title">Hương vị lôi cuốn trong từng món ăn</p>
        <p class="content">Ở đây chúng tôi có rất nhiều các món ăn trong thực đơn mang nét ẩm thực Việt và ẩm thực phương Tây. Nếu bạn đã được thưởng thức các món ăn của chúng tôi chắc chắn bạn sẽ khó quên được hương vị của mỗi món ăn mà nhà hàng của chúng tôi mang lại. Vì các món ăn đều có màu sắc bắt mắt, lôi cuốn ngoài ra quý khách còn cảm nhận được vị vừa béo, vừa ngọt và đậm đà của các món ăn của chúng tôi mang lại. Bên cạnh đó nhà hàng còn sở hữu sảnh chính lớn với sức chứa lên đến 150 người, đủ lớn để tổ chức tiệc liên hoan hoặc lễ kỷ niệm công ty.</p>
    </div>

    <div class="about-picture">
        <img src="{{ asset('storage/images/banner/mon-an.jpg') }}" alt="picture">
    </div>
</div>


@endsection