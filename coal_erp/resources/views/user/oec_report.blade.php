<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .table {
            width:300px;
            height:180px;
            border-color: gainsboro;
            border-style:inherit;
            font-size: x-small;


        }
        .clear{clear: both;}
        .column1 {
            width:30px;
            height: 10px;
            border-color: gainsboro;
            border-style:solid;
            font-size: 10px;
        }
        .column2 {
            width:170px;
            height: 10px;
            border-color: gainsboro;
            border-style:solid;
            font-size:10px;
        }
        .column3 {
            width:70px;
            height: 10px;
            border-color: gainsboro;
            border-style:solid;
            font-size: 10px;
        }
    </style>
</head>
<body onLoad="window.print();">
<div style="width:700px;height:600px;border-style:inherit;border-color: #0c0c0c ">
    <div style="float:left;width:310px;border-style:solid;border-color: #0c0c0c ">

        <center><div style="font-size:10px;margin-bottom:-10px;"><p><i><u>Office Copy</u></i></p></div></center>
        <div style="float: left"> <img src="../images/clogo.png"> </div>
       <center> <div  style="font-size:10px; margin-bottom:-10px; margin-right:20px;"><h1>Agrawal Traders</h1></div></center>
       <center> <div  style="font-size:10px;  margin-right:20px;"> <p ></p></div></center>

        <center><p style="font-size:10px;"></p></center>

        <center> <P style="font-size:10px; padding-left: 20px; margin-bottom:-15px;"></P></center>
        <p>.............................................................................</p>
        <center><div style="font-size:10px; margin-top:-15px;"><b>Transporter Receipt</b> </div></center>

        <div style="font-size:10px"><b>&nbsp;&nbsp;&nbsp;Receipt No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> {{$outward_entry->outward_entry_id}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></div>

        <div style="font-size:10px"><b>&nbsp;&nbsp;&nbsp;Vehicle Number&nbsp;:</b> {{$outward_entry->vehicle_number}}</div>


<br>

        <center>
            <table class="table" cellpadding="0">
                <tr style="height:20px">
                    <td class="column1"><b>SNo.</b></td>
                    <td class="column2"><b> Description</b></td>
                    <td class="column3"><b>Value</b></td>
                </tr>
                <tr>
                    <td class="column1">1</td>
                    <td class="column2">Freight Charge</td>
                    <td class="column3">{{$outward_entry->freight_charge}}</td>
                </tr>
				 <tr>
                    <td class="column1">2</td>
                    <td class="column2">Product</td>
                    <td class="column3">{{$outward_entry->loading_type}}</td>
                </tr>
                <tr>
                    <td class="column1">3</td>
                    <td class="column2">Advanced</td>
                    <td class="column3">{{$outward_entry->advanced}}</td>
                </tr>
                <tr>
                    <td class="column1">4</td>
                    <td class="column2">Gross Weight </td>
                    <td class="column3">{{$outward_entry->g_weight}}</td>
                </tr>
                <tr >
                    <td class="column1">5</td>
                    <td class="column2">Tare Weight</td>
                    <td class="column3">{{$outward_entry->t_weigth}}</td>
                </tr>
                <tr >
                    <td class="column1">6</td>
                    <td class="column2">Net Weight</td>
                    <td class="column3">{{$outward_entry->net_weight}}</td>
                </tr>
				<tr >
                    <td class="column1">7</td>
                    <td class="column2">Munshiyana</td>
                    <td class="column3">{{$outward_entry->Munsiyana}}</td>
                </tr>
				<tr >
                    <td class="column1">8</td>
                    <td class="column2">other deduction</td>
                    <td class="column3">{{$outward_entry->other_deduction}}</td>
                </tr>
				<tr >
                    <td class="column1">9</td>
                    <td class="column2">Remark</td>
                    <td class="column3">{{$outward_entry->remark}}</td>
                </tr>
            </table>
           </center>
        <br>
        <div align="right" style="font-size:10px "><b>Accountant Signature</b>&nbsp;&nbsp;&nbsp;</div>
        <p style="font-size:x-small">&nbsp;&nbsp;<b>Note:</b>This receipt is an important document and must be secured with care.</p>

    </div>


    <div style="float:left;width:310px;border-style:solid;border-color: #0c0c0c ">

        <center><div style="font-size:10px;margin-bottom:-10px;"><p><i><u>Transporter Copy</u></i></p></div></center>
        <div style="float: left"> <img src="../images/clogo.png"> </div>
       <center> <div  style="font-size:10px; margin-bottom:-10px; margin-right:20px;"><h1>Agrawal Traders</h1></div></center>
       <center> <div  style="font-size:10px;  margin-right:20px;"> <p ></p></div></center>

        <center><p style="font-size:10px;"></p></center>

        <center> <P style="font-size:10px; padding-left: 20px; margin-bottom:-15px;"></P></center>
        <p>.............................................................................</p>
        <center><div style="font-size:10px; margin-top:-15px;"><b>Transporter Receipt</b> </div></center>

        <div style="font-size:10px"><b>&nbsp;&nbsp;&nbsp;Receipt No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b> {{$outward_entry->outward_entry_id}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></div>

        <div style="font-size:10px"><b>&nbsp;&nbsp;&nbsp;Vehicle Number&nbsp;:</b> {{$outward_entry->vehicle_number}}</div>


<br>

        <center>
            <table class="table" cellpadding="0">
                <tr style="height:20px">
                    <td class="column1"><b>SNo.</b></td>
                    <td class="column2"><b> Description</b></td>
                    <td class="column3"><b>Value</b></td>
                </tr>
                <tr>
                    <td class="column1">1</td>
                    <td class="column2">Freight Charge</td>
                    <td class="column3">{{$outward_entry->freight_charge}}</td>
                </tr>
				 <tr>
                    <td class="column1">2</td>
                    <td class="column2">Product</td>
                    <td class="column3">{{$outward_entry->loading_type}}</td>
                </tr>
                <tr>
                    <td class="column1">3</td>
                    <td class="column2">Advanced</td>
                    <td class="column3">{{$outward_entry->advanced}}</td>
                </tr>
                <tr>
                    <td class="column1">4</td>
                    <td class="column2">Gross Weight </td>
                    <td class="column3">{{$outward_entry->g_weight}}</td>
                </tr>
                <tr >
                    <td class="column1">5</td>
                    <td class="column2">Tare Weight</td>
                    <td class="column3">{{$outward_entry->t_weigth}}</td>
                </tr>
                <tr >
                    <td class="column1">6</td>
                    <td class="column2">Net Weight</td>
                    <td class="column3">{{$outward_entry->net_weight}}</td>
                </tr>
				<tr >
                    <td class="column1">7</td>
                    <td class="column2">Munshiyana</td>
                    <td class="column3">{{$outward_entry->Munsiyana}}</td>
                </tr>
				<tr >
                    <td class="column1">8</td>
                    <td class="column2">other deduction</td>
                    <td class="column3">{{$outward_entry->other_deduction}}</td>
                </tr>
				<tr >
                    <td class="column1">9</td>
                    <td class="column2">Remark</td>
                    <td class="column3">{{$outward_entry->remark}}</td>
                </tr>
            </table>
           </center>
        <br>
        <div align="right" style="font-size:10px "><b>Accountant Signature</b>&nbsp;&nbsp;&nbsp;</div>
        <p style="font-size:x-small">&nbsp;&nbsp;<b>Note:</b>This receipt is an important document and must be secured with care.</p>

    </div>



</div>

 <a href="{{asset('user/0utward')}}" class=""> Go Back</a>
</body>
</html>