<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Save Nature Foundation')
<img src="https://www.snf4.org/frontend_assets/images/logo.png" class="logo" alt="Save Nature Foundation Logo" style="width:235px;">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
