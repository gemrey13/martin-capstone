<?php
include('../../components/header.php');

$isLoggedIn = isset($_SESSION['user_id']);
?>

<link rel="stylesheet" href="form.css">

<div class="form-container">
    <header class="text-center mb-4">
        <h2>Lucena Youth Survey Form</h2>
    </header>

    <!-- Multi-Step Form -->
    <form action="/submit-youth-profiling" method="post" id="multiStepForm">
        <!-- Step 1: Youth Profiling Form -->
        <div class="form-step active">
            <h5>Step 1: Personal Information</h5>

            <!-- Complete Name -->
            <div class="mb-3">
                <label for="fullName" class="form-label">Complete Name</label>
                <small class="form-text text-muted">(Last Name, First Name, Middle Name)</small>
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="" required onchange="checkStep1Validity()">
            </div>

            <!-- Email and Contact Number -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="" required onchange="checkStep1Validity()">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="tel" class="form-control" id="contactNumber" name="contactNumber" placeholder="" required onchange="checkStep1Validity()">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="barangay" class="form-label">Barangay</label>
                    <select class="form-select" id="barangay" name="barangay" required onchange="checkStep1Validity()">
                        <option value="" selected disabled>Choose your Barangay</option>
                        <option value="Barangay 1">Barangay 1</option>
                        <option value="Barangay 2">Barangay 2</option>
                        <option value="Barangay 3">Barangay 3</option>
                        <option value="Barangay 4">Barangay 4</option>
                        <option value="Barangay 5">Barangay 5</option>
                        <option value="Barangay 6">Barangay 6</option>
                        <option value="Barangay 7">Barangay 7</option>
                        <option value="Barangay 8">Barangay 8</option>
                        <option value="Barangay 9">Barangay 9</option>
                        <option value="Barangay 10">Barangay 10</option>
                        <option value="Barra">Barra</option>
                        <option value="Bocohan">Bocohan</option>
                        <option value="Cotta">Cotta</option>
                        <option value="Dalahican">Dalahican</option>
                        <option value="Domoit">Domoit</option>
                        <option value="Gulang-gulang">Gulang-gulang</option>
                        <option value="Ibabang Dupay">Ibabang Dupay</option>
                        <option value="Ibabang Iyam">Ibabang Iyam</option>
                        <option value="Ibabang Talim">Ibabang Talim</option>
                        <option value="Ilayang Dupay">Ilayang Dupay</option>
                        <option value="Ilayang Iyam">Ilayang Iyam</option>
                        <option value="Isabang">Isabang</option>
                        <option value="Market View">Market View</option>
                        <option value="Mayao Castillo">Mayao Castillo</option>
                        <option value="Mayao Crossing">Mayao Crossing</option>
                        <option value="Mayao Kanluran">Mayao Kanluran</option>
                        <option value="Mayao Parada">Mayao Parada</option>
                        <option value="Mayao Silangan">Mayao Silangan</option>
                        <option value="Ransohan">Ransohan</option>
                        <option value="Salinas">Salinas</option>
                        <option value="Talao-Talao">Talao-Talao</option>

                        <!-- More options -->
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="completeAddress" class="form-label">Complete Address</label>
                    <input type="text" class="form-control" id="completeAddress" name="completeAddress" placeholder="e.g., #123 Street, Subdivision" required onchange="checkStep1Validity()">
                </div>
            </div>

            <!-- Age, Birthday, Gender -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="" required onchange="checkStep1Validity()">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required onchange="checkStep1Validity()">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required onchange="checkStep1Validity()">
                        <option value="" selected disabled>Choose your Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Gender Neutral">Gender Neutral</option>
                    </select>
                </div>
            </div>

            <!-- Civil Status, Spouse Name, Number of Children -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="civilStatus" class="form-label">Civil Status</label>
                    <select class="form-select" id="civilStatus" name="civilStatus" required onchange="checkStep1Validity()">
                        <option value="" selected disabled>Choose your Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="spouseName" class="form-label">Name of Spouse (if any)</label>
                    <input type="text" class="form-control" id="spouseName" name="spouseName" placeholder="">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="children" class="form-label">Number of Children</label>
                    <input type="number" class="form-control" id="children" name="children" placeholder="">
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <a href="homepage.php" class="btn btn-secondary">Back to Homepage</a>
                <button type="button" class="btn btn-primary next-btn" id="nextButtonStep1" disabled>Next</button>
            </div>
        </div>


        <!-- Step 2: Education Background -->
        <div class="form-step">
            <h3>Educational Background</h3>

            <!-- Educational Attainment -->
            <div class="mb-3">
                <label for="educationalAttainment" class="form-label">Educational Attainment</label>
                <select class="form-select" id="educationalAttainment" name="educationalAttainment" required onchange="checkStep2Validity()">
                    <option value="" disabled selected>Select your educational attainment</option>
                    <option value="elementary graduate">Elementary Graduate</option>
                    <option value="high school graduate">High School Graduate</option>
                    <option value="college graduate">College Graduate</option>
                    <option value="post-graduate">Post-Graduate</option>
                    <option value="vocational graduate">Vocational Graduate</option>
                    <option value="none">None</option>
                </select>
            </div>

            <!-- Year of Graduation -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="yearOfGraduation" class="form-label">Year of Graduation (if applicable)</label>
                    <input type="text" class="form-control" id="yearOfGraduation" name="yearOfGraduation" placeholder="YYYY" onchange="checkStep2Validity()">
                </div>
            </div>

            <!-- Name of Schools -->
            <div class="mb-3">
                <p>Provide the name of schools attended if applicable:</p>
                <label for="elementarySchool" class="form-label">Elementary</label>
                <input type="text" class="form-control mb-3" id="elementarySchool" name="elementarySchool" placeholder="Name of Elementary School" onchange="checkStep2Validity()">

                <label for="highSchool" class="form-label">High School</label>
                <input type="text" class="form-control mb-3" id="highSchool" name="highSchool" placeholder="Name of High School" onchange="checkStep2Validity()">

                <label for="college" class="form-label">College</label>
                <input type="text" class="form-control mb-3" id="college" name="college" placeholder="Name of College" onchange="checkStep2Validity()">

                <label for="postGraduate" class="form-label">Post-Graduate</label>
                <input type="text" class="form-control mb-3" id="postGraduate" name="postGraduate" placeholder="Name of Post-Graduate School" onchange="checkStep2Validity()">

                <label for="vocational" class="form-label">Vocational</label>
                <input type="text" class="form-control mb-3" id="vocational" name="vocational" placeholder="Name of Vocational School" onchange="checkStep2Validity()">
            </div>

            <!-- Present Status -->
            <div class="mb-3">
                <label for="presentStatus" class="form-label">Present Status</label>
                <select class="form-select" id="presentStatus" name="presentStatus" required onchange="checkStep2Validity()">
                    <option value="" disabled selected>Select your current status</option>
                    <option value="employed">Employed (Nagtatrabaho)</option>
                    <option value="unemployed">Unemployed (Walang Trabaho)</option>
                    <option value="in school">In School Youth (Nag-aaral)</option>
                    <option value="out of school">Out of School Youth (Hindi Nakakapag-aral)</option>
                    <option value="job seeker">Job Seeker (Naghahanap ng Trabaho)</option>
                </select>
            </div>

            <!-- If Currently Enrolled -->
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="currentSchool" class="form-label">If currently enrolled, what is the name of your school?</label>
                    <input type="text" class="form-control" id="currentSchool" name="currentSchool" placeholder="Name of Current School" onchange="checkStep2Validity()">
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" class="btn btn-primary next-btn" id="nextButtonStep2" disabled>Next</button>
            </div>
        </div>



        <!-- STEP 3 -->
        <div class="form-step active">
            <h3>Personal Skills and Affiliations</h3>

            <!-- Skills -->
            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <select class="form-select" id="skills" name="skills" required onchange="checkStep3Validity()">
                    <option value="" disabled selected>Select your best skill</option>
                    <option value="communication">Communication</option>
                    <option value="environmentallyLiterate">Environmentally Literate</option>
                    <option value="digitallyLiterate">Digital Literate</option>
                    <option value="languageLiterate">Language Literate</option>
                    <option value="agriculture">Agriculture</option>
                    <option value="automotive">Automotive</option>
                    <option value="plumbing">Plumbing</option>
                    <option value="photovoltaic">Photovoltaic</option>
                    <option value="systemInstallation">System Installation</option>
                    <option value="computerSystemServicing">Computer System Servicing</option>
                    <option value="electricalInstallationAndMaintenance">Electrical Installation and Maintenance</option>
                    <option value="entrepreneurship">Entrepreneurship</option>
                    <option value="financiallyLiterate">Financially Literate</option>
                    <option value="shipsCatering">Ship's Catering</option>
                    <option value="foodProcessing">Food Processing</option>
                    <option value="beautyCare">Beauty Care</option>
                    <option value="breadAndPastryProduction">Bread and Pastry Production</option>
                    <option value="cookery">Cookery</option>
                    <option value="foodAndBeverageServices">Food and Beverage Services</option>
                    <option value="frontOfficeServices">Front Office Services</option>
                    <option value="housekeeping">Housekeeping</option>
                    <option value="welding">Welding</option>
                    <option value="bookkeeping">Bookkeeping</option>
                    <option value="driving">Driving</option>
                    <option value="forging">Forging</option>
                    <option value="carpentry">Carpentry</option>
                    <option value="massageTherapy">Massage Therapy</option>
                    <option value="pharmacyServices">Pharmacy Services</option>
                    <option value="animation">Animation</option>
                    <option value="programming">Programming</option>
                    <option value="barber">Barber</option>
                </select>
            </div>

            <!-- Affiliations or Organizations -->
            <h4 style="display: inline;">Affiliations or Organizations</h4>
            <h4 style="display: inline; font-size: smaller; margin-left: 10px; color:gray;">(Leave it blank if none)</h4>

            <br>

            <!-- Organization Inputs -->
            <div class="mb-3">
                <label for="youthOrganization" class="form-label">Youth Organization</label>
                <input type="text" class="form-control" id="youthOrganization" name="youthOrganization" placeholder="Name of organization">
            </div>
            <div class="mb-3">
                <label for="studentOrganization" class="form-label">Student Organization</label>
                <input type="text" class="form-control" id="studentOrganization" name="studentOrganization" placeholder="Name of organization">
            </div>
            <div class="mb-3">
                <label for="religiousOrganization" class="form-label">Religious Organization</label>
                <input type="text" class="form-control" id="religiousOrganization" name="religiousOrganization" placeholder="Name of organization">
            </div>
            <div class="mb-3">
                <label for="cityOrganization" class="form-label">City Organization</label>
                <input type="text" class="form-control" id="cityOrganization" name="cityOrganization" placeholder="Name of organization">
            </div>
            <div class="mb-3">
                <label for="provincialOrganization" class="form-label">Provincial Organization</label>
                <input type="text" class="form-control" id="provincialOrganization" name="provincialOrganization" placeholder="Name of organization">
            </div>
            <div class="mb-3">
                <label for="nationalOrganization" class="form-label">National Organization</label>
                <input type="text" class="form-control" id="nationalOrganization" name="nationalOrganization" placeholder="Name of organization">
            </div>

            <!-- PWD Information -->
            <div class="row">
                <!-- Do you have a PWD ID -->
                <div class="col-md-6 mb-3">
                    <label for="pwdID" class="form-label">Do you have a PWD ID?</label>
                    <select class="form-select" id="pwdID" name="pwdID" required onchange="checkStep3Validity()">
                        <option value="" disabled selected>Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <!-- What kind of Disability -->
                <div class="col-md-6 mb-3">
                    <label for="disabilityType" class="form-label">What kind of Disability?</label>
                    <select class="form-select" id="disabilityType" name="disabilityType" required onchange="checkStep3Validity()">
                        <option value="" disabled selected>Select your disability</option>
                        <option value="intellectual">Intellectual Disability</option>
                        <option value="learning">Learning Disability</option>
                        <option value="mental">Mental Disability</option>
                        <option value="orthopedic">Orthopedic Disability</option>
                        <option value="physical">Physical Disability</option>
                        <option value="psychosocial">Psychosocial Disability</option>
                        <option value="speechAndLanguage">Speech and Language Disability</option>
                        <option value="visual">Visual Disability</option>
                        <option value="none">None</option>
                    </select>
                </div>
            </div>

            <!-- Voter Registration -->
            <div class="row">
                <!-- Are you a registered voter -->
                <div class="col-md-6 mb-3">
                    <label for="registeredVoter" class="form-label">Are you a registered voter?</label>
                    <select class="form-select" id="registeredVoter" name="registeredVoter" required onchange="checkStep3Validity()">
                        <option value="" disabled selected>Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <!-- Precinct Number -->
                <div class="col-md-6 mb-3">
                    <label for="precinctNumber" class="form-label">If yes, what is your precinct number?</label>
                    <input type="text" class="form-control" id="precinctNumber" name="precinctNumber" placeholder="Enter Precinct Number">
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" class="btn btn-primary next-btn" id="nextButtonStep3" disabled>Next</button>
            </div>
        </div>


        <!-- Step 5: Consent & Acknowledgment for Youth Profiling -->
        <div class="form-step">
            <h5>Consent & Acknowledgment</h5>
            <br>

            <!-- Consent Information -->
            <div class="mb-4">
                <p>
                    By clicking <strong>SUBMIT MY PROFILE</strong>, you confirm your intent to complete the youth profiling under the Lucena Youth Development Office. In doing so, you:
                </p>
                <ol>
                    <li>Certify that all information provided in this profiling form is accurate and true to the best of your knowledge.</li>
                    <li>Understand that youth profiling is a strategic initiative of LYDO anchored by the SK Reform Act of 2015 and DILG MC 2022-33 that aims to establish and maintain a database of youth in the barangays.</li>
                    <li>Consent to the collection, processing, and use of the personal data you have provided in accordance with Republic Act No. 10173 (Data Privacy Act of 2012) for purposes related to the youth profiling and development programs.</li>
                    <li>Authorize the Lucena Youth Development Office to verify the authenticity of your provided information with relevant authorities, if necessary.</li>
                    <li>Acknowledge that the Lucena Youth Development Office reserves the right to exclude or update your profile if any information provided is found to be inaccurate or incomplete.</li>
                </ol>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" id="submitProfileBtn" class="btn btn-primary">Submit My Profile</button>
            </div>
        </div>

        <!-- Success Notification -->
        <div id="successNotification" class="alert alert-success d-none" role="alert">
            <h4 class="alert-heading">Success!</h4>
            <p>Your youth profiling is now submitted. Thank you for your participation.</p>
            <a href="/" class="btn btn-primary">Back to Homepage</a>
        </div>









    </form>
</div>

<!-- FORM CONTAINER END -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const formSteps = document.querySelectorAll(".form-step"); // All steps
        const nextBtns = document.querySelectorAll(".next-btn"); // All "Next" buttons
        const prevBtns = document.querySelectorAll(".prev-btn"); // All "Previous" buttons

        let currentStep = 0; // Index of the current step

        function updateSteps() {
            formSteps.forEach((step, index) => {
                step.classList.toggle("active", index === currentStep);
            });
        }

        // Next button click event
        nextBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                if (currentStep < formSteps.length - 1) {
                    currentStep++;
                    updateSteps();
                }
            });
        });

        // Previous button click event
        prevBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                if (currentStep > 0) {
                    currentStep--;
                    updateSteps();
                }
            });
        });

        // Initialize steps on page load
        updateSteps();
    });
</script>

<script>
    // Function to check if all required fields in Step 1 are valid
    function checkStep1Validity() {
        const step1Form = document.querySelector('.form-step.active'); // Ensure you're targeting the active step
        const nextButton = document.getElementById('nextButtonStep1');
        const allInputs = step1Form.querySelectorAll('[required]');
        let allValid = true;

        allInputs.forEach(input => {
            if (!input.value.trim()) {
                allValid = false;
            }
        });

        nextButton.disabled = !allValid;
    }

    // Add event listeners to form elements to validate and enable the "Next" button
    document.querySelectorAll('.form-control[required], .form-select[required]').forEach(input => {
        input.addEventListener('input', checkStep1Validity);
    });

    // Check the initial state when the page loads
    document.addEventListener("DOMContentLoaded", checkStep1Validity);
</script>

<script>
    // Function to check if all required fields in Step 2 are valid
    function checkStep2Validity() {
        const step2Form = document.querySelector('.form-step'); // Ensure you're targeting the active step
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

    // Add event listeners to form elements to validate and enable the "Next" button
    document.querySelectorAll('.form-control[required], .form-select[required]').forEach(input => {
        input.addEventListener('input', checkStep2Validity);
    });

    // Check the initial state when the page loads
    document.addEventListener("DOMContentLoaded", checkStep2Validity);
</script>

<script>
    // Function to check if all required fields in Step 3 are valid
    function checkStep3Validity() {
        const step3Form = document.querySelector('.form-step.active'); // Ensure you're targeting the active step
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

    // Add event listeners to form elements to validate and enable the "Next" button
    document.querySelectorAll('.form-select[required]').forEach(input => {
        input.addEventListener('change', checkStep3Validity);
    });

    // Check the initial state when the page loads
    document.addEventListener("DOMContentLoaded", checkStep3Validity);
</script>

<script>
    // Prevent form submission when Enter key is pressed
    document.getElementById('multiStepForm').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission
        }
    });

    // Event listener for the "Submit My Profile" button
    document.getElementById('submitProfileBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the form from submitting immediately

        // Display SweetAlert success message
        Swal.fire({
            title: 'Success!',
            text: 'Your youth profiling is now submitted.',
            icon: 'success',
            confirmButtonText: 'Back to Homepage',
            allowOutsideClick: false, // Prevent closing by clicking outside
            allowEscapeKey: false, // Prevent closing with the escape key
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to homepage when button is clicked
                window.location.href = 'homepage.php'; // Adjust this URL to your homepage
            }
        });
    });
</script>












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hn630FiPr14+4+evKl1VgZ8h5yK5VVfSkGG2E4hEWwR7N2" crossorigin="anonymous"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</body>

</html>