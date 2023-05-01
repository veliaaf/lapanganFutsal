@extends('layouts.landing.home')

@section('content')
<div class="page-header text-center" style="background-image: url('{{asset('images/field/'. $rent->Field->image)}}')">
    <div class="container">
        <h1 class="page-title" style="background-color:white;">
            Detail Pemesanan<span>Booking</span>
        </h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">

</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <table class="table table-cart table-mobile">
                        <thead>
                            <tr>
                                <th>Lapangan</th>
                                <th>Waktu</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{ Form::open(array('method'=>'POST', 'url' => route('customer.payment.pay', $rent->id), 'files' => true)) }}
                            <?php $total_price = 0 ; ?>
                            @foreach ($rent->RentDetail as $detail)
                            <tr>
                                <td class="product-col">
                                    <h3 class="product-title">
                                        {{$detail->OpeningHourDetail->field->name}} -
                                        {{$detail->OpeningHourDetail->field->Venue->name}}
                                    </h3><!-- End .product-title -->
                                </td>
                                <td class="price-col">{{$detail->OpeningHourDetail->OpeningHour->Hour->hour}}</td>
                                <td class="price-col">{{Helper::rupiah($detail->OpeningHourDetail->price)}}</td>
                            </tr>
                            <input type="hidden" value="{{$detail->OpeningHourDetail->id}}" name="details[]">
                            <input type="hidden" value="{{$rent->started_at}}" name="date">
                            <?php
                                $total_price = $total_price + $detail->OpeningHourDetail->price;
                            ?>
                            @endforeach
                        </tbody>
                    </table><!-- End .table table-wishlist -->
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-5">
                    <div class="summary summary-cart">
                        <h5 class="summary-title" id="remaining" style="color:red;text-align:center">
                            Waktu yang tersisa untuk melakukan pembayaran
                        </h5>
                        <br>
                        <h3 class="summary-title">Detail</h3><!-- End .summary-title -->

                        <table class="table table-summary">
                            <tbody>
                                <tr class="summary-shipping-row">
                                    <td>Nama :</td>
                                    <td>{{Auth::user()->customer->first_name}} {{Auth::user()->customer->last_name}}
                                    </td>
                                </tr>
                                <tr class="summary-shipping-row">
                                    <td>Tanggal :</td>
                                    <td>{{date('d M Y',strtotime($rent->created_at))}}</td>
                                </tr>
                                <tr class="summary-total">
                                    <td>Total :</td>
                                    <td>{{Helper::rupiah($total_price)}}</td>
                                </tr>
                                <tr class="summary-shipping">
                                    <td colspan="2">Jenis Pembayaran :</td>
                                    <td></td>
                                </tr>
                                <tr class="summary-shipping-row">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="radio-lunas" name="status" value="1"
                                                class="custom-control-input radio-dp" checked>
                                            <label class="custom-control-label" for="radio-lunas">Bayar Lunas</label>
                                        </div><!-- End .custom-control -->
                                    </td>
                                    <td>&nbsp;</td>
                                </tr><!-- End .summary-shipping-row -->
                                <tr class="summary-shipping-row">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <?php 
                                                $dp_percentage = $detail->OpeningHourDetail->field->Venue->dp_percentage;
                                                $dp = $total_price * $dp_percentage / 100;
                                            ?>
                                            <input type="radio" id="radio-dp" name="status" value="2"
                                                class="custom-control-input radio-dp">
                                            <label class="custom-control-label" for="radio-dp">Bayar DP</label>
                                        </div><!-- End .custom-control -->
                                    </td>
                                    <td>&nbsp;</td>
                                </tr><!-- End .summary-shipping-row -->
                                <tr class="summary-shipping-estimate" id="form-dp" style="display:none">
                                    <td><input type="text" class="form-control" name="dp" id="dp" readonly></td>
                                    <td>&nbsp;</td>
                                </tr><!-- End .summary-shipping-estimate -->
                                <tr class="summary-shipping">
                                    <td colspan="2">Metode Pembayaran :</td>
                                    <td></td>
                                </tr>
                                @foreach ($rent->Field->venue->paymentMethodDetail as $paymentMethodDetail)
                                <tr class="summary-shipping-row">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="bank-{{$paymentMethodDetail->payment_method_id}}"
                                                name="payment_method" required value="{{$paymentMethodDetail->id}}"
                                                class="custom-control-input">
                                            <label class="custom-control-label"
                                                for="bank-{{$paymentMethodDetail->payment_method_id}}">{{$paymentMethodDetail->PaymentMethod->name}}
                                                ({{$paymentMethodDetail->no_rek}}) </label>
                                        </div><!-- End .custom-control -->
                                    </td>
                                    <td>&nbsp;</td>
                                </tr><!-- End .summary-shipping-row -->
                                @endforeach
                                <tr class="summary-shipping-estimate" id="form-bank" style="display:none">
                                    <td><input type="text" class="form-control" name="bank" id="bank" readonly></td>
                                    <td>&nbsp;</td>
                                </tr><!-- End .summary-shipping-estimate -->

                                <tr class="summary-shipping-row">
                                    <td colspan="2">Bukti Pembayaran :</td>
                                    <td></td>
                                </tr><!-- End .summary-total -->
                                <tr class="summary-shipping-row">
                                    <td colspan="2"><input type="file" id="payment" name="payment" accept="image/*"
                                            class="form-control"></td>
                                    <td></td>
                                </tr><!-- End .summary-total -->
                            </tbody>
                        </table><!-- End .table table-summary -->

                        <div id="submit">
                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">Booking</button>
                        </div>
                        {!! Form::close() !!}
                    </div><!-- End .summary -->

                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cart -->
</div><!-- End .page-content -->
@endsection

@section('script')
<script>
    var radio = 1;
    $('.radio-dp').on('click', function (e) {
        if ($(this).val() == 1) {
            radio = 1;
            $('#form-dp').hide();
            $('#dp').val(0).change();
        } else {
            radio = 2;
            $('#form-dp').show();
            $('#dp').val("{{$dp}}").change()
        }

    });

    var date = new Date('{{$rent->created_at}}').getTime();
    var countDownDate = new Date(date);
    console.log(countDownDate);//penentuan selama 10 menit
    countDownDate = new Date(countDownDate.getFullYear(), countDownDate.getMonth(), countDownDate.getDate(),
        countDownDate.getHours(), countDownDate.getMinutes() + 20, countDownDate.getSeconds());
    countDownDate.setDate(countDownDate.getDate());
    // Hitungan Mundur Waktu Dilakukan Setiap Satu Detik
    var x = setInterval(function () {
        // Mendapatkan Tanggal dan waktu Pada Hari ini
        var now = new Date().getTime();
        //Jarak Waktu Antara Hitungan Mundur
        var distance = countDownDate - now;
        // Perhitungan waktu hari, jam, menit dan detik 
        //perhitungan komputer diubah ke time (hari, jam , menit, detik)
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Tampilkan hasilnya di elemen id = "carasingkat"
        document.getElementById("remaining").innerHTML = "Waktu yang tersisa untuk melakukan pembayaran " +
            hours + "h " +
            minutes + "m " + seconds + "s ";
        // Jika hitungan mundur selesai,
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("remaining").innerHTML = "EXPIRED";
            $('#submit').remove();
        }
    }, 1000);
</script>
@endsection