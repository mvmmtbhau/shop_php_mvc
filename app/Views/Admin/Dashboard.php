<?php
if(Session::get('message') && Session::get('message') != NULL){
    ?>
    <div class="alert alert-<?php echo Session::get('type')?>">
    <?php echo Session::get('message')?>    
    </div>
    <?php
    Session::set('message','');
    ?>
<?php
}
?>
<h3 class="text-center">About us</h3>
<div class="col-md-6">
    <form action="<?php echo BASE_URL ?>InfoController/insertInfo" method="POST">
        <?php
        if ($info) {

            foreach ($info as $key => $val) {

        ?>
                <div class="mb-3">
                    <label class="form-label">Thông tin về chúng tôi</label>
                    <textarea id="editor" style="resize: none;" rows="5" class="form-control" name="info_content">
                <?php echo $val['info_content'] ?>
            </textarea>
                </div>
        <?php
            }
        } else {
            echo '<div class="mb-3">
            <label class="form-label">Thông tin về chúng tôi</label>
            <textarea id="editor" style="resize: none;" rows="5" class="form-control" name="info_content">
        Hi, chúng tôi chưa cập nhật xong!! Mong thông cảm
    </textarea>
        </div>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
    </form>
</div>