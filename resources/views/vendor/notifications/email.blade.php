@component('mail::message')
{{-- Saludos --}}
<h2>Hola</h2>

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Cierre --}}
Saludos,<br>{{ config('app.name') }}

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Si tiene problemas con el botón \":actionText\", copia y pega la siguiente URL\n".
    'en la barra de tu navegador: [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@endcomponent