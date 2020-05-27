<div style="border-bottom: 1px solid black" class="row">
                          <h2 style="color: black;font-size: 46px;">Quản lý hóa đơn nhập</h2>
                        </div>
                        @foreach($laydata as $da)
                        <form style="margin-top: 40px;margin-bottom: 40px">
                          @csrf
                          <label>Mã sery sản phẩm</label>
                            <input type="" value="{{$tenncc}}" id="tenncc" style="display: none;" name="tenncc">
                          <input type="text" value="{{$da->id}}" id="id" style="display: none;" name="id">
                           <input value="{{$da->Mancc}}" id="mancc" type="text" style="display: none;" name="ncc">
                          <input type="text" id="sery" value="{{$da->masery}}" name="sery">
                           <input type="button" onclick="check()" value="check" style="color: white;background-color:#24315f ">
                        <label style="margin-left: 100px">Tên sản phẩm</label>
                          <input value="{{$da->name}}" id="name" type="text" name="name">
                          <label style="margin-left: 30px">Số lượng</label>
                          <input  style="width: 50px" type="text" id="soluong" name="soluong">
                          <label style="margin-left: 30px">Đơn giá</label>
                          <input value="{{$da->price}}" id="gia" type="text" name="price">
                     
                           <input type="button" onclick="Them()" value="Thêm" style="color: white;background-color:#24315f ">
                        </form>
                          @endforeach