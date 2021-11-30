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

//Adding
// document.getElementById("assig-add")
// .addEventListener('click', function(e) 
// {
//     //console.log(e);
//     //Get Title
//     let title = document.getElementById("assig_title").value;
//     //Get Subject
//     let subject = document.getElementById("assig_subject").value;
//     //Get Description
//     let description = document.getElementById("assig_desc").value;
//     let post_str = 'title=' + title + '&subject=' + subject + '&description=' + description;

//     //Send POST request
//     ajax('post', '/assignments_tracker/add', function() { console.log("cool");}, post_str);
// })