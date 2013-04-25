<?php 
include('global.php');
include_once 'template/index_header.php';

if(!empty($_SESSION["user_login"])){
	redirect(SITE."index.php");
}
?>
<style type="text/css">
	 body {
        padding-top: 120px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>

<div class="container">
	<form class="form-signin" action="logic/login.php" method="post">
		<h2 class="form-signin-heading">请登录</h2>
		<input class="input-block-level" type="text" name="email" placeholder="邮箱地址" />
		<input class="input-block-level" type="password"  name="password" placeholder="密码" />
		<label class="checkbox">
			<input type="checkbox" name="remenber_me" value="remenber_me" />
			记住我
		</label>
		<button class="btn btn-large btn-primary" type="submit">登陆</button>
	</form>
</div>
<?php
include_once 'template/index_footer.php'; 
?>