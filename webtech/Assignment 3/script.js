var myArray = ["firstName","lastName","houseNumber","street","city","province","zipcode","phoneNumber","cellPhoneNumber","birthday","citizenship","zodiacSign","zodiacYear","day"];

var tableList = ["tfirstName","tlastName","thouseNumber","tstreet","tcity","tprovince","tzipcode","tphoneNumber","tcellPhoneNumber","tbirthday","tcitizenship","tzodiacSign","tzodiacYear","tday"];
var list = [];
var listIndex = 0;

function setText(){
	for(var i=0; i<myArray.length ;i++){
		localStorage.setItem(myArray[i],document.getElementById(myArray[i]).value);	
	}
	alert("Your record have been saved");
}

function getText(){
for(var i=0 ; i<myArray.length ; i++){
	document.getElementById(myArray[i]).value = localStorage.getItem(myArray[i]);	
	}
}

function clearText(){
for(var i=0 ; i< myArray.length ;i++){
		document.getElementById(myArray[i]).value='';
	}
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function submit(){
var str = " ";
if(validateEmpty() == false || selectValidation() == false){
  for(var i=0 ; i<list.length ; i++){
	  if(i == list.length-1){
		  var str = str + myArray[list[i]]
	  } else {
			var str = str + myArray[list[i]] + " ,";  
	  }
  }
  alert("This following field is null :" + str);
} else {
  var x = document.getElementById('firstName').value;
  var y = document.getElementById('city').value;
  var z = document.getElementById('citizenship').value;
  //create cookie
  setCookie("firstName",x,1);
  setCookie("city",y,1);
  setCookie("citizenship",z,1);
  //code after user click ok
  var cookie = getCookie("firstName") +" "+ getCookie("city") +" "+ getCookie("citizenship");
  alert("Cookies have been collected : " + cookie);
  ;
}
getData();
}

function validateEmpty() {
	var count=0;
	for(var i=0 ; i < myArray.length-3 ; i++){
   	 	var x = document.getElementById(myArray[i]).value;
        if(x == ""){
			list[listIndex] = i;
			listIndex++;
        	count++;
        }
    }
    if (count>0) {
        return false;
    } else {
    	return true;
    }
}
function selectValidation() {
	var countSelect=0;
	var x;
	for(var i=11 ; i < myArray.length ; i++){
		var x = document.getElementById(myArray[i]).value;
		if(x == ""){
			list[listIndex] = i;
			listIndex++;
			countSelect++;
		}
	}
	if(countSelect>0){
		alert("This is count : " + countSelect + " This is list : " + list);
		return false;
	} else {
		return true;	
	}
}
function getData(){
	for(var i=0 ; i <tableList.length ;i++){
		if(i == 7){
			document.getElementById(tableList[i]).innerHTML = "+662" + document.getElementById(myArray[i]).value;
		} else if(i == 8){
			document.getElementById(tableList[i]).innerHTML = "+66" + document.getElementById(myArray[i]).value;
		} else if(i==11 || i==12 ||i==13) {
			var e = document.getElementById(myArray[i]);
			document.getElementById(tableList[i]).innerHTML = e.options[e.selectedIndex].value;
		}
		else {
			document.getElementById(tableList[i]).innerHTML = document.getElementById(myArray[i]).value;
		}
	}
}
function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }