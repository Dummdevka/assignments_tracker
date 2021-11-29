//Ajax calls function

function XMLDoc() {
    
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            if (xmlhttp.status == 200) {
                document.getElementById(id).innerHTML = xmlhttp.responseText;
            }
            else if (xmlhttp.status == 400) {
                alert("There was an error");
            }
            else {
                alert("Unable to send data");
            }
        }
    }
    xmlhttp.open(method, path, true);
    xmlhttp.send();
}