<h1>Edit Data</h1>

<form action="/user/{{$user->id}}" method="GET">
    @csrf
    <input type="text" name="name" placeholder="Nama" value="{{$user->name}}"><br>
    <input type="text" name="email" placeholder="Email" value="{{$user->email}}"><br>
    <input type="text" name="password" placeholder="Password" value="{{$user->password}}"><br>
    <input type="submit" name ="submit" value="Update">
</form>