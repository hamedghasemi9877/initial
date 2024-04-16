<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Network</title>
        <script src="https://kit.fontawesome.com/3929e16ef5.js" crossorigin="anonymous"></script>
        <script src="{% static 'network/functions.js' %}"></script>
        <style>
            .h_container{
    background-color: #cac7c7;
    border-radius: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,.1);
    display: inline-block;
    width:35px;
    height:35px;
    text-align:center;
    line-height:45px;

}
#heart{
    font-size: 25px;
}
#heart:hover{
    color:red;
}
        </style>
    </head>
    <body>

      <div class="h_container">
            <i id="heart" class="far fa-heart"></i>
      </div>
    </body>
</html>