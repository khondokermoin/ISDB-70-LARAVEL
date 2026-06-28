/*
Template Name: Nazox -  Admin & Dashboard Template
Author: Themesdesign
Contact: themesdesign.in@gmail.com
File: ecommerce cart Js File
*/

let defaultOptions = {
};

$('[data-bs-toggle="touchspin"]').each(function (idx, obj) {
    let objOptions = $.extend({}, defaultOptions, $(obj).data());
    $(obj).TouchSpin(objOptions);
});