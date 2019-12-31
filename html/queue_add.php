<?php require './header.php' ; ?>
<style>
    .layui-input-block{
        width:390px;margin-left:90px;
    }
    .layui-form-label{
        width:90px;
    }
</style>
<form class="layui-form" id="myform" lay-filter="myform">
<div class="modal-container">

        <div class="layui-form-item" style="margin-top:30px;">
            <label class="layui-form-label">cmd</label>
            <div class="layui-input-block">
                <input type="text" name="c" lay-verify="required" autocomplete="off" placeholder="请输入cmd" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">group</label>
            <div class="layui-input-block">
                <input type="text" name="group" autocomplete="off" placeholder="请输入group名" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">参数</label>
            <div class="layui-input-inline">
                <input type="text" name="key[]"  autocomplete="off" placeholder="请输入参数名"
                       class="layui-input" value="">
            </div>
            <div class="layui-input-inline">
                <input type="text" name="val[]" autocomplete="off" placeholder="请输入参数值" class="layui-input" value="">
            </div>
            <i class="layui-icon layui-icon-add-circle-fine" onclick="add()" style="cursor:pointer;font-size: 30px;margin-top:5px;display: inline-block; color: rgb(90,139,255);"></i>
        </div>
        <div class="layui-form-item" id="typediv">
            <label class="layui-form-label">类型</label>
            <div class="layui-input-block">
                <select name="type" class="layui-select" lay-filter="qtype">
                    <option value="realtime">实时队列</option>
                    <option value="delay">延时队列</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item time" hidden>
            <label class="layui-form-label">延时时间</label>
            <div class="layui-input-block">
                <input type="number" name="time"  autocomplete="off" placeholder="请输入延时时间" class="layui-input" value="0">
            </div>
        </div>


</div>
<div class="layer-bottom">
    <button type="button" class="layui-btn layui-btn-primary" onclick="closemodal()">取消</button>
    <button class="layui-btn " lay-submit="" lay-filter="formdemo" type="button">立即提交</button>
</div>
</form>
<?php require './footer.php'; ?>
<script>
    var cmd = 'queueManage/queueManage-add_queue';
    var form;
    layui.use(['upload', 'form', 'layer', 'laydate'], function () {
        form = layui.form;
        form.on('select(qtype)', function (data) {
            if (data.value == 'realtime') {
                $('.time').hide();
            } else {
                $('.time').show();
            }
        })
        /**
         * 提交form表单操作
         */
        form.on('submit(formdemo)', function () {
            subform_modal(cmd);
            return false;
        });

    });

    function add() {
        var h='<div class="layui-form-item">\n' +
            '            <label class="layui-form-label"></label>\n' +
            '            <div class="layui-input-inline">\n' +
            '                <input type="text" name="key[]"  autocomplete="off" placeholder="请输入参数名"\n' +
            '                       class="layui-input" value="">\n' +
            '            </div>\n' +
            '            <div class="layui-input-inline">\n' +
            '                <input type="text" name="val[]" autocomplete="off" placeholder="请输入参数值" class="layui-input" value="">\n' +
            '            </div>\n' +
            '        </div>';
        $('#typediv').before(h);
    }

</script>
