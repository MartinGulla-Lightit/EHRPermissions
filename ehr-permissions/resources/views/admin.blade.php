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
                        <td>{{ $request->ehr_id }}</td>
                        <td>{{ $request->name }}</td>
                        <td>{{ $request->email }}</td>
                        <td>
                            <form action="/accept" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ $request->email }}">
                                <input type="hidden" name="ehrId" value="{{ $request->ehr_id }}">
                                <input type="hidden" name="name" value="{{ $request->name }}">
                                <input type="submit" value="Accept">
                            </form>
                            <form action="/reject" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ $request->email }}">
                                <input type="submit" value="Reject">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</html>
