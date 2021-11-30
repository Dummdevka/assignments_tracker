<!-- <form action="" method="post">
    <input type="text" placeholder="New assignment...">
    <input type="file" name="" id="">
    <button type="submit">Add</button>
</form> -->
<br>
<br>
<?php


foreach ($vars as $ass){
    ?>
    <div id="ass-data">
        <div class="ass-info">
        <?php echo $ass->title?>
        <?php echo $ass->subject?>
        <?php echo $ass->description ?>
        </div>
        <button class="ass-delete" value="<?php echo $ass->id; ?>">Delete</button>

    </div>
    <br>
    <br>
    <?php
}

