
{
let dice = [new Dice(3, 0), new Dice(3, 0),new Dice(3,0)],
        diceSet = new DiceSet(dice, "Dice Set 1"),
        diceSets = [diceSet];
        
var board = new Board(diceSets);
}

function removeDice(DiceSetId) {
   board.removeDice(DiceSetId);
}

function addDice(diceSetID) {
   board.addDice(diceSetID);
}

function rollAll(diceSetID) {
   board.rollAll(diceSetID);
 }

/*
function removeDiceSet(ID) {
    
    document.getElementById(ID).remove();
}



function getNumDice(diceSetI) {
    return 6;
}
*/











function Dice(numSides, minimum) {
    this.minimum = minimum;
    this.numSides = numSides;
    this.id = new Date().valueOf()+Math.random();
    this.value = 0;
    this.setValue = function (value) {
        
        this.value = value;
        var imageName = this.numSides + "sided" + value;
        console.log(imageName);
        document.getElementById(this.id).innerHTML = '<img src="' + imageName + '.jpg" width=50 height=50> <h2>';
        
        
    };
    this.roll = function () {
        var roll = Math.floor(Math.random() * numSides);
        if (minimum === 1) {
            roll += 1;
        }
        this.setValue(roll);
        return roll;
    };
    this.createDOM = function() {
        var dom = document.createElement("div");
        dom.setAttribute("id",this.id);
        dom.setAttribute("class","dice");
        dom.innerHTML = '<img src="3sided0.jpg" width=50 height=50>';

        this.dom = dom;

    }
    this.dom = null;    
} 

function DiceSet(dice, name) {
    this.name = name;
    this.dice = dice;
    this.id = new Date().valueOf() + Math.random();
    this.rollAll = function () {
        
        for (var i = 0; i < dice.length; i++){
            this.dice[i].roll();
        }
    };
    
    this.addDice = function (numSides, minimum) {
        
        console.log("in Dice Set : Add Dice")
        var newDice = new Dice(numSides, minimum);
        newDice.createDOM();
        this.dice.push(newDice);
        document.getElementById(this.id).getElementsByClassName("diceContainer")[0].appendChild(newDice.dom);
        
    };
    
    this.removeDice = function () {

    let targetDice = dice.pop();
    document.getElementById(targetDice.id).remove();
     
    };
    this.createDOM = function () {
        var dom = document.createElement("div");
        dom.setAttribute("id",this.id);
        dom.setAttribute("class","diceset");


        var minusButton = document.createElement("span");
        minusButton.setAttribute("class", "minus");
        minusButton.setAttribute("onclick", "removeDice(" + this.id + ")")
        minusButton.innerHTML = "-";
        

        var plusButton = document.createElement("span");
        plusButton.setAttribute("class", "plus");
        plusButton.innerHTML = "+";
        plusButton.setAttribute("onclick", "addDice(" + this.id + ")")

        var rollAllButton = document.createElement("span");
        rollAllButton.setAttribute("class", "plus");
        rollAllButton.innerHTML = "Roll";
        rollAllButton.setAttribute("onclick", "rollAll(" + this.id + ")")

        var diceContainer = document.createElement("div");
        diceContainer.setAttribute("class", "diceContainer");

        for (let i = 0; i < dice.length; i++) {
            console.log ("DiceSet Create Dom -- Add Dice HTML -- i= " + i);
            dice[i].createDOM();
            diceContainer.appendChild(dice[i].dom);
        }

        var xButton = document.createElement("span");
        xButton.setAttribute("class", "close");
        //xbutton.addEventListener("click", removeDiceSet(this.id))

        dom.appendChild(minusButton);
        dom.appendChild(plusButton);
        dom.appendChild(rollAllButton);
        dom.appendChild(diceContainer);
        dom.appendChild(xButton);

        
        this.dom = dom;

    };
    this.dom = null;

}


function Board (diceSets) {
    this.diceSets = diceSets;
    this.display = function () {

        document.getElementById("main").innerHTML = " ";
            for (let i = 0; i < diceSets.length; i++) {
                console.log("in Board.display()");
                diceSets[i].createDOM();
                document.getElementById("main").appendChild(diceSets[i].dom);
            

            }
          

    };
    this.removeDice = function (diceSetID) {
        for (let i = 0; i < diceSets.length; i++) {
            if (diceSets[i].id === diceSetID) {
                console.log("in board.removedice")
                board.diceSets[i].removeDice();
            }
        } 
    };
    this.addDice = function (diceSetID) {
        for (let i = 0; i < diceSets.length; i++) {
            if (diceSets[i].id === diceSetID) {
                console.log("in board.add dice")
                board.diceSets[i].addDice(3,0);
            }
        } 
    };

    this.rollAll = function (diceSetID) {
        for (let i = 0; i < diceSets.length; i++) {
            if (diceSets[i].id === diceSetID) {
                console.log("in board.add dice")
                board.diceSets[i].rollAll();
            }
        } 
    };
}


document.addEventListener('DOMContentLoaded', function() {
    board.display();

 }, false);