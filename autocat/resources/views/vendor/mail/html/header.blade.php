<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Autocat')
            <img src="autocat\public\assets\images\autoCatLogo\autoCatLogo_verticaal.png" class="logo"
                alt="Autocat Logo">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>