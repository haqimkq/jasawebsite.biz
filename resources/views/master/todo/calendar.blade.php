<x-app-layout>
    <div class="pb-5">
        <div class="mx-auto max-w-3xl bg-white p-3 rounded-lg">
            @foreach ($todo as $item)
                <button data-modal-target="showTodo-{{ $item->id }}" data-id="{{ $item->id }}"
                    class="buttonCalendar hidden" data-modal-toggle="showTodo-{{ $item->id }}">
                    {{ $item->id }}
                </button>
                <x-modal.showTodo :todos="$item"></x-modal.showTodo>
            @endforeach
            <select
                class="bg-blue-900 dark:bg-gray-600 text-white rounded-lg text-sm border border-black mx-auto w-[200px]"
                id="selectUser">
                @foreach ($user as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <div id='calendar'></div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            dayMaxEventRows: true,
            eventClick: function(info) {
                var eventObj = info.event;
                var title = eventObj.title;
                var id = eventObj.extendedProps.id || '';

                $('.buttonCalendar').each(function() {
                    const buttonId = $(this).data('id');

                    if (id === buttonId) {
                        $(this).click();
                    }
                });
            },

            views: {
                timeGrid: {
                    dayMaxEventRows: 2
                }
            },
            events: function(info, successCallback, failureCallback) {
                var selectedUserId = document.getElementById('selectUser').value;

                $.ajax({
                    url: '/todos/get/calendar/' + selectedUserId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        var events = response.map(function(item) {
                            var startDate = new Date(item.doneAt);
                            var formattedStartDate = startDate.toISOString()
                                .split('.')[0];

                            var endDate = new Date(item.created_at);
                            var formattedEndDate = endDate.toISOString().split(
                                '.')[0];

                            return {
                                title: item.subject,
                                description: item.catatan,
                                extendedProps: {
                                    id: item.id
                                },
                                start: formattedEndDate,
                                end: formattedStartDate,
                                allDay: true,
                            };
                        });

                        successCallback(events);
                    },
                    error: function(xhr, status, error) {
                        failureCallback(error);
                    }
                });
            }
        });

        document.getElementById('selectUser').addEventListener('change', function() {
            calendar.refetchEvents();
        });

        calendar.render();
    });
</script>
