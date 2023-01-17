<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <div>
        {{ $user->name }}
        {{ $user->patient_id }}
    </div>
</html>
