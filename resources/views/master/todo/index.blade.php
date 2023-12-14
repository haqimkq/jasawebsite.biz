<x-app-layout title="To Do List">

    <div class="sm:pl-7 pb-5">
        <div class="space-y-2 relative">
            <div class="absolute top-1 right-6 z-10">
                <button id="viewAll" class=" px-3 py-1 bg-white rounded-lg text-sm hover:bg-gray-100">
                    View All
                </button>
            </div>
            <div>
                <div class="px-3" id="container-owl-slide">
                    <div class="w-full border h-52 rounded-lg bg-blue-900 dark:bg-gray-900">
                        <div class="flex items-center h-full">
                            <div id="chartsAll" class=" chart-container owl-carousel owl-theme">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3 hidden" id="container-all-donut">
                    <div class="border rounded-lg p-3 bg-blue-900 dark:bg-gray-900">
                        <div id="donutChart" class="grid  lg:grid-cols-5 sm:grid-cols-3 grid-cols-2 gap-1 ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:grid grid-cols-2 gap-1 space-y-3 lg:space-y-0 px-3">
                <div class="p-5 bg-hexagon dark:bg-gray-800 bg-blue-900  rounded-lg border-gray-500 border ">
                    <div class="flex justify-between">
                        <select id="kategoriSelect"
                            class="dark:bg-gray-600 bg-white dark:text-white text-blue-900 focus:ring-0 text-sm border-l-0 border-r-0 border-t-0 rounded-lg">
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div>
                            <button id="reportUserButton"
                                class="dark:bg-gray-600 bg-white dark:text-white text-blue-900 focus:ring-0 text-sm border-l-0 border-r-0 border-t-0 rounded-lg px-3 py-2">Lihat
                                Report</button>
                        </div>
                    </div>
                    <div class="mx-auto h-full flex justify-center items-center sm:w-[390px] w-[300px]">
                        <canvas id="pieChart" class=" sm:w-[390px] w-[300px]">
                        </canvas>
                    </div>
                </div>
                <div class="h-[525px]" id="todoCont">
                    <div class="border border-gray-500 rounded-lg h-full">
                        <div class="">
                            <div
                                class="  sm:flex justify-between items-center bg-blue-800 dark:bg-gray-600 px-3 rounded-t-lg">
                                <ul class="flex justify-center sm:justify-start flex-wrap -mb-px text-sm font-medium text-center"
                                    id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block p-4 dark:border-b-2 focus:border-b-2 active:border-b-2 hover:border-b-2 focus:border-orange-600 active:border-orange-600 hover:text-orange-500 rounded-t-lg  text-white active:text-orange-500 hover:border-orange-500 focus:text-orange-500 dark:text-white dark:active:text-white dark:focus:text-white"
                                            id="list-todo-tab" data-tabs-target="#tabs-todo" type="button"
                                            role="tab" aria-controls="todo" aria-selected="false">
                                            Todo</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block p-4 dark:border-b-2 focus:border-b-2 active:border-b-2 hover:border-b-2 focus:border-orange-600 active:border-orange-600 hover:text-orange-500 rounded-t-lg  text-white active:text-orange-500 hover:border-orange-500 focus:text-orange-500 dark:text-white dark:active:text-white dark:focus:text-white"
                                            id="list-doing-tab" data-tabs-target="#tabs-doing" type="button"
                                            role="tab" aria-controls="doing" aria-selected="false">
                                            Doing</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block p-4 dark:border-b-2 focus:border-b-2 active:border-b-2 hover:border-b-2 focus:border-orange-600 active:border-orange-600 hover:text-orange-500 rounded-t-lg  text-white active:text-orange-500 hover:border-orange-500 focus:text-orange-500 dark:text-white dark:active:text-white dark:focus:text-white"
                                            id="list-done-tab" data-tabs-target="#tabs-done" type="button"
                                            role="tab" aria-controls="list-2" aria-selected="false">
                                            Done</button>
                                    </li>
                                </ul>
                                <div class="flex items-center gap-1 justify-center sm:justify-start">
                                    <div class="mr-2 py-3">
                                        <a href="{{ route('todos.calendar') }}"
                                            class="inline-block text-xl bg-white rounded-lg text-gray-600 px-2"><i
                                                class="fa-solid fa-calendar"></i></a>
                                    </div>
                                    <div class="mr-2 py-3">
                                        <a href="{{ route('cronjob.index') }}"
                                            class="inline-block text-xl bg-white rounded-lg text-gray-600 px-2"><i
                                                class="fa-regular fa-clock"></i></a>
                                    </div>
                                    <div class="mr-2 py-3">
                                        <a href="{{ route('todo.create') }}"
                                            class="inline-block text-xl bg-white rounded-lg text-gray-600 px-2">+</a>
                                    </div>
                                    <div class="mr-2 py-3">
                                        <a href="{{ route('todo.report') }}" target="_blank"
                                            class="inline-block text-xl bg-white rounded-lg text-gray-600 px-2"><i
                                                class="fa-solid fa-file-circle-check"></i></a>
                                    </div>
                                    <div class="mr-2 py-3">
                                        <button data-modal-target="confirmTodo" data-modal-toggle="confirmTodo"
                                            class="inline-block text-xl bg-white rounded-lg text-gray-600 px-2 relative">
                                            <i class="fa-solid fa-check ">
                                            </i>
                                            @if (count($todoConfirm) > 0)
                                                <div
                                                    class="absolute rounded-full bg-red-500 w-2 h-2 top-1 right-1 animate-bounce">
                                                </div>
                                            @endif
                                        </button>
                                    </div>
                                    <x-modal.confirmTodoModal></x-modal.confirmTodoModal>

                                </div>

                            </div>
                            <div id="myTabContent">
                                <div class="hidden p-2 rounded-b-lg bg-blue-900 dark:bg-gray-900 space-y-2 overflow-scroll h-[471px]"
                                    id="tabs-todo" role="tabpanel" aria-labelledby="list-todo-tab">
                                    <div class="space-y-3 text-white">
                                        @foreach ($todo as $item)
                                            @if ($item->status == 'todo')
                                                @foreach ($item->users as $items)
                                                    <button data-user="{{ $items->id }}"
                                                        data-modal-toggle="showTodo-{{ $item->id }}"
                                                        data-modal-target="showTodo-{{ $item->id }}"
                                                        class="text-start w-full border rounded-lg p-2 todo-item dark:bg-gray-600 bg-blue-100 dark:text-white text-black font-bold"
                                                        @if ($item->isConfirm == false) style="color:red" @endif>
                                                        {{ $item->subject }}
                                                    </button>
                                                    @include('components.modal.showTodo', [
                                                        'todos' => $item,
                                                    ])
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="hidden p-2 rounded-b-lg bg-blue-900 dark:bg-gray-900 space-y-2 overflow-scroll h-[471px]"
                                    id="tabs-doing" role="tabpanel" aria-labelledby="list-doing-tab">
                                    <div class="space-y-3 text-white">
                                        @foreach ($todo as $item)
                                            @if ($item->status == 'doing')
                                                @foreach ($item->users as $items)
                                                    <button data-user="{{ $items->id }}"
                                                        data-modal-toggle="showTodo-{{ $item->id }}"
                                                        data-modal-target="showTodo-{{ $item->id }}"
                                                        class="text-start w-full border rounded-lg p-2 todo-item dark:bg-gray-600 bg-blue-100 dark:text-white text-black"@if ($item->isConfirm == false) style="color:red" @endif>
                                                        {{ $item->subject }}
                                                    </button>
                                                    @include('components.modal.showTodo', [
                                                        'todos' => $item,
                                                    ])
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="hidden p-2 rounded-b-lg bg-blue-900 dark:bg-gray-900 space-y-2 overflow-scroll h-[471px]"
                                    id="tabs-done" role="tabpanel" aria-labelledby="list-done-tab">
                                    <div class="space-y-3 text-white">
                                        @foreach ($todo as $item)
                                            @if ($item->status == 'done')
                                                @foreach ($item->users as $items)
                                                    <button data-user="{{ $items->id }}"
                                                        data-modal-toggle="showTodo-{{ $item->id }}"
                                                        data-modal-target="showTodo-{{ $item->id }}"
                                                        class="text-start w-full border rounded-lg p-2 todo-item dark:bg-gray-600 bg-blue-100 dark:text-white text-black"@if ($item->isConfirm == false) style="color:red" @endif>
                                                        {{ $item->subject }}
                                                    </button>
                                                    @include('components.modal.showTodo', [
                                                        'todos' => $item,
                                                    ])
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                    <img src="" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const ctx = document.getElementById('pieChart').getContext('2d');
    let chart = null;

    function updateChart(categoryId) {
        fetch(`/todos/piechart/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                const sumOfData = data.data.reduce((acc, curr) => acc + curr, 0);

                if (sumOfData === 0) {
                    if (chart) {
                        chart.destroy();
                    }

                    chart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Tidak Ada Data'],
                            datasets: [{
                                label: 'Tidak Ada Data',
                                data: [1],
                                backgroundColor: ['rgba(200,200,200)'],
                                hoverOffset: 0
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    labels: {
                                        color: 'rgb(255,255,255)'
                                    }
                                }
                            }
                        }
                    });
                } else {
                    if (chart) {
                        chart.destroy();
                    }

                    const chartData = {
                        labels: data.labels,
                        datasets: [{
                            label: 'My First Dataset',
                            data: data.data,
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(50, 205, 50)'
                            ],
                            hoverOffset: 4
                        }]
                    };

                    chart = new Chart(ctx, {
                        type: 'pie',
                        data: chartData,
                        options: {
                            plugins: {
                                legend: {
                                    labels: {
                                        color: 'rgb(255,255,255)'
                                    }
                                }
                            }
                        }
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    document.getElementById('kategoriSelect').addEventListener('change', function() {
        const selectedCategoryId = this.value;
        updateChart(selectedCategoryId);
    });

    const defaultCategoryId = document.getElementById('kategoriSelect').value;
    updateChart(defaultCategoryId);
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const selectTodo = document.getElementById('kategoriSelect');
        const todoItems = document.querySelectorAll('.todo-item');

        const filterTodoItems = () => {
            const selectedValue = selectTodo.value;

            todoItems.forEach((item) => {
                const user = item.getAttribute('data-user');
                if (selectedValue === user) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        };

        filterTodoItems();
        selectTodo.addEventListener('change', filterTodoItems);
    });
</script>
<script>
    var owl = $('.owl-carousel').owlCarousel();
    owl.trigger('destroy.owl.carousel');
    fetch('/todos/piechartAll')
        .then(response => response.json())
        .then(data => {
            var carouselItems = [];
            data.forEach(userChartData => {
                var canvasId = userChartData.user.name + '-pieChart';

                var chartAll = document.createElement('div');
                chartAll.classList.add = 'item';

                var pieContainer = document.createElement('div');
                pieContainer.classList.add('pieContainer');
                pieContainer.classList.add('mx-auto');
                pieContainer.style.width = '144px';
                pieContainer.style.height = '144px';

                var canvasElement = document.createElement('canvas');
                canvasElement.id = canvasId;

                var textUser = document.createElement('div');
                textUser.classList.add('text-user');
                textUser.classList.add('text-center');
                textUser.classList.add('text-white');
                textUser.innerHTML = `<h3>${userChartData.user.name}</h3>`;

                pieContainer.appendChild(canvasElement);
                chartAll.appendChild(pieContainer);
                chartAll.appendChild(textUser);
                chartsAll.appendChild(chartAll);


                var ctxAll = document.getElementById(canvasId).getContext('2d');
                var totalData = userChartData.data.reduce((acc, curr) => acc + curr, 0);

                if (totalData === 0) {
                    new Chart(ctxAll, {
                        type: 'pie',
                        data: {
                            labels: ['Tidak Ada Data'],
                            datasets: [{
                                label: 'Tidak Ada Data',
                                data: [1],
                                backgroundColor: ['rgba(200, 200, 200, 0.6)'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            }
                        }
                    });
                } else {
                    new Chart(ctxAll, {
                        type: 'pie',
                        data: {
                            labels: userChartData.labels,
                            datasets: [{
                                label: 'Tugas Pengguna',
                                data: userChartData.data,
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(50, 205, 50)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            }
                        }
                    });
                }
                carouselItems.push(chartAll);
            });
            var owl = $('.owl-carousel').owlCarousel({
                loop: false,
                margin: 10,
                nav: false,
                stagePadding: 50,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 50
                    },
                    420: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 6
                    }
                }
            });
            owl.trigger('replace.owl.carousel', [carouselItems]);
            owl.trigger('refresh.owl.carousel');

        })
        .catch(error => {
            console.error('Error:', error);
        });
</script>
<script>
    fetch('/todos/piechartAll')
        .then(response => response.json())
        .then(data => {
            const donutChartContainer = document.getElementById('donutChart');

            data.forEach(userData => {
                const userName = userData.user.name;
                const userLabels = userData.labels;
                const userDataValues = userData.data;
                const userPoint = userData.point;
                let totalPoints = 0;
                if (Array.isArray(userPoint)) {
                    userPoint.forEach(function(todo) {
                        totalPoints += todo.point ? parseInt(todo.point) : 0;
                    });
                }

                const allZeros = userDataValues.every(value => value === 0);

                const chartData = {
                    labels: allZeros ? ['Tidak ada Data'] : userLabels,
                    datasets: [{
                        data: allZeros ? [1] : userDataValues,
                        backgroundColor: allZeros ? ['rgba(200, 200, 200, 0.6)'] : [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(50, 205, 50)'
                        ],
                        hoverOffset: 4
                    }]
                };

                const canvasId = `${userName}DonutChart`;
                const canvasContainer = document.createElement('div');
                const donutContainer = document.createElement('div');
                const pointContainer = document.createElement('div');
                const imageContainer = document.createElement('div');

                canvasContainer.style.width = '144px';
                canvasContainer.style.height = '144px';
                canvasContainer.style.position = 'relative';
                canvasContainer.style.margin = 'auto';
                canvasDonut = document.createElement('canvas');
                canvasDonut.id = canvasId;
                donutContainer.innerHTML =
                    `<p class="text-white text-center ">${userName}</p>`;
                imageContainer.innerHTML =
                    `<img class="object-cover w-10 h-10" src="{{ asset('storage/images/fotoProfil') }}/${userData.user.image}" alt="">`;
                pointContainer.innerHTML =
                    `<a href="/todos/pointUser/${userData.user.id}/${userData.month}" class="text-white text-center">${totalPoints}</p>`;
                donutContainer.classList.add('dark:hover:bg-gray-800', 'hover:bg-blue-800', 'rounded-lg',
                    'relative');
                pointContainer.classList.add('absolute', 'top-[43%]', 'left-[46.5%]', 'text-lg',
                    'leading-none');
                imageContainer.classList.add('absolute', 'z-10', 'top-1', 'left-1', 'rounded-lg',
                    'overflow-hidden');
                canvasContainer.appendChild(canvasDonut);
                canvasContainer.appendChild(pointContainer);
                donutContainer.appendChild(canvasContainer);
                if (userData.user.image !== null) {
                    donutContainer.appendChild(imageContainer);
                };
                donutChartContainer.appendChild(donutContainer);


                const ctx = document.getElementById(canvasId).getContext('2d');
                const doughnut = new Chart(ctx, {
                    type: 'doughnut',
                    data: chartData,
                    options: {
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        onClick: function(event, elements) {
                            if (elements.length > 0) {
                                const activeElement = elements[0];
                                const label = this.data.labels[activeElement.index];
                                const user = userData.user;
                                const cek = document.getElementById('cek');
                                const tabDone = document.getElementById('list-done-tab');
                                const tabdoing = document.getElementById('list-doing-tab');
                                const tabtodo = document.getElementById('list-todo-tab');
                                const kategori = document.getElementById('kategoriSelect');

                                kategori.value = user.id;
                                kategori.dispatchEvent(new Event('change'));
                                if (label === 'Todo') {
                                    tabtodo.click();
                                } else if (label === 'Doing') {
                                    tabdoing.click();
                                } else if (label === 'Done') {
                                    tabDone.click();
                                };
                                window.location.href = '#todoCont';
                            }
                        }
                    }

                });

            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
</script>
<script>
    const buttonView = document.getElementById('viewAll');
    let isDonutVisible = true;

    buttonView.addEventListener('click', function() {
        const containerAllDonut = document.getElementById('container-all-donut');
        const containerSlider = document.getElementById('container-owl-slide');


        if (isDonutVisible) {
            containerAllDonut.style.display = 'block';
            containerSlider.style.display = 'none';
            buttonView.textContent = 'View Less';
        } else {
            containerAllDonut.style.display = 'none';
            containerSlider.style.display = 'block';
            buttonView.textContent = 'View All';
        }

        isDonutVisible = !isDonutVisible;
    });
</script>
<script>
    const kategoriIdSelect = document.getElementById('kategoriSelect');
    let idKategori = kategoriIdSelect.value;

    kategoriIdSelect.addEventListener('change', function() {
        idKategori = this.value;
    });

    const reportButton = document.getElementById('reportUserButton');
    reportButton.addEventListener('click', function() {
        const today = new Date();
        const firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
        const lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
        const startDate = formatDate(firstDayOfMonth);
        const endDate = formatDate(lastDayOfMonth);
        window.location = '/todos/pointUser/' + idKategori + '/' + startDate + '/' + endDate;
    });

    function formatDate(date) {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        const day = date.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
</script>
