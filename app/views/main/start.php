<form action="/assignments_tracker/add" method="post" enctype="multipart/form-data"
class="flex flex-col mt-8 rounded-md p-2 mb-8">
    <input type="text" name="title" id="assig_title" placeholder="Title"
    class="h-8 border-b mb-2">
    <input type="text" name="subject" id="assig_subject" placeholder="Subject"
    class="h-8 border-b mb-2">
    <textarea placeholder="Description" name="description" id="assig_desc" cols="20" rows="8"
    class="h-28 border rounded-sm text-md p-1 mb-2"></textarea>
    <button type="submit" id="assig-add"
    class="bg-blue-400 h-7 rounded-sm">Add</button>
</form>

<div id="assig_browse" class="mb-5">
<input type="search" name="assig_browse" placeholder="Search.." id="assig_search"
class="border border-gray-300 rounded-sm w-8/12 p-1 text-md">

</div>

<div id="assig-list"
class="w-full flex flex-col">
<?php


foreach ($vars as $assig){
    ?>
    <div class="assig-data flex items-center justify-between h-10 bg-gray-200 mb-2 rounded-sm pl-1 border cursor-pointer">
        <div class="assig-info 
        flex">
        <p id="title" class="assig-str
        mr-5">        
            <?php echo $assig->title?>
        </p>
        <p id="subject" class="assig-str 
        mr-5">        
            <?php echo $assig->subject?>
        </p>
        <p id="description" class="assig-str
        mr-5 text-xs text-gray-500 ">        
            <?php echo $assig->description?>
        </p>
        
        
        </div>
        <button id="assig-delete" class="h-7 w-20 rounded-sm bg-red-400 mr-2" value="<?php echo $assig->id; ?>">Delete</button>
        
    </div>
    <?php
} ?>
</div>
    


