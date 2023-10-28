<?php
// Function to authenticate login
function authenticateUser($username, $password) {
    // Here you would typically query a database to verify credentials.
    // For the sake of example, using hardcoded values for demonstration.
    $validUsername = "admin";
    $validPassword = "password";

    if ($username === $validUsername && $password === $validPassword) {
        return true;
    } else {
        return false;
    }
}

// Function to create a new customer
function createCustomer($name, $email) {
    // Here you would typically save data to a database.
    // For example, in this demo, we'll use a text file to store customer data.
    $customerData = "$name,$email\n";
    file_put_contents('customers.txt', $customerData, FILE_APPEND);
}

// Function to delete a customer
function deleteCustomer($customerId) {
    // Here you would typically delete a customer from the database.
    // For demonstration purposes, let's assume we remove from the text file.
    $lines = file('customers.txt');
    if (isset($lines[$customerId - 1])) {
        unset($lines[$customerId - 1]);
        file_put_contents('customers.txt', implode('', $lines));
    }
}

// Function to update customer (not implemented in this basic example)

// Check if login form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticateUser($username, $password)) {
        // Perform actions after successful login, like displaying the customer list.
        // For this demo, we'll assume the user is logged in after authentication.
        // You can display the list of customers here.
    } else {
        echo "Invalid username or password!";
    }
}

// Check if form to add a new customer is submitted
if (isset($_POST['newName']) && isset($_POST['newEmail'])) {
    $name = $_POST['newName'];
    $email = $_POST['newEmail'];
    createCustomer($name, $email);
}

// Check if delete button is clicked for a customer
if (isset($_POST['deleteCustomerId'])) {
    $customerId = $_POST['deleteCustomerId'];
    deleteCustomer($customerId);
}
?>
