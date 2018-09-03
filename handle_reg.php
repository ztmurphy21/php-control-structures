<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <style type="text/css" media="screen">
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
    <h1>Registration Results</h1>
    <?php 
    
    //flag variable to track success
    $okay = ture;

    //check email
    if(empty($_POST['email'])){
        print '<p class="error"> Please enter your email addresss.</p>';
        $okay = false;
    }

    //check password
    if(empty($_POST['password'])){
        print '<p class="error"> Please enter your password. </p>';
        $okay = false;
    }

    //passwords match?
    if($_POST['password'] != $_POST['confirm']){
        print '<p class="error"> Your confirmed password does not match the original password. </p>';
        $okay = false;
    }
    
    //check birth year
    if(is_numeric($_POST['year'])){
        $age = 2018 - $_POST['year']; //calculate age
    }else{
        print '<p class="error"> Please enter the year you were bron as four digits.</p>';
        $okay = false;
    }



    //validate terms
    if (!isset($_POST['terms'])){
        print '<p class="error"> You must accept the terms. </p>';
        $okay = false;
    }

    //validate color:
    if($_POST['color'] == 'red'){
        $color_type='primary';
    } elseif ($_POST['color'] == 'yellow'){
        $color_type = 'primary';
    } elseif ($_POST['color'] == 'green'){
        $color_type='secondary';
    }elseif ($_POST['color'] == 'blue'){
        $color_type = 'primary';
    } else {
        print '<p class="error"> Please select your favorite color. </p>';
        $okay = false;
    }

    //check if they were born before 2018:
        if($_POST['year'] >= 2016){
            print '<p class="error"> Invalid birth year. </p>';
            $okay = false;
        }
    //if no errors, give success:
        if($okay){
            print '<p> You have been successfully registerred. </p>';
            print "<p> You will turn $age this year. </p>";
            print "<p> Your favorite color is a $color_type. </p>";
        }
    ?>
</body>
</html>
