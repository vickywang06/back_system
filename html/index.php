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
                              <input type="text" autocomplete="off" class="layui-input" maxlength="10" placeholder="切换项目" id="keyword">
                          </div>
                      </div>
                      <div class="layui-inline">
                          <button class="layui-btn major-btn5 layui-btn-sm" onclick="changeProject()"  lay-filter="formDemo" id="searchbtn" data-type="reload" type="button">提交</button>
                      </div>

                  </div>
              </form>
          </div>

      </div>
    </div>
  </div>
</body>

<?php require './footer.php' ; ?>
<script>
    function changeProject() {
        var project_name = $('#keyword').val();
        ajax_com('queueManage/queueManage-set_name',{"project_name":project_name},function (res) {
            if(res.code==200){
                layer.msg('切换成功');
                location.reload();
            }else{
                layer.msg(res.message, {icon: 5});
            }
        })
    }

    get_name();
    function get_name() {
        ajax_com('queueManage/queueManage-get_name',{},function (res) {
            if(res.code==200){
                if(res.data!=''){
                    $('#keyword').val(res.data);
                }
            }else{
                layer.msg(res.message, {icon: 5});
            }
        })
    }
</script>
</html>
