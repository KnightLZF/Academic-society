<?php
  //引入顶部及导航栏
  include("top.php");

  //引入AddArticle类
  require_once("../classes/AddArticle.php");

  $addArticle = new AddArticle();

  //输出错误及提示信息
  if (isset($addArticle)) {
    if ($addArticle->errors) {
        foreach ($addArticle->errors as $error) {
            echo $error;
        }
    }
    if ($addArticle->messages) {
        foreach ($addArticle->messages as $message) {
            echo $message;
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>发表文章</title>

  <!-- 加载富文本框ueditor -->
  <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
  <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
  <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
  <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/addArticle.css">
  
</head>
<body>
  <div class="mainpart">
    <form action="addArticle.php" method="post">
        <input type="text" calss="login_input form-control" name="articleTitle" placeholder="请输入文章标题" required>
        
        <select name="articleTypeId" >
            <option value ="1">学会新闻</option>
            <option value ="2">通知公告</option>
            <option value ="3">文章类型3</option>
            <option value ="4">文章类型4</option>
            <?php
            if($login->isAdmin()) {
                echo "
                <option value =\"5\">组织机构</option>
                <option value =\"6\">理事名单</option>
                <option value =\"7\">学会章程</option>
                <option value =\"8\">政策文件</option>
                <option value =\"9\">学会名人</option>
                <option value =\"10\">培训信息</option>
                ";
            }
            ?>
        </select>

        <script id="editor" name="articleContent" type="text/plain" style="width:100%;height:500px;"></script>

        <input type="submit" calss="login_input form-control" name="addBtn" value="提交"/>
    </form>
  </div>


<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

  </script>
</body>
</html>