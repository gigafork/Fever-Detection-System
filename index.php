
    <?php 
                  
    header('Refresh: 5'); 
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <meta name="Vikkey" content="Vivek Gupta & IoTMonk"> -->
    <meta name="author" content="Soumya Spectrum CET" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <!-- <meta http-equiv="refresh" content="10"> -->

    <!-- If you are opening this page from local machine, uncomment belwo line -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">
      document.write(
        [
          "\<script src='",
          "https:" == document.location.protocol ? "https://" : "http://",
          "ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js' type='text/javascript'>\<\/script>",
        ].join("")
      );
    </script>
    <title>Fever Detection</title>
    <style>
      .footer {
        background: #64b5f6;
        width: 100%;
        height: 100px;
        position: absolute;
        bottom: 0;
        left: 0;
      }

      .center {
        height: 400px;
        width: 400px;
        background: #E7D2CC;
        position: fixed;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
          0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 20% 0 20% 0;
        top: 50%;
        left: 50%;
        margin-top: -180px;
        margin-left: -200px;
      }

      .form {
        padding-top: 10px;
        padding-right: 30px;
        padding-bottom: 50px;
        padding-left: 30px;
      }
      .ip {
        background-color: #ffffff; /* Green */
        border: none;
        color: black;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s; /* Safari */
      }
    </style>
  </head>
  <body
    style="
      background: url('https://c4.wallpaperflare.com/wallpaper/542/50/545/simple-background-blue-simple-minimalism-wallpaper-preview.jpg');
      background-size: cover;
    "
  >
    <center>
      <h1 style="font-family: Helvetica; color: white">Fever Detection System</h1>
      <a href="download.php"><h2 style="color: white">Download Data</h2></a>
    </center>
    <div class="center">
      <div align="center" class="form">
        <br /><br />
        <!-- <p
          style="font-family: Helvetica; color: #fff; font-size: 30px"
          id="temperature"
        > -->
        <h2 style="margin-top:-20px; margin-button:2px border:2px solid black;     border: 1px solid #a19f9f;
    background: wheat;
    border-radius: 20px;
    width: 60%;
    height: 30px;" >
       <?php
       
     $servername ="18.217.222.254";
                  $username = "admin_spectrum";
                  $password= "spectrumcet@mysql";
                  $database ="admin_default";
                  $conn = mysqli_connect($servername, $username , $password, $database);
                  if(!$conn){
                      die("Sorry we failed to Connect: ".mysqli_connect_error());
                  }

                  $sql ="SELECT * FROM `data2` ORDER BY id DESC LIMIT 1 ";
                  $result= mysqli_query($conn , $sql);
                  
                  while ($row = mysqli_fetch_assoc($result)){
                    echo $row['prediction'];
                    }
                  ?>
      </h2>
          <img src="2.png" height="100px" width="100px" />
          <h3> Object Temperature:
          <?php
                 

                  $sql ="SELECT * FROM `data2` ORDER BY id DESC LIMIT 1 ";
                  $result= mysqli_query($conn , $sql);
                  
                  while ($row = mysqli_fetch_assoc($result)){
                    echo $row['temp'];
                    }
                  ?> degree</h3>


          <img src="1.png " height="100px" width="100px" />
          <h3>Ambient Temperature: <?php
           $sql = "SELECT * FROM `data2` ORDER BY id DESC LIMIT 1 ";
                  $result= mysqli_query($conn , $sql);
          while ($row = mysqli_fetch_assoc($result)){
                    echo $row['hum'];
                    }
          ?> degree </h3>
        </p>
      </div>
    </div>
    <footer class="footer">
      <center>
        <h4 style="font-family: Helvetica; color: white">
          &copy; 2021 |
          By- Ashutosh Mohanty |
          Debaditya Mohanty |
          Akramul Haque |
          Saheen Jasmine
        </h4>
      </center>
    </footer>
  </body>

<!--  <script>
    window.onload = function () {
      loaddata();
    };
    function loaddata() {
      var url = "https://spectrumcet.com/speeddett/read_all.php";
      $.getJSON(url, function (data) {
        var val = data;
        var humid =
          data["weather"][Object.keys(data["weather"]).length - 1]["hum"];
        var temper =
          data["weather"][Object.keys(data["weather"]).length - 1]["temp"];
        document.getElementById("temperature").innerHTML =
          "<img src = '2.png' height=\"80px\" width=\"80px\" style='border-radius:50%;'/> <br> " +
          temper +
          " kmph";
        document.getElementById("humidity").innerHTML =
          "<img src = '1.png' height=\"80px\" width=\"80px\" style='border-radius:50%;' /> <br> " +
          humid;
        console.log(
          data["weather"][Object.keys(data["weather"]).length - 1]["temp"]
        );
      });
    }
    window.setInterval(function () {
      loaddata();
    }, 5000);
  </script> -->
</html>

