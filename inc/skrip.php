<SCRIPT LANGUAGE="JavaScript">
function putFocus(formInst, elementInst) {
    if (document.forms.length > 0) 
	{ document.forms[formInst].elements[elementInst].focus();  }
  }

function kira(field1){
 var time=new Date();
 var year=time.getYear();
 var year2 = field1.value.substring(10,6);
 if(field1.value==""||field1.value=="0000-00-00"||field1.value=="0000/00/00")
 { return x = 0; }
 else
 { return x = year - year2; }
}

function autotab(original,destination){
if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))
destination.focus()
}

var winId;
function globopen(waddress,wwidth,wheight,wleft,wtop){
	if (winId !=null) winId.close();	
	winId = window.open(waddress,'_blank','htoolbar=yes,directories=no,status=no,menubar=yes,scrollbars=yes,resizable=yes,width='+wwidth+',height='+wheight+',left='+wleft+',top='+wtop);
}


function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + num + '.' + cents);
}
//  End -->



//verify for netscape/mozilla

var isNS4 = (navigator.appName=="Netscape")?1:0;

function blockhuruf(){
if(!isNS4){
	if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;}
		else{
			if(event.which < 48 || event.which > 57) returnfalse;}
}

function blocknombor()
{

if(!isNS4){
	if(event.keyCode > 0 && event.keyCode < 32 || event.keyCode > 32 && event.keyCode < 64 || 
	    event.keyCode > 90 && event.keyCode < 97 ) event.returnValue = false;}
	 else{
		 if(event.keyCode > 0 && event.keyCode < 32 || event.keyCode > 32 && event.keyCode < 64 ||
			 event.keyCode > 90 && event.keyCode < 97) returnfalse;}

}

function blockspecialcharacter(){
if(!isNS4){if ((event.keyCode > 32 && event.keyCode < 48) || (event.keyCode > 57 && event.keyCode < 65) || (event.keyCode > 90 && event.keyCode < 97)) event.returnValue = false;}else{if ((event.which > 32 && event.which < 48) || (event.which > 57 && event.which < 65) || (event.which > 90 && event.which < 97)) return false;}
}

function tukar(entry) {
out = "a"; // replace this
add = "z"; // with this
temp = "" + entry; // temporary holder

while (temp.indexOf(out)>-1) {
pos= temp.indexOf(out);
temp = "" + (temp.substring(0, pos) + add + 
temp.substring((pos + out.length), temp.length));
}
document.subform.text.value = temp;
}
</SCRIPT>