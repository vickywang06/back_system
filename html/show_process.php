<?php require './header.php' ; ?>
<body>
<div class="b-container">
    <?php require './left.php' ; ?>
    <div class="t-right">
        <?php require './top.php' ; ?>
        <div class="b-contianer">




                <div class="search-section">
                    <form class="layui-form">

                        <div class="layui-form-item" style="margin-bottom:0;">
                            <div class="layui-inline">
                                <div class="layui-input-inline" >
                                    <input type="text" name="title" autocomplete="off" class="layui-input" maxlength="10" placeholder="输入关键字" id="keyword">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <button class="layui-btn major-btn5 layui-btn-sm"  lay-filter="formDemo" id="searchbtn" data-type="reload" type="button">搜索</button>
                            </div>

                        </div>
                    </form>
                    <hr class="layui-bg-gray">
                    <div class="list-button-section">
                        <button class="layui-btn major-btn2" onclick="start()">开启主进程</button>
                    </div>
                </div>


                <table class="layui-table" lay-skin="line" id="table" lay-filter="demo"></table>





        </div>
    </div>
</div>
</body>
<?php require './footer.php' ; ?>
<script type="text/html" id="barDemo">
    <i class="fa fa-trash handleDel" data-id="1" lay-event="del" aria-hidden="true" title="删除"></i>
</script>
<script>
    function start() {
        ajax_com('queueManage/queueManage-go',{},function (res) {
            if(res.code==200){
                layer.msg('开启成功');
            }else{
                layer.msg(res.message, {icon: 5});
            }
        })
    }
/*ajax_com('queueManage/queueManage-show_queue',{},function (res) {
    if(res.code==200){
        var html='';
        $.each(res.data,function (key,val) {
            html+='<tr>\n' +
                '                        <td>'+key+'</td>\n' +
                '                        <td>'+val+'</td>\n' +
                '                        <td class="td-menu">\n' +
                '                            <i class="fa fa-pencil-square-o handleEdit" aria-hidden="true" title="编辑"></i>\n' +
                '                            <i class="fa fa-trash handleDel" data-id="1" aria-hidden="true" title="删除"></i>\n' +
                '                        </td>\n' +
                '                    </tr>';
        })
        $('#tab-con').html(html);
    }else{
        alert(res.message);
    }
})*/

    var cols = [[
        {field:'id', width:80, title: 'ID',type:'numbers'}
        ,{field:'title', minWidth:120, title: 'key名称'}
        ,{field:'create_time', width:180, title: '启动时间'}
        ,{field:'wealth', width:195, title: '操作', fixed: 'right',toolbar:'#barDemo',align:'center'}
    ]];

    var cmd = 'queueManage/queueManage-show_process';
    var where = {};
    load_table_data(cmd,where,cols);
</script>
</html>
