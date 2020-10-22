<?php
$dbName = 'html';
$title = 'HTML';
$addLink ='addhtml.php';
$htmlActive = 'active';
  include 'inc/header.php';
  include 'inc/pageHeader.php';

  require('config/config.php');
  require('config/db.php');

  $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = '$dbName'";
  $result = mysqli_query($conn, $query);

  
 

      $box = '<div class="contentWapper">';
   while ($table = mysqli_fetch_assoc($result)) {
       $box .= '<div class="contentBox">';
       $box .= '<div class="boxTitle">';
       $box .= "<h3>{$table['table_name']}</h3>";
       $box .= "<button id='btnShow' name='{$table['table_name']}'>Show</button>";
       $tableName = $table['table_name'];
  
       $box .= "</div>";
       $box .= '<div class="codeBox">';
       $queryBox = "SELECT * FROM `$tableName`";
       $return = mysqli_query($conn, $queryBox);
       $tags = mysqli_fetch_all($return, MYSQLI_ASSOC);
       foreach ($tags as $tag) {
         $box .=  '<h4>'.$tag['tagTitle'].':'.'</h4>';
         $box .= '<br>';
         $box .= '<p class="tag">'.'&lt'.$tag['tag'].'&gt';
         $box .= $tag['description'];
         $box .= '&lt/'.$tag['tag']. '&gt'.'</p>';
         $box .= '<br>';
         $box .= '<p>'.$tag['comment'].'</p>';
         $box .= '<hr>';



       }
       $box .= "</div>";
       $box .= "</div>";
       mysqli_free_result($return);
       }
      $box .= '</div>';

      mysqli_free_result($result);
      mysqli_close($conn);
      
  ?>
    
    <div class="main-wapper">
      <h2 class="pageTitle">HTML</h2>
      
      
        <?php echo $box ?>
  
      

    </div>
   
  </body>
</html>
