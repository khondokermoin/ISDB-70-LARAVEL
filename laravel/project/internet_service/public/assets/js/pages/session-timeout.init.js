/*
Template Name: Nazox -  Admin & Dashboard Template
Author: Themesdesign
Contact: themesdesign.in@gmail.com
File: Session Timeout Js File
*/

$.sessionTimeout({
    keepAliveUrl: '/src/pages-starter.php',
    logoutButton: 'Logout',
    logoutUrl: '/src/auth-login.php',
    redirUrl: '/src/auth-lock-screen.php',
    warnAfter: 3000,
    redirAfter: 30000,
    countdownMessage: 'Redirecting in {timer} seconds.'
});
