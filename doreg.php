<?php
//获取用户名
$username = $_GET['username'];
//连接数据库，查询是否有该用户对应的记录(省略)
$msg = "";

if ($username == 'admin') {
	$msg = "对不起，该用户名已经被占用";
} else {
	$msg = "恭喜你，该用户可用";
}
//echo $msg;
echo <<<STR
	<script type="text/javascript">
		window.parent.document.getElementById('msg').innerHTML = "$msg";
	</script>
STR;
