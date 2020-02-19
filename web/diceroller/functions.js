
//Setup the initial varriables for the DiceRoller App
{
let dice = [new Dice(3, 0), new Dice(3, 0),new Dice(3,0)],
        diceSet = new DiceSet(dice, "Dice Set 1"),
        diceSets = [diceSet];

        var board = new Board(diceSets);
        
}


 /*****************************************
 * removeDice()
 * Remove a Dice from a DiceSet.
 *****************************************/
function removeDice(DiceSetId) {
   board.removeDice(DiceSetId);
}

 /*****************************************
 * addDice()
 * Add a Dice to a DiceSet.
 *****************************************/
function addDice(diceSetID) {
   board.addDice(diceSetID);
}

 /*****************************************
 * rollAll()
 * Roll all of the dice in a DiceSet.
 *****************************************/
function rollAll(diceSetID) {
   board.rollAll(diceSetID);
 }

 /*****************************************
 * removeDiceSet()
 * Remove a DiceSet from the board.
 *****************************************/
function removeDiceSet(diceSetID) {
    board.removeDiceSet(diceSetID);
}

/*****************************************
 * addDiceSet()
 * create a new DiceSet and add it to the board.
 *****************************************/
function addDiceSet() {
    let dice = [new Dice(3, 0), new Dice(3, 0),new Dice(3,0)],
        diceSet = new DiceSet(dice, "Dice Set 1");
    board.addDiceSet(diceSet);
}


/*****************************************
 * saveBoard()
 * Store a board in Local Storage
 *****************************************/
function saveBoard() {
    window.localStorage.setItem("board", board.toJSON());
}

/*****************************************
 * loadBoard()
 * Load a board from a JSON string
 *****************************************/
function loadBoard () {

    //If Local Storage is already Set
    if (window.localStorage.getItem("board")) {
        var object = JSON.parse(window.localStorage.getItem("board")); //Recover stored JSON into object
    
        
        diceSets = []; //Array to store all DiceSets
        for (let i = 0; i< object.length; i++) {
            var dice = []; //Array to hold dice for one DiceSet
            for(let j = 0; j < object[i].length; j++) {
                dice.push(new Dice(object[i][j].numSides, object[i][j].minimum));
                
            }
            diceSets.push(new DiceSet(dice)); //Add array of dice to a new DiceSet and push to array of DiceSets
        }
        //Create new board and replace the old one
        board = new Board(diceSets);
    }
    
    board.display();
}








/**************************************************************************
*
*   Dice Object 
*   An object representing a single dice. Typically inside of a diceSet.
*
*   - Variables
*       Minimum: Typically 1 or 0. Raises the minimum possible value of roll() by this amount
*       numSides: The span of the range of possible values. Possible values span minimum to minimum + numSides.
*       id:        The id of the dom element that represtens this object
*       value:    The current value of the dice object. The last rolled number.
*       dom:        The contents of the HTML for the associated DOM element.
*
*   - Methods     
*       setValue(): A basic setter function for the value member variable that also adjusts the image displayed on the dom.
*       roll():     Get a random number within the range and call setValue()
*       createDOM(): Generate the HTML to be inserted into the DOM.
*       toJSON():   Generates json that can easily be used to reload the board or element.
**************************************************************************/
function Dice(numSides, minimum) {
    this.minimum = minimum;
    this.numSides = numSides;
    this.id = new Date().valueOf()+Math.random();
    this.value = 0;
    this.setValue = function (value) {
        
        this.value = value;
        var imageName = this.numSides + "sided" + value;
        document.getElementById(this.id).innerHTML = '<img src="' + imageName + '.jpg" width=50 height=50> <h2>';
        
        
    };
    this.roll = function () {
        var roll = Math.floor(Math.random() * numSides);
        
            roll += minimum;
        
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
    this.toJSON = function () {
        return '{"numSides": "' + this.numSides + '", "minimum": "' + this.minimum + '"}';
    }
} 




/**************************************************************************
*
*   DiceSet Object 
*   An object representing a sset of dice. Used by and stored within the Board object.
*
*   - Variables
*       Name: The title of the DiceSet. Currently unused, in a future update, this will display on the DiceSet.
*       dice: The array that holds all of the Dice objects stored in the DiceSet
*       id:        The id of the dom element that represtens this object
*       dom:        The contents of the HTML for the associated DOM element.
*
*   - Methods     
*       setValue(): A basic setter function for the value member variable that also adjusts the image displayed on the dom.
*       roll():     Get a random number within the range and call setValue()
*       createDOM(): Generate the HTML to be inserted into the DOM.
*       toJSON():   Generates json that can easily be used to reload the board or element.
**************************************************************************/
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

        var inputs = document.createElement("div");
        inputs.setAttribute("class","inputs");

        var minusButton = document.createElement("span");
        //minusButton.setAttribute("class", "minus");
        minusButton.setAttribute("onclick", "removeDice(" + this.id + ")")
        minusButton.innerHTML = "-";
        

        var plusButton = document.createElement("span");
        //plusButton.setAttribute("class", "plus");
        plusButton.innerHTML = "+";
        plusButton.setAttribute("onclick", "addDice(" + this.id + ")")

        var rollAllButton = document.createElement("span");
        //rollAllButton.setAttribute("class", "plus");
        rollAllButton.innerHTML = "Roll";
        rollAllButton.setAttribute("onclick", "rollAll(" + this.id + ")")

        var diceContainer = document.createElement("div");
        diceContainer.setAttribute("class", "diceContainer");

        for (let i = 0; i < dice.length; i++) {
            dice[i].createDOM();
            diceContainer.appendChild(dice[i].dom);
        }

        var xButton = document.createElement("span");
        xButton.setAttribute("class", "close");
        xButton.setAttribute("onclick", "removeDiceSet(" + this.id + ")");

        inputs.appendChild(minusButton);
        inputs.appendChild(plusButton);
        inputs.appendChild(rollAllButton);
        dom.appendChild(inputs);
        dom.appendChild(diceContainer);
        dom.appendChild(xButton);

        
        this.dom = dom;

    };
    this.dom = null;
    this.toJSON = function() {
        var json = '[';
        for (let i = 0; i < dice.length; i++) {
            json += dice[i].toJSON();
            if (i != dice.length - 1) {
                json += ",";
            }
        }

        json += "]";
        return json;
    }


}

/**************************************************************************
*
*   Board Object 
*   An object representing the entire space of the application.
*
*   - Variables
*       diceSets: The array that holds all of the DiceSet objects stored in the Board
*    
*
*   - Methods     
*       display(): Updates and inserts the HTML into the DOM.
*       removeDice():   Locates the DiceSet indicated by the ID of the clicked element and calls that object's removeDice() method.
*       addDice():   Locates the DiceSet indicated by the ID of the clicked element and calls that object's addDice() method.
*       rollAll():   Locates the DiceSet indicated by the ID of the clicked element and calls that object's rollAll() method.
*       removeDiceSet():   Locates the DiceSet indicated by the ID of the clicked element removes it from the board.
*       addDiceSet():   creates a new diceSet, adds it to the board, and used display() to regenerate the HTML on the page.
*       toJSON():   Generates json that can easily be used to reload the board.
**************************************************************************/

function Board (diceSets) {
    this.diceSets = diceSets;
    this.display = function () {

        document.getElementById("main").innerHTML = " ";
            for (let i = 0; i < diceSets.length; i++) {
                
                diceSets[i].createDOM();
                document.getElementById("main").appendChild(diceSets[i].dom);
            
                

            }
            let button = document.createElement("button");
            button.setAttribute("onclick", "addDiceSet()");
            button.innerHTML = "Add Dice Set"

            document.getElementById("main").appendChild(button);

            button = document.createElement("button");
            button.setAttribute("onclick", "saveBoard()");
            button.innerHTML = "Save Dice Sets";
            document.getElementById("main").appendChild(button);

            button = document.createElement("button");
            button.setAttribute("onclick", "loadBoard()");
            button.innerHTML = "Load Dice Sets";
            document.getElementById("main").appendChild(button);


    };
    this.removeDice = function (diceSetID) {
        for (let i = 0; i < diceSets.length; i++) {
            if (diceSets[i].id === diceSetID) {
                board.diceSets[i].removeDice();
            }
        } 
    };
    this.addDice = function (diceSetID) {
        for (let i = 0; i < diceSets.length; i++) {
            if (diceSets[i].id === diceSetID) {
                board.diceSets[i].addDice(3,0);
            }
        } 
    };

    this.rollAll = function (diceSetID) {
        for (let i = 0; i < diceSets.length; i++) {
            if (diceSets[i].id === diceSetID) {
                board.diceSets[i].rollAll();
            }
        } 
    };

    this.removeDiceSet = function (diceSetID) {
        
        for (let i = 0; i < diceSets.length; i++) {
            if (diceSets[i].id === diceSetID) {
                this.diceSets.splice(i,1);
                break;
            }

        } 
        this.display();
    };

    this.addDiceSet = function (diceSet) {
        
        this.diceSets.push(diceSet);
        this.display();
    };
    this.toJSON = function () {
        let json = '[';
        for (let i = 0; i < diceSets.length; i++) {
            json += diceSets[i].toJSON();
            if (i != diceSets.length - 1) {
                json += ", "
            }
        }

        json += "]"
        return json;
    }
    
}


document.addEventListener('DOMContentLoaded', function() {
  
    
    board.display();

 }, false);