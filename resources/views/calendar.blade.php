@extends('layouts.main')

@section('headers')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}">
<link rel="stylesheet" href="{{asset('css/calendar.css')}}">

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>


@endsection

@section('content')
<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="title">
                <span id="titleError" class="text-danger"></span>
                <input type="datetime-local" class="form-control" id="date">

                <input type="datetime-local" class="form-control" id="date_end">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="col-md-11 offset-1 mt-5 mb-5">

                <div id="calendar">

                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
        
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var booking = @json($events);
        $("#calendar").fullCalendar({
        header: {
        right: "prev , next , today",
        center: "title",
        left: "month , agendaWeek , agendaDay"
        
        },
        events: booking,
        selectable: true,
        selectHelper: true,
        
        
        
        select: function(start, end, allDays) {
        
        
        
        $("#bookingModal").modal("toggle");
        const datetimeLocalInput = document.getElementById('date');
        datetimeLocalInput.value = moment(start).format("Y-MM-DD HH:mm:ss");
        const datetimeLocalInput_1 = document.getElementById('date_end');
        datetimeLocalInput_1.value = moment(end).format("Y-MM-DD HH:mm:ss");
        $("#saveBtn").click(function() {
        var title = $("#title").val();
        var start_date = $("#date").val();
        var end_date = $("#date_end").val();
        
        $.ajax({
        url: "{{ route('calendar.store') }}",
        type: "POST",
        dataType: 'json',
        data: {
        title,
        start_date,
        end_date
        },
        success: function(response) {
        $('#bookingModal').modal('hide')
        // $('#calendar').fullCalendar('rerenderEvents', response);
        setTimeout(() => {
        document.location.reload();
        }, );
        },
        error: function(error) {
        if (error.responseJSON.errors) {
        $('#titleError').html(error.responseJSON.errors
        .title);
        }
        },
        
        
        })
        
        })
        },
        
        editable: true,
        eventDrop: function(event) {
        var id = event.id
        var start_date = moment(event.start).format("Y-MM-DD HH:mm:ss");
        var end_date = moment(event.end).format("Y-MM-DD HH:mm:ss");
        $.ajax({
        url: "{{ route('calendar.patch', '') }}" + '/' + id,
        type: "PATCH",
        dataType: 'json',
        data: {
        start_date,
        end_date
        },
        success: function(response) {
        swal("Good job!", "Event Updated!", "success");
        
        },
        error: function(error) {
        console.log(error)
        },
        
        
        })
        },
        eventClick: function(event) {
        var id = event.id
        if (confirm("are you sure to remove it")) {
        $.ajax({
        url: "{{ route('calendar.destroy', '') }}" + '/' + id,
        type: "DELETE",
        dataType: 'json',
        
        success: function(response) {
        var id = response.id
        console.log(id)
        $('#calendar').fullCalendar('removeEvents', response);
        // swal("Good job!", "Event DElETED!", "success");
        // setTimeout(() => {
        // document.location.reload();
        // }, 3000);
        
        },
        error: function(error) {
        console.log(error)
        }
        })
        }
        },
        
        
        
        })
        
        
        
        $("#bookingModal").on("hidden.bs.modal", function() {
        $('#saveBtn').unbind();
        });
        
        
        
        });
    </script>
</div>
@endsection
