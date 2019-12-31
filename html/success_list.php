<?php require './header.php' ; ?>
<body>
<div class="b-container">
    <?php require './left.php' ; ?>
    <div class="t-right">
        <?php require './top.php' ; ?>
        <div class="b-contianer">
            <div class="search-section">
                <div class="list-button-section">
                    <button class="layui-btn layui-btn-normal" onclick="refresh()">刷新</button>
                </div>
            </div>

            <table class="layui-table" lay-skin="line" id="table" lay-size="lg" lay-filter="demo"></table>
        </div>
    </div>
</div>
</body>
<?php require './footer.php' ; ?>
<script>
    var cols = [[
        {field:'id', width:80, title: 'ID',type:'numbers'}
        ,{field:'title', minWidth:120, title: '任务'}
        ,{field:'return_val', width:180, title: '返回值'}
        ,{field:'create_time', width:180, title: '执行时间'}
    ]];
    var cmd = 'queueManage/queueManage-show_logs';
    var where = {"type":"success"};
    load_table_data(cmd,where,cols,true);
</script>
</html>
