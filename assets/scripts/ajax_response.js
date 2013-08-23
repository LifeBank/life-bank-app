var status = '';
var message = '';

function removeHTMLTags(strInputCode){
 	
    strInputCode = strInputCode.replace(/&(lt|gt);/g, function (strMatch, p1){
        return (p1 == "lt")? "<" : ">";
    });
    return strInputCode.replace(/<\/?[^>]+(>|$)/g, ""); 
}

function getResponse(data, debug)
{
    debug = typeof(debug) != 'undefined' ? true : false;
	
    if(debug)
        alert(data);
		
    //data = removeHTMLTags(data);
    var result = eval('(' + data + ')');
	
    status = result.status;
    message = result.message;
}