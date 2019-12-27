<?php require './header.php' ; ?>
<body>
  <div class="b-container">
<?php require './left.php' ; ?>
    <div class="t-right">
        <?php require './top.php' ; ?>
      <div class="b-contianer">
        <!-- 操作栏 -->
        <div class="menu-contianer">
          <div class="add-btn create-btn">
            <i class="fa fa-plus" aria-hidden="true"></i> 
            新增
          </div>
          <div class="search-container">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="根据XXX搜索">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">搜索</button>
              </span>
            </div>
          </div>
        </div>
        <!-- Table -->
        <div class="table-container">
          <table class="table table-bordered table-bordered">
            <thead>
              <tr>
                <th>key名称</th>
                <th>加入时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>内容1</td>
                <td>内容2</td>
                <td class="td-menu">
                  <i class="fa fa-pencil-square-o handleEdit" aria-hidden="true" title="编辑"></i>
                  <i class="fa fa-trash handleDel" data-id="1" aria-hidden="true" title="删除"></i>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="page-contanier">
            <nav class="page-bar" aria-label="Page navigation">
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 删除模态框 -->
  <div class="del-container">
    <div class="del-title">
      <span class="del-text">提示：</span>
    </div>
    <div class="del-tip">您是否要删除该条数据？</div>
    <div class="delBtn-container">
      <button type="button" class="btn btn-info">取 消</button>
      <button type="button" class="btn btn-success">确 定</button>
    </div>
  </div>

  <!-- 新增模态框 -->
  <div class="add-container">
    <div class="form-container">
      <div class="add-title">
        <span class="add-text">新增</span>
      </div>
      <div class="add-content">
        <div class="row">
          <div class="col-xs-6">
            <span>姓名：</span>
            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
          </div>
          <div class="col-xs-6">
            <span>密码：</span>
            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <span>radio：</span>
            <div>
              <label><input name="sex" type="radio" value="1" />radio1</label> 
              <label><input name="sex" type="radio" value="0" />radio2</label> 
            </div>
          </div>
          <div class="col-xs-6">
            <span>checkbox:</span>
            <div>
              <label ><input type="checkbox"></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <span>姓名：</span>
            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
          </div>
          <div class="col-xs-6">
            <span>密码：</span>
            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
          </div>
        </div>
      </div>
      <div class="btn-box">
        <button type="button" class="add_btn-cancel btn btn-info">取 消</button>
        <button type="button" class="btn btn-success">确 定</button>
      </div>
    </div>
  </div>
</body>
<script>
  $(function() {



    // 删除弹框出现
    $('.handleDel').click(function(event) {
      let id = $(this).attr('data-id')
      $('.del-container').show()
    })

    // 删除弹窗隐藏
    $('.btn-info').click(function () { 
      $('.del-container').hide()
    })
    // 新增
    $('.create-btn').click(function() {
      $('.add-text').text('新增')
      $('.add-container').show()
    })
    $('.add_btn-cancel').click(function() {
      $('.add-container').hide()
    })
    // 编辑
    $('.handleEdit').click(function() {
      $('.add-text').text('编辑')
      $('.add-container').show()
    })
    $('.add_btn-cancel').click(function() {
      $('.add-container').hide()
    })
  })
</script>
<?php require './footer.php' ; ?>
</html>
