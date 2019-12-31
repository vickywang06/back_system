<?php require './header.php' ; ?>
<body>
<div class="b-container">
    <?php require './left.php' ; ?>
    <div class="t-right">
        <?php require './top.php' ; ?>
        <div class="b-contianer">




                <div class="search-section">
                   <!-- <form class="layui-form">

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
                        <button class="layui-btn major-btn2" onclick="mymodal('新增任务','./queue_add.php',['550px', '500px'])">新增任务</button>
                    </div>
                </div>


                <table class="layui-table" lay-skin="line" id="table" lay-filter="demo"></table>





        </div>
    </div>
</div>
</body>
<?php require './footer.php' ; ?>
<script>
    var cols = [[
        {field:'id', width:80, title: 'ID',type:'numbers'}
        ,{field:'title', minWidth:120, title: 'key名称'}
        ,{field:'create_time', width:180, title: '加入时间'}
    ]];

    var cmd = 'queueManage/queueManage-show_queue';
    var where = {};
    load_table_data(cmd,where,cols);
</script>
</html>
