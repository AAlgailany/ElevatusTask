<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    input {
        margin-top: 50px;
    }
    span{
        font-size: 14px;
    }
</style>
<?php

require_once ('levenshtein.php');

?>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-6 text-center">
            <form action="" method="post">
                <input type="text" class="form-control" name="string1" placeholder="String 1" id="">
                <input type="text" class="form-control" name="string2" placeholder="String 2" id="">
                <input type="submit" value="Levenshtein" name="submit">
            </form>

            <span>Result</span>
            <?php
            if(isset($_GET['result']))
            {
                echo $_GET['result'];
            }
            ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit']))
{
    $levenshtein_obj = new levenshtein();
    $levenshtein_obj->levenshtein_dis($_POST['string1'], $_POST['string2']);
    
}


