<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #ffffff;
    }
    .container {
      width: 900px;
      display: flex;
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }
    .left {
      flex: 1;
      padding: 50px 45px;
    }
    .left img.logo {
      width: 90px;
      display: block;
      margin: auto;
      margin-bottom: 20px;
    }
    .left h2 {
      font-size: 28px;
      text-align: center;
      margin-bottom: 10px;
    }
    .left p {
      text-align: center;
      color: #777;
      margin-bottom: 25px;
    }
    .google-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      background: white;
      border: 1px solid #ccc;
      color: #555;
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
      margin-bottom: 25px;
      font-size: 14px;
      gap: 8px;
      transition: 0.2s;
    }
    .google-btn:hover {
      background: #f7f7f7;
    }
    .form-group {
      margin-bottom: 15px;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .btn {
      background: #f4a024;
      color: white;
      padding: 12px;
      width: 100%;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
    }
    .remember {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      margin: 10px 0;
    }
    .remember label {
      display: flex;
      align-items: center;
    }
    .remember input[type="checkbox"] {
      margin-right: 6px;
    }
    .bottom-text {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }
    .bottom-text a {
      color: #f4a024;
      text-decoration: none;
    }
    .right {
      flex: 1;
    }
    .right img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .error {
      background: #ffdddd;
      padding: 10px;
      border-left: 4px solid red;
      margin-bottom: 10px;
      border-radius: 6px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="left">
    <h2>Selamat Datang👋</h2>
    <p>Masuk ke akunmu untuk melanjutkan.</p>

    <div class="google-btn">
      <img src="https://img.icons8.com/color/20/google-logo.png" alt="Google Logo">
      Masuk dengan Google
    </div>

    @if(session('error'))
      <div class="error">{{ session('error') }}</div>
    @endif

    <form action="/login" method="POST">
      @csrf

      <div class="form-group">
        <input type="email" name="email" placeholder="Alamat email" required>
      </div>

      <div class="form-group">
        <input type="password" name="password" placeholder="Kata sandi" required>
      </div>

      <div class="remember">
        <label>
          <input type="checkbox" name="remember"> Ingat saya
        </label>
        <a href="#">Lupa kata sandi?</a>
      </div>

      <button class="btn" type="submit">Masuk</button>

    </form>
  </div>

  <div class="right">
    <img src="{{ asset('images/Perkebunan Kelapa Sawit.jpeg') }}" alt="Background Image">
  </div>
</div>

</body>
</html>
