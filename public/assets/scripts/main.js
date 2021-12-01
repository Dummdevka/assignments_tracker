//Loading all the javascript code
requirejs(['ajax'], function(ajax){
    
});

//Deleting
let del = document.getElementsByClassName("assig-delete");

for (let i = 0; i < del.length; i++) {
	del[i].addEventListener("click", function (e) 
    {
        //GEt id and parent element
        let id = e.target.value;
        let assignment = e.target.parentElement;

        //Call ajax
        ajax('delete', '/assignments_tracker/delete?id=' + id, 
        function() {
            //Remove the block on the frontend
            assignment.remove();
        });
    })
};

//Browse through assignments
document.getElementById("assig_search").addEventListener('keyup', function(e)
{
    let req = e.target.value.toUpperCase();

    //Look through Elements in DOM
    let assig_info = document.getElementsByClassName("assig-info");
    for (let i=0; i<assig_info.length; i++)
    {
        let block = assig_info[i].textContent || assig_info[i].innerText;

        if(block.toUpperCase().indexOf(req) > -1) {
            assig_info[i].style.display = '';
        } else{
            assig_info[i].style.display = "none";
        }
    }
    //If something is equal -> console.log it
})