<?php
// 交换数据
include_once 'logic/subject.php';

$subjectList = $GLOBALS["subject_list"];

$GLOBALS["module"] = "subject";
// include head file
include_once 'template/admin_header.php';
?>

<div class="container">

	<div class="row">
		<div class="span6">
			<div class="row" style="margin-bottom:20px;">
				<button class="btn btn-primary pull-right" id="add-new">新增</button>
			</div>

			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>序号</th>
						<th>学科组名称</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($subjectList as $key => $subject) {
						echo "<tr>";
						echo "<td>{$subject["id"]}</td>";
						echo "<td>{$subject["title"]}</td>";
						echo "<td>
						<button onclick='editsubject({$subject["id"]})' class='btn btn-mini btn-primary'><i class=\"icon-edit\"></i> 编辑</button>  
						<a class='btn btn-mini btn-danger' href='subject.php?action=delete&id={$subject["id"]}'>
						<i class='icon-trash'></i> 删除</a>
						</td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- 新增部门的弹出框 -->
<div id="subject-add-modal" class="modal hide fade">
	<form action="subject.php?action=add" method="post">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>新增学科</h3>
		</div>

		<div class="modal-body">
		
			<div class="control-group">
	          	<label class="control-label" for="input01">学科名称</label>
	          	<div class="controls">
            		<input placeholder="请输入学科名称" name="title" class="input-xlarge" type="text">
	            	<small class="help-block"><em>请在该文本框中输入您所要创建的学科的标题</em></small>
	          	</div>
        	</div>

		    <div class="control-group">
	          	<label class="control-label">学科描述</label>
	          	<div class="controls">
		            <div class="textarea">
		                  <textarea class="span5" rows="4" name="description"> </textarea>
		            </div>
	          	</div>
       		</div>
		</div>
		

		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			<button class="btn btn-primary" type="submit">新增</button>
		</div>
	</form>
</div>

<div id="subject-edit-modal" class="modal hide fade">
	<form action="subject.php?action=add" method="post">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>编辑学科</h3>
		</div>

		<div class="modal-body">
		
			<div class="control-group">
	          	<label class="control-label" for="input01">学科名称</label>
	          	<div class="controls">
            		<input placeholder="请输入学科名称" name="title" class="input-xlarge" type="text">
	            	<small class="help-block"><em>请在该文本框中输入您所要创建的学科的标题</em></small>
	          	</div>
        	</div>

		    <div class="control-group">
	          	<label class="control-label">学科描述</label>
	          	<div class="controls">
		            <div class="textarea">
		                  <textarea class="span5" rows="4" name="description"> </textarea>
		            </div>
	          	</div>
       		</div>
		</div>
		

		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			<button class="btn btn-primary" type="submit">编辑</button>
		</div>
	</form>
</div>

<script type="text/javascript">
function editsubject(id){
	$.ajax({
		"type":"post",
		"dataType":"json",
		"data":{"id":id},
		"url":"logic/subject.ajax.php",
		"success":function(data){
			$modal = $("#subject-edit-modal");
			$form = $("form", $modal);
			$form.attr("action", "subject.php?action=update&id="+data.id);

			$subjectTitle = $("input[name=title]", $modal);
			$subjectTitle.val(data.title);

			$subjectDescription = $("textarea[name=description]", $modal);
			$subjectDescription.html(data.description);

			$modal.modal();
		}
	});
}


// open the add modal
$(document).ready(function(){
	$("#add-new").click(function(){
		$("#subject-add-modal").modal();
	});
});
</script>

<?php
include_once 'template/admin_footer.php'; 
?>