<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'DMRS')
<img src="#" class="logo" alt="DMRS Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
