<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="user.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        }
        .calendar-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 400px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header button {
            padding: 5px 10px;
            border: none;
            background-color: #90caf9;
            border-radius: 5px;
            cursor: pointer;
        }
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            margin-top: 10px;
        }
        .day, .day-name {
            padding: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            cursor: pointer;
        }
        .day-name {
            cursor: default;
            background-color: transparent;
            font-weight: bold;
        }
        .event {
            background-color: #90caf9;
            border-radius: 5px;
            padding: 5px;
            margin-top: 5px;
            position: relative;
        }
        .event button {
            position: absolute;
            top: 0;
            right: 0;
            border: none;
            background-color: transparent;
            color: red;
            cursor: pointer;
        }
        #eventModal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        #eventModal input,
        #eventModal button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!--============NAVIGATION BAR==========-->
    <input type="checkbox" id="nav-toogle">
    <div class="sidebar">
        <div class="logo">
            <h2><img src="assets/images/LYDO-logo.png">LYDC</h2>
        </div>
        
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="user.php">
                        <span class="material-symbols-sharp">grid_view</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="post.php">
                        <span class="material-symbols-sharp">post</span>
                        <span>Post</span>
                    </a>
                </li>  

                <li>
                    <a href="lydo_announcement.php">
                        <span class="material-symbols-sharp">Announcement</span>
                        <span>LYDO Announcement</span>
                    </a>
                </li>

                <li>
                    <a href="message.php">
                        <span class="material-symbols-sharp">chat</span>
                        <span>Messages</span>
                    </a>
                </li>

                <li>
                    <a href="faq.php">
                        <span class="material-symbols-sharp">question_mark</span>
                        <span>FAQ's</span>
                    </a>
                </li>
                <li>
                    <a href="program.php">
                        <span class="material-symbols-sharp">create</span>
                        <span>Create Program</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.php">
                        <span class="material-symbols-sharp">event_note</span>
                        <span>Calendar</span>
                    </a>
                </li>
                
                
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h1>
                <label for="nav-toogle">
                    <span class="las la-bars"></span>
                </label>
                User
            </h1>


            <div class="user-wrapper">
                <img src="assets/images/avatar.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Martin Saturay</h4>
                    <small>User</small>
                    <a href="/capstone/landing.php">
                        <span class="material-symbols-sharp"></span>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </header>

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
    
             

                

        

    </div>
    <!--============SCRIPT==========-->
    <script src="admin.js"></script>
    <!--============icons===========-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>