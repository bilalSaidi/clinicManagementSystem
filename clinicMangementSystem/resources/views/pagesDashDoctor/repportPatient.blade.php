<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>repport Patinet</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
            
        }
        
        
        .information {
            color: #888;
        }
        
        .information table {
            padding: 10px;
        }
        .content h3{
            text-align: center;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 30%;">
                <h3>{{ $repport['doctor'] }} </h3>
                <p>Phone : {{$repport['phone']}}</p>
                <p><strong>Site  : </strong>https://dentistclinicappweb.000webhostapp.com/</p>


            </td>
            <td align="center">
               <h1> Medical Clinic</h1>
            </td>
            <td align="right" style="width: 30%;">

                <p><strong>First Name : </strong>{{ $repport['Nom'] }}</p>
                <p><strong>Last Name : </strong>{{ $repport['Prenom'] }}</p>
                <p><strong>Age  : </strong>{{ $repport['Age'] }}</p>
                <p><strong>Date  :</strong>20{{date('y-m-d')}}</p>
            </td>
        </tr>

    </table>
    <hr/>
</div>


<br/>

<div class="content">
    <h3>ORDONNANCE - CERTIFICAT</h3>
    <table width="100%">
        <tr>
            <td align="center"><p> {!! $repport['Remarque'] !!} </p></td>
        </tr>

    </table>
   
   
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <hr />
    <table width="100%">
        <tr>
            <td align="center"><h4>Many diseases are transmitted by dirty hands</h4></td>
        </tr>

    </table>
</div>
</body>
</html>