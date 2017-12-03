<!DOCTYPE>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Display Date and Time in Javascript</title>
        <script type="text/javascript">
        	function date_time(id)
			{
			        date = new Date;
			        year = date.getFullYear();
			        month = date.getMonth();
			        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
			        d = date.getDate();
			        day = date.getDay();
			        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
			        h = date.getHours();
			        if(h<10)
			        {
			                h = "0"+h;
			        }
			        m = date.getMinutes();
			        if(m<10)
			        {
			                m = "0"+m;
			        }
			        s = date.getSeconds();
			        if(s<10)
			        {
			                s = "0"+s;
			        }
			        result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;
			        document.getElementById(id).innerHTML = result;
			        setTimeout('date_time("'+id+'");','1000');
			        return true;
			}
        </script>
    </head>
    <body>
    <p>jam : </p>
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
    </body>
</html>