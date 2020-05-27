	@foreach($data1 as $row)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="{{url('storage/photos/1')}}/{{$row->image}}" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>{{$row->name}}</td>
                                                        <td style="opacity: 0;display: none;"><input type="text"  id="code" value="{{$row->code}}" name=""></td>
                                                        <td><span>{{number_format($row->price)}}&nbsp;₫ </span></td>
                                     <td style="text-align: center;">
                                                          <a style="background: chocolate;" href="{{route('/product/edit',$row->id)}}" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-edit"></i></a>
                                                      </td>
                                                        <td style="text-align: center;"><a style="background: chocolate;" onclick="deletesanpham('{{$row->id}}')" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach