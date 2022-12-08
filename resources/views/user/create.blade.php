<h1>Create User</h1>

<form action="/user/store" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="text" name="password" placeholder="Password"><br>
    <input type="submit" name ="submit" value="Save">
</form>