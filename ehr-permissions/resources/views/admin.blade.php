<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <div>
        <h1>Admin portal</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $request->doctor_id ?? $request->patient_id }}</td>
                        <td>{{ $request->name }}</td>
                        <td>{{ $request->email }}</td>
                        <td>
                            <a>Accept</a>
                            <a>Reject</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</html>
