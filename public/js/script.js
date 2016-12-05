/**
 * Created by Lena on 05.12.2016.
 */

$(document).ready(function () {

    //////////// NAVIGATION - HOVER ////////////////////////


    // ******* 1. Änderung Schriftfarbe ******* //

    /*$("#main_nav li a").hover(function(){
        $(this).css("color", "#cecece");
    }, function(){
        $(this).css("color", "#555");
    });*/

    // ******* 2. Änderung Hintergrundfarbe ******* //

    $("#main_nav li").hover(function(){
        $(this).css("background-color", "#cecece");
    }, function(){
        $(this).css("background-color", "rgba(255, 255, 255, 0)");
    });




});