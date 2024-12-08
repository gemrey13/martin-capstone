    <script src="script.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle('active');
        }
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000); // Change image every 3 seconds
        }

        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle('active');
        }

        // JavaScript for showing content sections
        function showContent(program) {
            var programs = document.getElementsByClassName('program-content');
            for (var i = 0; i < programs.length; i++) {
                programs[i].style.display = 'none';
            }
            document.getElementById(program).style.display = 'block';
        }

        // Initially hide all program contents
        window.onload = function() {
            var programs = document.getElementsByClassName('program-content');
            for (var i = 0; i < programs.length; i++) {
                programs[i].style.display = 'none';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>

    </html>