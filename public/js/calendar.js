$(document).ready(function () {

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



        select: function (start, end, allDays) {



            $("#bookingModal").modal("toggle");
            const datetimeLocalInput = document.getElementById('date');
            datetimeLocalInput.value = moment(start).format("Y-MM-DD HH:mm:ss");
            const datetimeLocalInput_1 = document.getElementById('date_end');
            datetimeLocalInput_1.value = moment(end).format("Y-MM-DD HH:mm:ss");
            $("#saveBtn").click(function () {
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
                    success: function (response) {
                        $('#bookingModal').modal('hide')
                        // $('#calendar').fullCalendar('rerenderEvents', response);
                        setTimeout(() => {
                            document.location.reload();
                        },);
                    },
                    error: function (error) {
                        if (error.responseJSON.errors) {
                            $('#titleError').html(error.responseJSON.errors
                                .title);
                        }
                    },


                })

            })
        },

        editable: true,
        eventDrop: function (event) {
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
                success: function (response) {
                    swal("Good job!", "Event Updated!", "success");

                },
                error: function (error) {
                    console.log(error)
                },


            })
        },
        eventClick: function (event) {
            var id = event.id
            if (confirm("are you sure to remove it")) {
                $.ajax({
                    url: "{{ route('calendar.destroy', '') }}" + '/' + id,
                    type: "DELETE",
                    dataType: 'json',

                    success: function (response) {
                        var id = response.id
                        console.log(id)
                        $('#calendar').fullCalendar('removeEvents', response);
                        //     swal("Good job!", "Event DElETED!", "success");
                        //     setTimeout(() => {
                        //         document.location.reload();
                        // }, 3000);

                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            }
        },



    })



    $("#bookingModal").on("hidden.bs.modal", function () {
        $('#saveBtn').unbind();
    });



});
