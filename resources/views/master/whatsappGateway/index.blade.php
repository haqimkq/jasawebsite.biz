<x-app-layout>

    <div class="p-3 pl-10">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700 flex justify-between">
            <ul class="flex flex-wrap justify-between -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Chat
                        Message</button>
                </li>
                {{-- <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">Dashboard</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                        aria-controls="settings" aria-selected="false">Settings</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                        aria-controls="contacts" aria-selected="false">Contacts</button>
                </li> --}}
            </ul>
            <li class="flex items-center justify-center text-white">
                <p>Credits : {{ $credits->credit }} $</p>
            </li>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <div class="grid grid-cols-3 gap-3">
                    @foreach ($messages as $item)
                        @if ($item->number !== 6281223410886)
                            <div class="item">
                                <div class="w-full p-2 flex justify-between bg-gray-600 text-white rounded-t-lg">
                                    <p>
                                        {{ $item->number }}
                                    </p>
                                    <svg class="fill-current h-6 w-6 text-red-500 close-button"
                                        data-target="{{ $loop->index + 1 }}" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </div>
                                <div class="w-full border p-3 rounded-b-lg bg-[#e9e6e3] h-[70vh] overflow-y-scroll">
                                    <ul class="ml-3 space-y-2">
                                        @foreach ($item->messages as $items)
                                            @if ($items->type == 'IN')
                                                <li class="text-start flex justify-start">
                                                    <div class="w-[80%] flex justify-start">
                                                        <p class="rounded-xl border inline-block p-3 text-black bg-white text-start"
                                                            style="overflow-wrap: anywhere">
                                                            {{ $items->text }}
                                                        </p>
                                                    </div>
                                                </li>
                                            @else
                                                <li class="text-end flex justify-end">
                                                    <div class="w-[80%] flex justify-end">
                                                        <p class="rounded-xl border inline-block p-3 bg-[#dcf8c6] text-black text-start"
                                                            style="overflow-wrap: anywhere">
                                                            {{ $items->text }}
                                                        </p>
                                                    </div>

                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            {{-- <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                    Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                    classes to control the content visibility and styling.</p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                aria-labelledby="settings-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                    Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                    classes to control the content visibility and styling.</p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                aria-labelledby="contacts-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                        class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                    Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                    classes to control the content visibility and styling.</p>
            </div> --}}
        </div>
    </div>




</x-app-layout>
<script>
    $(document).ready(function() {
        $('.close-button').click(function() {
            $(this).closest('.item').remove();
        });
    });
    // $(document).ready(function() {
    //     $('.close-button').click(function() {
    //         var target = $(this).data('target');

    //         $('.item:eq(' + target + ')').remove();
    //     });
    // });
</script>
