//javascript for toggle function on adminbooks page
const addBtn = document.getElementById("addNewBooks");
const addDiv = document.getElementById("addBooksDiv");

addBtn.addEventListener('click',addToggle);

function addToggle(){
    addDiv.classList.toggle('showBooks');
}