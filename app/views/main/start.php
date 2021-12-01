<form action="/assignments_tracker/add" method="post">
    <input type="text" name="title" id="assig_title" placeholder="Title">
    <input type="text" name="subject" id="assig_subject" placeholder="Subject">
    <textarea name="description" id="assig_desc" cols="20" rows="8"></textarea>
    <button type="submit" id="assig-add">Add</button>
</form>
<br>
<br>
<div id="assig_browse">
<input type="search" name="" id="assig_search">

</div>

<br>
<br>
<div id="assig-list">
<?php


foreach ($vars as $assig){
    ?>
    <div id="assig-data">
        <div class="assig-info">
        <?php echo $assig->title?>
        <?php echo $assig->subject?>
        <?php echo $assig->description ?>
     
        <button class="assig-delete" value="<?php echo $assig->id; ?>">Delete</button>
        </div>
    </div>
    <?php
} ?>
</div>
    <br>
    <br>


