
//Ajax function
function ajax(method, url, callback, post_str = false) 
{
    //Define new object
    let request = new XMLHttpRequest;

    //When the response is ready
    request.onreadystatechange = function() {
        if(request.readyState == request.DONE){
             //Success
            if(request.status == 200) {
                //What you want to do
                callback();
            }
            else if(request.status == 400) {
                alert('There has been an error');
            }
            else {
                //Debug mode only!!
                alert(request.status);
            }
        }
    }
    //Send the request
    request.open(method, url);
    post_str ? request.send(post_str) : request.send(); 
}

let del = document.getElementsByClassName("ass-delete");

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
