function validateForm(){
    $(document).ready(function(){

        // set boolean flag to False -> to check if all elements are ok
        var checkAllElements = true;

        // getting all elements to check
        var first_name_field = document.getElementById("first_name").value;
        var last_name_field = document.getElementById("last_name").value;
        var email_field = document.getElementById("email").value;
        var phone_field = document.getElementById("phone").value;
        var birthday_field = document.getElementById("birthday_date").value;
        var password_field = document.getElementById("password").value;
        var password_confirm_field = document.getElementById("password-confirm").value;

        // checking all elements by conditions set before

        // check first and last name
        var names_regex = /^[A-Za-z]*$/;

        // check first name and put corrisponding message
        if ((first_name_field != "") && (first_name_field.match(names_regex) != null)) {
        //var first_name_form_message = "<h6 style='color:green;'>Valid Name</h6>";
        //first_name_error_box_element.style.visibility = "hidden";
        } else {
        checkAllElements = false;
        var first_name_form_message = "<h6 style='color:red;'>Invalid Name</h6>";
        }


        // checking last name and put corrisponding message
        if ((last_name_field != "") && (last_name_field.match(names_regex) != null)) {
        //var last_name_form_message = "<h6 style='color:green;'>Valid Last Name</h6>";
        } else {
        checkAllElements = false;
        var last_name_form_message = "<h6 style='color:red;'>Invalid Last Name</h6>";
        }


        // check birthdate -> will be before today
        var date1 = new Date(birthday_field);
        if (date1 < new Date()) {
            var birthday_form_message = "<h6 style='color:green;'>Valid Birthday</h6>";
        } else {
            checkAllElements = false;
            var birthday_form_message = "<h6 style='color:red;'>Invalid Birthday</h6>";
        }


        // check phone is not empty
        if (phone_field != "") {
        //var phone_form_message = "<h6 style='color:green;'>Valid Phone</h6>";
        } else {
        checkAllElements = false;
        var phone_form_message = "<h6 style='color:red;'>Invalid Phone</h6>";
        }

        // check email_field and put corrisponding message

        // regex for mail
        var email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        // element to attach the message
        if ((email_field != "") && (email_field.match(email_regex) != null)) {

        //TODO: add ok message
        var email_form_message = "<h6 style='color:green;'>Valid Email</h6>";

        } else {
        checkAllElements = false;

        //TODO: add error message
        var email_form_message = "<h6 style='color:red;'>Invalid Email</h6>";
        }



        // check phone_field - not needed

        // check password_field and password_confirm_field and put corrisponding message
        var password_regex = /^[A-Za-z0-9]*$/;

        // checking if the passwords are not empty
        if ((password_field != "") && (password_confirm_field != "")) {

        // checking if the password match
        if (password_field == password_confirm_field){

            // checking if the passwords are valid
            if ((password_field.match(password_regex) != null) && (password_confirm_field.match(password_regex) != null)) {
            var password_form_message = "<h6 style='color:green;'>Valid Password</h6>";
            } else {
            checkAllElements = false;
            var password_form_message = "<h6 style='color:red;'>InValid Password</h6>";
            }
        } else {
            checkAllElements = false;
            var password_form_message = "<h6 style='color:red;'>Password Do Not Match</h6>";
        }
        } else {
        checkAllElements = false;
        var password_form_message = "<h6 style='color:red;'>No Password Entered</h6>";
        }

        $('#first_name_error_box').html(first_name_form_message);
        $('#last_name_error_box').html(last_name_form_message);
        $('#birthday_error_box').html(birthday_form_message);
        $('#phone_error_box').html(phone_form_message);
        $('#email_error_box').html(email_form_message);
        $('#password_error_box').html(password_form_message);
        $('#password_confirm_error_box').html(password_form_message);
        //test_func();

        //$('#first_name').attr("disabled value", first_name_field);
        });


    }