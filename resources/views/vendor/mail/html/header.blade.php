<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Vamble')
                <img src="{{ asset('/logo.png') }}" class="logo" alt="Vamble Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
