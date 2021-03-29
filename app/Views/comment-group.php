<h1 class="h3 mb-4 text-gray-800">Cấu hình comment group [tài khoản: <?php echo $account?>]</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="post" action="<?php echo site_url('comment_group').'/'.$uid?>">
        <div class="form-group">
            <label>UID GROUP: <strong class="text-muted">Mỗi dòng 1 uid</strong></label>
            <textarea class="form-control" name="group_ids"><?php echo $data->group_ids ?? ""?></textarea>
        </div>

        <div class="form-group">
            <label>Nội dung: <strong class="text-muted">Nội dung ngăn cách nhau bởi |</strong></label>
            <textarea class="form-control" name="content"><?php echo $data->content ?? ""?></textarea>
        </div>
        <button type="submit" class="btn btn-success float-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cập nhật</button>
        </form>
    </div>
</div>