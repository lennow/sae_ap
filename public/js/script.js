/**
 * Created by Lena on 05.12.2016.
 */

$(document).ready(function () {

    //////////// NAVIGATION - HOVER ////////////////////////


    // ******* 1. Änderung Schriftfarbe ******* //

    $("#main_nav li a").hover(function(){
        $(this).css("color", "#cecece");
    }, function(){
        $(this).css("color", "#555");
    });

    $("#subnavi li a, #projnavi li a").hover(function(){
        $(this).css("color", "#cecece"); // für Wireframe 2: #fff
    }, function(){
        $(this).css("color", "#555");
    });

    // ******* 2. Änderung Hintergrundfarbe ******* //

    /*$("#main_nav li").hover(function(){
     $(this).css("background-color", "#cecece");
     }, function(){
     $(this).css("background-color", "rgba(255, 255, 255, 0)");
     });

     $("#subnavi li, #projnavi li").hover(function(){
     $(this).css("background-color", "rgba(255, 255, 255, 0.9)");
     }, function(){
     $(this).css("background-color", "#cecece");
     });*/


    //////////// NAVIGATION - Off Canvas Navigation ////////////////////////

    // bei Klick auf Icon OCN einblenden

    $('#nav_icon').on('click', function() {
        $('#mobile_nav').slideToggle();
        $('#nav_icon').toggleClass("rotate90");
    });


    //////////// AKTUELLES - Akkordeon für Veranstaltungen ////////////////////////

    // bei Klick auf Titel Text einblenden

    $('.accordion > h3').click(function () {
        console.log($(this).parents('.accordion').siblings('p'));
        $(this).parents('.accordion').siblings('p').slideToggle();
    });

});