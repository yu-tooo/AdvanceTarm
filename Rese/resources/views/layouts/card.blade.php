<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
  <link rel="stylesheet" href="css/reset.css" />
</head>
<style>
  body {
    background-color: #f2f2f2;
  }
  .menu-btn {
  position: fixed;
  top: 20px;
  left: 5%;
  display: flex;
  height: 40px;
  width: 40px;
  justify-content: center;
  align-items: center;
  z-index: 90;
  background-color: #0055e8;
  border-radius: 5px;
  box-shadow: 1px 1px 2px;
  cursor: pointer;
}

.menu-btn span,
.menu-btn span:before,
.menu-btn span:after {
  content: '';
  display: block;
  height: 1px;
  width: 50%;
  border-radius: 3px;
  background-color: #fff;
  position: absolute;
  transition: all 300ms 0s ease;
}

.menu-btn span:before {
  bottom: 8px;
}

.menu-btn span:after {
  top: 8px;
}

#menu-btn-check {
  display: none;
}

#menu-btn-check:checked~.menu-btn span {
  background-color: rgba(255, 255, 255, 0);
  transition: all 300ms 0s ease;
}

#menu-btn-check:checked~.menu-btn span::before {
  bottom: 0;
  width: 100%;
  transform: rotate(45deg);
  background-color: #fff;
  transition: all 300ms 0s ease;
}

#menu-btn-check:checked~.menu-btn span::after {
  top: 0;
  width: 100%;
  transform: rotate(-45deg);
  background-color: #fff;
  transition: all 300ms 0s ease;
}

.menu-content {
  width: 100%;
  height: 100%;
  text-align: center;
  position: fixed;
  top: 0;
  top: -100%;
  z-index: 80;
  background-color: white;
  color: #222;
  transition: all 500ms 0s ease;
}

#menu-btn-check:checked~.menu-content {
  top: 0;
}

.menu-content ul {
  padding: 150px 10px 0;
}

.menu-content ul li {
  list-style: none;
}

.menu-content ul li button {
  display: block;
  margin: 0 auto;
  background-color: #fff;
  border: none;
  outline: none;
  font-size: 28px;
  color: #0055e8;
  box-sizing: border-box;
  padding: 9px 15px 10px 0;
  position: relative;
  cursor: pointer;
}

.logo {
  position: fixed;
  top: 20px;
  left: 10%;
}
.logo a {
  text-decoration: none;
  font-size: 28px;
  font-weight: bold;
  color: #0055e8;
}
.card {
  margin: 100px auto;
  width: 30%;
  text-align: center;
  background-color: white;
  padding: 50px 20px;
  box-shadow: 1px 1px 2px;
}
.card h2 {
  font-size: 20px;
  margin-bottom: 25px;
}
.card button {
  background-color: #0055e8;
  color: white;
  font-size: 12px;
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  box-shadow: 1px 1px #000;
  cursor: pointer;
}
</style>
<body>
  <header>
    @yield('header')
  </header>
  <div class="card">
    @yield('content')
  </div>
</body>
</html>