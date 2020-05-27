<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs" style="text-align: center;background: #2a4d69;">
    <li class="active" style="    width: 180px;"><a style="color: aliceblue;font-size: 22px;" href="#tab1" data-toggle="tab">Tất cả</a></li>
    <li style="    width: 180px;"><a style="color: aliceblue;font-size: 22px;" href="#tab2" data-toggle="tab">Chờ thanh toán</a></li>
     <li style="    width: 180px;" class="active"><a style="color: aliceblue;font-size: 22px;" href="#tab3" data-toggle="tab">Chờ lấy hàng</a></li>
    <li style="    width: 180px;"><a style="color: aliceblue;font-size: 22px;" href="#tab4" data-toggle="tab">Đang giao</a></li>
         <li style="    width: 180px;" class="active"><a style="color: aliceblue;font-size: 22px;" href="#tab5" data-toggle="tab">Đã giao</a></li>
    <li style="    width: 180px;"><a style="color: aliceblue;font-size: 22px;" href="#tab6" data-toggle="tab">Đã hủy</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab2">
      <table class="table table-bordered" style="width: 1142px;    color: brown;">
  <thead>
    <tr style="    font-size: 25px;background: #2a4d69;">
      <th style="color: aliceblue;font-size: 21px;">STT</th>
      <th style="color: aliceblue;font-size: 21px;">Tên</th>
      <th sstyle="color: aliceblue;font-size: 21px;">SDT</th>
      <th style="color: aliceblue;font-size: 21px;">email</th>
       <th style="color: aliceblue;font-size: 21px;">Ngày mua</th>
      <th style="color: aliceblue;font-size: 21px;">Số lượng</th>
      <th style="color: aliceblue;font-size: 21px;">Giá</th>
      <th style="color: aliceblue;font-size: 21px;">Huy</th>
    </tr>
  </thead>
  <tbody>
    @foreach($choxacnhan as $value)
    <tr>
      <th scope="row">{{$stt++}}</th>
      <td id="tenKH">{{$value->tenKH}}</td>
      <td id="sdt">{{$value->sdt}}</td>
      <td id="email">{{$value->email}}</td>
      <td id="email">{{$value->ngayban}}</td>
      <td id="mahoadon" style="opacity: 0;display: none;">{{$value->mahoadon}}</td>
      <td id="makhachhang" style="opacity: 0;display: none;">{{$value->makh}}</td>
            <td id="id" style="opacity: 0;display: none;">{{$value->id}}</td>
      <td>{{$value->tongsl}}</td>
            <td id="gia" >{{number_format($value->gia)}}đ</td>
      <td onclick="Huydonhang('{{$value->id}}','{{$value->mahoadon}}')"><BUTTON style='    border: 1px solid;
    padding: 6px;
    background-color: blue;
    color: powderblue;
    border-radius: 20%;'>hủy</BUTTON></td>
    </tr>
     @endforeach
  </tbody>
</table>
    </div>
    
    <div class="tab-pane" id="tab1" style="width: 600px">
      <table class="table table-bordered" style="width: 1142px;    color: brown;">
  <thead>
    <tr style="    font-size: 25px;background: #2a4d69;">
      <th style="color: aliceblue;font-size: 21px;">STT</th>
      <th style="color: aliceblue;font-size: 21px;">Tên</th>
      <th style="color: aliceblue;font-size: 21px;">SDT</th>
      <th style="color: aliceblue;font-size: 21px;">email</th>
      <th style="color: aliceblue;font-size: 21px;">Số lượng</th>
      <th style="color: aliceblue;font-size: 21px;">Giá</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tatca as $value)
    <tr>
      <th scope="row">{{$stt++}}</th>
      <td>{{$value->tenKH}}</td>
      <td>{{$value->sdt}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->tongsl}}</td>
      <td>{{number_format($value->gia)}}đ</td>
    </tr>
     @endforeach
  </tbody>
</table>
      
    </div>
   
    <div class="tab-pane active" id="tab3">
      <p>I'm in Section 1.</p>
    </div>
    <div class="tab-pane" id="tab4">
       <table class="table table-bordered" style="width: 1142px;    color: brown;">
  <thead>
    <tr style="    font-size: 25px;background: #2a4d69;">
      <th style="color: aliceblue;font-size: 21px;">STT</th>
      <th style="color: aliceblue;font-size: 21px;">Tên</th>
      <th style="color: aliceblue;font-size: 21px;">SDT</th>
      <th style="color: aliceblue;font-size: 21px;">email</th>
       <th style="color: aliceblue;font-size: 21px;">Ngày mua</th>
      <th style="color: aliceblue;font-size: 21px;">Số lượng</th>
      <th style="color: aliceblue;font-size: 21px;">Giá</th>
    </tr>
  </thead>
  <tbody>
    @foreach($danggiao as $value)
    <tr>
      <th scope="row">{{$stt++}}</th>
      <td>{{$value->tenKH}}</td>
      <td>{{$value->sdt}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->ngayban}}</td>
      <td>{{$value->tongsl}}</td>
      <td>{{number_format($value->gia)}}đ</td>
    </tr>
     @endforeach
  </tbody>
</table>
    </div>
        <div class="tab-pane active" id="tab5">
      <p>I'm in Section 1.</p>
    </div>
    
    <div class="tab-pane" id="tab6" style="width: 600px">
      <table class="table table-bordered" style="width: 1142px;    color: brown;">
  <thead>
    <tr style="    font-size: 25px;background: #2a4d69;">
      <th style="color: aliceblue;font-size: 21px;">STT</th>
      <th style="color: aliceblue;font-size: 21px;">Tên</th>
      <th style="color: aliceblue;font-size: 21px;">SDT</th>
      <th style="color: aliceblue;font-size: 21px;">email</th>
       <th style="color: aliceblue;font-size: 21px;">Ngày mua</th>
      <th style="color: aliceblue;font-size: 21px;">Số lượng</th>
      <th style="color: aliceblue;font-size: 21px;">Giá</th>
    </tr>
  </thead>
  <tbody>
    @foreach($huydon as $value)
    <tr>
      <th scope="row">{{$stt++}}</th>
      <td>{{$value->tenKH}}</td>
      <td>{{$value->sdt}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->ngayban}}</td>
      <td>{{$value->tongsl}}</td>
      <td>{{number_format($value->gia)}}đ</td>
    </tr>
     @endforeach
  </tbody>
</table>
    </div>
  </div>
</div>