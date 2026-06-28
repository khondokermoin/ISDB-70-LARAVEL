/*
Template Name: Nazox -  Admin & Dashboard Template
Author: Themesdesign
Contact: themesdesign.in@gmail.com
File: Form wizard Js File
*/

$(document).ready(function() {
    $('#basic-pills-wizard').bootstrapWizard({
        'tabClass': 'nav nav-pills nav-justified'
    });

    $('#progrss-wizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
        let $total = navigation.find('li').length;
        let $current = index+1;
        let $percent = ($current/$total) * 100;
        $('#progrss-wizard').find('.progress-bar').css({width:$percent+'%'});
    }});

});

// Active tab pane on nav link

let triggerTabList = [].slice.call(document.querySelectorAll('.twitter-bs-wizard-nav .nav-link'))
triggerTabList.forEach(function (triggerEl) {
    let tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function (event) {
        event.preventDefault()
        tabTrigger.show()
    })
})