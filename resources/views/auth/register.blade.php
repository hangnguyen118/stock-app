<div>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" placeholder="username">
    <input type="text" placeholder="email">
    <input type="text" placeholder="password">
    <button type="submit">Đăng ký</button>
</form>
</div>
