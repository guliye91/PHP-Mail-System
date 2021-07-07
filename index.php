<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Students Mail List | ICT 4th Years</title>

</head>

<body>
    <div class="container">
        <h1>STUDENT'S MAIL LIST</h1>
        <hr>
        <div class="img-container">
            <img src="./images/logo.jpg" alt="university-logo">
        </div>
        <form action="includes/email.inc.php" method="post">
            <label for="registration-number">
                <p>REG NO: <input type="text" id="registration-number" name="reg-no" placeholder="Registration Number..."></p>

            </label>
            <label for="email">
                <p>Email: <input type="email" id="email" name="mail" placeholder="Email Address..."></p>

            </label>
            <input type="submit" name="submit" value="Submit" class="submit-btn">
        </form>
        <div class="copyright">
            <p>All Rights Reserved. &copy;Guliye <span style="color: #e25555;">&hearts;</span></p>
        </div>
    </div>
    <script>
        const img = document.querySelector('.container img');
        img.addEventListener('contextmenu', (e) => {
            e.preventDefault();
        })
    </script>
</body>

</html>