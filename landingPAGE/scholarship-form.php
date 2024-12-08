<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LYDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Sora">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../landingPAGE/scholarship-form.css">
    <style>
        body {
            background-color: rgba(21, 20, 51);
        }
      
    </style>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-1 sticky-top bg-body-tertiary">
    <div class="container">
        <a href="#" class="navbar-logo">
        <img src="../landingPAGE/lydo-logo-hd.png" alt="logo">
        <span style="color:black;">Lucena City Youth Development Council</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="homepage.php">About Us</a>
            </li>
            <li class="nav-item dropdown">
            <a href="#" class="nav-link dropbtn">Programs</a>
            <div class="dropdown-content">
                <a href="scholar.php" onclick="showContent('scholar')">Scholarships</a>
                <a href="youthprofiling.php">Youth Profiling</a>
            </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="homepage.php">News</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#notifications">
                <i class='bx bxs-bell'></i> 
            </a>
            </li>
            <li class="nav-item dropdown">
            <a href="#" class="nav-link dropbtn">
                <i class='bx bxs-user-circle profile-icon'></i> Profile
            </a>
            <div class="dropdown-content">
                <a href="#dashboard">Dashboard</a>
                <a href="application-status.php">Monitor Application Status</a>
                <a href="#account-settings">Account Settings</a>
                <a href="#logout">Log Out</a>
            </div>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- NAVBAR -->

    <div class="form-container">
    <header class="text-center mb-4">
        <h2>Scholarship Application Form</h2>
    </header>

    <!-- Multi-Step Form -->
    <form action="/submit-scholarship" method="post" id="multiStepForm">
        <!-- Step 1: General Qualifications and Requirements -->
        <div class="form-step active">
            <h5>General Qualifications and Requirements</h5>
            <p><strong>General Requirements for Scholarship Application</strong></p>
            <ol>
                <li><strong>Eligibility:</strong> Incoming Senior High School (SHS) students, incoming college freshmen, or currently enrolled students from 2nd to 5th year in a Philippine-based college or university.</li>
                <li><strong>Academic Performance:</strong> Must have a passing General Weighted Average (GWA).</li>
                <li><strong>Citizenship:</strong> Must be a Filipino citizen living in Lucena City for at least 5 years.</li>
                <li><strong>Enrollment:</strong> Must be currently enrolled in a recognized institution, with proof of enrollment or acceptance letter.</li>
            </ol>

            <p><strong>Documents Needed:</strong></p>
            <ul>
                <li>Picture of School ID or any government-issued ID</li>
                <li>Certificate of Enrollment</li>
                <li>Certificate of Indigency</li>
            </ul>

            <!-- Checkbox for acknowledgment -->
            <div class="form-check">
                <input 
                    class="form-check-input" 
                    type="checkbox" 
                    id="acknowledgment" 
                    required
                    onchange="toggleNextButton()">
                <label class="form-check-label" for="acknowledgment">
                    I hereby understand and wish to proceed.
                </label>
            </div>

            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <!-- Back to Homepage Button -->
                <a href="homepage.php" class="btn btn-secondary">Back to Homepage</a>
                <!-- Next Button -->
                <button 
                    type="button" 
                    class="btn btn-primary next-btn" 
                    onclick="validateCheckbox()" 
                    id="nextButton" 
                    disabled>
                    Next
                </button>
            </div>
        </div>


        <!-- Step 2: Personal Information Details -->
        <div class="form-step">
            <h4>Personal Information</h4>
            <br>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" required onchange="checkStep2Validity()">
                </div>
                <div class="col-md-4">
                    <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" required onchange="checkStep2Validity()">
                </div>
                <div class="col-md-4">
                    <label for="middleName" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middle_name" placeholder="Middle Name">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Age" required onchange="checkStep2Validity()">
                </div>
                <div class="col-md-4">
                    <label for="birthdate" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required onchange="checkStep2Validity()">
                </div>
                <div class="col-md-4">
                    <label for="placeOfBirth" class="form-label">Place of Birth <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="placeOfBirth" name="place_of_birth" placeholder="Place of Birth" required onchange="checkStep2Validity()">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="address" class="form-label">Complete Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Complete Address" required onchange="checkStep2Validity()">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                    <select class="form-control" id="gender" name="gender" required onchange="checkStep2Validity()">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="civilStatus" class="form-label">Civil Status <span class="text-danger">*</span></label>
                    <select class="form-control" id="civilStatus" name="civil_status" required onchange="checkStep2Validity()">
                        <option value="" disabled selected>Select Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="citizenship" class="form-label">Citizenship <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship" required onchange="checkStep2Validity()">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="mobileNo" class="form-label">Mobile No. <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="mobileNo" name="mobile_no" placeholder="Mobile No." required onchange="checkStep2Validity()">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required onchange="checkStep2Validity()">
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" class="btn btn-primary next-btn" id="nextButtonStep2" disabled>Next</button>
            </div>
        </div>

        <!-- END Step 2: -->

        <!-- Step 3: Educational Information -->
        <div class="form-step">
            <h4>Educational Information</h4>
            <br>

            <!-- Current School Enrolled In -->
            <h5>Current School Enrolled In</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="currentSchoolName" class="form-label">School Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="currentSchoolName" name="current_school_name" placeholder="School Name" required onchange="checkStep3Validity()">
                </div>
                <div class="col-md-6">
                    <label for="currentSchoolType" class="form-label">School Type <span class="text-danger">*</span></label>
                    <select class="form-control" id="currentSchoolType" name="current_school_type" required onchange="checkStep3Validity()">
                        <option value="" disabled selected>Select School Type</option>
                        <option value="Public">Public</option>
                        <option value="Private">Private</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="currentSchoolAddress" class="form-label">School Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="currentSchoolAddress" name="current_school_address" placeholder="School Address" required onchange="checkStep3Validity()">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="yearLevel" class="form-label">Year Level <span class="text-danger">*</span></label>
                    <select class="form-control" id="yearLevel" name="year_level" required onchange="checkStep3Validity()">
                        <option value="" disabled selected>Select Year Level</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                        <option value="1st Year College">1st Year College</option>
                        <option value="2nd Year College">2nd Year College</option>
                        <option value="3rd Year College">3rd Year College</option>
                        <option value="4th Year College">4th Year College</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="strandOrCourse" class="form-label">Course/Strand <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="strandOrCourse" name="strand_or_course" placeholder="Course or Strand" required onchange="checkStep3Validity()">
                </div>
            </div>

            <!-- School Intended to Enroll In -->
            <h5>School Intended to Enroll In</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="intendedSchoolName" class="form-label">School Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="intendedSchoolName" name="intended_school_name" placeholder="School Name" required onchange="checkStep3Validity()">
                </div>
                <div class="col-md-6">
                    <label for="intendedSchoolType" class="form-label">School Type <span class="text-danger">*</span></label>
                    <select class="form-control" id="intendedSchoolType" name="intended_school_type" required onchange="checkStep3Validity()">
                        <option value="" disabled selected>Select School Type</option>
                        <option value="Public">Public</option>
                        <option value="Private">Private</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="intendedSchoolAddress" class="form-label">School Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="intendedSchoolAddress" name="intended_school_address" placeholder="School Address" required onchange="checkStep3Validity()">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="intendedCourseOrStrand" class="form-label">Course/Strand <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="intendedCourseOrStrand" name="intended_course_or_strand" placeholder="Course or Strand" required onchange="checkStep3Validity()">
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" class="btn btn-primary next-btn" id="nextButtonStep3" disabled>Next</button>
            </div>
        </div>
        <!-- END OF STEP 3 -->

    

        <!-- Step 4: Upload of Files -->
        <div class="form-step">
            <h5>Upload of Files</h5>

            <!-- Information Notes -->
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-info-circle-fill"></i> Note: Maximum file size is 1MB (1024KB) for each file.
            </div>
            

            <!-- File Uploads -->
            <div class="mb-3">
                <label for="letterOfIntent" class="form-label">Letter of Intent: <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="letterOfIntent" name="letter_of_intent" required onchange="checkStep4Validity()">
            </div>

            <div class="mb-3">
                <label for="schoolId" class="form-label">School ID: <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="schoolId" name="school_id" required onchange="checkStep4Validity()">
            </div>

            <div class="mb-3">
                <label for="certificateOfIndigency" class="form-label">Certificate of Indigency: <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="certificateOfIndigency" name="certificate_of_indigency" required onchange="checkStep4Validity()">
            </div>

            <div class="mb-3">
                <label for="trueCopyOfGrades" class="form-label">True Copy of Grades: <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="trueCopyOfGrades" name="true_copy_of_grades" required onchange="checkStep4Validity()">
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" class="btn btn-primary next-btn" id="nextButtonStep4" disabled>Next</button>
            </div>
        </div>



        <!-- Step 5: Consent & Survey -->
        <div class="form-step">
            <h5>Consent & Acknowledgment</h5>
            <br>

            <!-- Consent Information -->
            <div class="mb-4">
                <p>
                    By clicking <strong>SUBMIT APPLICATION</strong>, you confirm your intent to apply for the scholarship program under the Lucena Youth Development Office. In doing so, you:
                </p>
                <ol>
                    <li>Certify that all information and supporting documents provided in this application are true and accurate to the best of your knowledge.</li>
                    <li>Understand that any misrepresentation or falsification of information may result in disqualification from the scholarship program.</li>
                    <li>Consent to the processing, storage, and use of the personal data you have provided in accordance with Republic Act No. 10173 (Data Privacy Act of 2012) for purposes related to the administration of this scholarship program.</li>
                    <li>Authorize the Lucena Youth Development Office to verify the authenticity of your submitted information and documents with relevant authorities.</li>
                    <li>Acknowledge that the Lucena Youth Development Office reserves the right to suspend or revoke the scholarship if you violate the terms and conditions of the program or any applicable laws and regulations.</li>
                </ol>
            </div>

            <!-- Buttons -->
            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="submit" class="btn btn-success" id="submitApplication">Submit Application</button> <!-- Changed the class to btn-success -->
            </div>


        </div>
    </form>
    </div>

    <script>
        // Add step navigation functionality
        document.querySelectorAll('.next-btn').forEach(button => {
            button.addEventListener('click', () => {
                let currentStep = document.querySelector('.form-step.active');
                let nextStep = currentStep.nextElementSibling;

                // Ensure next step exists and is a form step
                while (nextStep && !nextStep.classList.contains('form-step')) {
                    nextStep = nextStep.nextElementSibling;
                }

                if (nextStep) {
                    currentStep.classList.remove('active');
                    nextStep.classList.add('active');
                }
            });
        });

        document.querySelectorAll('.prev-btn').forEach(button => {
            button.addEventListener('click', () => {
                let currentStep = document.querySelector('.form-step.active');
                let previousStep = currentStep.previousElementSibling;

                // Ensure previous step exists and is a form step
                while (previousStep && !previousStep.classList.contains('form-step')) {
                    previousStep = previousStep.previousElementSibling;
                }

                if (previousStep) {
                    currentStep.classList.remove('active');
                    previousStep.classList.add('active');
                }
            });
        });


        
    </script>

    <!-- JavaScript -->
    <script>
        // Function to toggle the "Next" button based on checkbox state
        function toggleNextButton() {
            const checkbox = document.getElementById('acknowledgment');
            const nextButton = document.getElementById('nextButton');
            nextButton.disabled = !checkbox.checked;
        }

        // Function to validate and show popup if checkbox is not checked
        function validateCheckbox() {
            const checkbox = document.getElementById('acknowledgment');
            if (!checkbox.checked) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Acknowledgment Required',
                    text: 'Please check the acknowledgment box to proceed.',
                    confirmButtonText: 'Okay',
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'All Set!',
                    text: 'Proceeding to the next step.',
                    confirmButtonText: 'Continue',
                }).then(() => {
                    // Add the logic to proceed here, e.g., form submission or redirection
                    console.log('Proceed to the next step!');
                });
            }
        }
    </script>

    <script>
        // Function to check if all required fields in Step 2 are valid
        function checkStep2Validity() {
            const step2Form = document.querySelector('.form-step.active'); // Ensure you're targeting the active step
            const nextButton = document.getElementById('nextButtonStep2');
            const allInputs = step2Form.querySelectorAll('[required]');
            let allValid = true;

            allInputs.forEach(input => {
                if (!input.value.trim()) {
                    allValid = false;
                }
            });

            nextButton.disabled = !allValid;
        }
    </script>

    <script>
        // Function to validate all required fields in Step 3
        function checkStep3Validity() {
            const step3Form = document.querySelector('.form-step.active'); // Ensure it targets the active step
            const nextButton = document.getElementById('nextButtonStep3');
            const allInputs = step3Form.querySelectorAll('[required]');
            let allValid = true;

            allInputs.forEach(input => {
                if (!input.value.trim()) {
                    allValid = false;
                }
            });

            nextButton.disabled = !allValid;
        }
    </script>

    <!-- JavaScript -->
    <script>
        // Function to validate all file inputs in Step 4
        function checkStep4Validity() {
            const step4Form = document.querySelector('.form-step.active'); // Ensure it targets the active step
            const nextButton = document.getElementById('nextButtonStep4');
            const allFileInputs = step4Form.querySelectorAll('input[type="file"][required]');
            let allFilesUploaded = true;

            allFileInputs.forEach(input => {
                if (!input.files.length) {
                    allFilesUploaded = false;
                }
            });

            nextButton.disabled = !allFilesUploaded;
        }
    </script>

    <script>
        // Prevent form submission when Enter key is pressed
        document.getElementById('multiStepForm').addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault(); // Prevent form submission
            }
        });

        // Event listener for the "Submit Application" button
        document.getElementById('submitApplication').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            // Display SweetAlert success message
            Swal.fire({
                title: 'Success!',
                text: 'Your application has been submitted.',
                icon: 'success',
                confirmButtonText: 'Back to Homepage',
                allowOutsideClick: false, // Prevent closing by clicking outside
                allowEscapeKey: false,   // Prevent closing with the escape key
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to homepage when button is clicked
                    window.location.href = 'homepage.php';
                }
            });
        });
    </script>


    



        
    


    
  </body>
</html>



