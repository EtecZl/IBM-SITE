<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css">
<style>
    * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: sans-serif;
  background: #C1908B;
}

.container {
  max-width: 75%;
  margin: auto;
  height: 80vh;
  margin-top: 5%;
  background: white;
  box-shadow: 5px 5px 10px 3px rgba(0, 0, 0, 0.3);
}

.left, .right {
  width: 50%;
  padding: 30px;
}

.flex {
  display: flex;
  justify-content: space-between;
}

.flex1 {
  display: flex;
}

.main_image {
  width: auto;
  height: auto;
}

.option img {
  width: 75px;
  height: 75px;
  padding: 10px;
}

.right {
  padding: 50px 100px 50px 50px;
}

h3 {
  color: #af827d;
  margin: 20px 0 20px 0;
  font-size: 25px;
}

h5,
p,
small {
  color: #837D7C;
}

h4 {
  color: red;
}

p {
  margin: 20px 0 50px 0;
  line-height: 25px;
}

h5 {
  font-size: 15px;
}

label,
.add span,
.color span {
  width: 25px;
  height: 25px;
  background: #000;
  border-radius: 50%;
  margin: 20px 10px 20px 0;
}

.color span:nth-child(2) {
  background: #EDEDED;
}

.color span:nth-child(3) {
  background: #D5D6D8;
}

.color span:nth-child(4) {
  background: #EFE0DE;
}

.color span:nth-child(5) {
  background: #AB8ED1;
}

.color span:nth-child(6) {
  background: #F04D44;
}

.add label,
.add span {
  background: none;
  border: 1px solid #C1908B;
  color: #C1908B;
  text-align: center;
  line-height: 25px;
}

.add label {
  padding: 10px 30px 0 20px;
  border-radius: 50px;
  line-height: 0;
}

button {
  width: 100%;
  padding: 10px;
  border: none;
  outline: none;
  background: #C1908B;
  color: white;
  margin-top: 20%;
  border-radius: 30px;
}

@media only screen and (max-width:768px) {
  .container {
    max-width: 90%;
    margin: auto;
    height: auto;
  }

  .left, .right {
    width: 100%;
  }

  .container {
    flex-direction: column;
  }
}

@media only screen and (max-width:511px) {
  .container {
    max-width: 100%;
    height: auto;
    padding: 10px;
  }

  .left, .right {
    padding: 0;
  }

  img {
    width: 100%;
    height: 100%;
  }

  .option {
    display: flex;
    flex-wrap: wrap;
  }
}
</style>

</head>

<body>
  <section>
    <div class="container flex">
      <div class="left">
        <div class="main_image">
          <img src="image/p1.jpg" class="slide">
        </div>
        <div class="option flex">
          <img src="image/p1.jpg" onclick="img('image/p1.jpg')">
          <img src="image/p2.jpg" onclick="img('image/p2.jpg')">
          <img src="image/p3.jpg" onclick="img('image/p3.jpg')">
          <img src="image/p4.jpg" onclick="img('image/p4.jpg')">
          <img src="image/p5.jpg" onclick="img('image/p5.jpg')">
          <img src="image/p6.jpg" onclick="img('image/p6.jpg')">
        </div>
      </div>
      <div class="right">
        <h3>Beats Solo3 Wireless</h3>
        <h4> <small>$</small>999.99 </h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        <h5>Color-Rose Gold</h5>
        <div class="color flex1">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <h5>Number</h5>
        <div class="add flex1">
          <span>-</span>
          <label>1</label>
          <span>+</span>
        </div>

        <button>Add to Bag</button>
      </div>
    </div>
  </section>
  <script>
    function img(anything) {
      document.querySelector('.slide').src = anything;
    }

    function change(change) {
      const line = document.querySelector('.home');
      line.style.background = change;
    }
  </script>
</body>

</html>