       <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                  
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0" style="background-color: #24315f">
                                                        <th class="border-0" style="color: white">STT</th>
                                                        <th class="border-0" style="color: white">Mã CTHD</th>
                                                        <th class="border-0" style="color: white">Mã sản phẩm</th>
                                                         <th class="border-0" style="color: white">Tên SP</th>
                                                        <th class="border-0" style="color: white">Số lượng</th>
                                                        <th class="border-0" style="color: white">Giá</th>      
                                                        <th class="border-0" style="color: white">Sửa </th>
                                                        <th class="border-0" style="color: white">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($layCTHD as $layct)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$layct->MaCTHD}}</td>
                                                        <td>{{$layct->id}}</td>
                                                        <td>{{$layct->Tensanpham}}</td>
                                                        <td>{{$layct->soluong}}</td>
                                                        <td><span>{{number_format($layct->Gia)}}</span></td>
                                                        <td>
                                                          <a href="" class="btn btn-default btn-rounded mb-4"><i class="fas fa-edit"></i></a>
                                                      </td>
                                                        <td><a onclick="" class="btn btn-default btn-rounded mb-4"><i class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                     @endforeach
                                                    <tr>
                                                        <td colspan="9"><button>Lưu</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>