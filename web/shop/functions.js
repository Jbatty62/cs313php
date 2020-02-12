var total = 0;

function setTotal(value) {
    total = value;
    document.getElementById("total").innerHTML = " Total: $" + total.toFixed(2);
}

function addToCart(itemID) {

    //Get Element IDs
    var clickedID = "item-" + itemID;
    var priceID = "item-price-" + itemID;
    var nameID = "item-name-" + itemID;
    var descriptionID = "item-description-" + itemID;
    var imageID = "item-image-" + itemID;
    
    //Get Element Values
    var name = document.getElementById(nameID).innerHTML;
    var description = document.getElementById(descriptionID).innerHTML;
    var price = document.getElementById(priceID).innerHTML;
    var image = document.getElementById(imageID).src;

    
    
    //Clean Price Text
    price = price.match(/\d+.\d\d/)[0];
    price = parseFloat(price);
    
    //Adjust Total
    total += price;
    document.getElementById("total").innerHTML = " Total: $" + total.toFixed(2);

    //Log for Debugging
    console.log("ID:", itemID, " price: ", price, " name: ", name, " description: ", description);

    //Create Cart Item Element
    document.getElementById("float").innerHTML = '<div id="cart-item-' + 
        itemID + '" class="cart-item"> <div class="cart-item-text"> <span id="cart-item-name-' + itemID + '">' + 
        name + '</span> <span id="button'+ itemID + '" class="close" onclick="removeFromCart('+ itemID + ',' + price +',' + '1)"></span> <p class="cart-item-price"> Price: $' + 
        price + '</p> </div> <img id="cart-item-image-' + itemID + '" class="cart-item-image" src="' + image + '"><p class="cart-item-description" id="cart-item-description-' + itemID + '" style="display:none;">' + description +'</div>' + document.getElementById("float").innerHTML;
        
    //Remove Item from Main    
    document.getElementById(clickedID).remove();

    //Start AJAX
    var ajax = new XMLHttpRequest();
    var url = 'addtocart.php';
    var params = 'id='+ itemID +'&name=' + name + '&price=' + price;
    ajax.open('POST', url, true);

    //Send the proper header information along with the request
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    ajax.onreadystatechange = function() {//Call a function when the state changes.
    if(ajax.readyState == 4 && ajax.status == 200) {
        console.log(ajax.responseText);
    }
}
    ajax.send(params);

}

 

  function removeFromCart(itemID, price, writeHTML) {

        //Get Element Ids
        var elementID = "cart-item-" + itemID;
        var descriptionID = "cart-item-description-" + itemID;
        var nameID = "cart-item-name-" + itemID;
        var imageID = "cart-item-image-" + itemID;

        
        
       

        //Adjust Total
        total -= price;
        if (total < 0) {
            total = 0;
        }
        document.getElementById("total").innerHTML = " Total: $" + total.toFixed(2);

        //Create Item in Main
        if (writeHTML) {

            //Get Element Values
            var description = document.getElementById(descriptionID).innerHTML;
            var name = document.getElementById(nameID).innerHTML;
            var image = document.getElementById(imageID).src;

             //Log for Debugging
            console.log("ID:", itemID, " price: ", price, " name: ", name, " description: ", description);

            //HTML Output
            document.getElementById("main").innerHTML = '<div id="item-' + itemID + 
            '" class="item"><h2 id="item-name-' + itemID + '" class="item-name">Basic Rule Set</h2><img id="item-image-' + itemID + '" src="' + image + '" height="100px" style="float: right;"><p id="item-description-' + itemID + '">' + description +
            '</p><h3 id="item-price-' + itemID + '" class="item-price">Price: ' + price + '</h3> <button id="button'+ itemID +'" onclick="addToCart('+ itemID +')"><span>Add to Cart</span></button></div>' +  document.getElementById("main").innerHTML;
        }
        //Remove Item From Cart
        document.getElementById(elementID).remove();

        //Start AJAX
        var ajax = new XMLHttpRequest();
        var url = 'removefromcart.php';
        var params = 'id='+ itemID;
        ajax.open('POST', url, true);

        //Send the proper header information along with the request
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        ajax.onreadystatechange = function() {//Call a function when the state changes.
            if(ajax.readyState == 4 && ajax.status == 200) {
                console.log(ajax.responseText);
            }
        }
    ajax.send(params);


  }

