//javascript for toggle function on adminprofile page
const updateBtn = document.getElementById('updateBtn');
const updateDiv = document.getElementById('updateDiv');
const addNewAdmin = document.getElementById('addNewAdmin');
const updateAdminDiv = document.getElementById('updateAdminDiv');

updateBtn.addEventListener('click',showtoggle);
addNewAdmin.addEventListener('click',showAdminDiv);

function showtoggle(){
    updateDiv.classList.toggle('showDiv');
}

function showAdminDiv(){
    updateAdminDiv.classList.toggle('showAdminDiv');
}