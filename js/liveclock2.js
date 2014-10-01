// JavaScript Document


function startTime() 
{ 
var now=new Date() 
var h=now.getHours() 
var m=now.getMinutes() 
var s=now.getSeconds() 
h=checkTime(h) 
m=checkTime(m) 
s=checkTime(s) 
document.getElementById('time').innerHTML=h+":"+m+":"+s 
t=setTimeout('startTime()',500) 
} 

function checkTime(i) 
{ 
if (i<10) 
  {i="0" + i} 
  return i 
} 
