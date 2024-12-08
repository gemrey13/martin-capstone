<?php
include('../components/header.php');
?>

<?php
include('../components/sidebar.php');
?>


<?php
include('../components/navbar.php');
?>

<link rel="stylesheet" href="calendar.css">

<div class="main-content">
    <main>
        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                    <div class="calendar-container">
                        <div class="header">
                            <button onclick="prevMonth()">&#8249;</button>
                            <div id="monthYear"></div>
                            <button onclick="nextMonth()">&#8250;</button>
                        </div>
                        <div class="calendar" id="calendar">
                            <!-- Calendar days will be inserted here by JavaScript -->
                        </div>
                    </div>

                    <div id="eventModal">
                        <h2>Add Event</h2>
                        <input type="text" id="eventName" placeholder="Event Name">
                        <input type="hidden" id="eventDate">
                        <button onclick="addEvent()">Add Event</button>
                        <button onclick="closeModal()">Close</button>
                    </div>

                    <script>
                        const calendar = document.getElementById('calendar');
                        const eventModal = document.getElementById('eventModal');
                        const eventNameInput = document.getElementById('eventName');
                        const eventDateInput = document.getElementById('eventDate');
                        const monthYear = document.getElementById('monthYear');

                        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                        const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

                        let currentDate = new Date();
                        let currentMonth = currentDate.getMonth();
                        let currentYear = currentDate.getFullYear();

                        function renderCalendar(month, year) {
                            calendar.innerHTML = "";
                            monthYear.textContent = `${months[month]} ${year}`;

                            // Render day names
                            for (let day of daysOfWeek) {
                                const dayNameElement = document.createElement('div');
                                dayNameElement.classList.add('day-name');
                                dayNameElement.textContent = day;
                                calendar.appendChild(dayNameElement);
                            }

                            // Get first day of the month and total days in the month
                            const firstDay = new Date(year, month, 1).getDay();
                            const daysInMonth = new Date(year, month + 1, 0).getDate();

                            // Render empty cells for days before the first day of the month
                            for (let i = 0; i < firstDay; i++) {
                                const emptyCell = document.createElement('div');
                                calendar.appendChild(emptyCell);
                            }

                            // Render the days of the month
                            for (let day = 1; day <= daysInMonth; day++) {
                                const dayElement = document.createElement('div');
                                dayElement.classList.add('day');
                                dayElement.textContent = day;
                                dayElement.onclick = () => openModal(day);
                                calendar.appendChild(dayElement);
                            }
                        }

                        function openModal(day) {
                            eventModal.style.display = 'block';
                            eventDateInput.value = day;
                        }

                        function closeModal() {
                            eventModal.style.display = 'none';
                        }

                        function addEvent() {
                            const eventName = eventNameInput.value;
                            const eventDate = eventDateInput.value;
                            if (eventName) {
                                const dayElements = calendar.querySelectorAll('.day');
                                const dayElement = Array.from(dayElements).find(el => el.textContent == eventDate);
                                const eventElement = document.createElement('div');
                                eventElement.classList.add('event');
                                eventElement.innerHTML = `${eventName} <button onclick="deleteEvent(this)">&#10005;</button>`;
                                dayElement.appendChild(eventElement);
                                closeModal();
                                eventNameInput.value = ''; // Clear the input after adding
                            }
                        }

                        function deleteEvent(button) {
                            button.parentElement.remove();
                        }

                        function prevMonth() {
                            currentMonth--;
                            if (currentMonth < 0) {
                                currentMonth = 11;
                                currentYear--;
                            }
                            renderCalendar(currentMonth, currentYear);
                        }

                        function nextMonth() {
                            currentMonth++;
                            if (currentMonth > 11) {
                                currentMonth = 0;
                                currentYear++;
                            }
                            renderCalendar(currentMonth, currentYear);
                        }

                        // Initial render
                        renderCalendar(currentMonth, currentYear);
                    </script>
                </div>
            </div>
        </div>

    </main>
</div>

<?php include('../components/footer.php'); ?>