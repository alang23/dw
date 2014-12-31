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


<form method="post" action="<?=base_url()?>index.php?d=home&c=member&m=add" enctype="multipart/form-data">
<table width="511" class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>

        <th width="64"></th>
        <th width="332"></th>
		<th width="99"></th>
    </tr>
    </thead>


    <tr>
        <td>用户名</td>       
       <td colspan="2">
         <input type="text" name="username">
       </td>
	</tr>
      <tr>
        <td>真是姓名</td>       
       <td colspan="2">
         <input type="text" name="realname">
       </td>
  </tr>
      <tr>
      <td>头像</td>
      <td colspan="2">
        <input type="file" name="userfile">
      </td>
    </tr>
        <tr>
        <td>密码</td>       
       <td colspan="2">
         <input type="password" name="passwd">
       </td>
  </tr>
   <tr>
        <td>手机号</td>       
       <td colspan="2">
         <input type="text" name="mobile">
       </td>
  </tr>
     <tr>
        <td>验证电话</td>       
       <td colspan="2">
         <input type="text" name="check_mobile">
       </td>
  </tr>
       <tr>
        <td>部门</td>       
       <td colspan="2">
         <select name="depid">
		 	<option value="0">==选择部门==</option>
      <?php
        foreach($dep as $dk => $dv){
      ?>
        <option value="<?=$dv['id']?>" ><?=$dv['dep_name']?></option>
        <?php
      }
        ?>
		 </select>
       </td>
  </tr>
         <tr>
        <td>角色</td>       
       <td colspan="2">
        <select name="roleid">
		 	<option value="0">==选择部门==</option>
			<option value="1">员工</option>
			<option value="2">专家</option>
		 </select>
       </td>
  </tr>
         <tr>
        <td>专业</td>       
       <td colspan="2">
         <input type="text" name="profession">
       </td>
  </tr>
           <tr>
        <td>行业</td>       
       <td colspan="2">
         <input type="text" name="industry">
       </td>
  </tr>

    <tr>
      <td>简介</td>
      <td colspan="2">
        <textarea name="content"></textarea>
      </td>
    </tr>
    <tr>
      <td>帐号状态</td>
      <td colspan="2">
        <input type="radio" name="enabled" value="1"  checked="checked"/>正常  <input type="radio" name="enabled" value="0" />停用
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="Submit" value="提交">
      </td>
      <td colspan="2">&nbsp;</td>
    </tr>
</table>
</form>
</body>
</html>
