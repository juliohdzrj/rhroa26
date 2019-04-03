/*
 * $Id: modchat.js 180627-js 2018-06-27
 */

/*$(document).ready(function(){
    get_Info_user();
});*/

$(function() {
        var INDEX = 0;
        var dataUser=false;
        var idchat=false;
        var setmsg=false;
        var oldmsg=false;
        $("#chat-submit").click(function(e) {
            oldmsg=parseInt(oldmsg)+1;
            e.preventDefault();
            var msg = $("#chat-input").val();
            if(msg.trim()==''){
                return false;
            }
            console.log(dataUser.start);
            console.log(oldmsg);
            if(dataUser.start==""){
                dataUser.start="A";
            }
            generate_message(msg,'self',dataUser.start);//cliente
            setmsg=[msg, "self", dataUser.start];
            //if(idchat==false){
                get_idchat(setmsg);
            //}
            /*setTimeout(function() {
                generate_message(msg, 'user');//soporte
            }, 1000)*/
        });
        function generate_message(msg,type,inicial) {
            console.log(type);
            INDEX++;
            var str="";
            str += "<div id='cm-msg-"+INDEX+"' class=\"chat-msg "+type+"\">";
            str += "          <div class=\"msg-avatar "+type+"f\"><span>"+inicial+"</span></div> <span class=\"msg-avatar\">";
            str += "          <\/span>";
            str += "          <div class=\"cm-msg-text "+type+"m\">";
            str += msg;
            str += "          <\/div>";
            str += "        <\/div>";
            $(".chat-logs").append(str);
            $("#cm-msg-"+INDEX).hide().fadeIn(300);
            if(type == 'self'){
                $("#chat-input").val('');
            }
            $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
        }


        function get_Info_user(){
            console.log(dataUser);
            //if(dataUser==false){
            $.ajax({
                url: "../../claroline/aulachat/vista/getInfoUser.php",
                dataType:"json",
                type:"POST",
                cache:true
                //data:{object_id:regDir2,opsol:valueEspecialidad}
            }).done(function(data) {
                console.log(data);
                timeChat();
                if(dataUser==false){
                    dataUser=data.datosapi;
                    //console.log(dataUser);
                    generate_message('Hola '+dataUser.name+'<br> Puedes enviar tus preguntas y comentarios.','user','AG');//soporte
                }
                //console.log(dataUser);
                //console.log(data);
                for(x in data.msglist){
                    var dataMsgStore=data.msglist[x];
                    var res=dataMsgStore.split("|");
                    console.log(res[2]);
                    if(res[2]==undefined){
                        res[2]="A"
                    }
                    if(res[2]==""){
                        res[2]="A"
                    }
                    generate_message(res[0],res[1],res[2]);
                    oldmsg=x;
                }
            }).fail(function() {
                alert("Revise su conexión a internet");
            });
            //}
        }



        function get_idchat(msgOne){
            console.log(msgOne);
            //if(idchat==false) {
                $.ajax({
                url:"../../claroline/aulachat/vista/getIdChat.php",
                dataType:"json",
                type:"POST",
                cache:false,
                data:{msgChatOne: msgOne, userData: dataUser}
            }).done(function(data){
                console.log(idchat);
                idchat=data.datosapi;
                console.log(data);
                oldmsg=idchat["code"];
                //return false;
                //dataUser = data.datosapi;
                //generate_message('Hola ' + dataUser.name + '<br> Puedes enviar tus preguntas y comentarios.', 'user', 'AG');//soporte
                //console.log(dataUser);
            }).fail(function () {
                alert("Revise su conexión a internet");
            });
            //}
        }

    function timeChat(){
        console.log(oldmsg);
        setTimeout(timeChat,6000); /*Obtener los mensajes mayores al ultimo indice*/
        //return false;
        if(oldmsg!=false){
        $.ajax({
            url:"../../claroline/aulachat/vista/getOldMsg.php",
            dataType:"json",
            type:"POST",
            cache:false,
            data:{idmsgold: oldmsg}
        }).done(function(data){
            for(x in data.msglist){
                var dataMsgStore=data.msglist[x];
                var res=dataMsgStore.split("|");
                console.log(res[2]);
                if(res[2]==undefined){
                    res[2]="A"
                }
                if(res[2]==""){
                    res[2]="A"
                }
                generate_message(res[0],res[1],res[2]);
            }
            if(x>oldmsg){
                oldmsg=x;
            }
          //  console.log(idchat);
            //idchat=data.datosapi;
            console.log(data);
            //oldmsg=idchat["code"];
        }).fail(function () {
            alert("Revise su conexión a internet");
        });
        }
    }

function closechat() {
    var r = confirm("¿Quiere cerrar el chat? Todos los mensajes se perderán.");
    if (r == true) {
        $.ajax({
            url:"../../claroline/aulachat/vista/closechat.php",
            dataType:"json",
            type:"POST",
            cache:false,
            data:{idok: "oldok"}
        }).done(function(data){
            console.log(data);
        }).fail(function () {
            alert("Revise su conexión a internet");
        });
    }
}

        $("#chat-circle").click(function() {
            var edoDisplay=$(".chat-box-toggle").attr("display");
            get_Info_user();
            //console.log(edoDisplay);
            $("#chat-circle").toggle('scale');
            $(".chat-box").toggle('scale');
        });

    $("#chat-close").click(function(){
        closechat();
        $(".chat-logs").empty();
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    });

        $(".chat-box-toggle").click(function() {
            console.log("empty div chat");
            $(".chat-logs").empty();
            $("#chat-circle").toggle('scale');
            $(".chat-box").toggle('scale');
        })

    });