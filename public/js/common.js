$(document).ready(function() {
    var nav = $('.header');
    $('.btn-feedback').click(function(){
       alert('Your feedback|query has been sent to the concerned personnel.') ;
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 150) {
            nav.addClass("header-scrolled");
        }
        else
        {
            nav.removeClass("header-scrolled");
        }

    });
    $('.btn-show').click(function() {
        $('.btn-hide').show();
        $('.btn-show').hide();
       
    });
    $('.btn-hide').click(function() {
        $('.btn-show').show();
        $('.btn-hide').hide();
    });
    $('.btn-show2').click(function() {
        $('.btn-hide2').show();
        $('.btn-show2').hide();
        
    });
    $('.btn-hide2').click(function() {
        $('.btn-show2').show();
        $('.btn-hide2').hide();
    });
     $('.btn-show3').click(function() {
        $('.btn-hide3').show();
        $('.btn-show3').hide();
       
    });
    $('.btn-hide3').click(function() {
        $('.btn-show3').show();
        $('.btn-hide3').hide();

    });

});



function changeContent() {
    document.getElementById('One').style.display = 'block';

}



function loadNull() {
    document.getElementById('One').style.display = 'none';
    document.getElementById('btn-One').style.display='none';
}
function changeContentShow() {
    document.getElementById('Two').style.display = 'block';
    document.getElementById('btn-Two').style.display='block';

}

function loadNullValue() {
    document.getElementById('Two').style.display = 'none';
    document.getElementById('btn-two').style.display='none';
}
function changeContentShowAgain() {
    document.getElementById('Three').style.display = 'block';
    document.getElementById('btn-Three').style.display='block';

}

function loadNullValueAgain() {
    document.getElementById('Three').style.display = 'none';
    document.getElementById('btn-Three').style.display='none';
}
function loadInitial() {
    document.getElementById('One').style.display = 'none';
    document.getElementById('Two').style.display = 'none';
    document.getElementById('Three').style.display = 'none';
    document.getElementById('btn-One').style.display='none';
    document.getElementById('btn-Two').style.display='none';
    document.getElementById('btn-Three').style.display='none';

}


//for academic.html
function init() {
	$('.computer').click(function() {
		$('#b-computer').css('display', 'block');
		$('#b-elec').css('display', 'none');
		$('#b-civil').css('display', 'none');
		$('#b-arch').css('display', 'none');
		$('#b-aero').css('display', 'none');
		return false;
	});
	$('.electric').click(function() {
		$('#b-elec').css('display', 'block');
		$('#b-computer').css('display', 'none');
		$('#b-civil').css('display', 'none');
		$('#b-arch').css('display', 'none');
		$('#b-aero').css('display', 'none');
		return false;
	});
	$('.civil').click(function() {
		$('#b-civil').css('display', 'block');
		$('#b-elec').css('display', 'none');
		$('#b-computer').css('display', 'none');
		$('#b-arch').css('display', 'none');
		$('#b-aero').css('display', 'none');
		return false;
	});
	$('.arch').click(function() {
		$('#b-arch').css('display', 'block');
		$('#b-civil').css('display', 'none');
		$('#b-elec').css('display', 'none');
		$('#b-computer').css('display', 'none');
		$('#b-aero').css('display', 'none');
		return false;
	});
	$('.aero').click(function() {
		$('#b-aero').css('display', 'block');
		$('#b-civil').css('display', 'none');
		$('#b-elec').css('display', 'none');
		$('#b-computer').css('display', 'none');
		$('#b-arch').css('display', 'none');
		return false;
	});
}
