<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$country = $_POST['country'];
$subject = $_POST['subject'];
$info = $_POST['info'];

$regExFirstname = preg_match("/^[a-zA-Z '.-]*$/", $firstname);
$regExLastname = preg_match("/^[a-zA-Z '.-]*$/", $lastname);

$emailSanitize = filter_var($email, FILTER_SANITIZE_EMAIL);







function emptyField($value) {
    if(isset($_POST['submit'])){
        if(empty($_POST[$value])){
            echo '<p class="error">*Field is requiered.</p>';
            return false;
        } else {
            return true;
        }
    }
}




function invalidRegEx($value){
$result = preg_match("/^[a-zA-Z '.-]*$/", $_POST[$value]);
if(isset($_POST['submit']) && !empty($_POST[$value])){
if($result == false){
echo '<p class="error">*Invalid format.</p>';
$_POST[$value] = '';
return false;
} else {
return true;
}
}
}



function invalidEmail($value) {
$email = $_POST['email'];
$emailSanitize = filter_var($email, FILTER_SANITIZE_EMAIL);

if (!empty($_POST[$value]) && filter_var($emailSanitize, FILTER_VALIDATE_EMAIL) === false ||
$emailSanitize != $email
) {
echo '<p class="error">*Invalid format.</p>';
return false;
} else {
return true;
}
}

function invalidString($value, $var) {
$var = $_POST[$value];
$varSanitize = filter_var($var, FILTER_SANITIZE_STRING);
if(!empty($_POST[$value]) && $var != $varSanitize){
echo '<p class="error">*Invalid format.</p>';
return false;
} else {
return true;
}
}


function validMail(){
if(isset($_POST['submit'])){
if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['gender']) AND !empty($_POST['email'])
AND !empty($_POST['country']) AND !empty($_POST['subject']) AND !empty($_POST['info'])){

$to = $_POST['email'];
$subject = 'Hackers-Poulette formulary';
$message = 'Test mail Hackers-Poulette';

mail($to, $subject, $message);

}
}
}

// function validation(){

// }


?>