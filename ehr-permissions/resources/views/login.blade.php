<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <div>
        <h1>Log in into admin portal</h1>
        <form method="POST" action="/login">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <button type="submit">Log in</button>
            </div>
        </form>
    </div>
</html>
