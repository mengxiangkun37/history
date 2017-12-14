     var oContainer = document.getElementById('container');
        var aLi = oContainer.getElementsByTagName('li');
        var aImg = oContainer.getElementsByTagName('img');
        var oNext = document.getElementById('next');
        var oPrev = document.getElementById('prev');
        var iNow = 0;//存储当前显示的索引
        for(var i=0; i<aLi.length; i++){
            aLi[i].index = i;
            aLi[i].onmouseover = function(){
                changeImg(this.index);
                iNow = this.index;
            }
        }

        oNext.onclick = function(){
            iNow++;
            if(iNow == aLi.length){
                iNow = 0;
            }
            changeImg(iNow);
            // aLi[this.index]

        }
        oPrev.onclick = function(){
            iNow--;
            if(iNow == -1){
                iNow = aLi.length -1;
            }
            changeImg(iNow);
        }

        function changeImg(a){
            for(var j=0; j<aLi.length; j++){
                aLi[j].className = '';
                aImg[j].className = '';
            }
            aLi[a].className = 'selected';
            aImg[a].className = 'selected';
        }
        var timer;
        timer = setInterval(function(){
            oNext.onclick();
        },1000);
        oContainer.onmouseover = function(){
            clearInterval(timer);
        }
        oContainer.onmouseout = function(){
            timer = setInterval(function(){
                oNext.onclick();
            },1000);
        }