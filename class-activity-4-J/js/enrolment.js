//***********************************
//  div hidden view for enrolment 
// 5/Nov/2021  Kazuhisa Kondo (Kazukd)
//***********************************

//auto run after load html  file
Window.addEventListener("load", toggle_hiddenall());


function toggle_view1() {
    //alert("insert");
  //toggle_hiddenall();
  var elem1 = document.getElementById("insert");
  elem1.style.display = "";
  var elem5 = document.getElementById("printall");
    elem5.style.display = "none";
    
}

function toggle_view5() {
    //alert("printall");
    //toggle_hiddenall();
    var elem5 = document.getElementById("printall");
    elem5.style.display = "";
    var elem1 = document.getElementById("insert");
    elem1.style.display = "none";
    
    
  }

function onload_once(){
    const textbox = document.getElementById("flag");
    if (textbox.textContent != "true") {
        alert(textbox.textContent);
        //location.reload();
        //textbox.innerHTML = "true";
        toggle_hiddenall();
       
      } 
     
}

function toggle_hiddenall() {
 
    const textbox = document.getElementById("onload_flag");
    alert(textbox.value);
    textbox.innerHTML = 1;
    document.getElementById("flag").innerHTML = "true";
    document.getElementById("onload_flag").innerHTML = "true";
    
    var elem1 = document.getElementById("insert");
    elem1.style.display = "none";

    
    var elem5 = document.getElementById("printall");
    elem5.style.display = "none";
  
    var elem2 = document.getElementById("delete");
    elem2.style.display = "none";

    var elem3 = document.getElementById("update");
    elem3.style.display = "none";

    var elem4 = document.getElementById("show");
    elem4.style.display = "none";


}
