@extends('layouts.master')
@section('content')
                <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
       <!-- Main content -->
       <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <div class="sticky-top mb-3">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">@lang('Evenements a Déplacement')</h4>
                  </div>
                  <div class="card-body">
                    <!-- the events -->
                    
                    <div id="external-events">
                      <div class="external-event bg-success">Tâche-1</div>
                      <div class="external-event bg-warning">Tâche-2</div>
                      <div class="external-event bg-info">Tâche-3</div>
                      <div class="external-event bg-primary">Tâche-4</div>
                      <div class="external-event bg-danger">Tâche-5</div>
                      <div class="checkbox">
                        <label for="drop-remove">
                          <input type="checkbox" id="drop-remove">
                                                
                            @lang('enlever apres le déplacement')  

                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">@lang('Creer Evenement')</h3>
                  </div>
                  <div class="card-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                      <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                      <ul class="fc-color-picker" id="color-chooser">
                        <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                        <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                        <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                        <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                        <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                      </ul>
                    </div>
                    <!-- /btn-group -->
                    <div class="input-group">
                      <input id="new-event" type="text" class="form-control" placeholder="Nom de votre Evenment">

                      <div class="input-group-append">
                        <button id="add-new-event" type="button" class="btn btn-primary">@lang('Ajouter')</button>
                      </div>
                      <!-- /btn-group -->
                    </div>
                    <!-- /input-group -->
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card card-primary">
                <div class="card-body p-0">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

                </div>

@endsection

@section('scripto')



<script>
    $(function () {

      /* initialize the external events
       -----------------------------------------------------------------*/
      function ini_events(ele) {
        ele.each(function () {

          // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex        : 1070,
            revert        : true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          })

        })
      }

      ini_events($('#external-events div.external-event'))

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date()
      var d    = date.getDate(),
          m    = date.getMonth(),
          y    = date.getFullYear()

      var Calendar = FullCalendar.Calendar;
      var Draggable = FullCalendarInteraction.Draggable;

      var containerEl = document.getElementById('external-events');
      var checkbox = document.getElementById('drop-remove');
      var calendarEl = document.getElementById('calendar');

      // initialize the external events
      // -----------------------------------------------------------------

      new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
          console.log(eventEl);
          return {
            title: eventEl.innerText,
            backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
            borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
            textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
          };
        }
      });

      var calendar = new Calendar(calendarEl, {
        plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
        header    : {
          left  : 'prev,next today',
          center: 'title',
          right : 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        'themeSystem': 'bootstrap',
        //Random default events
        events    : [
          {
            title          : 'Jour de l’An',
            start          : new Date(y, 0, 1),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },


          {
            title          : 'Pâques',
            start          : new Date(y, 3, 13),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },
          {
            title          : 'Fête du Travail',
            start          : new Date(y, 4, 1),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },
          {
            title          : 'Victoire des Alliés en 1945',
            start          : new Date(y, 4, 8),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },
          {
            title          : 'Ascension',
            start          : new Date(y, 4, 21),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },

          {
            title          : 'Penetcôte',
            start          : new Date(y, 5, 1),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },
          {
            title          : 'Fête nationale',
            start          : new Date(y, 6, 14),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },

          {
            title          : 'Assomption',
            start          : new Date(y, 7, 15),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },

          {
            title          : 'Toussaint',
            start          : new Date(y, 10, 1),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },

          {
            title          : 'Armistice 1918',
            start          : new Date(y, 10, 11),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          },

          {
            title          : ' Noel',
            start          : new Date(y, 11, 25),
            backgroundColor: '#f56954', //red
            borderColor    : '#f56954', //red
            allDay         : true
          }



        ],
        editable  : true,
        droppable : true, // this allows things to be dropped onto the calendar !!!
        drop      : function(info) {
          // is the "remove after drop" checkbox checked?
          if (checkbox.checked) {
            // if so, remove the element from the "Draggable Events" list
            info.draggedEl.parentNode.removeChild(info.draggedEl);
          }
        }
      });

      calendar.render();
     // $('#calendar').fullCalendar()

      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      //Color chooser button
      var colorChooser = $('#color-chooser-btn')
      $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        //Save color
        currColor = $(this).css('color')
        //Add color effect to button
        $('#add-new-event').css({
          'background-color': currColor,
          'border-color'    : currColor
        })
      })
      $('#add-new-event').click(function (e) {
        e.preventDefault()
        //Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }

        //Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color'    : currColor,
          'color'           : '#fff'
        }).addClass('external-event')
        event.html(val)
        $('#external-events').prepend(event)

        //Add draggable funtionality
        ini_events(event)

        //Remove event from text input
        $('#new-event').val('')
      })
    })
  </script>


@endsection
