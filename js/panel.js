function getByClass(clsName,parent){
	var oParent=parent?document.getElementById(parent):document,
		eles=[],
		elements=oParent.getElementsByTagName('*');
		
		for(var i=0,l=elements.length;i<l;i++){
			if(elements[i].className==clsName){
				eles.push(elements[i]);
			}
		}
	return eles;
}
window.onload=drag;

function drag(){
	var oTitle=getByClass('login_logo_webqq','loginPanel')[0];
	   // 拖曳
	oTitle.onmousedown=fndown;
	   // 关闭
	var oClose=document.getElementById('ui_boxyClose');
	oClose.onclick=function(){
	document.getElementById('loginPanel').style.display='none';
		}
		//切换状态
	var loginState=document.getElementById('loginState'),
		statelist=document.getElementById('loginStatePanel'),
		list=statelist.getElementsByTagName('li'),
		icon=document.getElementById('loginStateShow'),
		text=document.getElementById('login2qq_state_txt');
		
		loginState.onclick=function(e){
			e = e || window.event;
		if(e.stopPropagation){
          e.stopPropagation();
			}else{
          e.cancelBubble=true;
     }
			statelist.style.display='block';
		}
		  // 鼠标滑过、离开和点击状态列表时
		for(var i=0,l=list.length;i<l;i++){
			list[i].onmousemove=function(){
				this.style.background="yellow";
			}
			list[i].onmouseout=function(){
				this.style.background="#FFF";
			}
			list[i].onclick=function(e){
				e= e|| window.event;
				if(e.stopPropagation){
				e.stopPropagation();
				}else {
				e.cancelBubble=true;
				}
			
				var id=this.id;
				statelist.style.display='none';
				text.innerHTML=getByClass('stateSelect_text',id)[0].innerHTML;
				icon.className='';
				icon.className='login-state-show '+this.id;
		}
	
}
document.onclick=function(){
	statelist.style.display='none';
}
}

function fndown(event){
	event = event || window.event ;
	var oDrag=document.getElementById('loginPanel');
	// 计算光标按下时鼠标与移动页面边界的距离
	disX=event.clientX-oDrag.offsetLeft;
	disY=event.clientY-oDrag.offsetTop;
	//移动
	document.onmousemove=function(event){
		event=event||window.event;
		fnmove(event,disX,disY);
	}
	document.onmouseup=function(){
		document.onmousemove=null;
		document.onmouseup=null;
	}
	
}
function fnmove(e,posX,posY){
	var oDrag=document.getElementById('loginPanel'),
		l=e.clientX-posX,
		t=e.clientY-posY,
		winW=document.documentElement.clientwidth ||document.body.clientwidth,
		winH=document.documentElement.clientheight ||document.body.clientheight,
		maxW=winW-oDrag.offsetwidth-10,
		maxH=winH-oDrag.offsetheight-10;
		if(l<0){l=10;}else if(l>maxW){l=maxW;}
		if(t<0){t=10;}else if(l>maxH){t=maxH;}
	 oDrag.style.left=l+'px';
	 oDrag.style.top=t+'px';	
}
 