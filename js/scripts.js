function getByClassName(className, parentElement) {
  if (typeof parentElement == 'string'){
    parentElement = document.getElementById(parentElement);
  } else if (typeof parentElement != 'object' || typeof parentElement.tagName != 'string') {
    parentElement = document.body;
  }
  
  var children = parentElement.getElementsByTagName('*');
  var re = new RegExp('\\b' + className + '\\b');
  var element, elements = [];
  var i = 0;
  while ( (element = children[i++]) ){
    if ( ellement.className && re.test(element.className)){
      elements.push(element);
    }
  }
  return elements;
}

function toggle_visibility(id) {
   var e = document.getElementById(id);
   if(e.style.visibility == 'visible')
	  timeOutHide()
   else
	  e.style.display = 'block';
}


function timeOutHide(id) {
	var e = document.getElementById(id);
   eval("timeout" + e.id + " = window.setTimeout('hide( \"" + e.id + "\" )', 1000 );");
}

function hide(id) {
    document.getElementById(id).style['display'] = 'none';
}

function show(id) {
var e = document.getElementById(id);
	e.style['display'] = 'block';
    var currentNode = this;
    
    eval("clearTimeout( timeout" + e.id + ");");
    
	/*
	todo ....
	hideAllOthersUls(this);
	*/
}

function hideAllOthersSubMenu(currentLi) {
    var lis = currentLi.parentNode;
    for (var i = 0; i < lis.childNodes.length; i++) {
        if (lis.childNodes[i].nodeName == 'LI' && lis.childNodes[i].id != currentLi.id) {
            hideUlUnderLi(lis.childNodes[i]);
        }
    }
}
	
	
	

/* ================================================ */
/* le menu */
/* ================================================ */

	function nextlevel(id,max) {
		//console.log('toggling '+id);
		var e = document.getElementById(id);
		parentDiv = e.parentNode;
		depth=parentDiv.id;
		// alert("depth = "+depth)
		for (var i = 0; i < parentDiv.childNodes.length; i++) {
			if (parentDiv.childNodes[i].nodeName == 'TABLE' && parentDiv.childNodes[i].id != e.id) {				
				parentDiv.childNodes[i].style.display = 'none';
			}
		}				
		for (i=depth; i <= max; i++) {
			hideLowerMenus(i);
		}
		
		e.style.display='block';
	}
	
	function hideLowerMenus(depth) {
		var parentDiv = document.getElementById(depth);
		// console.log("hiding at depth "+depth);
		for (var i = 0; i < parentDiv.childNodes.length; i++) {
			
			if (parentDiv.childNodes[i].nodeName == 'TABLE' ) {			
				// console.log("hiding "+parentDiv.childNodes[i].id);
				parentDiv.childNodes[i].style.display = 'none';
			}
		}			
	}