<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="./_assets/css/app/SimpleBackgroundColorAnim.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Dosis|Raleway|Roboto+Slab|Rubik&display=swap" rel="stylesheet">
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            .hidden{
                display: none;;
            }
            small.xtra-small{
                font-size: 30%;
                opacity: 0.5;
            }
            body{
                position: relative;
                width:100vw;
                min-width: 100%;
                height: auto;
                color:#ecf0f1;
                background-color: rgba(41, 128, 185,1.0);
                xfont-family: 'Bebas Neue', cursive;
                xfont-family: 'Dosis', sans-serif;
                xfont-family: 'Rubik', sans-serif;
                font-family: 'Roboto Slab', serif;
                xfont-family: 'Raleway', sans-serif;
                overflow-x: hidden;
            }
            #Clock{
                position: absolute;
                display: block;
                margin: 100px auto 0;
                width:100%;
                padding: 5px 5px 5px 20%;
                left:50%;
                transform: translateX(-50%);
                font-size: 98px;
                
            }
            #Clock > *{
                position: relative;
                clear: both;
                float: left;
                padding:0px 20px;
                margin-bottom: 5px;
                border-radius: 3px;
                background-color: rgba(0, 0, 0,1);
                opacity: 0.6;
            }
            #Clock > :nth-child(1){
                font-size: 150%;
            }
            #Clock > :nth-child(2){
                font-size: 80%;
                text-transform: lowercase;
            }
            #Clock > :nth-child(3){
                font-size: 180%;
                font-weight: bold;
            }
        </style>
    </head>
    <body class="bg-anim-1">
        <section style="position: relative;width:100%;">
            <span id="letime" class="hidden"></span>
            <section id="Clock">
                <span id="minute">...</span>
                <span id="direction">...</span>
                <span id="hour">...</span>
            </section>
        </section>
        <script>

           setInterval(function(){
               var leMinutes = "...";
               var leDirection = "...";
               var leHour = "...";

               var DATE = new Date();
                leMinutes = (60 - DATE.getMinutes() >= 30)? inWords(DATE.getMinutes()) : inWords(60 - DATE.getMinutes());
                leDirection = (60 - DATE.getMinutes() >= 30)? "past" : "to";
                leHour = (60 - DATE.getMinutes() >= 30)? ((DATE.getHours() < 12)? inWords(DATE.getHours()) : inWords(DATE.getHours()%12)) :  ((DATE.getHours() < 12)? inWords(DATE.getHours() + 1) : inWords((DATE.getHours() + 1) % 12));

                document.getElementById('minute').innerHTML = leMinutes + ((leMinutes != "half" && leMinutes != "quarter")? '&nbsp;<small class="xtra-small">minutes</small>' : '');
                document.getElementById('direction').innerHTML = leDirection;
                document.getElementById('hour').innerHTML = leHour;

                document.getElementById('letime').innerHTML = ((Date).now());
           }, 1000)


            var numSetA = ['zero','one','two','three','four', 'five','six','seven','eight','nine','ten','eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen'];
            var numSetB = ['','','twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];


            function inWords (value) {
                var num = parseInt(value);

                if ((num.toString()).length > 9){
                    return '<overflow>';
                }
                
                if(num < 0){
                    return '-ve';
                }

                if(num < 20){
                    if(num == 15) {
                        return "quarter";
                    }
                    return numSetA[num];
                } else {
                    // document.getElementById('letime').innerHTML = (parseInt(num/10, 10));
                    if(num % 10 == 0){
                        if(num == 30) {
                            return "half";
                        }
                        return numSetB[(num/10)];
                    } else {
                        return (numSetB[(parseInt(num/10, 10))] + "-" +numSetA[(num%10)]);
                    }
                }
                return '';
            }
        </script>
    </body>
</html>
