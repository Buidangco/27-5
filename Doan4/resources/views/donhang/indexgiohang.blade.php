
 @extends('layout_sanpham.layoutchung')
@section('body')
@include('trangchu.header')
<div class="container" style="height: 100%" id="them">
<div class="tabbable"> <!-- Only required for left/right tabs -->
 <ul class="nav nav-tabs" style="text-align: center;background: #2a4d69;">
    <li class="active" style="    width: 180px;"><a style="color: aliceblue;font-size: 17px;" href="#tab1" data-toggle="tab">Tất cả</a></li>
    <li style="    width: 180px;"><a style="color: aliceblue;font-size: 17px;" href="#tab2" data-toggle="tab">Chờ thanh toán</a></li>
     <li style="    width: 180px;" class="active"><a style="color: aliceblue;font-size: 17px;" href="#tab3" data-toggle="tab">Chờ lấy hàng</a></li>
    <li style="    width: 180px;"><a style="color: aliceblue;font-size: 17px;" href="#tab4" data-toggle="tab">Đang giao</a></li>
         <li style="    width: 180px;" class="active"><a style="color: aliceblue;font-size: 17px;" href="#tab5" data-toggle="tab">Đã giao</a></li>
    <li style="    width: 180px;"><a style="color: aliceblue;    font-size: 17px;" href="#tab6" data-toggle="tab">Đã hủy</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab2" style=";    margin-top: 32px;">
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
      <td onclick="Huydonhang('{{$value->id}}','{{$value->mahoadon}}')"><button type="button" class="btn btn-warning"><svg class="bi bi-x-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-4.146-3.146a.5.5 0 00-.708-.708L8 7.293 4.854 4.146a.5.5 0 10-.708.708L7.293 8l-3.147 3.146a.5.5 0 00.708.708L8 8.707l3.146 3.147a.5.5 0 00.708-.708L8.707 8l3.147-3.146z" clip-rule="evenodd"/>
</svg></button></td>
    </tr>
     @endforeach
  </tbody>
</table>
    </div>
    
    <div class="tab-pane" id="tab1" style="width: 600px;    margin-top: 32px;">
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
    
    <div class="tab-pane" id="tab6" style="width: 600px;    margin-top: 32px;">
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
</div>

@include('trangchu.footer')
<script type="text/javascript">
  function Huydonhang(id,mahoadon) {
    alert(id)
   //     let tenKH=$('#tenKH').text();
   // let sdt=$('#sdt').text();
   //    let email=$('#email').text();
   // let gia=$('#gia').text();
   // let mahoadon=$('#mahoadon').text();
   // // let makhachhang=$('#makhachhang').text();
   // let id=$('#id').text();
      if(confirm("Bạn có muốn xóa sản phẩm này không?")){
   $.ajax({
    type:'GET',
    url:'/Home2/donhang1/'+id+'/'+mahoadon,

   }).done(function(response){
              $("#them").empty();
                $("#them").html(response);
                alertify.success('Tìm thành công');
            });}
  }
</script>
@stop()