<?php require './header.php' ; ?>
<body>
<div class="b-container">
    <?php require './left.php' ; ?>
    <div class="t-right">
        <?php require './top.php' ; ?>
        <div class="b-contianer">
                <table class="layui-table" lay-skin="line" id="table" lay-size="lg" lay-filter="demo"></table>
        </div>
    </div>
</div>
</body>
<?php require './footer.php' ; ?>
<script type="text/html" id="barDemo">
    <i class="fa fa-pencil-square-o handleEdit" aria-hidden="true" lay-event="add" title="重新加入队列"></i>
</script>
<script>
    var cols = [[
        {field:'id', width:80, title: 'ID',type:'numbers'}
        ,{field:'title', width:520, title: '任务'}
        ,{field:'return_val', minWidth:180, title: '返回值'}
        ,{field:'create_time', width:180, title: '执行时间'}
        ,{field:'wealth', width:195, title: '操作', fixed: 'right',toolbar:'#barDemo',align:'center'}
    ]];
    var cmd = 'queueManage/queueManage-show_logs';
    var where = {"type":"failed"};
    load_table_data(cmd,where,cols,true);
    layui.use(['table'], function() {
        var table = layui.table;
        //监听工具条
        table.on('tool(demo)', function (obj) {
            var data = obj.data;
            var c = data.title;
            if (obj.event === 'add') {
                ajax_com('queueManage/queueManage-fail_task_reback',{"c":c},function (res) {
                    if(res.code==200){
                        layer.msg('操作成功');
                    }else{
                        layer.msg(res.message, {icon: 5});
                    }
                })
            }
        })
    })

</script>
</html>
