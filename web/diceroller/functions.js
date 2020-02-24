
//Setup the initial varriables for the DiceRoller App
{
let dice = [new Dice(3, 0), new Dice(3, 0),new Dice(3,0)],
        diceSet = new DiceSet(),
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
   let menu = document.createElement("div");
   menu.setAttribute("class","addDiceMenu");

   let d3 = document.createElement("div");
   d3.setAttribute("class","d3");
   d3.classList.add("dice");
   d3.innerHTML = "d3";
   d3.addEventListener("mousedown", function() {
       board.findDiceSetbyID(diceSetID).addDice(3,0)
   },false);

   menu.appendChild(d3);

    let d4 = document.createElement("div");
    d4.setAttribute("class","d4");
    d4.classList.add("dice");
    d4.innerHTML = "d4";
    d4.addEventListener("mousedown", function() {
    board.findDiceSetbyID(diceSetID).addDice(4,0)
},false);

   menu.appendChild(d4);

   let d6 = document.createElement("div");
   d6.setAttribute("class","d6");
   d6.classList.add("dice");
   d6.innerHTML = "d6";
   d6.addEventListener("mousedown", function() {
    board.findDiceSetbyID(diceSetID).addDice(6,0)
},false);

   menu.appendChild(d6);

   let d8 = document.createElement("div");
   d8.setAttribute("class","d8");
   d8.classList.add("dice");
   d8.innerHTML = "d8";
   d8.addEventListener("mousedown", function() {
    board.findDiceSetbyID(diceSetID).addDice(8,0)
},false);

   menu.appendChild(d8);

   let d10 = document.createElement("div");
   d10.setAttribute("class","d10");
   d10.classList.add("dice");
   d10.innerHTML = "d10";
   d10.addEventListener("mousedown", function() {
    board.findDiceSetbyID(diceSetID).addDice(10,0)
},false);

   menu.appendChild(d10);

   let d12 = document.createElement("div");
   d12.setAttribute("class","d12");
   d12.classList.add("dice");
   d12.innerHTML = "d12";
   d12.addEventListener("mousedown", function() {
    board.findDiceSetbyID(diceSetID).addDice(12,0)
},false);

   menu.appendChild(d12);

   let d20 = document.createElement("div");
   d20.setAttribute("class","d20");
   d20.classList.add("dice");
   d20.innerHTML = "d20";
   d20.addEventListener("mousedown", function() {
    board.findDiceSetbyID(diceSetID).addDice(20,0)
},false);

   menu.appendChild(d20);

   let d100 = document.createElement("div");
   d100.setAttribute("class","d100");
   d100.classList.add("dice");
   d100.innerHTML = "d100";
   d100.addEventListener("mousedown", function() {
    board.findDiceSetbyID(diceSetID).addDice(100,0)
},false);

   menu.appendChild(d100);

   document.addEventListener("mousedown", function() {
        document.getElementsByClassName("addDiceMenu")[0].remove();
   },{once:true});
   document.getElementById(diceSetID).appendChild(menu);
   //board.addDice(diceSetID);

   
}


function closeAddMenu(){
    
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
        diceSet = new DiceSet(dice, "Title");
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
        console.log(window.localStorage.getItem("board"));
        var object = JSON.parse(window.localStorage.getItem("board")); //Recover stored JSON into object
        console.log(object);
    
        
        diceSets = []; //Array to store all DiceSets
        for (let i = 0; i< object.length; i++) {
            var dice = []; //Array to hold dice for one DiceSet
            for(let j = 0; j < object[i].dice.length; j++) {
                dice.push(new Dice(Number(object[i].dice[j].numSides), Number(object[i].dice[j].minimum)));
                
            }
            let title = decodeURIComponent(object[i].title)
            diceSets.push(new DiceSet(dice,title)); //Add array of dice to a new DiceSet and push to array of DiceSets
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
    this.generateInnerHTML = function() {
        if (this.numSides === 3) {
            var imageName = this.numSides + "sided" + this.value;
             return '<img src="' + imageName + '.jpg" width=50 height=50> <h2>';
            }
            else {
               return this.value;
            }
    };
    this.setValue = function (value) {
        
        this.value = value;

        document.getElementById(this.id).innerHTML = this.generateInnerHTML();
        
        
    };
    this.roll = function () {
        var roll = Math.floor(Math.random() * numSides);
        
            roll += minimum;
        
        this.setValue(roll);
        return roll;
    };
    
    this.createDOM = function() {
        var self = this;
        var dom = document.createElement("div");
        dom.setAttribute("id",this.id);
        dom.setAttribute("class","dice");
        dom.classList.add("d" + numSides);
        dom.innerHTML = this.generateInnerHTML();
        dom.addEventListener("touchend", function() {
            self.roll();
            board.findDiceSetbyDiceID().updateTotal();
        }, false)

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
function DiceSet(dice = [], title = "Title", modifier = 0) {
    this.title = title;
    this.dice = dice;
    this.id = new Date().valueOf() + Math.random();
    this.modifier = modifier;
    this.total = 0;
    this.updateTotal = function() {
        var total = this.modifier;
        for (var i = 0; i < dice.length; i++){
           total += this.dice[i].value;
        }
        document.getElementById(this.id).getElementsByClassName("total")[0].innerHTML = total;
    };
    this.updateTitle = function() {
        console.log(this.id);
        this.title = encodeURIComponent(document.getElementById(this.id).getElementsByClassName("diceSetTitle")[0].innerHTML);
    };
    this.updateModifier = function(inputValue = 0) {
        if(inputValue === 0){
            inputValue = document.getElementById(this.id).getElementsByClassName("modifier")[0].innerHTML;
            if (isNaN(inputValue)){
                this.modifier = 0;
                document.getElementById(this.id).getElementsByClassName("modifier")[0].innerHTML = 0;
            }
            else {
                this.modifier =inputValue;
            }
        }
        else {
            this.modifier += inputValue;
            document.getElementById(this.id).getElementsByClassName("modifier")[0].innerHTML = this.modifier;
        }
    }
    this.rollAll = function () {
        
        var total = this.modifier;
        for (var i = 0; i < dice.length; i++){
           total += this.dice[i].roll();
        }
        document.getElementById(this.id).getElementsByClassName("total")[0].innerHTML = total;
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

        var self = this;  //To keep context of "this" for Event Listeners

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

        var title = document.createElement("h2");
        title.setAttribute("class","diceSetTitle");
        title.setAttribute("contenteditable","true");
        title.addEventListener("blur", function() {
            self.updateTitle();
        },false);
        title.innerHTML = this.title;

        let totalArea = document.createElement("div");
        totalArea.classList.add("totalArea")
        totalArea.innerHTML='<label>Total</label><span class="total">'+ this.total +'</span><label>Modifier</label>'
    
        var span = document.createElement("h2");
        span.setAttribute("class","modifier");
        span.setAttribute("contenteditable","true");
        span.addEventListener("blur", function() {
            self.updateModifier();
        },false);
        span.innerHTML = this.modifier;

        totalArea.appendChild(span);

        var modPlus =document.createElement("span");
        modPlus.setAttribute("class","adjusts");
        modPlus.innerHTML = "+";
        modPlus.addEventListener("click", function() {
            console.log("Message");
            self.updateModifier(1);
        },false);

        var modMinus =document.createElement("span");
        modMinus.setAttribute("class","adjusts");
        modMinus.innerHTML = "-";
        modMinus.addEventListener("click", function() {
            console.log("Message");
            self.updateModifier(-1);
        },false);

       
        totalArea.appendChild(modMinus);
        totalArea.appendChild(modPlus);
        
        

        //totalArea.innerHTML +='';

     
       

        inputs.appendChild(minusButton);
        inputs.appendChild(plusButton);
        inputs.appendChild(rollAllButton);
        dom.appendChild(title);
        dom.appendChild(inputs);
        dom.appendChild(diceContainer);
        dom.appendChild(totalArea);
        dom.appendChild(xButton);

        
        this.dom = dom;

    };
    this.dom = null;
    this.toJSON = function() {
        var json = '{';
        json += '"title": "' + this.title + '","dice": [';
        for (let i = 0; i < dice.length; i++) {
            json += dice[i].toJSON();
            if (i != dice.length - 1) {
                json += ",";
            }
        }

        json += "]}";
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
    this.findDiceSetbyID = function (diceSetID) {
        for (let i = 0; i < diceSets.length; i++) {
            if (diceSets[i].id === diceSetID) {
                return diceSets[i];
            }
        } 
    };

    this.findDiceSetbyDiceID = function (diceID) {
        for (let i = 0; i < diceSets.length; i++) {
            for (let j = 0; j< diceSets[i].dice.length; j++)
                if (diceSets[i].dice[j] === diceID) {
                    return diceSets[i];
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