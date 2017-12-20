window.onload = function() {
		vipTabs();
}


function vipTabs(){
	var content = document.getElementsByClassName('wrapper-tabs');
	var tabs = document.getElementsByClassName('tabs-list__tab');
	for (var i =0 ; i < content.length; i++) {
		content[i].style.display = "none";
	}
	tabs[0].classList.add("active-tab");
	content[0].style.display = "block";
	document.getElementsByClassName("tabs-list")[0].addEventListener("click",function(event){
		event.preventDefault();
		if (event.target.parentNode.nodeName == "LI") {
			for (var q = 0; q < tabs.length; q++) {
				tabs[q].classList.remove("active-tab");
			}
			for (var s = 0 ; s < content.length; s++) {
				content[s].style.display = "none";
			}
			event.target.parentNode.classList.add("active-tab");
			content[event.target.parentNode.getAttribute("dataId")].style.display = "block";
		}
	});	
}