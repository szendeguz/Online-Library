//javascript for toggle function on profile page
const updateBtn = document.getElementById('updateBtn');
const updateDiv = document.getElementById('updateDiv');

updateBtn.addEventListener('click',showtoggle);

function showtoggle(){
    updateDiv.classList.toggle('showDiv');
}