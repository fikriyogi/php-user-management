
<?php 
include_once 'core/db_connect.php';
?>
<style type="text/css">
div.myautoscroll {
    height: 40ex;
    width: 40em;
    overflow: hidden;
    /*border: 1px solid #444;*/
    margin-bottom: 3em;
}
div.myautoscroll:hover {
    overflow: auto;
}
div.myautoscroll p {
    /*padding-right: 16px;*/
}
div.myautoscroll:hover p {
    padding-right: 0px;
}


/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
./*tbody {
	width: 100%; float: left; display: block; overflow-y: scroll; max-height: 100px;
}
tr {
	float: left; 
	display: block;
	text-align: center;
}
td {
	float: left; display: block;
	text-align: center;
}
tr {
	width: 100%; 
	height: auto;
	text-align: center;
}
td {
	width: 49%; float: left;
	text-align: center;
}
.table {
	width: 100%;
}*/
</style>
<table class="table" >
			    <thead>
			        <tr >
			            <td >
			                Nama
			            </td>
			            <td >
			                trafik
			            </td>

			            <td >
			                Heading
			            </td>
			        </tr>
			    </thead>
    <tbody class="tbody">
        <?php  
							$sql="SELECT COUNT(*) AS `total`, DATE_FORMAT(visit_date, '%M') AS `jam`, ROUND((COUNT(visit_date)/(SELECT COUNT(*) FROM analytic))*100,0) AS persentasi FROM `analytic` GROUP BY `jam` ORDER BY total DESC";
							$result = mysqli_query($connect, $sql);
							@$no1++;
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							echo "<tr>" ;
							echo "<td>" . $no1++ . "</td>";
							echo	"<td>Jam " . $row['jam'] . "</td>";
							echo	"<td class='text-center'>" . $row['total'] . "</td>";
							echo	"<td class='text-left'> <div class='progress-bar bg-bar' role='progressbar' style='width: " . $row['persentasi'] . "%' aria-valuenow='" . $row['persentasi'] . "' aria-valuemin='0' aria-valuemax='100'>" . $row['persentasi'] . "%</div></td>";
							echo	"</tr>";
							}
						?>
    </tbody>
</table>



<hr>
