<?php

    session_start();

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Application </title>

    </head>

    <body>
        
        <?php
        
            if (isset($_SESSION['useruid'])) {
    
                $_SESSION['useruid'];
                
                // Get application information
                // In case candidate has not competed
                
                ?>
                
                    <h1>Application</h1>
    
                    <hr>
            
                    <form method="post" action="./includes/apply.inc.php" enctype="multipart/form-data">
            
                        <!-- Name area ----------------->
                        <br>
                        
                        <b>Full Name:</b>
                        
                        <br>
                        <br>
            
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required />            
                        <input type="text" id="middle_name" name="middle_name" placeholder="Middle Name" required />
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required />
            
                        &nbsp;
                        &nbsp;
                        
                        <!-- Birth-date area --------------->
                        <label for="birth_date"> Birth Date </label>
            
                        &nbsp;
                        &nbsp;
            
                        <input type="date" id="birth_date" name="birth_date" required />
                        
                        <br>
                        <br>
            
                        <hr>
                        <br>
            
                        <!-- Address --------------------->
                        <b>Current Address:</b>
                        
                        <br>
                        <br>
                        
                        <input type="number" id="house_number" name="house_number" min="1" placeholder="House Number" required />
                        <input type="text" id="street_name" name="street_name" placeholder="Street Name" required />
                        
                        <br>
                        <br>
            
                        <input type="text" id="suburb" name="suburb" placeholder="Suburb" required />
                        <input type="text" id="province" name="province" placeholder="Province" required />
                            
                        <br>
                        <br>
            
                        <input type="text" id="city" name="city" placeholder="City" required />
                        <input type="number" id="zip_code" name="zip_code" placeholder="Zip Code" required />
            
                        <br>
                        <br>
                        
                        <hr>
                        
                        <br>
            
                        <!-- Personal Details ---------------->
                        <b>Personal Information:</b>
            
                        <br>
                        <br>
            
                        <input type="tel" id="cell_number" name="cell_number" placeholder="Mobile" required />
                        
                        <br>
                        <br>
            
                        <input type="email" id="email" name="email" placeholder="Email" required />
            
                        <br>
                        <br>
            
                        <input type="number" id="id" name="id" placeholder="ID Number" required />
            
                        <br>
                        <br>
                        
                        <hr>
                        
                        <br>
            
                        <!-- Education -------------->
                        <b>Previous Education:</b>
                        
                        <br>
                        <br>
            
                        <input type="text" id="qualification_1" name="qualification_1" placeholder="Qualification" required />
                        <input type="text" id="institution_1" name="institution_1" placeholder="Institution" required />
                        <input type="text" id="major_1" name="major_1" placeholder="Major" required />
                        
                        &nbsp;
                        &nbsp;
            
                        <label for="year_completed_1"> Year Completed </label>
            
                        &nbsp;
                        &nbsp;
            
                        <input type="date" id="year_completed_1" name="year_completed_1" required />
            
                        <br>
                        <br>
            
                        <input type="text" id="qualification_2" name="qualification_2" placeholder="Qualification" />
                        <input type="text" id="institution_2" name="institution_2" placeholder="Institution" />
                        <input type="text" id="major_2" name="major_2" placeholder="Major" />
                        
                        &nbsp;
                        &nbsp;
            
                        <label for="year_completed_2"> Year Completed </label>
            
                        &nbsp;
                        &nbsp;
            
                        <input type="date" id="year_completed_2" name="year_completed_2" />
            
                        <br>
                        <br>
            
                        <input type="text" id="qualification_3" name="qualification_3" placeholder="Qualification" />
                        <input type="text" id="institution_3" name="institution_3" placeholder="Institution" />
                        <input type="text" id="major_3" name="major_3" placeholder="Major" />
                        
                        &nbsp;
                        &nbsp;
            
                        <label for="year_completed_3"> Year Completed </label>
            
                        &nbsp;
                        &nbsp;
            
                        <input type="date" id="year_completed_3" name="year_completed_3" />
            
                        <br>
                        <br>
            
                        <hr>
            
                        <br>
                        
                        
            
                    </form>
                
                <?php
    
            } else {
        
                echo "You must sign up with an account first";
        
            }
        
        ?>

       
        
    </body>

</html>
