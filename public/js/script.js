/**
 * Created by Lena on 05.12.2016.
 */

$(document).ready(function () {

    //////////// NAVIGATION - HOVER ////////////////////////


    // ******* 1. Änderung Schriftfarbe ******* //

    $("#main_nav li a, .footer_navi li a").hover(function(){
        $(this).css("color", "#cecece");
    }, function(){
        $(this).css("color", "#555");
    });

    $(".subnavi li a, .projnavi li a").hover(function(){
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

    var elements = $(".accordion_title");
    var i;

    for (i=0; i<$(elements).length; i++) {
        $(elements[i]).on("click", function () {
            $(this).toggleClass("active", "");
            $(this).siblings(".panel").slideToggle().toggleClass("show", "");
        });
    }







});


























