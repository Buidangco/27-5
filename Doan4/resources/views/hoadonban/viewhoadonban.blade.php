 <div class="modal-dialog" role="document">
                                <div class="modal-content" style="margin-top: 80%;margin-left: -45%;opacity: 1;width: 259%;height: 500px;overflow: scroll;">
                                  <div class="modal-header" style="    background: tomato;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="    color: floralwhite;font-size: 36px;margin-left: 41%;">Hóa đơn</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true" onclick="tatmodal()">&times;</span>
                                    </button>
                                  </div>
                                  <div style="display: flex;    margin-bottom: -189px;">
                                    <div style="    width: 50%;    height: 60%;background: #dacbae;">
                                                                           <div style="display: flex;    margin-left: 11%;margin-top: 1%;font-size: 23px;color: black;    padding: 22px;">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <span style="font-family: fantasy;margin-left: 10px;">Tên khách hàng :</span>
                                    <span style="margin-left: 3px;color:maroon;    font-family: initial;"> {{$tenkh}}</span>

                                  </div>
                                    <div style="display: flex;    margin-left: 11%;margin-top: 1%;font-size: 23px;color: black;    padding: 22px;">
                                       <span class="glyphicon glyphicon-globe"></span>
                                    <span style="font-family: cursive;margin-left: 10px;">Địa chỉ :</span>
                                    <span style="margin-left: 3px;color: maroon;    font-family: initial;">  {{$diachi}}</span>
                                  </div>
                                  <div style="display: flex;    margin-left: 11%;margin-top: 1%;font-size: 23px; color: black;    padding: 22px;">
                                     <span class="glyphicon glyphicon-phone"></span>
                                    <span style="font-family: cursive;margin-left: 10px;">Số điện thoại :</span>
                                    <span style="margin-left: 3px;color: maroon;    font-family: initial;">  {{$sdt}}</span>
                                  </div>
                                    </div>

                                  <img style="    width: 50%;height: 60%;" src="{{url('/hoadon.png')}}" />
                                  </div>
                                 
                                  <div class="modal-body">
                                    <table class="table table-bordered">
                                       <thead>
                                            <tr style="background: #BDB76B">
                                                <th style="padding: 16px;    font-size: 15px;color: black;">STT</th>
                                                <th style="padding: 16px;    font-size: 15px;color: black;">Hình ảnh</th>
                                                <th style="padding: 16px;    font-size: 15px;color: black;">Mã khách hàng</th>
                                                <th style="padding: 16px;    font-size: 15px;color: black;">Tên sản phẩm</th>
                                                <th style="padding: 16px;    font-size: 15px;color: black;">Số lượng</th>
                                                <th style="padding: 16px;    font-size: 15px;color: black;">Tổng giá</th>
                                            </tr>
                                        </thead>
                                      @foreach($data1 as $row)
                                      <tr class="active">
                                        <td>{{$i++}}</td>
                                        <td><img style="width: 50px;height: 50px" src="{{url('storage/photos/1')}}/{{$row->image}}" alt="user" class="rounded" width="45"></td>
                                           <td>{{$row->maKh}}</td>
                                          <td>{{$row->name}}</td>
                                          <td>{{$row->soluong}}</td>
                                          <td>{{$row->Gia}}</td>
                                          <!-- <td>thehalftheart@mail.com</td>
                                          <td>192 Hầm tử</td> -->
                                      </tr>
                                      @endforeach
                                    </table>
                                  </div>
                                </div>
                              </div>