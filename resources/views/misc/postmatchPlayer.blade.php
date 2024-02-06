<style>
body{
    background-color: #282828;
}

.container{
    padding-top: 20px;
}

.heading1{
    color:black;
    font-size: 70px;
    font-weight: bold;
    padding-top:20px;
    margin-left:-15px
}

.span1{
    font-size: 40px;
}

.rowcard{
    padding-top: 10px;
}

.colcard{
background-image: linear-gradient( #8cb736 , #4d7810);
padding-left:-15px;
padding-right:-15px;
text-align: center;
padding-bottom: 15px;

}

.img1{
    height:200px;
    width:200px;
    margin-top:25%;
    margin-bottom: 10%;
    position: relative;
}
.img2{
    height:300px;
    width:200px;
    position: absolute;
    left:11%;
    top:165px;
}
.img3{
    height:200px;
    width:200px;
    margin-top:25%;
    margin-bottom: 10%;
    position: relative;
}
.img4{
    height:300px;
    width:200px;
    position: absolute;
    right:11%;
    top:165px;
}

.rowresult{
    background-color: #4d7810;
}
.colresult{
    margin-top: 10px;
}
.colrowcol1{
    font-size: 25px;
    font-weight: bold;
    text-align: center;
    border-right:5px solid #282828;
    border-bottom:5px solid #282828;
    padding: 5px;
}
.colrowcol2{
    color:white;
    font-size: 25px;
    font-weight: bold;
    text-align: center;
    border-right:5px solid #282828;
    border-bottom:5px solid #282828;
    padding: 5px;
}

.colrowcol3{
    font-size: 25px;
    font-weight: bold;
    text-align: center;
    padding: 5px;
    border-bottom:5px solid #282828;
}

.colcard1{
    height:50px;
    background-image: linear-gradient( #8cb736 , #4d7810);
    color: #8cb736 ;
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    padding-top: 5px;
}
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
    crossorigin="anonymous"
  />
    <!-- <link rel="stylesheet" href="/style/postmatch.css"> -->
    <title>POST MATCH PLAYER</title>
</head>
<body>
        <div class="container">
            <h1 class="heading1">HEAD TO HEAD <span class="span1">POST MATCH 1</span></h1>
                <div class="row rowcard">
                    <div class="col-md-3 col-lg-3 colcard">
                        <img src="/images/009.png" alt="" class="img1">  
                        <img src="/images/Momba.png" alt="" class="img2">  
                    </div>
                    
                    <div class="col-md-6 col-lg-6 colresult">
                        <div class="row rowresult">
                            <div class="col-md-3 col-lg-3 colrowcol1">1000</div>
                            <div class="col-md-6 col-lg-6 colrowcol2">DMG DEALT</div>
                            <div class="col-md-3 col-lg-3 colrowcol3">1000</div>
                        </div>
                        <div class="row rowresult">
                            <div class="col-md-3 col-lg-3 colrowcol1">1000</div>
                            <div class="col-md-6 col-lg-6 colrowcol2">DMG RECEIVED</div>
                            <div class="col-md-3 col-lg-3 colrowcol3">1000</div>
                        </div>
                        <div class="row rowresult">
                            <div class="col-md-3 col-lg-3 colrowcol1">1000</div>
                            <div class="col-md-6 col-lg-6 colrowcol2">ELIMS</div>
                            <div class="col-md-3 col-lg-3 colrowcol3">1000</div>
                        </div>
                        <div class="row rowresult">
                            <div class="col-md-3 col-lg-3 colrowcol1">1000</div>
                            <div class="col-md-6 col-lg-6 colrowcol2">KNOCKS</div>
                            <div class="col-md-3 col-lg-3 colrowcol3">1000</div>
                        </div>
                        <div class="row rowresult">
                            <div class="col-md-3 col-lg-3 colrowcol1">20:00</div>
                            <div class="col-md-6 col-lg-6 colrowcol2">AVG SURVIVAL</div>
                            <div class="col-md-3 col-lg-3 colrowcol3">20:00</div>
                        </div>
                        <div class="row rowresult">
                            <div class="col-md-3 col-lg-3 colrowcol1">10000</div>
                            <div class="col-md-6 col-lg-6 colrowcol2">TOTAL POINT</div>
                            <div class="col-md-3 col-lg-3 colrowcol3">10000</div>
                        </div>
                    </div>
        
        
                    <div class="col-md-3 col-lg-3 colcard">
                    <img src="/images/005.png" alt="" class="img3">                        
                    <img src="/images/Madcat.png" alt="" class="img4">  


                    </div>
                </div>
                <div class="row rowcard1">
                    <div class="col-md-3 col-lg-3 colcard1">PLAYER NAME</div>
                    <div class="col-md-6 col-lg-6"></div>
                    <div class="col-md-3 col-lg-3 colcard1">PLAYER NAME</div>
                </div>
        
        </div>
</body>
</html>


