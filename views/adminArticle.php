<?php
  // 引入顶部及导航栏
  require_once("top.php");

  // 引入SelectArticle类
  require_once("../classes/SelectArticle.php");
  $selectArticle = new SelectArticle();

  // 引入DeleteArticle类
  require_once("../classes/DeleteArticle.php");
  $deleteArticle = new DeleteArticle();


  //输出错误及提示信息
  if (isset($deleteArticle)) {
    if ($deleteArticle->errors) {
        foreach ($deleteArticle->errors as $error) {
            echo $error;
        }
    }
    if ($deleteArticle->messages) {
        foreach ($deleteArticle->messages as $message) {
            echo $message;
        }
    }
  }

  //输出错误及提示信息
  if (isset($selectArticle)) {
    if ($selectArticle->errors) {
      foreach ($selectArticle->errors as $error) {
          echo $error;
      }
    }
    if ($selectArticle->messages) {
      foreach ($selectArticle->messages as $message) {
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
  <title>管理文章</title>

  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/addArticle.css">
  
  <script>
    function delete(str) {
      var xmlhttp;
      if (window.XMLHttpRequest)
      {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
      }
      else
      {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function()
      {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
          document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET","deleteArticle.php?article_id="+str,true);
      xmlhttp.send();
    }

    // function confirmDel() {
    //   var msg = "您真的确定要删除吗？\n\n请确认！";
    //   if (confirm(msg)==true){
    //     return true;
    //   }else{
    //     return false;
    //   }
    // }
  </script>
</head>
<body>
  <div class="mainpart">
    <table calss="table">
      <?php
       $selectArticle->selectAllTitle();
      ?> 
    </table>
      <div id="myDiv"></div>

  </div>
</body>
</html>