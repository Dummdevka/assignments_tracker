//Loading all the javascript code
requirejs(["ajax"], function (ajax) {});

//Browse through assignments
document.getElementById("assig_search").addEventListener("keyup", function (e) {
  let req = e.target.value.toUpperCase();

  //Look through Elements in DOM
  let assig_info = document.getElementsByClassName("assig-data");
  for (let i = 0; i < assig_info.length; i++) {
    let block = assig_info[i].textContent || assig_info[i].innerText;

    if (block.toUpperCase().indexOf(req) > -1) {
      assig_info[i].style.display = "";
    } else {
      assig_info[i].style.display = "none";
    }
  }
});

//Editing
let strings = document.querySelectorAll(".assig-str");
//console.log(strings);
for (let i = 0; i < strings.length; i++) {
  strings[i].addEventListener("dblclick", function () {
    let input = document.createElement("input");
    input.type = "text";
    input.className = "assig-edit";
    input.setAttribute("name", strings[i].id);
    strings[i].innerHTML = "";
    strings[i].append(input);

    let button = strings[i].parentElement.nextElementSibling;
    button.innerHTML = "Save";
    button.removeAttribute("id");
    button.classList.remove("bg-red-400");
    button.classList.add("bg-green-400");
    button.id = "assig-edit-btn";
    button.removeEventListener("click", deleteFunc);
    button.addEventListener("click", editFunc);
  });
}

//Deleting
let del = document.querySelectorAll("#assig-delete");

for (let i = 0; i < del.length; i++) {
  del[i].addEventListener("click", deleteFunc);
}

function deleteFunc(event) {
  //GEt id and parent element
  let id = e.target.value;
  let assignment = e.target.parentElement;

  //Call ajax
  ajax("delete", "/assignments_tracker/delete?id=" + id, function () {
    //Remove the block on the frontend
    assignment.remove();
  });
}

function editFunc(e) {
  let update = document.querySelector(".assig-edit");
  let name = update.name;
  let input = update.value;
  let id = e.target.value;
  if(input)
  {
    let post_str = name + "=" + input;
    ajax(
        "post",
        "/assignments_tracker/edit?id=" + id,
        function (res) {
        //Changing button
        e.target.innerHTML = "Delete";
        e.target.removeAttribute("id");
        e.target.classList.remove("bg-green-400");
        e.target.classList.add("bg-red-400");
        e.target.id = "assig-delete";
        e.target.removeEventListener("click", editFunc);
        e.target.addEventListener("click", deleteFunc);

        //Replacing input
        let elem = document.createElement("p");
        elem.id = name;
        elem.innerHTML = input;
        update.replaceWith(elem);
        },
        post_str
    );
  } else{
      update.value = "This field can not be empty!";
  }
}

//Input -> text
//Update database
