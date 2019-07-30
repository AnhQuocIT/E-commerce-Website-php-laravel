<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="{{asset('public/backend')}}/">
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Report</title>
    <link rel="stylesheet" href="css/report.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/logo.png">
      </div>
      <div id="company">
        <h2 class="name">Laravel Shop</h2>
        <div>Tân Bình, TP Hồ Chí Minh</div>
        <div>(+84) 927-931-917</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">KHÁCH HÀNG:</div>
          <h2 class="name">{{$customer->name}}</h2>
          <div class="address">{{$customer->address}}</div>
          <div class="email"><a href="mailto:{{$customer->email}}">{{$customer->email}}</a></div>
          <div class="email"><a href="tel:{{$customer->phone_number}}">{{$customer->phone_number}}</a></div>
        </div>
        <div id="invoice">
          <h1>HÓA ĐƠN</h1>
          <div class="date">Ngày tạo: {{$bill->date_order}}</div>
          <div class="date">Ngày xuất HD: {{date('Y-m-d')}}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Tên sản phẩm</th>
            <th class="unit">Đơn giá</th>
            <th class="qty">Số lượng</th>
            <th class="total">Tổng</th>
          </tr>
        </thead>
        <tbody>
          @$no = 0;
          @foreach($items as $item)
          <tr>
            <td class="no"></td>
            <td class="desc">{{$item->name}}</td>
            <td class="unit">{{number_format($item->unit_price,0,',','.')}} VNĐ</td>
            <td class="qty">{{$item->quantity}}</td>
            <td class="total">{{number_format($item->unit_price*$item->quantity,0,',','.')}} VNĐ</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>{{number_format($total,0,',','.')}} VNĐ</td>
          </tr>
          <!-- <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 25%</td>
            <td>$1,300.00</td>
          </tr> -->
          <tr>
            <td colspan="2"></td>
            <td colspan="2">THÀNH TIỀN</td>
            <td>{{number_format($total,0,',','.')}} VNĐ</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
    </main>
  </body>
</html>