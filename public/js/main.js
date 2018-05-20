var exp = document.getElementById('experience'),
	grade = document.getElementById('grade');

grade.classList.remove("display-no");

document.getElementsByClassName('radio')[0].onclick=function(){
exp.classList.add("display-no");
exp.classList.remove("shown");

grade.classList.remove("display-no");
grade.classList.add("shown");
}

document.getElementsByClassName('radio')[1].onclick=function(){
exp.classList.remove("display-no");
exp.classList.add("shown");

grade.classList.add("display-no");
grade.classList.remove("shown");
}
