
<!DOCTYPE html>
<html lang="eng">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
      <style>
          @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700");

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body{
  overflow:hidden;
  background-color: #f4f6ff;
}

.container{
  width:100vw;
  height:100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: "Poppins", sans-serif;
  position: relative;
  left:6vmin;
  text-align: center;
}

.cog-wheel1, .cog-wheel2{
  transform:scale(0.7);
}

.cog1, .cog2{
  width:40vmin;
  height:40vmin;
  border-radius:50%;
  border:6vmin solid #f3c623;
  position: relative;
}


.cog2{
  border:6vmin solid #4f8a8b;
}

.top, .down, .left, .right, .left-top, .left-down, .right-top, .right-down{
  width:10vmin;
  height:10vmin;
  background-color: #f3c623;
  position: absolute;
}

.cog2 .top,.cog2  .down,.cog2  .left,.cog2  .right,.cog2  .left-top,.cog2  .left-down,.cog2  .right-top,.cog2  .right-down{
  background-color: #4f8a8b;
}

.top{
  top:-14vmin;
  left:9vmin;
}

.down{
  bottom:-14vmin;
  left:9vmin;
}

.left{
  left:-14vmin;
  top:9vmin;
}

.right{
  right:-14vmin;
  top:9vmin;
}

.left-top{
  transform:rotateZ(-45deg);
  left:-8vmin;
  top:-8vmin;
}

.left-down{
  transform:rotateZ(45deg);
  left:-8vmin;
  top:25vmin;
}

.right-top{
  transform:rotateZ(45deg);
  right:-8vmin;
  top:-8vmin;
}

.right-down{
  transform:rotateZ(-45deg);
  right:-8vmin;
  top:25vmin;
}

.cog2{
  position: relative;
  left:-10.2vmin;
  bottom:10vmin;
}

h1{
  color:#142833;
}

.first-four{
  position: relative;
  left:6vmin;
  font-size:40vmin;
}

.second-four{
  position: relative;
  right:18vmin;
  z-index: -1;
  font-size:40vmin;
}

.wrong-para{
  font-family: "Montserrat", sans-serif;
  position: absolute;
  bottom:15vmin;
  padding:3vmin 12vmin 3vmin 3vmin;
  font-weight:600;
  color:#092532;
}

.link {
    text-decoration: none;
    font-weight: 600;
    color: #000000;

}
</style>
  
</head>

<body>

<div class="container">
  <h1 class="first-four">4</h1>
  <div class="cog-wheel1">
      <div class="cog1">
        <div class="top"></div>
        <div class="down"></div>
        <div class="left-top"></div>
        <div class="left-down"></div>
        <div class="right-top"></div>
        <div class="right-down"></div>
        <div class="left"></div>
        <div class="right"></div>
    </div>
  </div>
  
  <div class="cog-wheel2"> 
    <div class="cog2">
        <div class="top"></div>
        <div class="down"></div>
        <div class="left-top"></div>
        <div class="left-down"></div>
        <div class="right-top"></div>
        <div class="right-down"></div>
        <div class="left"></div>
        <div class="right"></div>
    </div>
  </div>
 <h1 class="second-four">4</h1>
  <p class="wrong-para">Uh Oh! Page not found! &nbsp;     <a class="link btn btn-info text-white" href="<?=base_url('/')?>">Go Home</a></p>
  <br/>
 
</div>

   
</body>
   
  
</html>