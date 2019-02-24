<?php
if(isset($_POST['question-submit']))
{
    $answer=$_POST['answer'];
    $readanswer=$_POST['realanswer'];

    $check=password_verify($answer, $readanswer);//Mivel hash-elt adatokról beszélünk, így ellenőrizzük. Sajnos betű érzékeny
    if($check == false)
    {
        header('Location: ../forgot_pwd.php?error=wronganswer');
        exit();
    }
    else if($check == true)
    {
        header('Location: ../reset_pwd.php');
        exit();
    }
    else
    {
        header('Location: ../forgot_pwd.php?error=wronganswer');
        exit();
    }
}
else
{
    header('Location: ../index.php');
    exit();
}
