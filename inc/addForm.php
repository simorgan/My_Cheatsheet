<?php
   require('config/config.php');
   require('config/db.php');

  
   
   $query = "SELECT table_name FROM information_schema.tables WHERE table_schema = '$dbName'";
   $result = mysqli_query($conn, $query);

    $opt = '<select name="container" >';
    $opt .= "<option value='select'>Select A Container</option>";
    while ($table = mysqli_fetch_assoc($result)) {
        $opt .= "<option name='{$table['table_name']}' id='{$table['table_name']}' value='{$table['table_name']}'>{$table['table_name']}</option>";
    }
    $opt .= "</select>"



?>

<h1><?php echo $pageTitle ?></h1>

<div class="addNewWapper">
<H3>Add a new container</H3>
<Form method="POST" name="newContainer" id="newContainer" class="newContainer">
<input type="text" name="containerNew" id="containerNew" placeholder="Container Name" required> <br>
<input type="submit" name="submitCon" value="Add New Container">
</Form>
<h3>Add new example </h3>
    <form method="POST" action="<?php echo $page?>" id="addExample" class="newExample">
      <?php echo $opt ?> <br>

        <input type="text" name="tagTitle" id="" placeholder="Tag Title" required> <br>

        <input type="text" name="tag" id="" placeholder="Tag" required> <br>

        <textarea name="comment" id="" cols="30" rows="5" placeholder="Comment"></textarea> <br>
    <input type="submit" name="submitTag" id="" value="Upload Tag">



    </form>

<a href="index.php"><button>Cancel</button></a> 

</div>
</body>