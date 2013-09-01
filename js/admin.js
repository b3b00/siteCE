/*************************************/
/*                                   */
/*          MEDIA                    */
/*                                   */
/*************************************/

function addRowToMediaTable()
{
  var tbl = document.getElementById('mediaTbl');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellLeft = row.insertCell(0);
  var textNode = document.createTextNode(iteration);
  cellLeft.appendChild(textNode);
  
  // mid cell
  var midCell = row.insertCell(1);
  var el = document.createElement('input');
  el.type = 'file';
  el.name = 'mediafile' + iteration;
  el.id = 'mediafile' + iteration;
  el.size = 60;
  midCell.appendChild(el);
  
  // right cell
  
  var cellRight = row.insertCell(2);
  
  var img = document.createElement('img');
  img.src = 'images/false.gif';
  
  var lnk = document.createElement('a');
  lnk.href = '#';
  lnk.id=iteration;
  lnk.alt = 'delete';
  lnk.onclick = removeMRow;
  lnk.appendChild(img);
  
  cellRight.appendChild(lnk);
  
}

function removeRowFromMediaTable()
{
  var tbl = document.getElementById('mediaTbl');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}

function removeMediaRow(e, obj)
{  
  var tbl = document.getElementById('mediaTbl');
  var lastRow = tbl.rows.length;  
  if (lastRow > this.parentElement.parentElement.rowIndex) tbl.deleteRow(this.parentElement.parentElement.rowIndex);
}

/*************************************/
/*                                   */
/*          KEYWORDS                 */
/*                                   */
/*************************************/

function addRowToKeywordTable()
{
  var tbl = document.getElementById('keywordTbl');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow+1;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellLeft = row.insertCell(0);
  var textNode = document.createTextNode(iteration);
  cellLeft.appendChild(textNode);
  
  // mid cell
  var midCell = row.insertCell(1);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'keyword' + iteration;
  el.id = 'keyword' + iteration;
  el.size = 60;
  midCell.appendChild(el);
  
  // right cell
  
  var cellRight = row.insertCell(2);
  
  var img = document.createElement('img');
  img.src = 'images/false.gif';
  
  var lnk = document.createElement('a');
  lnk.href = '#';
  lnk.id=iteration;
  lnk.alt = 'delete';
  lnk.onclick = removeKeywordRow;
  lnk.appendChild(img);
  
  cellRight.appendChild(lnk);
  
}

function removeRowFromKeywordTable()
{
  var tbl = document.getElementById('keywordTbl');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}

function removeKeywordRow(e, obj)
{  
  var tbl = document.getElementById('keywordTbl');
  var lastRow = tbl.rows.length;  
  if (lastRow > this.parentElement.parentElement.rowIndex) tbl.deleteRow(this.parentElement.parentElement.rowIndex);
}

function removeKeyword(index)
{  
	
  var tbl = document.getElementById('keywordTbl');
  var lastRow = tbl.rows.length;  
  // console.debug("index:"+index+" / last:"+lastRow);
  if (lastRow !=  0) 
	tbl.deleteRow(index);
}

/*************************************/
/*                                   */
/*          RICH TEXTS               */
/*                                   */
/*************************************/

function openImagePicker(targetField){
	
	//targetField = document.getElementById(targetFieldName);
	var w = window.open('admin.php?page=displayImage','image popup','width=610,height=550,scrollbars=1');	
	
	w.targetField = targetField; //create target field variable in popup window with the passed targetField as value
	
	w.focus();	
	return false;
}

function openResourcePicker(targetField){
	//targetField = document.getElementById(targetFieldName);
	var w = window.open('admin.php?page=displayMedia','image popup','width=610,height=550,scrollbars=1');
	w.targetField = targetField; //create target field variable in popup window with the passed targetField as value
	w.focus();	
	return false;
}

function setImage(targetField, image) {
	console.log("callback ");
	console.log(image);
	//targetField.value=image;
	console.log("focus");
	
	cmd =  "tinyMCE.editors."+targetField+".execCommand('mceInsertContent',false,'<img src=\"media/"+image+"\"/>');"
	eval (cmd);
	
	window.focus();
}


function setResourceLink(targetField, resource) {
	console.log("callback ");
	console.log(resource);
	
	console.log("focus");
	
	cmd =  "tinyMCE.editors."+targetField+".execCommand('mceInsertContent',false,'<a href=\"media/"+resource+"\"/>"+resource+"</a>');"
	eval (cmd);
	
	window.focus();
}

/***********************************************************/