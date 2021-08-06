// Drag tasks around
$(".drag").draggable({
  revert: "invalid",
  start: function (e, ui) {
    // Date from where task was dragged from
    $(this).data("oldDate", $(this).parent().data("date"));
    // alert( $(this).parent().data("date") );
  }
  
});

// Select drop area for Tasks (only droppable on TD which have "data-date" attribute)
$("td[data-date]").droppable({
  drop: function (e, ui) {
    var drag = ui.draggable,
      drop = $(this),
      oldDate = drag.data("oldDate"), // Task date on drag
      calendar_id = drag.data("calendar_id"), // Calendar id on drag
      newDate = drop.data("date"),    // Task date on drop 
      dragPeriod = drag.data("period"),   // Task period on drag
      dropPeriod = drop.data("period");   // Task period on drop
    if (oldDate != newDate || dragPeriod != dropPeriod) {
        $.ajax({
          type:'POST',
          dataType: 'json',
          url: "/admin/meal/routine-update",
          data:{
              '_token' : $('meta[name="csrf-token"]').attr('content'),
              'item_id': calendar_id,
              'startend':newDate,
              'period':dropPeriod
          },
          success:function(data) {
            $(drag).detach().css({ top: 0, left: 0 }).appendTo(drop);
            $(drag).data("period", dropPeriod); // Update task period
          },
          error: function (data, textStatus, errorThrown) {
            console.log(data);
          },
        });
    } else {
        return $(drag).css({ top: 0,left: 0 }); // Return task to old position
    }
  }
  
});

// show EDIT and TRASH tools
// $(".drag").hover(
$(document).on("mouseenter", ".drag",
  function () {
    var isAdmin = 1; // Ability to hide or show edit and delete options
    if (isAdmin == 1) {
      $(this)
        .css('z-index', '999')
        .prepend('<div class="opt-tools"><div class="opt-edit"><i class="fas fa-pen"></i></div><div class="opt-trash"><i class="fas fa-trash"></i></div></div>');
    }
});
$(document).on("mouseleave", ".drag",
  function () {
    //When mouse hovers out DIV remove tools
    $(this).css("z-index", "0").find(".opt-tools").remove();
  }
);

// Show modal to edit task
$(document).on('click', '.opt-edit', function() {
  // Get task ID and DATE from DATA attribute
  var calendar_id = $(this).parent().parent().data('calendar_id'),
      period = $(this).parent().parent().data('period');
  // Get DATE 
  var date = $(this).closest('td').data('date');
  // insert data to Modal 
  $('#ktxt')[0].jscolor.fromString('FFFFFF');
  $('#kbg')[0].jscolor.fromString('8E8E8E');
  $('#demotaak2').css('color', '#FFFFFF');
  $('#demotaak1').css('border-left-color', '#8E8E8E');
  $('#demotaak2').css('background-color', '#8E8E8E');
  $('#edittask').modal('show');
});

// Modal remove task ?
$(document).on('click', '.opt-trash', function() {
  var calendar_id = $(this).parent().parent().data('calendar_id');
  
  $('#taskdelid').val(calendar_id);
    $('#modal-delete').html('Are you sure you want to delete routine ID <b>' + calendar_id + '</b>?');
  $('#deletetask').modal('show');
});

// Remove task after confirmation
$(document).on('click', '#confdelete', function() {
  var calendar_id = $('#taskdelid').val();
  $.ajax({
    type:'POST',
    dataType: 'json',
    url: "/admin/meal/routine-delete",
    data:{
        '_token' : $('meta[name="csrf-token"]').attr('content'),
        'item_id': calendar_id
    },
    success:function(data) {
      $("div").find('[data-calendar_id='+calendar_id+']').remove();
    },
    error: function (data, textStatus, errorThrown) {
      console.log(data);
    },
  });
  $('#deletetask').modal('hide');
});

function changeColor(id, c) {
    if (id == 'ctxt') {
        $('#demotaak2').css('color', '#' + c);
    } else if (id == 'cbg') {
        $('#demotaak1').css('border-left-color', '#' + c);
        $('#demotaak2').css('background-color', '#' + c);
    } 
    return false;
}

$(".ui-droppable").hover(
	function (){
		if($(this).children('div.drag').length == 0)
		$(this).html('<a href="javascript:void(0)" id="addMeal"><small><i class="fas fa-plus"></i>Add Meal</small></a>');
	},
	function(){
		if($(this).children('div.drag').length == 0)
		$(this).children().remove();
	}
);

$(document).on('click', '#addMeal', function() {
  // var startend = $(this).parent().data('date');
  // var period = $(this).parent().data('period');
  $('#dates').val($(this).parent().data('date'));
  $('#periods').val($(this).parent().data('period'));
  //   $('#modal-delete').html('Are you sure you want to delete routine ID <b>' + calendar_id + '</b>?');
  $('#addMealModal').modal('show');
});

$(document).on('click', '#addCalendar', function() {
  var meal_id = $('#meal_id').val();
  var dates = $('#dates').val();
  var periods = $('#periods').val();
  var newMeal = '';
  if(meal_id !=''){
    $.ajax({
      type:'POST',
      dataType: 'json',
      url: "/admin/meal/routine-add",
      data:{
          '_token' : $('meta[name="csrf-token"]').attr('content'),
          'meal_id': meal_id,
          'startend': dates,
          'period': periods
      },
      success:function(data) {
        meal = `<div class="drag details ui-draggable ui-draggable-handle" data-calendar_id="`+data.calendar_id+`" data-period="`+periods+`" style="border-left: 5px solid #BD0000; position: relative;">
          <h3 class="details-task" style=" background: #BD0000; color: #FFFFFF">`+data.meal_name+`</h3>
            <div class="details-uren">15:00 - 16:30</div>
        </div>`;
        $("td[data-date='"+dates+"'][data-period='"+periods+"']").append(meal);
        $(".drag").draggable();
      },
      error: function (data, textStatus, errorThrown) {
        console.log(data);
      },
    });
    $('#addMealModal').modal('hide');
  }
});