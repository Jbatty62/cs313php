function changeText() {
    document.getElementById("button1").innerHTML = "Clicked!";
}

function changeColor() {
    
    var newColor = document.getElementById("color-code").value;
    console.log(newColor)
    document.getElementById("div1").style.backgroundColor = newColor;
}

$(document).ready(function(){
    
    $("#button3").click(function() {
        var newColor = $("#color-code").val();
        console.log(newColor);
        $("#div2").css("background-color", newColor);
    });
    
    $("#button4").click(function(){
        console.log("in Function");
        if ($("#div3").is(":visible")) {
            console.log("in if");
            $("#div3").fadeOut(1000);
            $("#button4").html("Show Div 3");
        }
        else {
            console.log("in else");
            $("#div3").fadeIn(1000);
            $("#button4").html("Hide Div 3");
        }
        
    })
});