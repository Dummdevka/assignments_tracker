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
    <div>
        <?php echo $ass->title?>
        <?php echo $ass->subject?>
        <?php echo $ass->description ?>

    </div>
    <button onclick="XMLDoc()">Delete</button>
    <br>
    <br>
    <?php
}

//Delete - Ajax call <?php echo $ass->title; ?>, 'delete', '/assignments/delete'
//Add - Ajax call
//Add tailwind with composer