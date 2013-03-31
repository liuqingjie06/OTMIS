var sevenTimeFlag=1,thrTimeFlag=1;
			var pagename="";
			var datatimeflag;
			var checkplatform=0;
			var backgroundColorinfo="#f3f4f9";
			function vselSearch(productid,platformid){
				var dateFlag=30;
				vtimeflag=dateFlag;
				var tmptimecc=Math.random();
				var url=basePath+"servlet/ProductOptionServlet";
				if(productid!=null&&productid!=""&&platformid!=null&&platformid!=""){
					var params = {
						servertype:1,
						vproductid:productid,
						vplatformid:platformid,
						vtmptimecc:tmptimecc
					};
				}else{
					var params = {
						servertype:0,
						vtmptimecc:tmptimecc
					};
				}
				$.getJSON(url,params,initcallback);
			}
			
		function selSearch(){
			var dateFlag=30;
			vtimeflag=dateFlag;
			var tmptimecc=Math.random();
			var url=basePath+"servlet/ProductOptionServlet";
			var params = {
					servertype:0,
					vtmptimecc:tmptimecc
				};
			$.getJSON(url,params,initcallback);
		}
	
	
	function initcallback(data){
				var productlist=data.productList;
				var platformlist=data.platformlist;
				var productid=data.productid;
				var platformid=data.platformid;
				$("#productTxt option").remove();
				$("#productTxt").append("<option value='-1'>全部应用</option>");
				if(username=="Demo"){
					if(productlist!=null){
						for(var i=0;i<productlist.length;i++){
							if(productlist[i].productname=="脑筋急转弯高难版"){
								$("#productTxt").append("<option value='"+productlist[i].productid+"'>演示应用</option>");
							}
						}
					}
				}else{
					if(productlist!=null){
						for(var i=0;i<productlist.length;i++){
							$("#productTxt").append("<option value='"+productlist[i].productid+"'>"+productlist[i].productname+"</option>");
						}
					}
				}
				$("#productTxt option[value='"+productid+"']").attr('selected',true); 
				$("#productTxt").sSelect();
				//添加下拉列表事件
				$("#productTxt").change(function()  
				{  
					var tmptimecc=Math.random();
				    try{
			    	 	destroy();
			    	} 
					catch(e){
					} 
					 var checkValue=$("#productTxt").val(); 
					 if(checkValue!=-1){
					 	 var url=basePath+"servlet/ProductOptionServlet";
						 var params = {
							         servertype:1,
							         vproductid:checkValue,
							         vplatformid:platformid,
							         vtmptimecc:tmptimecc
							    };
						$.getJSON(url,params,selectcallback);
					 }else{
						window.location.href = basePath + "webpage/AllProductSurveyInfo.jsp";
					 }					
				});
				setPlatformOption(platformlist,platformid);
				//verify(vtimeflag);	
	}
	
	function dreload(){
			document.location.reload();
	}
	
	function selectcallback(data){
				dreload();
				var productlist=data.productList;
				var platformlist=data.platformlist;
				var productid=data.productid;
				var platformid=data.platformid;
				setPlatformOption(platformlist,platformid);
				
	}
	
	var topvplatforms="",topvplatformsName="";
			function setPlatformOption(platformlist,platformid){
				if(platformid == "3"){
					platformid = "1,2";
				}else if(platformid == '5'){
					platformid = "1,4";
				}else if(platformid == "6"){
					platformid = "2,4";
				}else if(platformid == '7'){
					platformid = '1,2,4';
				}
				topvplatforms="";
				topvplatformsName="";
				$("#productList option").remove();
				if(platformlist!=null){
					checkplatform=0;
					for(var i=0;i<platformlist.length;i++){
						if(platformlist[i].platform==2){
							checkplatform=1;
						}
						$("#productList").append("<option value='"+platformlist[i].platform+"'>"+platformlist[i].platformname+"</option>");
						if(pagename!='访问页面'){
						if(i==0){
								topvplatforms=topvplatforms+platformlist[i].platform;
								topvplatformsName=topvplatformsName+platformlist[i].platformname;
							}else{
								topvplatforms=topvplatforms+","+platformlist[i].platform;
								topvplatformsName=topvplatformsName+"+"+platformlist[i].platformname;
							
						}
						}
					}
					checkbreakli();
					if(pagename!='访问页面'){
						if(platformlist.length>1){
							$("#productList").append("<option value='"+topvplatforms+"'>"+topvplatformsName+"</option>");
						}
					}
				}
				$("#productList option[value='"+platformid+"']").attr('selected',true);  
				$("#productList").sSelect();
				//changeLeftDisplay(platformid)
				//添加下拉列表事件
				$("#productList").unbind("change");
				if(platformid.indexOf(",")!=-1){
					 	vplatforms=topvplatforms;
					 	vplatformtype=1;
					 }else{
					 	vplatforms="";
					 	vplatformtype=0;
					 }
				selectRegisterTime();
				$("#productList").change(function()  
				{  
					var tmptimecc=Math.random();
					try{ 
						destroy();
					} 
					catch(e){
					} 
					 var checkValue=$("#productTxt").val();
					 var checkpValue=$("#productList").val(); 
					 if(checkpValue.indexOf(",")!=-1){
					 	vplatforms=topvplatforms;
					 	vplatformtype=1;
					 }else{
					 	vplatforms="";
					 	vplatformtype=0;
					 }
					 var url=basePath+"servlet/ProductOptionServlet";
					 var params = {
						         servertype:1,
						         vproductid:checkValue,
						         vplatformid:checkpValue,
						         vtmptimecc:tmptimecc
						    };
					$.getJSON(url,params,optioncallback);
				});
			}
			
			function optioncallback(data){
				selectRegisterTime();
			}
			
			function selectRegisterTime(){
				timecc=Math.random();
				var checkValue=$("#productTxt").val();
				var checkpValue=$("#productList").val();
				var url=basePath+"servlet/ProductServlet";
				var params={
					servertype:8,
					productid:checkValue,
		         	platformid:checkpValue,
		         	platforms:vplatforms,
					timecc:timecc
				}
				$.get(url,params,registerback);
			}
			
			function registerback(data){
				var datas=data.split(",");
				refresh(datas[0]);
				sevenTimeFlag=parseInt(datas[1]);
				thrTimeFlag=parseInt(datas[2]);
				selectChose();
				verify(vtimeflag);
			}
			
			function logout(){
				var vtimecc=Math.random();
				var url=basePath+"servlet/UserLoginServlet";
				var params = {
					servertype:1,
					timcc:vtimecc
				};
				$.get(url,params,logcallback);
			}
			
			function logcallback(data){
				delCookie("talkdataCookieEmail");
		   		delCookie("talkdataCookiePassWord");
		   		delCookie("talkdataCookieCheck");
				window.location.href=basePath+"page/login.jsp"
			}
			
			function insertfeedback(){
 				 var vtimecc=Math.random();
				 var url=basePath+"servlet/FeedBackServlet?timecc="+vtimecc;
			 	 var feedbackinfo=$("#feedbackinfo").val();
			 	 var vproductid=$("#productTxt").val();
			 	 var vpagename=pagename;
				 if(feedbackinfo==null||feedbackinfo==""){
				 	alert("请输入反馈内容");
				 }else if(feedbackinfo.length>255){
				 	alert("您输入的信息过长");
				 }else{
				 	var params={
				 	 	feedbackinfo:feedbackinfo,
				 	 	productid:vproductid,
				 	 	pagename:vpagename
				 	 };
				 	 $.get(url,params,feedbackcallback);		
				 }
 			}
 			
 			function feedbackcallback(data){
 				if(data=="1"){
 					alert("反馈提交成功");
					document.getElementById("fktxt").style.display="none";
					document.getElementById("xy").style.display="none";
 				}else{
 					alert("反馈提交失败");
 				}
 			}
			
		//弹出窗口插件
		function feedback(txt,bg,colse){
			document.getElementById("feedbackinfo").value="";
				var txt=txt;
				var bg=bg;
				var sHeight=document.body.clientHeight;
				var dheight=document.documentElement.clientHeight;
				var srctop=document.documentElement.scrollTop;
				if($.browser.safari){
					srctop=window.pageYOffset;
				}
				$(".xy").css({"height":dheight});
				dheight=(dheight - $("#"+txt).height())/2;
				$("#"+txt).show();
				$("#"+bg).show();
				$("#"+txt).css({"top":( srctop+ dheight) + "px"});
				$("#"+bg).css({"top":(srctop ) + "px"});
				window.onscroll =function scall(){
					var srctop=document.documentElement.scrollTop;
				if($.browser.safari){
					srctop=window.pageYOffset;
				}
					$("#"+txt).css({"top":(srctop+ dheight) + "px"});
					$("#"+bg).css({"top":(srctop) + "px"});
					
				$("#fkicon").css({
					top : srctop + (innerHeights / 2)
				});
		 			window.onscroll = scall;
					window.onresize = scall;
					window.onload = scall;
				}
				$("."+colse).click(function(){
				$("#"+txt).hide();
				$("#"+bg).hide();
				})
		}	
			
		function backreg(){
			window.location.href = basePath + "register.jsp";
		}