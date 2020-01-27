
var dog = 
    {
        breed:"German Shepard", 
        age:65,
        color:"brown", 
        name:"Frito",
        bark: function() {
            document.getElementById("div1").innerHTML="Woof woof!";
        }
    }
}

function onclick() {
    document.write(dog.breed);
    document.write("<br>");
    document.write(dog.name);
    document.write(" will be ");
    document.write(dog.age + 1);
    document.write("years old on his next birthday!")
    dog.bark();
}

<input type="button" onclick="dog.bark()" value="This is a Button!">