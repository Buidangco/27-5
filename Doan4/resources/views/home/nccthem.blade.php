@foreach($data1 as $row)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$row->Ten}}</td> 
                                                        <td><span>{{$row->Sdt}} </span></td>
                                                        <td style="text-align: center;">
                                                          <a style="background: chocolate;" href="{{route('/product/edit',$row->id)}}" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-edit"></i></a>
                                                      </td>
                                                        <td style="text-align: center;"><a style="background: chocolate;" onclick="deletesanpham('{{$row->id}}')" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach