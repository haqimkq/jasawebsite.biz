<x-app-layout>
    @if ($order->payment_status == 1)
        <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
    @else
        Pembayaran berhasil
    @endif
</x-app-layout>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                console.log(result)
            },
            onPending: function(result) {
                console.log(result)
            },
            onError: function(result) {
                console.log(result)
            }
        });
    });
</script>
