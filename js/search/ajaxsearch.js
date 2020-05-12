var textBox = document.getElementById('searchbar');
resultContainer = document.getElementById('content');

var ajax = null;
var page = 0;

var requestURI = '/meq/php/search/search_ajax.php?title=';

textBox.onkeyup = function() {
	var val = this.value;
	val = val.replace(/^\s|\s $/, "");

	if (val !== "") {	
		searchForData(val);
	} else {
		clearResult();
	}
}

function searchForData(value, isLoadMoreMode) {
	if (ajax && typeof ajax.abort === 'function') {
		ajax.abort(); // abort previous requests
	}

	if (isLoadMoreMode !== true) {
		clearResult();
	}

	ajax = new XMLHttpRequest(); //php response will be in this variable
	ajax.onreadystatechange = function() {
		if (ajax.readyState === 4 && ajax.status === 200) {
			var json = JSON.parse(ajax.responseText);
			if (json === false) {
				if (isLoadMoreMode) {
					alert('No more to load');
				} else {
					noPosts();
				}
			} else {
				showPosts(json);
			}
		}
    }
    ajax.open('GET', requestURI +  value +  '&page=' +  page , true);
	ajax.send();
}

function showPosts(data) {
    console.log(data); 
    for(var i = 0; i < data.length; i++){
        createElement(data[i]);   
    }
}

function createElement(data){
    var content = document.getElementById("content");
    content.appendChild(document.createElement("hr"));
    var mainDiv = document.createElement("div");
    mainDiv.className = "post";
    descDiv = document.createElement("div");
    descDiv.className = "post-desc";
   

    var link = document.createElement("a");
    link.className = "post-title";
    link.href = 'postpage.php?id=' + data['ID'];
    link.innerHTML = data['NAME'];
    descDiv.appendChild(link);

    var shortDescDiv = document.createElement("div");
    shortDescDiv.className = "post-shortdesc";
    shortDescDiv.innerHTML = data['DESCRIPTION'];
    descDiv.appendChild(shortDescDiv);

    mainDiv.appendChild(descDiv);
    content.appendChild(mainDiv);
    content.appendChild(document.createElement("hr"));
}

function clearResult() {
	resultContainer.innerHTML = "";
	page = 0;
}

function noPosts() {
	resultContainer.innerHTML = "No Posts";
}