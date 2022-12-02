<!DOCTYPE html>

<html lang="en" >

    <head>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title> Contact Form </title>

        <link rel="stylesheet" href="./assets/css/style.contact.css">

    </head>

    <body>

        <!-- partial:index.partial.html -->
        <form class="form contact-form" action="includes/contact.inc.php" method="post">

            <h1> Send us an Email </h1>

            <div>
                <input class="form-control" id="name" name="name" type="text" required placeholder="Name"/>
            </div>

            <div>
                <input class="form-control" id="surname" name="surname" type="text" required placeholder="Surname"/>
            </div>

            <div>
                <input class="form-control" id="my_email" name="my_email" type="my_email" required placeholder="Email"/>
            </div>

            <div>

                <select class="form-control" id="subject" name="subject" required>

                    <option value="" selected disabled> - Subject - </option>
                    <option value="account_activation">Account Activation</option>
                    <option value="suggestions">Suggestions</option>
                    <option value="vacancies">Vacancies</option>
                    <option value="other">Other</option>

                </select>

            </div>

            <?php

                // Use php here to generate options using for each loop based on emails in the array below or from the database

                $emails = array('lambda@lambda.joburg', 'admin@lambda.joburg');

            ?>

            <div>

                <select class="form-control" id="email" name="email" required>

                    <option value="" selected disabled> - Consultant - </option>
                    <option value="lambda@lambda.joburg">lambda@lambda.joburg</option>
                    <option value="admin@lambda.joburg">admin@lambda.joburg</option>
                    <option value="technical@lambda.joburg">technical@lambda.joburg</option>
                    <option value="suggestions@lambda.joburg">suggestions@lambda.joburg</option>
                    <option value="vacancies@lambda.joburg">vacancies@lambda.joburg</option>

                </select>

            </div>

            <div>
                
                <textarea class="form-control" id="body" name="body" required placeholder="Type your message here..."></textarea>

            </div>

            <!-- <div>
                <label class="form-label" for="subscribe">Subscribe?</label>
                <input class="" id="subscribe" name="subscribe" type="checkbox" />
            </div> -->

            <div>

                <button class="button" type="submit" name="submit">Submit</button>
                <button class="button" type="reset">Clear</button>

            </div>

        </form>

    </body>

</html>
