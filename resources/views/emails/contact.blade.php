@component('mail::message')
    - **Details**:
    - **First Name**: {{ $data->first_name }}
    - **Last Name**: {{ $data->last_name }}
    - **Email**: {{ $data->email }}
    - **Phone no.**: {{ $data->phone }}
    - **Message**: {{ $data->message }}
@endcomponent
