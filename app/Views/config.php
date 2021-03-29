<div class="card shadow mb-4">
    <div class="card-header">
        Cài đặt chức năng
    </div>
    <div class="card-body">
        <div class="row">
        <?php foreach ($configs as $row=>$value) { ?>
            <div class=" col-3 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <strong><a href="<?php echo site_url($row).'/'.$uid?>"><?php echo strtoupper($row)?></a></strong>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input _setting" id="<?php echo ($row)?>" <?php if($value=="ON") echo 'checked' ?>>
                                    <label class="custom-control-label" for="<?php echo ($row)?>"></label>
                                </div>
                                <a target="_blank" class="btn btn-sm btn-danger" href="<?php echo site_url().'cron/'.$row.'?token='.$auth['token'];?>">cron</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded",function (){
        $(this).on('change','._setting',function (){
            let id= $(this).attr('id');
            let checked = $(this).is(":checked") ? 'ON' : 'OFF';
            $.ajax({
                url:'<?php echo site_url('setting').'/'.$uid.'/edit'?>',
                type:"POST",
                data:{
                    status:checked,
                    type:id
                },success:function (e){

                }
            })
        })
    })
</script>
