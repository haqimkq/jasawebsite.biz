<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <!-- Link the CSS file here if needed -->
</head>

<body>
    <div class="bg-gray-200 border mx-auto mt-10">
        <table style="width: 100%;">
            <tr>
                <td style="width:100%; height: 10px" rowspan="2">
                    <img src="data:image/png;base64, {{ $file_path }}" class="object-cover" height="80"
                        alt="">
                </td>
                <td style="width: auto; white-space: nowrap">
                    <h5
                        style="text-align: right; text-transform: uppercase; font-weight: bold; background-color: #2aa383; color: white; padding: 2px 8px; margin: 3px;font-size: 20px">
                        {{ $nomor_invoice }}
                    </h5>
                    <p style="text-align: right; margin: 3px">Bill Date: {{ $bill_date }}</p>
                    <p style="text-align: right; margin: 3px">Due Date: {{ $due_date }}</p>
                </td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td style="width: 100%">
                    <p style="font-size: 18px; font-weight: bold; margin: 5px">Jasawebsite.biz</p>
                    <p style="margin: 5px">Komplek Sapta Taruna PU B1 No. 10</p>
                    <p style="margin: 5px">Bandung, Jawa Barat - Indonesia</p>
                    <p style="margin: 5px">email: info@jasawebsite.biz</p>
                </td>

                <td style="white-space: nowrap;">
                    <p style="margin: 5px">Bill To:</p>
                    <p style="margin: 5px">{{ $nama_penerima }} </p>
                    <p style="margin: 5px">{{ $nama_perusahaan }} </p>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #2aa383; color: white; text-align: center; text-transform: capitalize;">
                    <th style="font-weight: normal; border: 1px solid #ccc; padding: 10px;">item</th>
                    <th style="font-weight: normal; border: 1px solid #ccc; padding: 10px;">Quantity</th>
                    <th style="font-weight: normal; border: 1px solid #ccc; padding: 10px;">Rate</th>
                    <th style="font-weight: normal; border: 1px solid #ccc; padding: 10px;">Total</th>
                </tr>
            </thead>
            <tbody style="background-color: #f4f4f4;">
                @php
                    $totalPriceAllItems = 0;
                @endphp
                @foreach ($item as $items)
                    <tr style="text-align: center;">
                        <td style="border: 1px solid #ccc; padding: 10px;">{{ htmlspecialchars($items['name']) }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px;">{{ htmlspecialchars($items['qty']) }}
                        </td>
                        <td style="border: 1px solid #ccc; padding: 10px;text-align: right">Rp.
                            {{ number_format($items['price'], 0, ',', '.') }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px;text-align: right">Rp.
                            {{ number_format($items['price'] * $items['qty'], 0, ',', '.') }}
                        </td>
                        @php
                            $totalPriceAllItems += $items['price'] * $items['qty'];
                        @endphp
                    </tr>
                @endforeach
                <tr style="text-align: right;">
                    <td colspan="3" style="background-color: white; border: none; padding: 10px;">
                        Total</td>
                    <td style="border: 1px solid #ccc; padding: 10px;">Rp.
                        {{ number_format($totalPriceAllItems, 0, ',', '.') }}
                    </td>
                </tr>
                <tr style="text-align: right;">
                    <td colspan="3" style="background-color: white; border: none; padding: 10px;">
                        Balance Due</td>
                    <td style="background-color: #2aa383; color: white; border: 1px solid #ccc; padding: 10px;">Rp.
                        {{ number_format($totalPriceAllItems, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 20px; padding: 0 20px;">
            <p style="margin: 5px">Petunjuk Pembayaran</p>
            <p style="margin: 5px">Lewat Paypal</p>
            <p style="margin: 5px">Kirim Pembayaran Kepada: <span
                    style="font-weight: bold;">Salsabilayugo@gmail.com</span></p>
            <p style="margin: 5px">Transfer Bank</p>
            <p style="margin: 5px">BCA <span style="font-weight: bold;">3371952118</span> a.n Heru Yugo Prasetyo</p>
        </div>
        <div style="margin: 20px 20px 0; text-align: right;">
            <p style="margin-bottom: 60px">Tertanda,</p>
            <p>Jasawebsite.biz</p>
        </div>
    </div>
</body>

</html>

{{-- <x-app-layout>

    <a class="bg-blue-400" href="{{ URL::to('/pdf/download') }}">Export to PDF</a>
    <div style="width: 595px;height: 842px;" class=" bg-gray-200 border mx-auto mt-10">
        <div class="flex justify-between m-5">
            <img src="{{ asset('storage/images/logo/logo.png') }}" class="object-cover w-20 " alt="">
            <div>
                <h5 class=" text-end uppercase font-extrabold text-white bg-[#2aa383] px-2">Code Invoice
                </h5>
                <p class="text-xs text-end">Bill Date: DD-MM-YYYY</p>
                <p class="text-xs text-end">Due Date: DD-MM-YYYY</p>
            </div>
        </div>
        <div class="mx-5 my-7 flex justify-between">
            <div class="">
                <p class="text-lg font-semibold">Jasawebsite.biz</p>
                <p class="text-sm leading-4 tracking-wide">Komplek Sapta Taruna PU B1 No. 10</p>
                <p class="text-sm leading-4 tracking-wide">Bandung, Jawa Barat - Indonesia</p>
                <p class="text-sm leading-4 tracking-wide">email : info@jasawebsite.biz</p>
            </div>
            <div>
                <p class="text-sm">Bill To :</p>
                <p class="text-sm">Nama Penerima Nama Pt</p>
            </div>
        </div>
        <div class="w-full px-5">
            <table class="table-auto w-full">
                <thead class="bg-emerald-600 text-center capitalize">
                    <tr>
                        <th class="font-thin text-white border-r">item</th>
                        <th class="font-thin text-white border-r ">Quantity</th>
                        <th class="font-thin text-white border-r ">Rate</th>
                        <th class="font-thin text-white border-r ">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-300">
                    <tr>
                        <td class="text-sm border-r border-b px-1">SEO Bulanan</td>
                        <td class="text-sm border-r border-b text-center px-1">1</td>
                        <td class="text-sm border-r border-b text-right px-1">Rp. 2.500.000</td>
                        <td class="text-sm border-r border-b text-right px-1">Rp. 2.500.000</td>
                    </tr>
                    <tr>
                        <td class="text-sm border-r border-b px-1">SEO Bulanan</td>
                        <td class="text-sm border-r border-b text-center px-1">1</td>
                        <td class="text-sm border-r border-b text-right px-1">Rp. 2.500.000</td>
                        <td class="text-sm border-r border-b text-right px-1">Rp. 2.500.000</td>
                    </tr>
                    <tr>
                        <td class="text-sm border-r border-b px-1">SEO Bulanan</td>
                        <td class="text-sm border-r border-b text-center px-1">1</td>
                        <td class="text-sm border-r border-b text-right px-1">Rp. 2.500.000</td>
                        <td class="text-sm border-r border-b text-right px-1">Rp. 2.500.000</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="bg-gray-200 text-sm border-r border-b text-end px-1">Total</td>
                        <td class="text-sm border-r border-b text-end px-1">Rp. 7.500.000</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="bg-gray-200 text-sm border-r border-b text-end px-1">Balance Due
                        </td>
                        <td class="text-sm border-r border-b text-end px-1 bg-emerald-600 text-white">Rp. 7.500.000
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mx-5 my-5 text-sm leading-4">
            <p>Petunjuk Pembayaran</p>
            <p>Lewat Paypal</p>
            <p>Kirim Pembayaran Kepada: <span class="font-extrabold">Salsabilayugo@gmail.com</span></p>
            <p>Transfer Bank</p>
            <p>BCA <span class="font-extrabold">3371952118 </span> a.n Heru Yugo Prasetyo</p>
        </div>
        <div class="mx-5 text-sm mt-5">
            <p class="mb-14">Tertanda,</p>
            <p>Jasawebsite.biz</p>
        </div>
    </div>
</x-app-layout> --}}
