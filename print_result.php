<html xmlns="http://www.w3.org/1999/xhtml" moznomarginboxes mozdisallowselectionprint>
    <head>
        <meta charset="UTF-8">
        <title>Online Test Series</title>
        <style type="text/css" media="print">
			@page {
					margin:0 10px;
					/*size:8.27in 11.69in ;
					/*height:3508 px;
					width:2480 px;
					/*size: auto;   auto is the initial value */
					/*margin:0;   this affects the margin in the printer settings 
			  		-webkit-print-color-adjust:exact;*/
			}
			@media print{
				table {page-break-inside: avoid;}
				#buttons{
						display:none;
				}
				#invoice{
					margin-top:20px;
  				}
			}
		</style>
    </head>
    <body>
    	<div id="invoice" style="width:1000px;">
            <center>    
                <br/>            
                <font size="+3" style="letter-spacing:2px"><br /></font>
                <!--<font size="+1">Panchamba, Gridih</font><br />
                <font size="+1">Mobile-No: 8434693693 , 8434694694</font><br />-->
            </center>
            <hr style="border:1px solid #000000;">            
            <table align="center" width="95%" cellpadding="0" cellspacing="0" id="table" >
			                      <tr>
                                   <th style="text-align:center">Roll No.</th>
                                   <th style="text-align:center">Name</th>
                                   <th style="text-align:center">Physics</th>
                                   <th style="text-align:center">Chemistry</th>
                                   <th style="text-align:center">Math</th>
                                   <th style="text-align:center">English</th>
                                   <th style="text-align:center">Hindi</th>
                                  </tr>              
				<tr height="80px">
                    <td></td>
					<td></td>
					<td></td>
					<td></td>
                </tr>
				
				<tr height="20px">
                    <td></td>
					<td></td>
					<td></td>
					<td></td>
                </tr>
				
				<tr height="20px">
                    <td></td>
					<td></td>
					<td></td>
					<td></td>
                </tr>
				
				
				
				<tr height="50px">
                    <td></td>
					<td></td>
					<td></td>
					<td></td>
                </tr>
				<tr width="95%">
					<td colspan="4">
						
					</td>
				</tr>
				<tr height="50px">
                    <td></td>
					<td></td>
					<td></td>
					<td></td>
                </tr>
				<tr width="95%">
					<td colspan="4">
						
					</td>
				</tr>
				<tr height="50px">
                    <td></td>
					<td></td>
					<td></td>
					<td></td>
                </tr>
				<tr width="95%">
					<td colspan="4">
					</td>
				</tr>
				<tr height="20px">
                    <td></td>
					<td></td>
					<td></td>
					<td></td>
                </tr>
            </table>            
         	<div id="buttons">
             	<center>
                  	<button type="button" class="btn btn-danger" onclick="window.print();" 
                    	style="background-color:#F70004; height:30px; width:70px; border-radius:5px; color:#FFFFFF; font-size:14px;" >Print</button>
                 	<button type="button" onclick="closeThis('');" class="btn btn-default"
                    	style="background-color:#F70004; height:30px; width:70px; border-radius:5px; color:#FFFFFF; font-size:14px;">Close</button>
             	</center>
         	</div>
        </div>
        <script language="javascript">
        	function closeThis(str){
				var page=str;
				if(page=='report'){
					window.location="../";
				}	
				else{
					window.location="../";	
				}
			}
        </script>
    </body>
</html>