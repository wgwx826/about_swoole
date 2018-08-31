<?php
$name = $_COOKIE['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>webSocket</title>
</head>
<body>
<div style="text-align:center">
    <div id="div" style="width:99%; height:180px;overflow:auto;background: #bef8ff;display: inline-block;text-align: left;">

    </div>
    <br>
    <div style="display: inline-block;width: 99%">
        <table style="width: 100%">
            <tr>
                <td width="90%"><input type="text" id="text" style="width: 100%;height: 25px;padding-left: 0;margin-left: 0"></td><td ><input type="button" value="发送" onclick="sendMassage()" style="height: 31px;width: 100%;"></td>
            </tr>
        </table>
    </div>
</div>
</body>
<script src="jquery-1.8.2.min.js"></script>
<script>
    var wsServer = 'ws://47.95.236.88:9999';//这里的IP应该更改
//    var wsServer = 'ws://10.10.10.11';//这里的IP应该更改
    var websocket = new WebSocket(wsServer);
    websocket.onopen = function (evt) {
        console.log("Connected to WebSocket server.");
    };

    websocket.onclose = function (evt) {
        console.log("Disconnected");
    };

    websocket.onmessage = function (evt) {
        $('#div').append(evt.data+"<br>");
        $('#div').scrollTop($('#div')[0].scrollHeight);
        // document.getElementById('div').style.background = evt.data;
        console.log('Retrieved data from server: ' + evt.data);
    };

    websocket.onerror = function (evt, e) {
        console.log('Error occured: ' + evt.data);
    };
    function sendMassage(){
        var massage=document.getElementById('text').value;
        websocket.send(massage);
        $('#text').val('');
    }

</script>
</html>