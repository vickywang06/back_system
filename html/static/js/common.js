function ajax_com(cmd,post_data, callback) {
    //loading层
    var loading = layer.load(1, {
        shade: [0.1,'#fff'] //0.1透明度的白色背景
    });
    $.ajax({
        url: '/api.php/'+cmd,
        type: 'post',
        data: post_data,
        dataType: 'json',
        success: function (data) {
            layer.closeAll('loading');
            if (data.code === 2005) {
                layer.msg("登录超时，请重新登录");
                setTimeout(function () {
                    parent.location.href = './login.php';
                }, 600);
            } else
                callback(data);
        }
    })
}

function login_out() {
    $.ajax({
        url: '/api.php',
        type: 'post',
        data: {'cmd': 'adminApi/admin_acc-login_out'},
        dataType: 'json',
        success: function (data) {
            parent.location.href = './login.php';
        }
    })
}

function check_login() {
    ajax_com({'cmd': "adminApi/admin_acc-check_login"}, function () {
    })
}


//获取url中的参数
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); // 匹配目标参数
    var result = window.location.search.substr(1).match(reg); // 对querystring匹配目标参数
    if (result != null) {
        return decodeURIComponent(result[2]);
    } else {
        return '';
    }
}


/*弹出层*/

/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
function layer_show(title, url, w, h) {
    if (title == null || title == '') {
        title = false;
    }
    ;
    if (url == null || url == '') {
        url = "404.html";
    }
    ;
    if (w == null || w == '') {
        w = 800;
    }
    ;
    if (h == null || h == '') {
        h = ($(window).height() - 50);
    }
    ;
    layer.open({
        type: 2,
        area: [w + 'px', h + 'px'],
        fix: false, //不固定
        maxmin: true,
        shade: 0.4,
        title: title,
        content: url
    });
}

/*关闭弹出框口*/
function layer_close() {
    var index = parent.layer.getFrameIndex(window.name);
    parent.layer.close(index);
}

// 删除url参数中指定键名的键和值
function funcUrlDel(paramUrl, delKey) {
    var arr = paramUrl.split("&");
    var newUrl = '';
    for (var i = 0; i < arr.length; i++) {
        var kv = arr[i].split("=");
        if(kv[0] == delKey) {
            continue;
        }

        if(newUrl == ''){
            newUrl = kv[0] + "=" + kv[1];
        } else {
            newUrl += "&" + kv[0] + "=" + kv[1];
        }
    }
    return newUrl;
}