<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="theme-color" content="#000000">
<link rel="shortcut icon" type="image/png" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/329180/firework-burst-icon-v2.png">
<link rel="icon" type="image/png" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/329180/firework-burst-icon-v2.png">
<link rel="apple-touch-icon-precomposed" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/329180/firework-burst-icon-v2.png">
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-TileImage" content="https://s3-us-west-2.amazonaws.com/s.cdpn.io/329180/firework-burst-icon-v2.png">

<style>
    .card-top {
        color: white !important;
        padding-top: 30px !important;
        height: 750px;
    }

    .img11 {
        right: -150px !important;
    }

    .img12 {
        right: -45px !important;

    }

    .img13 {
        position: relative !important;
        right: 75px;
        z-index: 2 !important;
    }

    .img14 {
        z-index: 1;
        left: -170px !important;
        position: relative !important;
    }

    .img15 {
        z-index: 1 !important;
        margin-left: -80px !important;
    }

    .col2 {
        border-top: 3px solid white !important;
        /* background-image: linear-gradient(to right, #8cb736, #4d7810) !important; */
    }

    .img3 {
        max-height: 90px !important;
        /* max-width: 150px !important; */
        position: relative;
        bottom: -8px;
        left: 95px;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .bottom-card {
        border-top: 3px solid white !important;
    }

    .col31 {
        text-align: right !important;

    }

    .col32 {
        border-right: 2px solid white !important;
    }

    .head3 {
        font-size: 55px !important;
        font-weight: bold !important;
        margin-top: 25px !important;
    }

    .col33 {
        background-color: #151722 !important;
        color: white !important;
        padding-top: 20px !important;
    }

    th {
        font-size: 20px !important;
        color: #8cb736 !important;
    }

    td {
        font-size: 35px !important;
        text-align: center !important;
        font-weight: bold !important;
    }

    .player-img {
        position: relative;
        height: 600px;
        top: 120px;
    }





    /**********************
        * RESPONSIVENESS FOR SMALLER DESIGN *
        **********************/

    @media screen and (max-width: 1425px) {
        .player-img {
            height: 525px;
            top: 195px;
            width: 27%;
        }

    }

    /**********************
    * RESPONSIVENESS FOR SMALLER DESIGN *
    **********************/




    /* This is for background fireworks */

    .pyro>.before,
    .pyro>.after {
        z-index: 11;
        position: absolute;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        box-shadow: -120px -218.66667px blue, 248px -16.66667px #00ff84, 190px 16.33333px #002bff, -113px -308.66667px #ff009d, -109px -287.66667px #ffb300, -50px -313.66667px #ff006e, 226px -31.66667px #ff4000, 180px -351.66667px #ff00d0, -12px -338.66667px #00f6ff, 220px -388.66667px #99ff00, -69px -27.66667px #ff0400, -111px -339.66667px #6150ff, 155px -237.66667px #00ddff, -152px -380.66667px #00ffd0, -50px -37.66667px #00ffdd, -95px -175.66667px #a6ff00, -88px 10.33333px #0d00ff, 112px -309.66667px #005eff, 69px -415.66667px #ff00a6, 168px -100.66667px #ff004c, -244px 24.33333px #ff6600, 97px -325.66667px #ff0066, -211px -182.66667px #00ffa2, 236px -126.66667px #b700ff, 140px -196.66667px #9000ff, 125px -175.66667px #00bbff, 118px -381.66667px #ff002f, 144px -111.66667px #ffae00, 36px -78.66667px #f600ff, -63px -196.66667px #c800ff, -218px -227.66667px #d4ff00, -134px -377.66667px #ea00ff, -36px -412.66667px #ff00d4, 209px -106.66667px #00fff2, 91px -278.66667px #000dff, -22px -191.66667px #9dff00, 139px -392.66667px #a6ff00, 56px -2.66667px #0099ff, -156px -276.66667px #ea00ff, -163px -233.66667px #00fffb, -238px -346.66667px #00ff73, 62px -363.66667px #0088ff, 244px -170.66667px #0062ff, 224px -142.66667px #b300ff, 141px -208.66667px #9000ff, 211px -285.66667px #ff6600, 181px -128.66667px #1e00ff, 90px -123.66667px #c800ff, 189px 70.33333px #00ffc8, -18px -383.66667px #00ff33, 100px -6.66667px #ff008c;
        -moz-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
        -webkit-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
        -o-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
        -ms-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
        animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
    }

    .pyro>.after {
        -moz-animation-delay: 1.25s, 1.25s, 1.25s;
        -webkit-animation-delay: 1.25s, 1.25s, 1.25s;
        -o-animation-delay: 1.25s, 1.25s, 1.25s;
        -ms-animation-delay: 1.25s, 1.25s, 1.25s;
        animation-delay: 1.25s, 1.25s, 1.25s;
        -moz-animation-duration: 1.25s, 1.25s, 6.25s;
        -webkit-animation-duration: 1.25s, 1.25s, 6.25s;
        -o-animation-duration: 1.25s, 1.25s, 6.25s;
        -ms-animation-duration: 1.25s, 1.25s, 6.25s;
        animation-duration: 1.25s, 1.25s, 6.25s;
    }

    @-webkit-keyframes bang {
        from {
            box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
        }
    }

    @-moz-keyframes bang {
        from {
            box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
        }
    }

    @-o-keyframes bang {
        from {
            box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
        }
    }

    @-ms-keyframes bang {
        from {
            box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
        }
    }

    @keyframes bang {
        from {
            box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
        }
    }

    @-webkit-keyframes gravity {
        to {
            transform: translateY(150px);
            -moz-transform: translateY(150px);
            -webkit-transform: translateY(150px);
            -o-transform: translateY(150px);
            -ms-transform: translateY(150px);
            opacity: 0;
        }
    }

    @-moz-keyframes gravity {
        to {
            transform: translateY(150px);
            -moz-transform: translateY(150px);
            -webkit-transform: translateY(150px);
            -o-transform: translateY(150px);
            -ms-transform: translateY(150px);
            opacity: 0;
        }
    }

    @-o-keyframes gravity {
        to {
            transform: translateY(150px);
            -moz-transform: translateY(150px);
            -webkit-transform: translateY(150px);
            -o-transform: translateY(150px);
            -ms-transform: translateY(150px);
            opacity: 0;
        }
    }

    @-ms-keyframes gravity {
        to {
            transform: translateY(150px);
            -moz-transform: translateY(150px);
            -webkit-transform: translateY(150px);
            -o-transform: translateY(150px);
            -ms-transform: translateY(150px);
            opacity: 0;
        }
    }

    @keyframes gravity {
        to {
            transform: translateY(150px);
            -moz-transform: translateY(150px);
            -webkit-transform: translateY(150px);
            -o-transform: translateY(150px);
            -ms-transform: translateY(150px);
            opacity: 0;
        }
    }

    @-webkit-keyframes position {

        0%,
        19.9% {
            margin-top: 10%;
            margin-left: 40%;
        }

        20%,
        39.9% {
            margin-top: 40%;
            margin-left: 30%;
        }

        40%,
        59.9% {
            margin-top: 20%;
            margin-left: 70%;
        }

        60%,
        79.9% {
            margin-top: 30%;
            margin-left: 20%;
        }

        80%,
        99.9% {
            margin-top: 30%;
            margin-left: 80%;
        }
    }

    @-moz-keyframes position {

        0%,
        19.9% {
            margin-top: 10%;
            margin-left: 40%;
        }

        20%,
        39.9% {
            margin-top: 40%;
            margin-left: 30%;
        }

        .row3 {
            display: flex !important;
            border-top: 3px solid white !important;
        }

        .col31 {
            text-align: right !important;

        }

        .col32 {
            border-right: 2px solid white !important;
        }

        .head3 {
            font-size: 55px !important;
            font-weight: bold !important;
            margin-top: 25px !important;
            color: #151722;
        }

        .col33 {
            background-color: #151722 !important;
            color: white !important;
            padding-top: 20px !important;
        }

        th {
            font-size: 20px !important;
            color: #8cb736 !important;
        }

        td {
            font-size: 35px !important;
            text-align: center !important;
            font-weight: bold !important;
        }


        /* This is for background fireworks */

        .pyro>.before,
        .pyro>.after {
            z-index: 11;
            position: absolute;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            box-shadow: -120px -218.66667px blue, 248px -16.66667px #00ff84, 190px 16.33333px #002bff, -113px -308.66667px #ff009d, -109px -287.66667px #ffb300, -50px -313.66667px #ff006e, 226px -31.66667px #ff4000, 180px -351.66667px #ff00d0, -12px -338.66667px #00f6ff, 220px -388.66667px #99ff00, -69px -27.66667px #ff0400, -111px -339.66667px #6150ff, 155px -237.66667px #00ddff, -152px -380.66667px #00ffd0, -50px -37.66667px #00ffdd, -95px -175.66667px #a6ff00, -88px 10.33333px #0d00ff, 112px -309.66667px #005eff, 69px -415.66667px #ff00a6, 168px -100.66667px #ff004c, -244px 24.33333px #ff6600, 97px -325.66667px #ff0066, -211px -182.66667px #00ffa2, 236px -126.66667px #b700ff, 140px -196.66667px #9000ff, 125px -175.66667px #00bbff, 118px -381.66667px #ff002f, 144px -111.66667px #ffae00, 36px -78.66667px #f600ff, -63px -196.66667px #c800ff, -218px -227.66667px #d4ff00, -134px -377.66667px #ea00ff, -36px -412.66667px #ff00d4, 209px -106.66667px #00fff2, 91px -278.66667px #000dff, -22px -191.66667px #9dff00, 139px -392.66667px #a6ff00, 56px -2.66667px #0099ff, -156px -276.66667px #ea00ff, -163px -233.66667px #00fffb, -238px -346.66667px #00ff73, 62px -363.66667px #0088ff, 244px -170.66667px #0062ff, 224px -142.66667px #b300ff, 141px -208.66667px #9000ff, 211px -285.66667px #ff6600, 181px -128.66667px #1e00ff, 90px -123.66667px #c800ff, 189px 70.33333px #00ffc8, -18px -383.66667px #00ff33, 100px -6.66667px #ff008c;
            -moz-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            -webkit-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            -o-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            -ms-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
            animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
        }

        .pyro>.after {
            -moz-animation-delay: 1.25s, 1.25s, 1.25s;
            -webkit-animation-delay: 1.25s, 1.25s, 1.25s;
            -o-animation-delay: 1.25s, 1.25s, 1.25s;
            -ms-animation-delay: 1.25s, 1.25s, 1.25s;
            animation-delay: 1.25s, 1.25s, 1.25s;
            -moz-animation-duration: 1.25s, 1.25s, 6.25s;
            -webkit-animation-duration: 1.25s, 1.25s, 6.25s;
            -o-animation-duration: 1.25s, 1.25s, 6.25s;
            -ms-animation-duration: 1.25s, 1.25s, 6.25s;
            animation-duration: 1.25s, 1.25s, 6.25s;
        }

        @-webkit-keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @-moz-keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @-o-keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @-ms-keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @keyframes bang {
            from {
                box-shadow: 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white, 0 0 white;
            }
        }

        @-webkit-keyframes gravity {
            to {
                transform: translateY(150px);
                -moz-transform: translateY(150px);
                -webkit-transform: translateY(150px);
                -o-transform: translateY(150px);
                -ms-transform: translateY(150px);
                opacity: 0;
            }
        }

        @-moz-keyframes gravity {
            to {
                transform: translateY(150px);
                -moz-transform: translateY(150px);
                -webkit-transform: translateY(150px);
                -o-transform: translateY(150px);
                -ms-transform: translateY(150px);
                opacity: 0;
            }
        }

        @-o-keyframes gravity {
            to {
                transform: translateY(150px);
                -moz-transform: translateY(150px);
                -webkit-transform: translateY(150px);
                -o-transform: translateY(150px);
                -ms-transform: translateY(150px);
                opacity: 0;
            }
        }

        @-ms-keyframes gravity {
            to {
                transform: translateY(150px);
                -moz-transform: translateY(150px);
                -webkit-transform: translateY(150px);
                -o-transform: translateY(150px);
                -ms-transform: translateY(150px);
                opacity: 0;
            }
        }

        @keyframes gravity {
            to {
                transform: translateY(150px);
                -moz-transform: translateY(150px);
                -webkit-transform: translateY(150px);
                -o-transform: translateY(150px);
                -ms-transform: translateY(150px);
                opacity: 0;
            }
        }

        @-webkit-keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }

        @-moz-keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }

        @-o-keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }

        @-ms-keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }

        @keyframes position {

            0%,
            19.9% {
                margin-top: 10%;
                margin-left: 40%;
            }

            20%,
            39.9% {
                margin-top: 40%;
                margin-left: 30%;
            }

            40%,
            59.9% {
                margin-top: 20%;
                margin-left: 70%;
            }

            60%,
            79.9% {
                margin-top: 30%;
                margin-left: 20%;
            }

            80%,
            99.9% {
                margin-top: 30%;
                margin-left: 80%;
            }
        }
</style>

<section class="d-flex justify-content-center align-items-center">

    <div class="frame-height animate__animated animate__fadeInUp animate__delay-1s pyro" style="z-index: 11111;">

        <div class="before"></div>
        <div class="card-top">
            <div class="row" style="text-align: center;">
                <div class="col-md-12 after">
                    <?php $char = 1; ?>
                    @foreach (@$winner_team->playerStatement as $player)
                    @if ($player->player->photoURL)
                    <img src="{{ $player->player->photoURL }}" class="{{ 'img1' . $loop->iteration }} animate__animated animate__fadeInUp animate__delay-3s player-img">
                    @else
                    <img src="{{ asset('pubg/character/char' . $char . '.png') }}" class="{{ 'img1' . $loop->iteration }} animate__animated animate__fadeIn animate__delay-3s player-img">

                    <?php $char++; ?>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- card bottom -->
        <div class="card-bottom">
            <div class="row2 m-0 card-wwcd">
                <div class="col-md-12 col-lg-12 col2 pt-3 pb-2 primary-bg">
                    <h2 class="text-dark text-center secondary-font-color font-coda">WINNER WINNER CHICKEN DINNER</h2>
                </div>
            </div>
            <div class="bottom-card mt-0 mb-5 animate__animated animate__fadeInLeft">
                <div class="row pt-1 pb-1">
                    <div class="col-md-2 col-lg-2 col31 primary-bg">
                        @if ($winner_team->team->logoURL != '')
                        <img src="{{ $winner_team->team->logoURL }}" class="img3 animate__animated animate__fadeIn animate__delay-3s">
                        @else
                        <img src="{{ asset('pubg/logo/demo_logo.png') }}" class="img3 animate__animated animate__fadeIn animate__delay-3s">
                        @endif
                    </div>
                    <div class="col-md-4 col-lg-4 col32 primary-bg">
                        <h1 class="head3 primary-font-color">{{ $winner_team->team->name }}</h1>
                    </div>
                    <div class="col-md-2 col-lg-2 col33">
                        <table>
                            <tr>
                                <th class="text-white">OVERALL RANK</th>
                            </tr>
                            <tr>
                                <td class="text-white">#{{ $winner_team->rank }}/{{ $team_count }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-1 col-lg-1 col33">
                        <table>
                            <tr>
                                <th class="text-white">ELIMS</th>
                            </tr>
                            <tr>
                                <td class="text-white">{{ $winner_team->kill }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-1 col-lg-1 col33">
                        <table>
                            <tr>
                                <th class="text-white">POINTS</th>
                            </tr>
                            <tr>
                                <td class="text-white">{{ $winner_team->kill + $winner_team->position_points }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-1 col-lg-2 col33">
                        <table>
                            <tr>
                                <th class="text-white">OVERALL POINTS</th>
                            </tr>
                            <tr>
                                <td class="text-white">{{ $winner_team->overallPoint }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
