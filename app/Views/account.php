<!-- Custom styles for this page -->
<link href="<?php echo site_url() . 'assets/' ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<h1 class="h3 mb-2 text-gray-800">Danh sách tài khoản</h1>
<style>
    .dropdown-menu li {
        padding: 4px 7px;
        border-bottom: 1px solid brown;
        cursor: pointer;
    }

    .dropdown-menu li:hover {
        padding: 4px 7px;
        border-bottom: 1px solid brown;
        cursor: pointer;
        background: #1c606a;
        color: white;
    }
</style>
<button class="btn btn-primary btn-icon-split mb-4" data-toggle="modal" data-target="#staticBackdrop"
        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <span class="text"><i class="fa fa-plus" aria-hidden="true"></i>Thêm tài khoản</span>
</button>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>UID</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>UID</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Cookie:</label>
                    <textarea class="form-control" id="cookie"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <!--                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>-->
                <button class="btn btn-danger" id="check-account">Kiểm tra</button>
                <button class="btn btn-primary" disabled id="add-account">Thêm</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo site_url() . 'assets/' ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url() . 'assets/' ?>vendor/datatables/dataTables.bootstrap4.min.js"></script><!-- Page level custom scripts -->
<!--<script src="--><?php //echo site_url().'assets/'?><!--js/demo/datatables-demo.js"></script>-->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let data = null;
        $(this).on('click', '#check-account', function () {
            $("#add-account").attr('disabled', true)
            let button = $(this);
            $(this).attr('disabled', true).html('Đang kiểm tra')
            if ($('#cookie').val().trim() == "") return alert("Vui lòng điền đủ thông tin")
            $.ajax({
                url: '<?php echo site_url('accounts/check')?>',
                type: "POST",
                dataType: "JSON",
                data: {
                    'cookie': $('#cookie').val().trim()
                },
                success: function (response) {
                    $(this).attr('disabled', false).html('Kiểm tra')
                    if (response.status != 200) {
                        data = null;
                        return alert(response.content);
                    }
                    $("#add-account").attr('disabled', false);
                    data = response.data;
                }

            })
        })

        $(this).on('click', '#add-account', function () {
            $("#add-account").attr('disabled', true)
            if ($('#cookie').val().trim() == "") return alert("Vui lòng điền đủ thông tin")
            $.ajax({
                url: '<?php echo site_url('accounts/store')?>',
                type: "POST",
                dataType: "JSON",
                data: data,
                success: function (response) {
                    $("#add-account").attr('disabled', false);
                    data=null;
                    return alert(response.content);
                }
            })
        })

        var table = $('#dataTable').DataTable({
            ajax: {
                url: '<?php echo site_url('accounts/list');?>',
                dataSrc: function (json) {
                    return json.data['list']
                }
            },
            columns: [
                {data: 'id'},
                {data: 'uid'},
                {data: 'name'},
                {
                    data: 'status',
                },
                {
                    data: null,
                    render: function (data) {
                        let link='<?php echo site_url("setting").'/';?>'+data.uid;

                        return '<div class="btn-group dropdown">' +
                            '<a data-toggle="dropdown" class="btn btn-danger dropdown-toggle" href="#">' +
                            'Action' +
                            '</a>' +
                            '<ul data-uid="'+data.uid+'" class="dropdown-menu" role="menu" aria-labelledby="dLabel">' +
                            '<li><a target="blank" href="'+link+'"><i class="fa fa-cog >" aria-hidden="true"></i> Cấu hình</a></li>' +
                            '<li><i class="fa fa-cog change_cookie" aria-hidden="true"></i> cookie</li>' +
                            '<li><i class="fa fa-cog check_cookie" aria-hidden="true"></i> Kiểm tra</li>' +
                            '</ul>' +
                            '</div>';
                    }
                }
            ]
        });

    })

</script>