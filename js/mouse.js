// JavaScript Document
function overmousecolor(obj){
	obj.style.background="#CCCCFF";
    obj.style.cursor='pointer';
}
function outmousecolor(obj,origin){
	obj.style.background = '';
    obj.style.cursor='';
} 
function overmouselist(obj){
	//obj.style.background='url(images/mnuover.png)'
	obj.style.background='#C0C0C0';
	obj.style.color='white';
    obj.style.cursor='pointer';
}
function outmouselist(obj){
	obj.style.background = 'white';
	obj.style.color='black';
    obj.style.cursor='';
}