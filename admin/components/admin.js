// Ensure the DOM content is loaded before adding event listeners
document.addEventListener('DOMContentLoaded', function() {
    const mainButton = document.getElementById('main-button');
    const floatingMenu = document.getElementById('floating-menu');

    // Check if the elements exist and log for debugging
    if (mainButton && floatingMenu) {
        console.log('Button and Menu loaded successfully!'); // Debugging log

        // Add event listener for the main button
        mainButton.addEventListener('click', function() {
            console.log('Main button clicked!'); // Debugging log

            // Toggle 'show-menu' class on the floating menu
            floatingMenu.classList.toggle('show-menu');
        });
    } else {
        console.error('Main button or Floating menu not found!'); // Error log
    }
});

function toggleNotifications() {
    const dropdown = document.getElementById("notificationDropdown");
    dropdown.style.display = dropdown.style.display === "none" || dropdown.style.display === "" ? "block" : "none";
}

// Close the dropdown if clicking outside of it
document.addEventListener("click", function(event) {
    const dropdown = document.getElementById("notificationDropdown");
    const bellIcon = document.querySelector(".bell-icon");
    if (!dropdown.contains(event.target) && event.target !== bellIcon) {
        dropdown.style.display = "none";
    }
});

function toggleNotifications() {
    const dropdown = document.getElementById("notificationDropdown");
    dropdown.style.display = dropdown.style.display === "none" || dropdown.style.display === "" ? "block" : "none";
}

// Close the dropdown if clicking outside of it
document.addEventListener("click", function(event) {
    const dropdown = document.getElementById("notificationDropdown");
    const bellIcon = document.querySelector(".bell-icon");
    if (!dropdown.contains(event.target) && event.target !== bellIcon) {
        dropdown.style.display = "none";
    }
});


// js for message icon
function toggleMessages() {
    const dropdown = document.getElementById("messageDropdown");
    dropdown.style.display = dropdown.style.display === "none" || dropdown.style.display === "" ? "block" : "none";
}

// Close dropdown when clicking outside
document.addEventListener("click", function(event) {
    const messageIcon = document.querySelector(".message-icon");
    const dropdown = document.getElementById("messageDropdown");

    if (!messageIcon.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.style.display = "none";
    }
});


