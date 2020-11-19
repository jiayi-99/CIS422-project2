var width = $(window).width();
	console.log('width',width)
     /*当图片来填充高度的时候，导致延时不准确，所以要写固定高度宽度*/
     function self_adaption(id){
        var i=0.0025;
        var element_width = 375;
        var percentage = parseFloat(width/element_width);

        if(width>600){
            $(id).addClass('main');
            $('body').addClass('main');
            $('.buttonBox').css({
                "width":375+"px",
                "left":"50%",
                "margin-left":-187.5+"px"
                });
            console.log("666")
            return false;
        }
//             alert(width);
        if(percentage!=1){
            if(width==360){
                i=0.0025;

            }
//          else if(width==){
//          }
              $(id).css("transform","scale("+(percentage+i)+")");
              $(id).css("margin-left",((percentage-1)/2*element_width)+"px");
              $(id).css("margin-top",((percentage-1)/2*$(id).height())+"px");
              if(width==320){
                i=0.0025;
                $(id).css("width","100%");
                // $(id).css("overflow-x","hidden");
                   $(id).css("margin-left","0");
                $(id).css("transform","scale(1)");
                $(id).css("margin-top","0");
            }
        }
       }