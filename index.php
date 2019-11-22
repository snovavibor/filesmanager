<?php
require_once('functions.php');


/*точка отсчета */
$start = $_SERVER['DOCUMENT_ROOT'];


if($_POST){
  $temp = ($_POST['temp']) ? $_POST['temp']:'';
  $host = $temp;
}else{
    $host = pathinfo($start)['dirname'];
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fileManager</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
    <h1 style="text-align:center">file manager</h1>
<p >Вы сейчас находитесь на очень интересном пути , а именно здесь:<br><strong class="infoPath"> <?php echo $host;  ?> </strong></p>

    <div class="content d-flex">

    <div class="left">
    <?php

?>
<ul>
    
    <?php
   
    $tempStr = cutStr($start);
    if($tempStr!= $host){
        ?>
        <div class="nav">
            <div class="block up">
                <a href=""> В начало пути </a>
            </div>
            <div class="block oneUp">
                <form action="" method="POST">
                <input type="hidden" name="temp" value="<?= cutStr($host); ?>">
                <button class="back">Вернуться на один уровень выше</button>
                </form>
            </div>
        </div>
        
    
    <?php
    }
    
if(is_dir($host)){
    if ($handle = opendir($host)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                if(is_dir($host.'/'.$entry)){
                    $path = $host.'/'.pathinfo($entry)['filename'];
                    
                    ?>
                   
                    <form action="" method="POST" style="margin-bottom:0.25rem">
                    
                     <li>
                    
                     <input type="hidden" name="temp" value="<?= $path ?>">
                     <button class="longfolder"><span class="emojy">&#128193; </span><?php echo $entry  ?></button>
                     </li>
                     
                    </form> 
                    <?php 
                }else{
                    ?>
                    
                  <li>
                     <button class="short" data-name="<?= $host.'/'.$entry ?>"><span class="emojy">&#128196; </span><?php echo $entry  ?></button> 
                     
                    </li>
                   
                    <?php
                   
                }?>
                
                  
               <?php
                
            }
        }
        closedir($handle);
    }

}

?>
 </ul>  
 </div>
 <div class="rightBlock" >
     <p>Содержимое файла</p>
     <p><i>Открывать файл двойным кликом</i></p>
     <hr>
     <div class="textfile" id="info"></div>   
 </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
