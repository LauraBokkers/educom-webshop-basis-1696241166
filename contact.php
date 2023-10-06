<!DOCTYPE HTML>
<html class="entirepage">

<head>
    <link rel="stylesheet" href="CSS/stylesheet.css">
</head>

<body>
    <!-- Dit is de gekopieerde php code die in de opdracht staat-->
    <?php
    // initate the variables 
    $salutation = $name = $email = $phonenumber = $comm_preference = $message = '';
    $salutationErr = $nameErr = $emailErr = $phonenumberErr = $comm_preferenceErr = $messageErr = '';
    $valid = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // var_dump($_POST);
        // die();

        // validate for the 'POST' data
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = ($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = ($_POST["email"]);
        }

        if (empty($_POST["phonenumber"])) {
            $phonenumberErr = "Phonenumber is required";
        } else {
            $phonenumber = ($_POST["phonenumber"]);
        }

        if (empty($_POST["message"])) {
            $messageErr = "Message is required";
        } else {
            $message = ($_POST["message"]);
        }


        if (empty($nameErr) && empty($emailErr) && empty($phonenumberErr) && empty($messageErr)) {
            $valid = true;
        } else {
            $valid = false;
        }
    }

    ?>
    <header>
        <h1 class="headers"> Contact page</h1>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="contact.php">CONTACT</a></li>
        </ul>
    </nav>

    <section>

        <!-- Dit is de gekopieerde (nu aangepaste) php code die in de opdracht staat-->

        <?php if (!$valid) { /* Show the next part only when $valid is false */ ?>

            <form method="POST" action="contact.php">
                <select name="salutation" id="salutation">
                    <option value="mr">Dhr.</option>
                    <option value="mrs">Mevr.</option>
                </select> </br></br>

                <label for="name">Naam:</label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>"></br>
                <span class="error">* <?php echo $nameErr; ?></span>
                <br><br>

                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>"></br>
                <span class="error">* <?php echo $emailErr; ?></span>
                <br><br>

                <label for="phonenumber">Telefoonnummer:</label>
                <input type="text" name="phonenumber" id="phonenumber" <?php echo $phonenumber; ?>></br></br>
                <span class="error">* <?php echo $phonenumberErr; ?></span>
                <br><br>

                <label for="comm_preference">Communicatievoorkeur:</label>
                <input type="radio" name="comm_preference" id="communication_email" value="email">
                <label for="email">Email</label>
                <input type="radio" name="comm_preference" id="communication_phone" value="phone">
                <label for="phone">Telefoon</label></br></br>

                <label for="message">Contact:</label></br>
                <textarea name="message" id="contact" cols="40" rows="5" placeholder="Schrijf hier je bericht"><?php echo $message; ?></textarea></br>
                <span class="error">* <?php echo $messageErr; ?></span>
                <br><br>

                <button>Verzenden</button>
            </form></br>


        <?php } else { /* Show the next part only when $valid is true */ ?>

            <p>Bedankt voor uw reactie:</p>

            <div>Name: <?php echo $salutation . $name; ?></div>
            <div>Email: <?php echo $email; ?></div>
            <div>Phonenumber: <?php echo $phonenumber; ?></div>
            <div>Communication preference: <?php echo $comm_preference; ?></div>
            <div>Your message: <?php echo $message; ?></div>

        <?php } /* End of conditional showing */ ?>

    </section>

    <footer class="footers">
        <p>&copy; 2023 Laura Bokkers</p>
    </footer>
</body>

</html>