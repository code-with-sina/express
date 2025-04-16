<x-mail::message>
Hi {{ $name }},

<br>

Commission Reward <br>
Amount: ₦{{ $amount }} <br>

Account Name:    {{ $accountName }}   <br>
Account Number: {{ $accountNumber }} <br>
bank: {{ $bank }} <br>

Your affiliated commission of ₦{{ $amount }} has been approved and your money is on it's way. For any enquiries, Please feel free to contact us. Keep making progress, refer more people and  earn more!



Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
