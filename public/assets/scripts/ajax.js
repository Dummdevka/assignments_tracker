
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
                console.log(request.responseText);
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

