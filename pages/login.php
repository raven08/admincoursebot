<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet">
</head>
<body>
  <script>
    start_loader()
  </script>

<header></header>
    <main>
        <div class="login_card" id="login">
            <header>
                <h3>Hello CourseBot Admin !</h3>
            </header>
            <?php
                if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                {
                    echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                    unset($_SESSION['status']);
                }
            ?>
            <form action="../pages/logincode.php" method="POST">
                <div class="login_card__info-data">
                    <fieldset>
                        <label for="email">
                        <span class="fas fa-envelope"></span> E-mail
                            <input type="text" class="form-control" name="email" placeholder="Email" required>
                        </label>
                    </fieldset>
                    <fieldset>
                        <label for="pass">
                        <span class="fas fa-lock"></span> Password
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </label>
                    </fieldset>
                  <br></br>
                </div>
                <button type="submit" name="login_btn">Login</button>
             </form>
                
            </form>
        </div>
    </main>
</body>
<script>
    // Toogle dark and light mode
    const btn_check = document.getElementById('toogle_mode');

    btn_check.addEventListener('change', () => {
        document.body.classList.toggle('dark');
    });

    // Toogle password display
    const toggle_input = document.querySelector(".toggle-password");
    const input = document.querySelector("#senha");
    const password_on = document.querySelector(".toggle-password .on");
    const password_off = document.querySelector(".toggle-password .off");

    toggle_input.addEventListener("click", function (e) {
        e.preventDefault();
        if (input.type === "password") {
            input.type = "text";
            input.focus();
            password_on.classList.remove('hide');
            password_off.classList.add('hide');
        } else {
            input.type = "password";
            input.focus();
            password_on.classList.add('hide');
            password_off.classList.remove('hide');
        }
    })
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.jss"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>