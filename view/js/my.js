function  ContectUs(param) {
    if(param === 'cancel')
    {
        $('#contect-us').toggle("slide", {direction: "left"}, 100);
    }
    else if(param === 'send-msg')
    {
        var contect_us_email = document.getElementById("contect-us-email");
        var contect_us_msg = document.getElementById("contect-us-msg");
        if(contect_us_email.value.length < 4)
        {
            document.getElementById("contect-us-email").style.border="3px solid red";
            return false;
        }
        else if(contect_us_msg.value.length < 10)
        {
            document.getElementById("contect-us-msg").style.border="3px solid red";
            return false;
        }else{
            document.getElementById("contect-us-email").style.border="3px solid green";
            document.getElementById("contect-us-msg").style.border="3px solid green";
            var lang = document.getElementById("lang-site").value;
            var dataString = "contect_us_email="+contect_us_email.value+"&contect_us_msg="+contect_us_msg.value+"&lang="+lang;
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $('#contect-us').toggle("slide", {direction: "left"}, 100);
                }
            });
        }


    }
    else {
        $('#contect-us').toggle("slide", {direction: "right"}, 100);
    }
}
function  ShowModal(id) {
    document.getElementById("show-register").style.display = "block";
}

function HiddenResultModal() {
    $('#modal-result').toggle("slide", {direction: "right"}, 200);

}
function MobileMenuOpen()
{
    $('#menu-mobile-panel').toggle("slide", {direction: "right"}, 200);
}
function ShowPageM(a)
{
    var i=1;
    $("#page-"+a).slideDown();
    for(i=1;i <= 11;i++)
    {
        if(a == i)
        {
            $("#btnM-"+a).addClass("active");
        }
        else{
            $("#page-"+i).slideUp();
            $("#btnM-"+i).removeClass("active");
            document.getElementById("menu-mobile-panel").style.display="none";
            document.getElementById("modal-result").style.display="none";
        }
    }
}

function ShowPage(a)
{
    var i=1;
    $("#page-"+a).slideDown();
    for(i=1;i <= 11;i++)
    {
        if(a == i)
        {
            $("#btn-"+a).addClass("active");
        }
        else{
            $("#page-"+i).slideUp();
            $("#btn-"+i).removeClass("active");
            document.getElementById("modal-result").style.display="none";
        }
    }

}

function AbjadConvert(a,b)
{
    var dataString = 'Abjad-calculation='+a;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("txt-"+b).innerHTML = html;
            document.getElementById("txtVal-"+b).value = html;
        }
    });
}
function calculationChangeName()
{
    var a = document.getElementById("txtVal-26").value;
    var b = document.getElementById("txtVal-27").value;

    if(a.length == 0)
    {
        document.getElementById("ChangeName-26").style.border = "1px solid red";
        return false;
    }
    if(b.length == 0)
    {
        document.getElementById("ChangeName-27").style.border = "1px solid red";
        return false;
    }
    $('#modal-result').toggle("slide", {direction: "left"}, 100);
    var a = parseInt(a);
    var b = parseInt(b);
    var ans = (a+b) % 12;
    if(ans === 0)
        ans =12;
    var dataString = 'ChangeName-result-free='+ans;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("rrrrrr").innerHTML = html;

        }
    });
    document.getElementById("rrrrrr").innerHTML=ans;
}

function calculationTwin()
{
    var a = document.getElementById("txtVal-25").value;
    if(a.length == 0)
    {
        document.getElementById("Twin-25").style.border = "1px solid red";
        return false;
    }
    $('#modal-result').toggle("slide", {direction: "left"}, 100);
    var l = a.length;
    var ans = '';
    if(l === 4)
    {
        var t1 = a.substr(0,1);
        var q1 = 1000 * t1;
        var t2 = a.substr(1,1);
        var q2 = 100 * t2;
        var t3 = a.substr(2,1);
        var q3 = 10 * t3;
        var t4 = a.substr(3,1);
        var q4 = 1 * t4;
        var ans = q1+"-"+q2+"-"+q3+"-"+q4;

    }
    if(l === 3)
    {
        var t22 = a.substr(0,1);
        var q22 = 100 * t22;
        var t33 = a.substr(1,1);
        var q33 = 10 * t33;
        var t44 = a.substr(2,1);
        var q44 = 1 * t44;
        var ans = q22+"-"+q33+"-"+q44;
    }
    if(l === 2)
    {
        let t333 = a.substr(0,1);
        var q333 = 10 * t333;
        var t444 = a.substr(1,1);
        var q444 = 1 * t444;
        var ans = q333+"-"+q444;
    }
    if(l === 1) {
        var t45 = a.substr(0, 1);
        var q45 = 1 * t45;
        var ans = q45;
    }
    var dataString = 'Twin-result-free='+ans;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("rrrrrr").innerHTML = html;

        }
    });
    //document.getElementById("rrrrrr").innerHTML=ans;
}


function calculationLocation()
{
    var a = document.getElementById("txtVal-22").value;
    var b = document.getElementById("txtVal-23").value;
    var c = document.getElementById("txtVal-24").value;

    if(a.length == 0)
    {
        document.getElementById("Location-22").style.border = "1px solid red";
        return false;
    }
    if(b.length == 0)
    {
        document.getElementById("Location-23").style.border = "1px solid red";
        return false;
    }
    if(c.length == 0)
    {
        document.getElementById("Location-24").style.border = "1px solid red";
        return false;
    }

    $('#modal-result').toggle("slide", {direction: "left"}, 100);
    var a = parseInt(a);
    var b = parseInt(b);
    var c = parseInt(c);

    var ans = (a+b+c+65) % 4;
    if(ans === 0)
        ans =4;
    var dataString = 'Location-result-free='+ans;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("rrrrrr").innerHTML = html;

        }
    });
}

function calculationDeath()
{
    var a = document.getElementById("txtVal-18").value;
    var b = document.getElementById("txtVal-19").value;
    var c = document.getElementById("txtVal-20").value;
    var d = document.getElementById("txtVal-21").value;
    if(a.length == 0)
    {
        document.getElementById("Death-18").style.border = "1px solid red";
        return false;
    }
    if(b.length == 0)
    {
        document.getElementById("Death-19").style.border = "1px solid red";
        return false;
    }
    if(c.length == 0)
    {
        document.getElementById("Death-20").style.border = "1px solid red";
        return false;
    }
    if(d.length == 0)
    {
        document.getElementById("Death-21").style.border = "1px solid red";
        return false;
    }

    $('#modal-result').toggle("slide", {direction: "left"}, 100);
    var a = parseInt(a);
    var b = parseInt(b);
    var c = parseInt(c);
    var d = parseInt(d);

    var ans = (a+b+c+d) % 5;
    ans = ans % 2;
    var dataString = 'Death-result-free='+ans;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("rrrrrr").innerHTML = html;

        }
    });
    document.getElementById("rrrrrr").innerHTML=ans;
}


function calculationNeed()
{
    var a = document.getElementById("txtVal-15").value;
    var b = document.getElementById("txtVal-16").value;
    var c = document.getElementById("txtVal-17").value;
    if(a.length == 0)
    {
        document.getElementById("Need-15").style.border = "1px solid red";
        return false;
    }
    if(b.length == 0)
    {
        document.getElementById("Need-16").style.border = "1px solid red";
        return false;
    }
    if(c.length == 0)
    {
        document.getElementById("Need-17").style.border = "1px solid red";
        return false;
    }

    $('#modal-result').toggle("slide", {direction: "left"}, 100);
    var a = parseInt(a);
    var b = parseInt(b);
    var c = parseInt(c);

    var ans = (a+b+c) % 3;
    var dataString = 'Need-result-free='+ans;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("rrrrrr").innerHTML = html;

        }
    });
    document.getElementById("rrrrrr").innerHTML=ans;
}


function calculationPartnership()
{
    var a = document.getElementById("txtVal-13").value;
    var b = document.getElementById("txtVal-14").value;
    if(a.length == 0)
    {
        document.getElementById("Partnership-14").style.border = "1px solid red";
        return false;
    }
    if(b.length == 0)
    {
        document.getElementById("Partnership-14").style.border = "1px solid red";
        return false;
    }

    $('#modal-result').toggle("slide", {direction: "left"}, 100);
    var a = parseInt(a);
    var b = parseInt(b);
    var ans = (a+b) % 5;
    if(ans == 0)
        ans = 5;
    var dataString = 'Partnership-result-free='+ans;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("rrrrrr").innerHTML = html;
        }
    });
    document.getElementById("rrrrrr").innerHTML=ans;
}



function calculationSarketab()
{
    var gender = 0;
    var a = document.getElementById("txtValSarketab-1").checked;
    var b = document.getElementById("txtValSarketab-2").checked;
    var d = document.getElementById("txtValSarketab-4").value;
    var e = document.getElementById("txtValSarketab-5").value;
    var f = document.getElementById("txtVal-1").value;
    var g = document.getElementById("txtVal-2").value;
    if(a === true)
        gender = 1;
    else if(b === true) gender = 2;
    if(a == false && b == false)
    {
        document.getElementById("txtValSarketab-1").style.border = "2px solid red";
        document.getElementById("txtValSarketab-2").style.border = "2px solid red";
        return false;
    }
    else {
        document.getElementById("txtValSarketab-1").style.border = "";
        document.getElementById("txtValSarketab-2").style.border = "";
    }
    if(a === true || b === true)
    {
        document.getElementById("txtValSarketab-1").style.border = "";
        document.getElementById("txtValSarketab-2").style.border = "";
    }
    if(e.length == 0)
    {
        document.getElementById("txtValSarketab-5").style.border = "1px solid red";
        return false;
    }
    else {
        document.getElementById("txtValSarketab-5").style.border = "";
    }
    if(d.length == 0)
    {
        document.getElementById("txtValSarketab-4").style.border = "1px solid red";
        return false;
    }
    else {
        document.getElementById("txtValSarketab-4").style.border = "";
    }
    if(f.length === 0)
    {
        document.getElementById("BoyName").style.border = "1px solid red";
        return false;
    }else {
        document.getElementById("BoyName").style.border = "";
    }
    if(g.length === 0)
    {
        document.getElementById("BoymamName").style.border = "1px solid red";
        return false;
    }
    else
    {
        document.getElementById("BoymamName").style.border = "";
    }
    $('#modal-result').toggle("slide", {direction: "left"}, 100);
    var f = parseInt(f);
    var g = parseInt(g);
    var ans = (f+g) % 12;
    if(ans == 0)
        ans = 12;
    var dataString = 'headbook-result-free='+ans+"&gender="+gender+"&day="+e;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("rrrrrr").innerHTML = html;
        }
    });
}
function calculationMarriage()
{
    var a = document.getElementById("txtVal-3").value;
    var b = document.getElementById("txtVal-4").value;
    var c = document.getElementById("txtVal-5").value;
    var d = document.getElementById("txtVal-6").value;
    if(a.length === 0)
    {
        document.getElementById("txtMarriage-3").style.border = "1px solid red";
        return false;
    }
    if(b.length === 0)
    {
        document.getElementById("txtMarriage-4").style.border = "1px solid red";
        return false;
    }
    if(c.length === 0)
    {
        document.getElementById("txtMarriage-5").style.border = "1px solid red";
        return false;
    }
    if(d.length === 0)
    {
        document.getElementById("txtMarriage-6").style.border = "1px solid red";
        return false;
    }
    $('#modal-result').toggle("slide", {direction: "left"}, 100);
    var a = parseInt(a);
    var b = parseInt(b);
    var c = parseInt(c);
    var d = parseInt(d);
    var ans = (a+b+c+d) % 5;
    var dataString = 'Marriage-result-free='+ans;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("rrrrrr").innerHTML = html;
        }
    });
}
function  RaundomAbjad()
{
    var myArray = new Array();
    myArray[0] = "ا";
    myArray[1] = "ب";
    myArray[2] = "ج";
    myArray[3] = "د";

    var item = myArray[Math.floor(Math.random() * myArray.length)];

    var a =  document.getElementById("txtVal-7").value;
    var b =  document.getElementById("txtVal-8").value;
    var c =  document.getElementById("txtVal-9").value;

    if( a === '')
        document.getElementById("txtVal-7").value=item;

    else if(b === '')
        document.getElementById("txtVal-8").value=item;

    else if(c === '')
    {
        document.getElementById("txtVal-9").value=item;
        document.getElementById("btn-click-estekhare").style.display="none";
        document.getElementById("btn-estekhare").style.display="block";
    }
    var a =  document.getElementById("txtVal-7").value;
    var b =  document.getElementById("txtVal-8").value;
    var c =  document.getElementById("txtVal-9").value;

    if(a !== '' && b !== '' && c !== '')
    {
        var ans= a+" "+b+" "+c;
        var dataString = 'Estekhare-result-free='+ans;
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $('#modal-result').toggle("slide", {direction: "left"}, 100);
                document.getElementById("rrrrrr").innerHTML = html;
                document.getElementById("txtVal-7").value='';
                document.getElementById("txtVal-8").value='';
                document.getElementById("txtVal-9").value='';
                document.getElementById("btn-click-estekhare").style.display="block";
                document.getElementById("btn-estekhare").style.display="none";
            }
        });
        document.getElementById("rrrrrr").innerHTML=ans;
    }

}

function  calculationAbsentStatus()
{
    var a = document.getElementById("txtVal-10").value;
    var b = document.getElementById("txtVal-11").value;
    var c = document.getElementById("txtVal-12").value;

    var a = parseInt(a);
    var b = parseInt(b);
    var c = parseInt(c);
    var ans = (a+b+c) % 12;
    if(ans === 0)
        ans = 12;

    var dataString = 'AbsentStatus-result-free='+ans;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            $('#modal-result').toggle("slide", {direction: "left"}, 100);
            document.getElementById("rrrrrr").innerHTML = html;
        }
    });
    document.getElementById("rrrrrr").innerHTML=ans;


}

function calculationAbjadIstikharah()
{
    var a = document.getElementById("txtVal-3").value;
    var b = document.getElementById("txtVal-4").value;
    var c = document.getElementById("txtVal-5").value;
    if(a.length == 0)
    {
        document.getElementById("txtMarriage-3").style.border = "1px solid red";
        return false;
    }
    if(b.length == 0)
    {
        document.getElementById("txtMarriage-4").style.border = "1px solid red";
        return false;
    }

    if(c.length === 0)
    {
        document.getElementById("txtMarriage-5").style.border = "1px solid red";
        return false;
    }
    $('#modal-result').toggle("slide", {direction: "left"}, 100);
    var a = parseInt(a);
    var b = parseInt(b);
    var c = parseInt(c);
    var ans = (a+b+c+d) % 5;
    var dataString = 'Marriage-result-free='+ans;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
            document.getElementById("rrrrrr").innerHTML = html;
        }
    });
    document.getElementById("rrrrrr").innerHTML=ans;
}


function closeLoginForm(){
    document.getElementById("show-register").style.display="none";
}
function SaveData()
{
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var a = document.getElementById("txtValSarketab-1");
    var b = document.getElementById("txtValSarketab-2");
    var d = document.getElementById("txtValSarketab-4").value;
    var e = document.getElementById("txtValSarketab-5").value;
    var g = document.getElementById("txtValSarketab-3").value;

    if(a.checked == true)
        var gender = 1;
    else if(b.checked == true) var gender =2;

    if(email=='')
    {
        document.getElementById("email").style.border="2px solid red";
        document.getElementById("email").focus(); return false;
    }else {document.getElementById("email").style.border="";}
    if(password=='')
    {
        document.getElementById("password").style.border="2px solid red";
        document.getElementById("password").focus();
        return false;
    }else {document.getElementById("password").style.border="";}
    var dataStringUser = 'save-data-user-email='+email+"&save-data-user-password="+password+"&gender="+gender+"&bd-day="+d+"&bd-m="+e+"&bd-y="+g;
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: dataStringUser,
        cache: false,
        success: function(data)
        {
            if(data==true)
                location.href="view/payment.php";
            else return false;
        }
    });
}

function ConvertAbjad(a,b)
{
    var abjad = [""];
    var Numabjad = [""];

}

