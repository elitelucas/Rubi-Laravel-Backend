<x-mail::message>
# Invitation

Hi, {{ $invited }}

You've been invited to join the workspace {{ $workspace }} on Rubi.

<x-mail::button :url="$url">
Join Workspace
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
