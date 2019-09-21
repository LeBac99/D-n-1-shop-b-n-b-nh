
	var slide=document.getElementsByTagName('li');
	var index=0;
	function currentShow(){
		next(index=0);
	}
	currentShow();
	function next(){
		for(var i=0;i<slide.length;i++){
			slide[i].style.display="none";
		}
		//kiem tra xem mang
		if(index >=slide.length){
			index=0;
		}
		slide[index].style.display="block";
		index++;
	}
	var t=setInterval(function(){next()},2000);
