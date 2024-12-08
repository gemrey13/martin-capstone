<?php
include('../components/header.php');
$isLoggedIn = isset($_SESSION['user_id']);

require '../connection/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orgName = $_POST['org_name'];
    $orgAddress = $_POST['address'];
    $telephone = $_POST['telephone'];
    $cellphone = $_POST['cellphone'];
    $members = $_POST['number_of_members'];
    $dateEstablished = $_POST['date_established'];
    $municipality = "Lucena City"; 
    $barangay = $_POST['barangay'];
    $streetName = $_POST['street_name'];
    $majorClassification = $_POST['major_classification'];
    $subClassification = $_POST['sub_classification'];
    $description = $_POST['description'];

    $barangayQuery = "SELECT id FROM barangays WHERE barangay_name = :barangay";
    $stmt = $conn->prepare($barangayQuery);
    $stmt->bindParam(':barangay', $barangay, PDO::PARAM_STR);
    $stmt->execute();
    $barangayResult = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($barangayResult) {
        $barangayId = $barangayResult['id'];
    } else {
        die("Barangay not found in the database.");
    }

    $uploadDir = 'uploads/' . preg_replace("/[^a-zA-Z0-9]+/", "", $orgName); 
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); 
    }

    $registrationFormPath = uploadFile($_FILES['registration_form'], $uploadDir);
    $listOfficersPath = uploadFile($_FILES['list_officer'], $uploadDir);
    $listMembersPath = uploadFile($_FILES['list_members'], $uploadDir);
    $constitutionPath = uploadFile($_FILES['constitution_bylaws'], $uploadDir);

    try {
        $insertOrgQuery = "INSERT INTO organizations 
            (org_name, address, telephone, cellphone, number_of_members, date_established, municipality, barangay_id, major_classification, sub_classification, description) 
            VALUES 
            (:org_name, :address, :telephone, :cellphone, :number_of_members, :date_established, :municipality, :barangay_id, :major_classification, :sub_classification, :description)";

        $stmt = $conn->prepare($insertOrgQuery);
        $stmt->bindParam(':org_name', $orgName);
        $stmt->bindParam(':address', $orgAddress);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':cellphone', $cellphone);
        $stmt->bindParam(':number_of_members', $members);
        $stmt->bindParam(':date_established', $dateEstablished);
        $stmt->bindParam(':municipality', $municipality);
        $stmt->bindParam(':barangay_id', $barangayId);
        $stmt->bindParam(':major_classification', $majorClassification);
        $stmt->bindParam(':sub_classification', $subClassification);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        $orgId = $conn->lastInsertId();

        $headFamilyName = $_POST['head_family_name'];
        $headGivenName = $_POST['head_given_name'];
        $headMiddleName = $_POST['head_middle_name'];
        $headContactNumber = $_POST['head_contact_number'];
        $headEmail = $_POST['head_email'];

        $insertHeadQuery = "INSERT INTO organization_heads 
            (org_id, family_name, given_name, middle_name, contact_number, email) 
            VALUES 
            (:org_id, :family_name, :given_name, :middle_name, :contact_number, :email)";

        $stmt = $conn->prepare($insertHeadQuery);
        $stmt->bindParam(':org_id', $orgId);
        $stmt->bindParam(':family_name', $headFamilyName);
        $stmt->bindParam(':given_name', $headGivenName);
        $stmt->bindParam(':middle_name', $headMiddleName);
        $stmt->bindParam(':contact_number', $headContactNumber);
        $stmt->bindParam(':email', $headEmail);
        $stmt->execute();

        if (!empty($_POST['adviser_family_name']) && !empty($_POST['adviser_given_name'])) {
            $adviserFamilyName = $_POST['adviser_family_name'];
            $adviserGivenName = $_POST['adviser_given_name'];
            $adviserMiddleName = $_POST['adviser_middle_name'];
            $adviserContactNumber = $_POST['adviser_contact_number'];
            $adviserEmail = $_POST['adviser_email'];

            $insertAdviserQuery = "INSERT INTO advisers 
                (org_id, family_name, given_name, middle_name, contact_number, email) 
                VALUES 
                (:org_id, :family_name, :given_name, :middle_name, :contact_number, :email)";

            $stmt = $conn->prepare($insertAdviserQuery);
            $stmt->bindParam(':org_id', $orgId);
            $stmt->bindParam(':family_name', $adviserFamilyName);
            $stmt->bindParam(':given_name', $adviserGivenName);
            $stmt->bindParam(':middle_name', $adviserMiddleName);
            $stmt->bindParam(':contact_number', $adviserContactNumber);
            $stmt->bindParam(':email', $adviserEmail);
            $stmt->execute();
        }

        $insertDocsQuery = "INSERT INTO documents 
            (org_id, registration_form, list_of_officers, list_of_members, constitution_bylaws) 
            VALUES 
            (:org_id, :registration_form, :list_of_officers, :list_of_members, :constitution_bylaws)";

        $stmt = $conn->prepare($insertDocsQuery);
        $stmt->bindParam(':org_id', $orgId);
        $stmt->bindParam(':registration_form', $registrationFormPath);
        $stmt->bindParam(':list_of_officers', $listOfficersPath);
        $stmt->bindParam(':list_of_members', $listMembersPath);
        $stmt->bindParam(':constitution_bylaws', $constitutionPath);
        $stmt->execute();

        echo "Organization and associated data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function uploadFile($file, $uploadDir)
{
    $targetFile = $uploadDir . "/" . basename($file["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $validTypes = ["jpg", "jpeg", "png", "pdf", "docx"];
    if (!in_array($fileType, $validTypes)) {
        die("Invalid file type.");
    }

    if (file_exists($targetFile)) {
        die("File already exists.");
    }

    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        die("Error uploading file.");
    }
}
?>
<link rel="stylesheet" href="./styles.css">
<style>
    body {
        background-color: rgba(21, 20, 51);
    }
</style>

<div class="form-container">
    <header class="text-center mb-4">
        <h2>Organization Registration Form</h2>
    </header>

    <div class="step-indicator">
        <div class="step step-1 active">Step 1</div>
        <div class="step step-2">Step 2</div>
        <div class="step step-3">Step 3</div>
        <div class="step step-4">Step 4</div>
    </div>

    <form action="/capstone/landingPAGE/notice.php" method="post" enctype="multipart/form-data" id="multiStepForm">
        <div class="form-step active">
            <h5>Organization Profile</h5>
            <div class="row mb-3">
                <!-- Organization Name Input -->
                <div class="col-md-6">
                    <label for="orgName" class="form-label">Name of Organization <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="orgName" name="org_name" placeholder="Organization Name" required>
                </div>
                <div class="col-md-6">
                    <label for="orgAddress" class="form-label">Complete Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="orgAddress" name="address" placeholder="Complete Address" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tel" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="tel" name="telephone" placeholder="Telephone Number">
                </div>
                <div class="col-md-6">
                    <label for="cell" class="form-label">Cellphone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="cell" name="cellphone" placeholder="Cellphone Number" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="members" class="form-label">Number of Members <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="members" name="number_of_members" placeholder="Number of Members" required>
                </div>
                <div class="col-md-6">
                    <label for="dateEstablished" class="form-label">Date Established <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="dateEstablished" name="date_established" required>
                </div>
            </div>

            <h5>Location Information</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="municipality" class="form-label">Municipality/City <span class="text-danger">*</span></label>
                    <select class="form-select" id="municipality" name="municipality" required>
                        <option value="Lucena City" selected>Lucena City</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="barangay" class="form-label">Barangay <span class="text-danger">*</span></label>
                    <select class="form-select" id="barangay" name="barangay" required>
                        <option value="" disabled selected>Select Barangay</option>
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

                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="streetName" class="form-label">Street Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="streetName" name="street_name" placeholder="Street Name" required>
                </div>
            </div>
            <h5>Organization Classification</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="majorClassification" class="form-label">Major Classification <span class="text-danger">*</span></label>
                    <select class="form-select" id="majorClassification" name="major_classification" required>
                        <option value="" disabled selected>Select Major Classification</option>
                        <option value="Youth Organization">Youth Organization</option>
                        <option value="Youth-Serving Organization">Youth-Serving Organization</option>

                    </select>
                </div>
                <div class="col-md-6">
                    <label for="subClassification" class="form-label">Sub-Classification <span class="text-danger">*</span></label>
                    <select class="form-select" id="subClassification" name="sub_classification" required>
                        <option value="" disabled selected>Select Sub-Classification</option>
                        <option value="" disabled selected>Select Sub-Classification</option>
                        <option value="Community Based">Community-Based Organization</option>
                        <option value="Faith Based">Faith-Based Organization</option>
                        <option value="School Based">School-Based Organization</option>
                        <option value="Consortium/Federation">Consortium/Federation</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Brief Description and Objectives of the Organization</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Brief Description"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <!-- Back to Homepage Button (Left) -->
                <button type="button" class="btn btn-secondary" id="backToHomepageBtn" href="homepage.php">Back to Homepage</button>

                <!-- Next Button (Right) -->
                <button type="button" id="submitProfileBtn" class="btn btn-primary next-btn">Next</button>
            </div>
        </div>
        <!-- Step 2 -->
        <div class="form-step">
            <h4>Leadership & Membership Information</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6>Head of Organization</h6>
                    <div class="mb-3">
                        <label for="headFamilyName" class="form-label">Family Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="headFamilyName" name="head_family_name" placeholder="Family Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="headGivenName" class="form-label">Given Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="headGivenName" name="head_given_name" placeholder="Given Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="headMiddleName" class="form-label">Middle Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="headMiddleName" name="head_middle_name" placeholder="Middle Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="headContactNumber" class="form-label">Contact Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="headContactNumber" name="head_contact_number" placeholder="Contact Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="headEmail" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="headEmail" name="head_email" placeholder="Email Address" required>
                    </div>
                </div>

                <!-- Adviser of the Organization -->
                <div class="col-md-6">
                    <h6>Adviser of the Organization (OPTIONAL)</h6>
                    <div class="mb-3">
                        <label for="adviserFamilyName" class="form-label">Family Name</label>
                        <input type="text" class="form-control" id="adviserFamilyName" name="adviser_family_name" placeholder="Family Name">
                    </div>
                    <div class="mb-3">
                        <label for="adviserGivenName" class="form-label">Given Name</label>
                        <input type="text" class="form-control" id="adviserGivenName" name="adviser_given_name" placeholder="Given Name">
                    </div>
                    <div class="mb-3">
                        <label for="adviserMiddleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="adviserMiddleName" name="adviser_middle_name" placeholder="Middle Name">
                    </div>
                    <div class="mb-3">
                        <label for="adviserContactNumber" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="adviserContactNumber" name="adviser_contact_number" placeholder="Contact Number">
                    </div>
                    <div class="mb-3">
                        <label for="adviserEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="adviserEmail" name="adviser_email" placeholder="Email Address">
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" id="submitBtn" class="btn btn-primary next-btn">Next</button>
            </div>
        </div>

        <!-- Step 3: Upload of Files -->
        <div class="form-step">
            <h5>Upload of Files</h5>

            <!-- Information Notes -->
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-info-circle-fill"></i> Note: Maximum of 1MB or 1024KB only for each file.
            </div>
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-info-circle-fill"></i> Upload .pdf files only except List of Members in Good Standing (in Excel format).
            </div>

            <!-- File Uploads -->
            <div class="mb-3">
                <label for="registrationForm" class="form-label">Registration Form: <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="registrationForm" name="registration_form" required>
            </div>

            <div class="mb-3">
                <label for="listOfficers" class="form-label">List of Officers: <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="listOfficers" name="list_officer" required>
            </div>

            <div class="mb-3">
                <label for="listMembersGoodStanding" class="form-label">List of Members in Good Standing: <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="listMembersGoodStanding" name="list_members" required>
            </div>

            <div class="mb-3">
                <label for="constitutionBylaws" class="form-label">Copy of the Constitution and By-Laws: <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="constitutionBylaws" name="constitution_bylaws" required>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" class="btn btn-primary next-btn">Next</button>
            </div>
        </div>

        <!-- Step 4: Consent & Survey -->
        <div class="form-step">
            <h5>Consent & Survey</h5>

            <!-- Consent Information -->
            <div class="mb-4">
                <p>
                    By clicking REGISTER, you signify your desire to seek registration with the Local Development Youth Office pursuant to Republic Act No. 8044 and Republic Act No. 10742. For this reason, you and your organization:
                </p>
                <ol>
                    <li>Confirm to the best of your knowledge that the information submitted in this website and the attachments are true and correct;</li>
                    <li>Consent that the information supplied in this Application for Registration be posted online or printed as part of the official list of registered and verified youth organizations and youth-serving organizations to be published by the NYC;</li>
                    <li>Authorize NYC or its representatives to use, share, and process personal and organizational information that you have provided, shared, or declared in this application for any lawful purpose;</li>
                    <li>Confirm that you have already read and understood in full the Policy Guidelines in the Registration of Youth Organizations and Youth-Serving Organizations (2017 Youth Organization Registration Program Guidelines), and agree to abide by its provisions;</li>
                    <li>Agree that should your organization commit any violation of the Philippine Constitution or laws of the land or rules and regulations of duly constituted authorities and/or violation to any policy, resolution, or rules and regulations of the National Youth Commission, your registration may be suspended or revoked.</li>
                </ol>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                <button type="button" id="submitApplicationBtn" class="btn btn-primary">Complete Registration</button>
            </div>
        </div>

    </form>

    <!-- Receipt Section (Initially Hidden) -->
    <div id="receiptSection" class="mt-4" style="display: none; font-family: Arial, sans-serif; padding: 20px; background-color: #fff; border-radius: 8px; max-width: 600px; margin: 0 auto; text-align: left;">

        <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
            <img src="../landingPage/lydo-logo-hd.png" alt="LYDO Logo" style="height: 100px; width: auto; margin-right: 10px;">
            <div>
                <h1 style="font-size: 24px; color: black; margin: 0;">Lucena Youth Development Office</h1>
                <h3 style="font-size: 18px; color: black; margin: 0;">Application for Accreditation Portal</h3>
            </div>
        </div>



        <!-- Transaction ID -->
        <div style="font-size: 20px; color: #000; margin-bottom: 10px;">
            <strong>Transaction ID:</strong>
            <span style="color: #3C99DC; font-size: 40px; font-weight: bolder;" id="transactionId"></span>
        </div>

        <!-- Organization Name -->
        <div style="font-size: 20px; color: #000; margin-bottom: 10px;">
            <strong>Organization Name:</strong>
            <span style="color: #3C99DC; font-size: 40px; font-weight: bolder;" id="receiptOrgName"></span>
        </div>

        <!-- Submission Date & Time -->
        <div style="font-size: 20px; color: #000; margin-bottom: 20px;">
            <strong>Submission Date & Time:</strong>
            <span style="color: #3C99DC;" id="submissionDateTime"></span>
        </div>

        <br><br>

        <!-- Thank You Message -->
        <div style="font-size: 25px; color: black; text-align: center; margin-bottom: 20px; font-weight: bolder;">
            Your application for the accreditation of your organization is now submitted. Thank you!
        </div>

        <!-- Monitor Application Status Button -->
        <div style="text-align: center;">
            <button type="button" class="btn btn-success" onclick="window.location.href = 'application-status.php';">Monitor My Application</button>
        </div>

    </div>


    <script>
        const steps = document.querySelectorAll('.step');
        const formSteps = document.querySelectorAll('.form-step');
        let currentStep = 0;

        document.querySelectorAll('.next-btn').forEach((button) => {
            button.addEventListener('click', () => {
                if (currentStep < formSteps.length - 1) {
                    formSteps[currentStep].classList.remove('active');
                    steps[currentStep].classList.remove('active');
                    steps[currentStep].classList.add('completed');
                    currentStep++;
                    formSteps[currentStep].classList.add('active');
                    steps[currentStep].classList.add('active');
                }
            });
        });

        document.querySelectorAll('.prev-btn').forEach((button) => {
            button.addEventListener('click', () => {
                if (currentStep > 0) {
                    formSteps[currentStep].classList.remove('active');
                    steps[currentStep].classList.remove('active');
                    currentStep--;
                    formSteps[currentStep].classList.add('active');
                    steps[currentStep].classList.add('active');
                }
            });
        });
    </script>

    <script>
        // Event listener for the "Back to Homepage" button
        document.getElementById('backToHomepageBtn').addEventListener('click', function() {
            window.location.href = 'homepage.php'; // Redirect to homepage.php
        });
    </script>


    <script>
        // Prevent form submission when Enter key is pressed
        document.getElementById('multiStepForm').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault(); // Prevent form submission
            }
        });

        // Event listener for the "Complete Registration" button
        document.getElementById('submitApplicationBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            // Get the organization name and generate random transaction ID
            var orgName = document.getElementById('orgName').value;
            if (!orgName) {
                alert('Please enter the organization name.');
                return;
            }

            var transactionId = Math.floor(Math.random() * 90000) + 10000; // Generate a 5-digit transaction ID

            // Get current date and time
            var currentDateTime = new Date();
            var dateTimeString = currentDateTime.toLocaleString(); // Format it to a string (MM/DD/YYYY, HH:MM:SS)

            // Store the data in sessionStorage
            sessionStorage.setItem("transactionId", transactionId);
            sessionStorage.setItem("orgName", orgName);
            sessionStorage.setItem("submissionDateTime", dateTimeString);

            // Hide the Step Indicator
            document.querySelector('.step-indicator').style.display = 'none';

            // Hide all form steps
            document.querySelectorAll('.form-step').forEach(step => step.style.display = 'none');

            // Hide the header inside the form-container
            const formHeader = document.querySelector('.form-container header');
            if (formHeader) {
                formHeader.style.display = 'none';
            }

            // Show the receipt section
            document.getElementById('receiptSection').style.display = 'block';

            // Populate the receipt with dynamic data
            document.getElementById('transactionId').textContent = transactionId;
            document.getElementById('receiptOrgName').textContent = orgName;
            document.getElementById('submissionDateTime').textContent = dateTimeString;
        });
    </script>


    <?php include('../components/footer.php'); ?>