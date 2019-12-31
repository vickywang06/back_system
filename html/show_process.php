<?php require './header.php' ; ?>
<body>
<div class="b-container">
    <?php require './left.php' ; ?>
    <div class="t-right">
        <?php require './top.php' ; ?>
        <div class="b-contianer">

                <div class="search-section">
                 <!--   <form class="layui-form">

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
                    </form>-->
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
    <i class="fa fa-trash handleDel" data-id="1" lay-event="del" aria-hidden="true" title="杀进程"></i>
</script>
<script>
    function start() {
        ajax_com('queueManage/queueManage-go',{},function (res) {
            if(res.code==200){
                layer.msg('开启中。。。');
            }else{
                layer.msg(res.message, {icon: 5});
            }
        })
    }
    var cols = [[
        {field:'id', width:80, title: 'ID',type:'numbers'}
        ,{field:'title', minWidth:120, title: 'key名称'}
        ,{field:'create_time', width:180, title: '启动时间'}
        ,{field:'wealth', width:195, title: '操作', fixed: 'right',toolbar:'#barDemo',align:'center'}
    ]];

    var cmd = 'queueManage/queueManage-show_process';
    var where = {};
    load_table_data(cmd,where,cols);
    layui.use(['table'], function() {
        var table = layui.table;
        //监听工具条
        table.on('tool(demo)', function (obj) {
            var data = obj.data;
            var c = data.title;
            if (obj.event === 'del') {
                ajax_com('queueManage/queueManage-kill',{"process_no":c},function (res) {
                    if(res.code==200){
                        layer.msg('操作成功');
                        location.reload();
                    }else{
                        layer.msg(res.message, {icon: 5});
                    }
                })
            }
        })
    })
</script>
</html>
