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
    <a href="<?=base_url()?>index.php?d=home&c=project&m=add"><button type="button" class="btn btn-success" id="addnew">添加</button></a>

</form>

<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>

        <th>ID</th>
		<th >解答员工</th>
		<th >头像</th>
		<th >内容</th>
		<th >最佳</th>
        <th>管理操作</th>
    </tr>
    </thead>

	<?php
		foreach($list as $k => $v){
	?>
    <tr>
        <td valign="middle"><?=$v['id']?></td>      
        <td valign="middle"><?=$v['realname']?></td>
		 <td valign="middle"><img src="<?=base_url()?>uploads/member/header/<?=$v['headerurl']?>"  width="40px" height="40px"/></td>
        <td><?=$v['content']?></td>
		<td ><?=$v['isbest']?></td>
        <td>
		<a href="<?=base_url()?>index.php?d=home&c=project&m=update&id=<?=$v['id']?>">编辑</a> | 
		<a href="javascript:void(0);" onClick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>index.php?d=home&c=project&m=del&id=<?=$v['id']?>');">删除</a> 
		</td>
    </tr>

	<?php
	}
	?>
	<tr>
        <td colspan="6"><?=$page?></td>
    </tr>
</table>

</body>
</html>
