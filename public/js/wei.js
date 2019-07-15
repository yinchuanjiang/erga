window.onload = function () {
	//抓到音乐图片
	var music = document.getElementById("music");
	var au = document.getElementById("au");
    // au.play();
	var play=1;
	
	//绑定单击事件
	music.onclick = function(){
		if (play==1) {
			music.style.animation = 'none';
			music.style.webkitAnimation = 'none';
	//		音乐暂停
			au.pause();
			play=2;
		}else{
			music.style.animation = 'music_run 2s linear infinite';
			music.style.webkitAnimation = 'music_run 2s linear infinite';
			au.play();
			play = 1;
		}
	}
}












































