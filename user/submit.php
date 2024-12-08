<?php
session_start();
include 'db_connection.php'; 


if (isset($_POST['submit'])) {

    $org_name = mysqli_real_escape_string($conn, $_POST['org_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $major_class = isset($_POST['major_class']) ? $_POST['major_class'] : '';
    $sub_class = isset($_POST['sub_class']) ? $_POST['sub_class'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $advocacies = isset($_POST['advocacies']) ? ($_POST['advocacies']) : '';
    $contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $registered_members = isset($_POST['registered_members']) ? $_POST['registered_members'] : '';
    $establishment_date = isset($_POST['establishment_date']) ? $_POST['establishment_date'] : '';
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : '';
    $head_name = isset($_POST['head_name']) ? mysqli_real_escape_string($conn, $_POST['head_name']) : '';
    $adviser_name = isset($_POST['adviser_name']) ? mysqli_real_escape_string($conn, $_POST['adviser_name']) : '';
    $head_contact = isset($_POST['head_contact']) ? $_POST['head_contact'] : '';
    $adviser_contact = isset($_POST['adviser_contact']) ? $_POST['adviser_contact'] : '';
    $head_email = isset($_POST['head_email']) ? $_POST['head_email'] : '';
    $adviser_email = isset($_POST['adviser_email']) ? $_POST['adviser_email'] : '';
    $officers_advisers = isset($_FILES['officers_advisers']['name']) ? $_FILES['officers_advisers']['name'] : '';
    $members_good_standing = isset($_FILES['members_good_standing']['name']) ? $_FILES['members_good_standing']['name'] : '';
    $constitution_bylaws = isset($_FILES['constitution_bylaws']['name']) ? $_FILES['constitution_bylaws']['name'] : '';
    $community_based = isset($_FILES['community_based']['name']) ? $_FILES['community_based']['name'] : '';
    $cert_check = isset($_POST['cert_check']) ? ($_POST['cert_check']) : '';
    $president_name = isset($_POST['president_name']) ? mysqli_real_escape_string($conn, $_POST['president_name']) : '';
    $filing_date = isset($_POST['filing_date']) ? $_POST['filing_date'] : '';


    $sql = "INSERT INTO registrations (org_name, address, major_class, sub_class, city, advocacies, contact_number, email, registered_members, establishment_date, description, head_name, adviser_name, head_contact, adviser_contact, head_email, adviser_email, officers_advisers, members_good_standing, constitution_bylaws, community_based, cert_check, president_name, filing_date)
            VALUES ('$org_name', '$address', '$major_class', '$sub_class', '$city', '$advocacies', '$contact_number', '$email', '$registered_members', '$establishment_date', '$description', '$head_name', '$adviser_name', '$head_contact', '$adviser_contact', '$head_email', '$adviser_email', '$officers_advisers', '$members_good_standing', '$constitution_bylaws', '$community_based', '$cert_check', '$president_name', '$filing_date')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['status'] = 'Form submitted successfully!';
    } else {
        $_SESSION['status'] = 'Error: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
    header('Location: register-form.php'); 
    exit();
}
?>