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
  </script>