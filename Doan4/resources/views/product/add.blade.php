       @extends('layouts.dash')
       @section('section')
<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Thêm mới sản phẩm</h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="" method="post" action="/product/adddata">
                                      @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Tên sản phẩm</label>
                                                <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="name" required="">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Mã sery sản phẩm</label>
                                                <input type="text" class="form-control" id="validationCustom02" name="sery" placeholder="Sery" required="">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Tên hãng sản xuất</label>
                                                 <select class="custom-select custom-select-lg mb-3" name="mahangsx">
                                                    @foreach($data1 as $d1)
                                               <option value="{{$d1->Mancc}}"  selected>{{$d1->Ten}}</option>
                                               @endforeach
                                             </select>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Loại sản phẩm</label>
                                                 <select name="maloai"  class="custom-select custom-select-lg mb-3">
                                                    @foreach($data as $dloai)
                                               <option value="{{$dloai->code}}" selected>{{$dloai->nameLoai}}</option>
                                               @endforeach
                                             </select>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Chọn File</label>
                                 <div class="input-group">
                                        <span class="input-group-btn">
                                      <p style="    background-color: lightgray;color: black;" id="btl_aaaa" data-input="thumbnail" data-preview="holder1" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> CHỌN
                                      </p>
                                    </span>
                                    <input id="thumbnail" style="width: 50%;" class="form-control" type="text" name="image">
                                  </div>
                                  <img id="holder1" style="margin-top:15px;max-height:100px;width: 100px;height: 100px"/>                                
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                 <div class="form-group">
                                                <label for="comment">Nội dung:</label>
                                                <textarea  class="form-control" rows="5" id="comment" name="noidung"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                 <div class="form-group">
                                                <label for="comment">Thông số:</label>
                                                <textarea  class="form-control" rows="5" id="comment" name="thongso"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">Cập nhật bảng giá</label>
                                                      <input type="text" class="form-control" id="validationCustom01" name="price" placeholder="Giá" required="">
                                                <label for="example-datetime-local-input" class="col-2 col-form-label">Ngày áp dụng</label>
                                                <div class="col-2">
                                                  <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input" name="datebatdau">
                                                </div>                                            
                                                <label for="example-datetime-local-input" class="col-2 col-form-label">Ngày kết thúc</label>
                                                <div class="col-2">
                                                  <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input" name="dateketthuc">
                                                </div>  
                                                <label for="example-datetime-local-input" class="col-2 col-form-label">Chiết khấu</label>
                                                <input type="text" class="form-control" id="validationCustom01" name="chietkhau" placeholder="Chiết khấu" required="">
                                              
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit">ADD</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                    </div>
                   
           
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
            <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script>

             $('#btl_aaaa').filemanager('image');
  $(document).ready(function(){
    // Define function to open filemanager window
    var lfm = function(options, cb) {

      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      window.open(
        route_prefix + 
        '?type=' + options.type ||
         'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

          lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#comment').summernote({
      toolbar: [
        ['popovers', ['lfm']],
         ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
      ],
      buttons: {  
        lfm: LFMButton
      }
    })
  });

</script>
@stop()