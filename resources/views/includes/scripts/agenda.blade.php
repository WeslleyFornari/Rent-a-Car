<script>
     /*  $.datepicker.regional['pt-BR'] = {
                closeText: 'Fechar',
                prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                currentText: 'Hoje',
                monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                'Jul','Ago','Set','Out','Nov','Dez'],
                dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
	
	$('#calendar').datepicker({
		inline: true,
		firstDay: 1,
		showOtherMonths: true,
		addDates: ['10/09/2017'],
		dayNamesMin: ['Dom', 'Seg', 'Ter', 'Quar', 'Quin', 'Sext', 'Sab'],
		
	});
       var events = [ 
            { Title: "Teste 1 ", Date: new Date("10/13/2017") }, 
            { Title: "Dinner", Date: new Date("10/25/2017") }, 
            { Title: "Meeting with manager", Date: new Date("10/01/2017") }
        ];

$("#calendar").datepicker({
    beforeShowDay: function(date) {
        var result = [true, '', null];
        var matching = $.grep(events, function(event) {
            return event.Date.valueOf() === date.valueOf();
        });
        
        if (matching.length) {
            result = [true, 'highlight', null];
        }
        return result;
    },
    onSelect: function(dateText) {
        var date,
            selectedDate = new Date(dateText),
            i = 0,
            event = null;
        
        while (i < events.length && !event) {
            date = events[i].Date;

            if (selectedDate.valueOf() === date.valueOf()) {
                event = events[i];
            }
            i++;
        }
        if (event) {
            alert(event.Title);
        }
    }
});

*/

/*
    $('.cal-eventos').slick({
  // normal options...
  infinite: true,
  arrow:true,
  initialSlide:{{date('m')-1}},
  prevArrow:'<a href="#" class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>',
  nextArrow:'<a href="#" class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>',
  // the magic
  responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
      }
    }, {
      breakpoint: 500,
      settings: {
        slidesToShow: 1,
      }
    }]
});

// On swipe event
$('.cal-eventos').on('swipe', function(event, slick, direction){
  console.log(direction);
  // left
});

// On edge hit
$('.cal-eventos').on('edge', function(event, slick, direction){
  console.log('edge was hit')
});

// On before slide change
$('.cal-eventos').on('beforeChange', function(event, slick, currentSlide, nextSlide){
  console.log(nextSlide);
});*/

(function ($) { 
    $('#calendar').fullCalendar({
        events:'{{route("api.eventos")}}',
        header:{
          'left':'prev',
          'center':'title',
          'right':'next'
        },
      eventClick: function(calEvent, jsEvent, view) {
          

      },
        themeButtonIcons:{
          prev: 'circle-triangle-w',
        next: 'circle-triangle-e',
        prevYear: 'seek-prev',
        nextYear: 'seek-next'
    },
    height: '200',
    lang: 'pt-br',
        eventDataTransform: function (rawEventData) {
            return {
                id: rawEventData.id,
                title: rawEventData.title,
                start: rawEventData.start,
                end: rawEventData.end,
                url: rawEventData.url
            };
        }
    });
})(jQuery);
</script>