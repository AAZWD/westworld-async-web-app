$(document).ready(function(){
    
    //Open close login modal
    $('.login').click(function(){
        $('.modal').show();
        $('#close').hide();
    });
    $('.closeModal').click(function(){
        $('.modal').hide();
        $('.modal2').hide();
        $('#close').show();
    });
    //login modal from cabin and dining pagae
    $('.book').click(function(){
        $('.modal').show();
        $('#close').hide();
    });
    //login modal from cabin and dining pagae
    $('.account').click(function(){
        $('.modal2').show();
        $('#close').hide();
    });
    //Icon references toggle
    $('#char').click(function(){
        $('.icon').toggle();
    });
    //Cabin toggle
    $('.option').click(function(){
        $(this).next('.details').slideToggle(500);
    });
    //Slide show- History Page 
    let $array = ['Media/history/2.jpeg','Media/history/3.jpeg', 'Media/history/4.jpg','Media/history/5.jpeg', 'Media/history/1.jpeg'];
    let $slide = $('#slideshow');
    let $index = 0;
        
    $slide.css('background-image', 'url(Media/history/1.jpeg)');
    $slide.css('background-repeat', 'no-repeat');    
    setInterval(function(){   
        $slide.fadeOut(700, function () {
            $slide.css('background-image', 'url(' + $array [$index++] +')');
            $slide.css('background-repeat', 'no-repeat');
            $slide.fadeIn(700);
        });
        if($index == $array.length){
            $index = 0;
        }
    }
    ,5000);
    //Ajax-Schedule page
    $('#dep-submit').click(function(){
        var dep = $('input#dep').val();
        
        if($.trim(dep) != ''){
            $.post('dep.php', {dep: dep}, function(data){
                $('#data').text(data)
            });
        } 
    });
});

 //Navigation-Main Page
 function openSideNav() {
    document.getElementById("sideMenu").style.width = "100%";    
}

function closeSideNav() {
    document.getElementById("sideMenu").style.width = "0";
}

//Navigation Mobile-Change logo href 
window.onload = function(){
    let link = document.getElementById("link");
    let logo = document.getElementById("logo");    
    function changeLink() {
        let width = window.innerWidth;
        if (width < 470) {
            link.href="javascript:void(0)";
        }
    }
    logo.onclick = changeLink();
}