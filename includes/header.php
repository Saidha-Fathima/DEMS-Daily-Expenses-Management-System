<?php
if(!isset($_SESSION)) session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="header">

    <h3>Daily Expenses Management System</h3>

    <div class="header-right">

        <span class="welcome-text">
            Welcome <?php echo htmlspecialchars($username); ?>
        </span>

        <!-- THEME BUTTON -->
        <button class="fa-btn" onclick="toggleTheme()" title="Toggle Theme">
            <i id="themeIcon" class="fa-solid fa-moon"></i>
        </button>

    </div>

</div>

<script>
function setTheme(theme){
    const icon = document.getElementById("themeIcon");

    if(theme === "dark"){
        document.body.setAttribute("data-theme","dark");
        icon.classList.replace("fa-moon","fa-sun");
    }else{
        document.body.removeAttribute("data-theme");
        icon.classList.replace("fa-sun","fa-moon");
    }

    localStorage.setItem("theme", theme);
}

function toggleTheme(){
    const current = document.body.getAttribute("data-theme");
    setTheme(current === "dark" ? "light" : "dark");
}

window.addEventListener("DOMContentLoaded", () => {
    const saved = localStorage.getItem("theme") || "light";
    setTheme(saved);
});
</script>