<!doctype html5>
<html>
    <head>
        <title>HTmlCSsJS</title>
        <style>
            body,html{overflow:hidden;}
            *{font-family:Arial,"Arial",Calabri,"Calabri";}
             /* unvisited link */
            a:link {
                color: #09f;
                text-decoration:none;
            }
            
            /* visited link */
            a:visited {
                color: #09f;
                text-decoration:none;
            }
            
            /* mouse over link */
            a:hover {
                color: #0cc;
                text-decoration:none;
                font-weight:bold;
            }
            
            /* selected link */
            a:active {
                color: #0fc;
                text-decoration:none;
                font-weight:bold;
            } 
            div.tab {
                border: 1px solid #666;
            }
            div.tab:hover,div.tab:active,div.tab:focus {
                border: 1px solid #000;
            }
            /* Portrait */
            @media screen and (orientation:portrait) {
                div.tab,div.tab:hover,div.tab:active,div.tab:focus{}
            }
            /* Landscape */
            @media screen and (orientation:landscape) {
                div.tab,div.tab:hover,div.tab;active,div.tab:focus{}
            }
        </style>
        <script>
            function tab(tbNum){
                document.querySelector("#fscreenBtn").style.display="none";
                document.querySelector("#fscr").style.display="none";
            for(i=0;i<4;i++){
                document.querySelectorAll(".tab")[i].style.visibility="hidden";
                document.querySelectorAll(".tab")[i].style.zIndex="0";
            }
                document.querySelectorAll(".tab")[tbNum].style.visibility="visible";
                document.querySelectorAll(".tab")[tbNum].style.zIndex="10";
            }
            function output(){
                document.querySelector("#output").src="data:text/html;BASE64,"+btoa("<link rel='stylesheet' type='text/css' href='data:text/css;BASE64,"+btoa(document.querySelectorAll(".tab")[1].value)+"'><script type='text/javascript' src='data:text/javascript;BASE64,"+btoa(document.querySelectorAll(".tab")[2].value)+"'></scr"+"ipt>"+document.querySelectorAll(".tab")[0].value);
                document.querySelector("#fscreenBtn").style.display="initial";
            }
            /*
            function save(){
                var url = window.location.origin;
                for(i=0;i<3;i++){
                    url+=btoa(document.querySelectorAll(".tab")[i].value)+"|";
                    if(document.querySelectorAll(".tab")[i].style.display !== "none"){
                        url+=toString(i);
                    }
                }
                if(document.querySelectorAll(".tab")[3].style.display !== "none"){
                    url+="3";
                }
                if (history.pushState) {
                    window.history.pushState({path:url},'',url);
                }
            }*/
            window.onload=function(){
                /*if(window.location.search.get("html")){
                    document.querySelectorAll(".tab")[0].value=atob(window.location.search.get("html"));
                }
                if(window.location.search.get("css")){
                    document.querySelectorAll(".tab")[1].value=atob(window.location.search.get("css"));
                }
                if(window.location.search.get("js")){
                    document.querySelectorAll(".tab")[2].value=atob(window.location.search.get("js"));
                }
                if(window.location.search.get("tab")){
                    tab(window.location.search.get("tab"));
                }else{
                tab(0);
                }*/
            tab(<?php if(isset($_GET['tab'])){echo $_GET['tab'];}else{echo "0";} ?>);
            }
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>HT<sub><sup>ml</sup></sub>CS<sub><sup>s</sup></sub>JS</h1>
        <textarea onkeypress="save();" onkeyup="save();" class="tab" style="resize:none;visibility:hidden;position:absolute;left:0;bottom:0;width:calc(100% - 100px);height:75%;" placeholder="HTML"></textarea>
        <textarea onkeypress="save();" onkeyup="save();" class="tab" style="resize:none;visibility:hidden;position:absolute;left:0;bottom:0;width:calc(100% - 100px);height:75%;" placeholder="CSS"></textarea>
        <textarea onkeypress="save();" onkeypress="save();" class="tab" style="resize:none;visibility:hidden;position:absolute;left:0;bottom:0;width:calc(100% - 100px);height:75%;" placeholder="JS"></textarea>
        <div class="tab" style="-webkit-overflow-scrolling:touch;overflow:scroll;visibility:hidden;position:absolute;left:0;bottom:0;width:calc(100% - 100px);height:75%;"><iframe style="border:0;width:100%;height:100%;" id="output" src="data:text/html,"></iframe></div>
        <div style="text-align:center;position:absolute;right:0;bottom:0;width:100px;height:100%;">
            <span style="position:absolute;right:0;bottom:60%;line-height:15%;width:inherit;text-align:center;"><a href="javascript:;" onclick="tab(0);">HTML</a></span>
            <span style="position:absolute;right:0;bottom:45%;line-height:15%;width:inherit;text-align:center;"><a href="javascript:;" onclick="tab(1);">CSS</a></span>
            <span style="position:absolute;right:0;bottom:30%;line-height:15%;width:inherit;text-align:center;"><a href="javascript:;" onclick="tab(2);">JS</a></span>
            <span style="position:absolute;right:0;bottom:15%;line-height:15%;width:inherit;text-align:center;"><a href="javascript:;" onclick="tab(3);output();">Output</a></span>
        </div>
        <button id="hidebtn" style="z-index:16;position:absolute;top:0;right:50px;display:none;" onclick="if(this.innerHTML!='v'){document.querySelector('#fscr').style.height='100%';document.querySelector('#fscr').style.top='0';this.innerHTML='v';}else{document.querySelector('#fscr').style.height='calc(100% - 50px)';document.querySelector('#fscr').style.top='50px';this.innerHTML='^';}">^</button>
        <button id="fscreenBtn" style="position:absolute;top:0;right:0;display:none;" onclick="if(this.innerHTML!='X'){document.querySelector('#hidebtn').style.display='inline';document.querySelector('#fscr').style.display='inline';document.querySelector('#fscr').src=document.querySelector('#output').src;document.querySelector('#output').src='data:text/html,';this.innerHTML='X';}else{document.querySelector('#hidebtn').style.display='none';document.querySelector('#fscr').style.display='none';document.querySelector('#output').src=document.querySelector('#fscr').src;document.querySelector('#fscr').src='data:text/html,';this.innerHTML='Fullscreen';}">Fullscreen</button>
        <iframe id="fscr" src="data:text/html," style="background-color:white;border:0;width:100%;height:calc(100% - 50px);position:absolute;top:50px;left:0;right:0;bottom:0;z-index:15;"></iframe>
    </body>
</html>