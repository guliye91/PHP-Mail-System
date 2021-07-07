<?php
if (isset($_POST['submit'])) {
    require 'dbh.inc.php';

    $regNo = $_POST['reg-no'];
    $email = $_POST['mail'];
    $contain = 'I231' || 'i231';

    if (empty($regNo) || empty($email)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else if (!str_contains($regNo, $contain)) {
        header("Location: ../index.php?error=invalidreg");
        exit();
    } else if (strpos($regNo, '/') !== 4) {
        header("Location: ../index.php?error=invalidreg");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidmail");
        exit();
    } else {
        $sql = "SELECT RegNo, Email from users WHERE RegNo =? OR Email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $regNo, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../index.php?error=regmailexists");
                exit();
            } else {
                $sql = "INSERT INTO users(RegNo, Email) VALUES (?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $regNo, $email);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../thanks.php");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../index.php");
    exit();
}
