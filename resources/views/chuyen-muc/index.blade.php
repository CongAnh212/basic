@extends('wrapper.share_admin.master')

@section('noi_dung')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h1>Thêm mới chuyên mục</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Tên Chuyên Mục</label>
                        <input type="text" class="form-control" name="" id="ten_chuyen_muc" aria-describedby="helpId"
                            placeholder="nhập chuyên mục">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Slug Chuyên Mục</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                            placeholder="nhập chuyên mục">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Tình trạng</label>
                        <select class="form-select" id="">
                            <option value="1">Hiển thị</option>
                            <option value="0">Tạm ẩn</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" onclick="themChuyenMuc()">Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h1>Danh Sách CHuyên Much</h1>
                </div>
                <div class="card-body">
                    <table class='table table-bordered'>
                        <thead>
                            <tr class='text-center text-nowrap align-middle'>
                                <th>#</th>
                                <th>Tên Chuyên Mục</th>
                                <th>Slug Chuyên Mục</th>
                                <th>Tình Trạng</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var list = []
        async function getData() {
            const response = await axios.get("http://127.0.0.1:8000/chuyen-muc/data");
            list = response.data.abc;
            var myData = ""
            list.forEach(i => {
                myData += "<tr class='text-nowrap align-middle'>"
                myData += "<th class='text-center'>"+ 1 +"</th>"
                myData += "<td>"+ i.ten_chuyen_muc +"</td>"
                myData += "<td>"+ i.slug_chuyen_muc +"</td>"
                myData += "<td>"
                myData += "<button class='btn btn-info'>Hiển Thị</button>"
                myData += "<button class='btn btn-warning'>Tạm Ẩn</button>"
                myData += "</td>"
                myData += "<td>"
                myData += "<button class='btn btn-primary me-1'>Sửa</button>"
                myData += "<button class='btn btn-danger'>Xoá</button>"
                myData += "</td>"
                myData += "</tr>"
            });
            var element = document.getElementById("myTable");
            element.innerHTML  = myData
        }


        getData();
        async function themChuyenMuc(){
            // console.log("lê CÔng Anh");
            var ten_chuyen_muc =document.getElementById("ten_chuyen_muc");
             var payload = await {
                "ten_chuyen_muc" : ten_chuyen_muc.value,
                "slug_chuyen_muc" : "le-cong-anh",
                "tinh_trang" : 1
            }
            axios
                .post("http://127.0.0.1:8000/chuyen-muc/create", payload)
                .then((res) => {
                    console.log(res.data);
                })
        }

    </script>
@endsection
