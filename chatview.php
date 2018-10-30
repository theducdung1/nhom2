<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
                function updateScroll(){
                    var element = document.getElementById("hienthi");
                    element.scrollTop = element.scrollHeight;
                }
                function enterTrigger(){
                    var input = document.getElementById("content");
                    input.addEventListener("keyup", function(event) {
                        event.preventDefault();
                        if (event.keyCode === 13) {
                            document.getElementById("nut").click();
                        }
                    });
                }
            $(document).ready(function(){
                enterTrigger();
                $.get("hienthi.php", {}, function(data){
                    $("#hienthi").html(data)
                    updateScroll();
                })
                setInterval(function(){$.get("hienthi.php", {}, function(data){
                    $("#hienthi").html(data)
                    updateScroll();
                })},
                2000);
                $("#nut").click(function(){
                    $.post("hienthi.php", {content : $("#content").val()}, function(data){
                        $("#hienthi").html(data)
                    })
                });
            })
        </script>
    </head>
    <body>
        <div id="chat" style="width: 200px;">
            <div id="hienthi" style="overflow: auto; height: 300px;"></div>
            <input name="content" id="content">
            <input type="button" value="SEND" name="submit" id="nut">
        </div>
    </body>
</html>
