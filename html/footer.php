<script>
    $(".menu-list .first-menu").click(function(){
        $(this).addClass("active").siblings().removeClass("active")
        $(this).find("ul").slideToggle()
        $(this).siblings().find("ul").hide()
    })

    $(".menu-list .second-menu").click(function(){
        let $this = $(this)
        $(".second-menu").each(function () {
            if($(this).hasClass("current")){
                $(this).removeClass("current")
            }
        })
        $this.addClass("current").siblings().removeClass("current")
    })

    $(".menu-list .first-menu ul").bind("click",function(event){
        event.stopPropagation()
    })

    function load_table_data(cmd,where,cols,page=false) {
        if(page===true){
            page = {
                layout: ['prev', 'page', 'next', 'count'] //自定义分页布局
            };
        }
        layui.use(['table'], function() {
          var table = layui.table;
            //加载列表
            table.render({
                elem: '#table'
                ,url:'/api.php/'+cmd
                ,where:where
                ,cols:cols
                , page: page
                ,id: 'testReload'
                , parseData: function (res) {
                    if (res.code == 200) {
                        var code = 0;
                    } else {
                        var code = res.ret;
                    }
                    return {
                        code: code,
                        msg: res.message,
                        data: res.data,
                        count: res.data.length
                    }
                }
            });
        })

    }





    //弹出层
    function mymodal($title,$url,$area){
        //iframe层
        layer.open({
            type: 2,
            title: $title,
            shadeClose: true,
            shade: 0.8,
            area: $area,
            content: $url //iframe的url
        });
    }


    /*  针对弹窗子页面  */
    function subform_modal(cmd){
        // 转成
        var data = $("#myform").serializeArray();
        var postData = {};
        $(data).each(function(i){
            if(this.name=='pwd' && this.value!=''){
                postData['pwd'] = $.md5(this.value);
            }else{
                postData[this.name] = this.value;
            }

        });
        // 将获取到的数据post给服务器
        $.post('/api.php/'+cmd,postData,function(result){
            if(result.code == 200) {
                layer.msg(result.message, {
                        icon: 6,
                        time:1000,
                    },function () {
                        //关闭弹窗
                        //parent.layer.closeAll();
                        parent.location.reload();
                    }
                );

            }else{
                // 失败
                return dialog.failmsg(result.message);
            }
        },"JSON");
        return false;
    }

    function closemodal() {
        parent.layer.closeAll();
    }
    get_project_name();
    function get_project_name() {
        ajax_com('queueManage/queueManage-get_name',{},function (res) {
            if(res.code==200){
                if(res.data!=''){
                    $('#project_name').text(res.data);
                }else{
                    $('#project_name').text('默认');
                }
            }else{
                layer.msg(res.message, {icon: 5});
            }
        })
    }
    function refresh() {
        location.reload();
    }

    function del(type) {
        //询问框
        layer.confirm('确定要全部清空吗？', {
            btn: ['是','否'] //按钮
        }, function(){
            ajax_com('queueManage/queueManage-del_logs',{"type":type},function (res) {
                if(res.code==200){
                    layer.msg('操作成功');
                    location.reload();
                }else{
                    layer.msg(res.message, {icon: 5});
                }
            })
        }, function(){
        });
    }
</script>