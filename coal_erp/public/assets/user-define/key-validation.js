var alpha = "[ A-Za-z]";
var numeric = "[0-9]";
var alphanumeric = "[ A-Za-z0-9]";
var numericDot = "[0-9.]";

function onKeyValidate(e,charVal){
    var keynum;
    var keyChars = /[\x00\x08]/;
    var validChars = new RegExp(charVal);
    if(window.event)
    {
        keynum = e.keyCode;
    }
    else if(e.which)
    {
        keynum = e.which;
    }
    var keychar = String.fromCharCode(keynum);
    if (!validChars.test(keychar) && !keyChars.test(keychar))   {
        return false
    } else{
        return keychar;
    }
}
//<input type="text"  name="shipname"  onkeypress="return onKeyValidate(event,alpha);"/>
//<input type="text"  name="price"   onkeypress="return onKeyValidate(event,numeric);" />