@component('mail::message')
# {{ $message }}! ✔️ Deleted Temp Images.

Temporary images in the "/tmp/uploads/cars" directory have been deleted. 🎉

- Files Deleted Successfully: {{ $filesDeletedSuccessfully }}
- Files Failed to Delete: {{ $filesFailedToDelete }}

No more junk 🙌

@component('mail::button', ['url' => config('app.url'), 'color' => 'primary'])
Go to Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent