<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
                <img src="{{ asset('backend/images/logo.png') }}" style="width: 200px;" class="logo"
                    alt="jjc logo">
            @endif
        </a>
    </td>
</tr>
