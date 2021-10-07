const quickAccessButton = document.querySelector(".quick-access-button");
const leftMainContent = document.querySelector(".left-main-content");

quickAccessButton.addEventListener("click",()=>{
    leftMainContent.classList.toggle("left-main-content-active");
})
var stepCount=2;
function addStep() {
    var content='<div class="right-main-content-second d-flex flex-column" id="stepdiv'+stepCount+'">'
    +'<input type="file" name="stepimg'+stepCount+'" required>'
    +'<textarea name="steptext'+stepCount+'" cols="30" rows="4" required></textarea>'
    +'<section class="d-flex align-items-center">'
    +'<input type="button" value="Remove" onClick="removeStep('+stepCount+')"></div>';
    var doc = document.getElementById('steps');
    doc.innerHTML+=content;
    stepCount++;
    updateStep();
}
function removeStep(step) {
    document.getElementById('stepdiv'+step).remove();
    stepCount--;
    updateStep();
}
function updateStep() {
    var div = document.getElementById('stepcount');
    div.value=stepCount;
}