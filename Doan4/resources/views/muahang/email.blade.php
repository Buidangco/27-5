<font face="Arial">
	<div>
		<div></div>
		<h3><font>Thông tin khách hàng</font></h3>
		<p>
			<strong>Khách hàng</strong>
			{{$info['ten']}}
		</p>
		<p>
			<strong>email</strong>
			{{$info['email']}}
		</p>
		<p>
			<strong>SDT</strong>
			{{$info['sdt']}}
		</p>
		<p>
			<strong>Địa chi</strong>
			{{$info['diachi']}}
		</p>
	</div>
	<div>
		<h3><font>Hóa đơn mua hàng</font></h3>
		<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">số lượng</th>
      <th scope="col">Tổng tiền</th>
    </tr>
  </thead>
  <tbody>
  	@foreach(Session::get('Cart')->products as $item)
    <tr>
      <th scope="row">1</th>
      <td>{{$item['productinfo']->name}}</td>
      <td>{{number_format($item['productinfo']->price)}}đ</td>
      <td>{{$item['quanty']}}</td>
      <td>{{number_format($item['productinfo']->price*$item['quanty'])}}đ</td>
    </tr>
    @endforeach
    <tr>
    	<td>Tổng tiền:</td>
    	<td>{{number_format(Session::get('Cart')->totalPrice)}}đ</td>
    </tr>
  </tbody>
</table>
	</div>
</font>