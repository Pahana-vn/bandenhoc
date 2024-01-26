<x-mail::message>
<div >
 From {{ $domain}},
<br><br>
</div>
<div >
 {{$message}}
</div>
Thanks,<br>
{{-- {{ config('app.name') }} --}}
</x-mail::message>
