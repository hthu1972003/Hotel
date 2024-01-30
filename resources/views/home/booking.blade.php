<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookings</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">

</head>
<body>

@include('layout.user_header')

    <!-- booking section starts  -->

<section class="bookings">

    <h1 class="heading">my bookings</h1>

    <div class="box-container">
        @foreach($orders as $order)
        <div class="box">
            <p>name : {{ $order -> name }}<span></span></p>
            <p>email : {{$order -> email}} <span></span></p>
            <p>number : {{$order -> phone}} <span></span></p>
            <p>check in : {{$order -> time_start }} <span></span></p>
            <p>check out :  {{$order -> time_end}} <span></span></p>
{{--            <p>rooms : <span></span></p>--}}
{{--            <p>adults : <span></span></p>--}}
{{--            <p>childs : <span></span></p>--}}
{{--            <p>booking id : <span></span></p>--}}
            <p>status :
                @if($order->status == 0)
                    {{ "Chưa xác nhận" }}
                @elseif($order->status == 1)
                    {{ "Đã xác nhận" }}
                @elseif($order->status == 2)
                    {{ "Đã thành toán" }}
                @elseif($order->status == 3)
                    {{ "Đã trả phòng" }}
                @elseif($order->status == 4)
                    {{ "Hủy" }}
                @endif
                <span></span></p>
            <p>Tổng giá: {{ number_format($order->price, 0, ',', '.') }} VND<span></span></p>
            <form action="" method="POST">
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <a href="{{ route('cancel.booking', ['order_id' => $order->invoice_id]) }}" value="cancel this booking" name="cancel" class="btn" onclick="return confirm('cancel this booking?');">Cancel Booking</a>
            </form>
        </div>
        @endforeach
        <div class="box" style="text-align: center;">
            <p style="padding-bottom: .5rem; text-transform:capitalize;">no bookings found!</p>
            <a href="../../home#reservation" class="btn">book new</a>
        </div>

    </div>

</section>

<!-- booking section ends -->

@include('layout.user_footer')

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
