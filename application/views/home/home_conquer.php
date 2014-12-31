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
        <th >项目名称</th>
		<th >发起人</th>
		 <th>ICON</th>
		 <th>类型</th>
        <th>描述</th>
        <th>分数</th>
		<th>参与人数</th>
		<th>最优回答</th>
        <th>管理操作</th>
    </tr>
    </thead>

	<?php
		foreach($list as $k => $v){
	?>
    <tr>
        <td valign="middle"><?=$v['id']?></td>
       
        <td valign="middle"><?=$v['title']?></td>
		 <td valign="middle"><?=$v['exrealname']?></td>
        <td valign="middle"><img src="<?=base_url()?>uploads/conquer/<?=$v['icon']?>" width="60px" height="40px" /></td>
        <td valign="middle"><?=$v['type_name']?></td>
        <td><?=$v['content']?></td>
		<td><?=$v['total']?></td>
		<td><?=$v['total']?></td>
		<td><?=$v['realname']?>
		<?php
			if(empty($v['realname'])){
				echo '待定';
			}else{
				echo $v['realname'];
			}
		?>
		</td>
        <td>
        <a href="<?=base_url()?>index.php?d=home&c=mod&m=index&pid=<?=$v['id']?>">模块</a> |
		<a href="<?=base_url()?>index.php?d=home&c=project&m=update&id=<?=$v['id']?>">编辑</a> | 
		<a href="javascript:void(0);" onClick="flush('删除后不能恢复，确定删除吗?','<?=base_url()?>index.php?d=home&c=project&m=del&id=<?=$v['id']?>');">删除</a>
		</td>
    </tr>

	<?php
	}
	?>
	<tr>
        <td colspan="12"><?=$page?></td>
    </tr>
</table>

</body>
</html>
