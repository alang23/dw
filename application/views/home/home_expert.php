<?php Widget::head();?>
<script>
function flush(msg,url){
	art.dialog(
		msg, 
		function () {
			
			window.location = url;
		},
		function(){
			
		}
	);
}



</script>
<body>

<form class="form-inline definewidth m20" >
    <a href="<?=base_url()?>index.php?d=home&c=expert&m=add"><button type="button" class="btn btn-success" id="addnew">添加</button></a>

</form>

<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>

        <th>ID</th>
        <th >用户名</th>
		 <th>部门</th>
		 <th>类型</th>
        <th>手机号</th>
        <th>注册时间</th>
        <th>管理操作</th>
    </tr>
    </thead>

	<?php
		foreach($list as $k => $v){
	?>
    <tr>
        <td valign="middle"><?=$v['id']?></td>
       
        <td valign="middle"><?=$v['username']?></td>
        <td valign="middle"><?=$v['dep_name']?></td>
        <td valign="middle"><?=$v['check_mobile']?></td>
        <td><?=$v['mobile']?></td>
		 <td><?=date("Y-m-d H:i:s",$v['createtime'])?></td>
        <td>
		<a href="<?=base_url()?>index.php?d=home&c=expert&m=update&id=<?=$v['id']?>">编辑</a> | 
		<a href="<?=base_url()?>index.php?d=home&c=expert&m=del&id=<?=$v['id']?>">删除</a>
		</td>
    </tr>

	<?php
	}
	?>
	<tr>
        <td colspan="9"><?=$page?></td>
    </tr>
</table>

</body>
</html>
