<div class="t-left">
    <div class="avater"><img src="./static/img/logo.jpg" /></div>
    <div class="menu-list">
        <ul>
            <li class="first-menu <?php if(strpos($menu,'0_')===0){ echo 'active';}?>">
                <a href="./index.php?menu=0_1">首页</a>
            </li>
            <li class="first-menu <?php if(strpos($menu,'1_')===0){ echo 'active';}?>">
                <a href="javascript:;">队列管理 <i class="fa fa-r fa-angle-right" aria-hidden="true"></i></a>
                <ul <?php if(strpos($menu,'1_')===0){ echo 'style="display:block"';}?>">
                    <li class="second-menu <?php if($menu=='1_4'){ echo 'active';}?>"">
                        <a href="./show_process.php?menu=1_4">进程列表</a>
                    </li>
                    <li class="second-menu <?php if($menu=='1_1'){ echo 'active';}?>"">
                        <a href="./listen_queue.php?menu=1_1">查看队列组</a>
                    </li>
                    <li class="second-menu <?php if($menu=='1_2'){ echo 'active';}?>"">
                    <a href="./success_list.php?menu=1_2">成功任务列表</a>
                    </li>
                    <li class="second-menu <?php if($menu=='1_3'){ echo 'active';}?>"">
                    <a href="./fail_list.php?menu=1_3">失败任务列表</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>