<?php
if(!isset($_SESSION)) session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';
?>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="header">
    
    <h3>Daily Expense Management System</h3>

    <div class="header-right">

        <span class="welcome-text">
            Welcome <?php echo htmlspecialchars($username); ?>
        </span>

        <!-- ROUND THEME BUTTON -->
        <button class="fa-btn theme-toggle" onclick="toggleTheme()">
            <i id="themeIcon" class="fa-solid fa-moon"></i>
        </button>

    </div>
</div>

<script>
function setTheme(theme){
    const icon = document.getElementById("themeIcon");

    if(theme === "dark"){
        document.body.setAttribute("data-theme","dark");
        icon.classList.remove("fa-moon");
        icon.classList.add("fa-sun");
    }else{
        document.body.removeAttribute("data-theme");
        icon.classList.remove("fa-sun");
        icon.classList.add("fa-moon");
    }

    localStorage.setItem("theme", theme);
}

function toggleTheme(){
    const current = document.body.getAttribute("data-theme");
    setTheme(current === "dark" ? "light" : "dark");
}

// load saved theme
window.addEventListener("DOMContentLoaded", () => {
    const saved = localStorage.getItem("theme") || "light";
    setTheme(saved);
});
</script>