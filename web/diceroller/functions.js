"use strict";

function removeDice(diceSetID) {
    var diceSet = document.getElementById(diceSetID);
    
    diceSet.removeChild(diceSet.getElementsByClassName("dice")[0]);
}

function removeDiceSet(ID) {
    
    document.getElementById(ID).remove();
}

function addDice(diceSetID,numSides) {
    var dice = document.createElement("div");
    dice.setAttribute("class","dice");
    dice.setAttribute("id", diceSetID + "-" + getNumDice(diceSetID));
    
    document.getElementById(diceSetID).appendChild(dice);
    
    //Create Dice Object
    
    
}

function getNumDice(diceSetI) {
    return 6;
}












function Dice(numSides, minimum, id) {
    this.minimum = minimum;
    this.numSides = numSides;
    this.id = id;
    this.setValue = function (value) {
        
        var imageName = this.numSides + "sided" + value;
        document.getElementById(this.id).innerHTML = '<img src="' + imageName + '.png" width=50 height=50>';
        
        
    };
    this.roll = function () {
        var roll = Math.floor(Math.random() * numSides);
        if (minimum === 1) {
            roll += 1;
        }
        this.setValue(roll);
        return roll;
    };    
} 

function DiceSet(dice, name) {
    this.name = name;
    this.dice = dice;
    this.rollAll = function () {
        
        for (var i = 0; i < dice.length; i++){
            this.dice[i].roll();
            
        }
    };
    
    this.addDice = function (numSides, minimum) {
        
        var id = this.id + "dice" + (dice.length + 1);
        var dice = new Dice(numSides, minimum, id);
        this.dice.push(dice);
        
    };
    
    this.removeDice = function (id) {
     document.getElementById(id).remove();
    };
}



function initialize() {
    
    var dice = new Dice(3, 0),
        diceSet = new DiceSet(dice, "Dice Set 1"),
        board = [diceSet];
        
        for (var i = 0; i < board[0].length; i++) {
            board[0].dice.setValue(0);
        }
    
Object.addEventListener("load", initialize())
    
    
    
}