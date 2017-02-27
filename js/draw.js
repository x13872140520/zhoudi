var prize=['iphone5','ipad','笔记本电脑','海尔洗碗机','1000元天猫超市购物券','50元话费','佳能相机'],
	timer=null,
	flag=0;
	window.onload=function(){
		
	    var start=document.getElementById('start'),
			stop=document.getElementById('stop');
	
			start.onclick=startclick;
			stop.onclick=stopclick;
			//添加键盘事件
			document.onkeyup=function(event){
				event =event || window.event;
				if(event.keyCode==13){
				if(flag==0){
					startclick();
					flag=1;
				}else{
					stopclick();
					flag=0;
				}
				}
			}
			//开始按钮事件定义
			function startclick(){
			clearInterval(timer);
			var title=document.getElementById('title');
			timer=setInterval(function(){
			var random=Math.floor(Math.random()*prize.length);
			title.innerHTML=prize[random];
		
				},80);
			start.style.background="#999";
				
			}
			//停止按钮事件定义
			function stopclick(){
				clearInterval(timer);
				var start=document.getElementById('start');
				start.style.background="#036";
			}
			
	}