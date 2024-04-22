document.addEventListener('DOMContentLoaded', () => {
    
    document.querySelectorAll('.day').forEach(day => {
        day.addEventListener('click', () => {
            let task = prompt("Add a new task for " + day.id);
            if (task) {
                let listItem = document.createElement('li');
                listItem.textContent = task;
                day.querySelector('.tasks').appendChild(listItem);
            }
        });
    });
});
// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get all week days
var days = document.querySelectorAll('.week-planner ul li');

// Loop through all days to attach click event
days.forEach(function(day) {
    day.onclick = function() {
        modal.style.display = "block";
        document.getElementById("modalText").innerHTML = "Details for " + day.innerHTML;
    }
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
