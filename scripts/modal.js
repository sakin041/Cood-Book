
// Get the modal
var modal = document.getElementById('myModal');
var text = document.getElementById('modaltext');
var submitBt = document.getElementById('movebt');
var movekey = document.getElementById('movepk');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal

// When the user clicks the button, open the modal 
function move(pk,object,action) {
    modal.style.display = "block";
    text.innerHTML="Moving "+object.innerHTML;
    movebt.value = action;
    movekey.value = pk;
	
}




function upfile(){
    var up = document.getElementById("uploadfile");
    up.style.display = "block";
}
function upclose() {
    var up = document.getElementById("uploadfile");
    up.style.display = "none";
}
function crfol(){
    var up = document.getElementById("createfolder");
    up.style.display = "block";
}
function folclose() {
    var up = document.getElementById("createfolder");
    up.style.display = "none";
}
function refile(pk,name){
	console.log(name);
    var re = document.getElementById("renamefile");
    re.style.display = "block";
    document.getElementById("renamefilename").value = name;
    document.getElementById("renamepk").value = pk;
    //closemenu();
}
function rename(object){
	console.log(object.innerHTML);
}
function reclose() {
    var re = document.getElementById("renamefile");
    re.style.display = "none";
}



// When the user clicks on <span> (x), close the modal
//span.onclick = function() {
//    modal.style.display = "none";
//};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    console.log(event.target);
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function myFunction(object) {
    var droplist = document.getElementsByClassName("dropdown-content");
    var drop = object.parentNode.children[1];
    var p = drop.style.display;
    console.log(p);

    for(i=0; i<droplist.length; i++){
        droplist[i].style.display = "none";
        //console.log(droplist[i].className);
    }
    //document.getElementById("myDropdown").classList.toggle("show");
    var droplist = object.parentNode.children;
    for(i=0; i<droplist.length; i++){
        //console.log(droplist[i].className);
    }
    var drop = object.parentNode.children[1];
    //console.log(drop.classList);
    //drop.classList.toggle("show");
    //var p = drop.style.display;
    console.log(p);
    if(p == "block"){
        drop.style.display = "none";
        console.log("its block");
    }
    else{
        drop.style.display = "block";
        console.log("else executed");
    }
}
function closemenu(){
    var droplist = document.getElementsByClassName("dropdown-content");

    for(i=0; i<droplist.length; i++){
        droplist[i].style.display = "none";
        console.log(droplist[i].className);
    }
}

function test (value,object){  
        object.innerHTML=value;
} 


