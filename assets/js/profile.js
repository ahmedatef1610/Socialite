$(".sidebar").niceScroll({cursorborder:'none'});
/**********************************************************************/
$(document).ready(function () {

    $( ".underNav" ).height($( "nav.navbar" ).outerHeight());
    
    let paddingOfSidebar;
    if($( ".sidebar" )[0]){
        paddingOfSidebar = Number($( ".sidebar" ).css("padding").replace("px", ""));
    }

    $( ".sidebar" ).height($(window).height() - ($( "nav.navbar" ).outerHeight()+(2*paddingOfSidebar)));
    $( ".sidebar" ).css({"top" : `${$( "nav.navbar" ).outerHeight()}px`});

    if($(window).width()<768){
        $( ".sidebar" ).height($(window).height()/2);
        $( ".sidebar" ).css({"top" : `${$( "nav.navbar" ).outerHeight()}px`});

    }

    $( window ).resize(function() {
        if($(window).width()<768){
            $( ".sidebar" ).height($(window).height()/2);
            $( ".sidebar" ).css({"top" : `${$( "nav.navbar" ).outerHeight()}px`});

        }else{
            $( ".sidebar" ).height($(window).height() - ($( "nav.navbar" ).outerHeight()+(2*paddingOfSidebar)));
            $( ".sidebar" ).css({"top" : `${$( "nav.navbar" ).outerHeight()}px`});

        }
    });
});
