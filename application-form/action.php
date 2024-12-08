<?php
session_start();
require '../connection/connection.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to create an organization.");
}

$userId = $_SESSION['user_id'];  


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orgName = $_POST['org_name'];
    $orgAddress = $_POST['address'];
    $telephone = $_POST['telephone'];
    $cellphone = $_POST['cellphone'];
    $members = $_POST['number_of_members'];
    $dateEstablished = $_POST['date_established'];
    $municipality = "Lucena City"; // Default value
    $barangay = $_POST['barangay'];
    $streetName = $_POST['street_name'];
    $majorClassification = $_POST['major_classification'];
    $subClassification = $_POST['sub_classification'];
    $description = $_POST['description'];
    $status = 'on review'; 

    $barangayQuery = "SELECT id FROM barangays WHERE barangay_name = :barangay";
    $stmt = $pdo->prepare($barangayQuery);
    $stmt->bindParam(':barangay', $barangay, PDO::PARAM_STR);
    $stmt->execute();
    $barangayResult = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($barangayResult) {
        $barangayId = $barangayResult['id'];
    } else {
        die("Barangay not found in the database.");
    }

    $uploadDir = dirname(__DIR__) . '/uploads/' . preg_replace("/[^a-zA-Z0-9]+/", "", $orgName);
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $registrationFormPath = uploadFile($_FILES['registration_form'], $uploadDir);
    $listOfficersPath = uploadFile($_FILES['list_officer'], $uploadDir);
    $listMembersPath = uploadFile($_FILES['list_members'], $uploadDir);
    $constitutionPath = uploadFile($_FILES['constitution_bylaws'], $uploadDir);

    try {
        $insertOrgQuery = "INSERT INTO organizations 
            (org_name, address, telephone, cellphone, number_of_members, date_established, municipality, barangay_id, major_classification, sub_classification, description, user_id, status) 
            VALUES 
            (:org_name, :address, :telephone, :cellphone, :number_of_members, :date_established, :municipality, :barangay_id, :major_classification, :sub_classification, :description, :user_id, :status)";
        
        $stmt = $pdo->prepare($insertOrgQuery);
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
        $stmt->bindParam(':user_id', $userId); 
        $stmt->bindParam(':status', $status);  
        $stmt->execute();
        
        $orgId = $pdo->lastInsertId();

        $headFamilyName = $_POST['head_family_name'];
        $headGivenName = $_POST['head_given_name'];
        $headMiddleName = $_POST['head_middle_name'];
        $headContactNumber = $_POST['head_contact_number'];
        $headEmail = $_POST['head_email'];
        
        $insertHeadQuery = "INSERT INTO organization_heads 
            (org_id, family_name, given_name, middle_name, contact_number, email) 
            VALUES 
            (:org_id, :family_name, :given_name, :middle_name, :contact_number, :email)";
        
        $stmt = $pdo->prepare($insertHeadQuery);
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
            
            $stmt = $pdo->prepare($insertAdviserQuery);
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
        
        $stmt = $pdo->prepare($insertDocsQuery);
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

function uploadFile($file, $uploadDir) {
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
