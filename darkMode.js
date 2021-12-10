
function changeMode(e){
	var isChecked = document.getElementById("toggle").checked;
	if(isChecked == true){
		document.getElementById('indexCSS').href='darkMode.css';
	}else{
		document.getElementById('indexCSS').href='defaultMode.css';
	}
}
