<?php

include "../db.php";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Asset_Report.xls");

echo "<table border='1'>";

echo "<tr>
<th>ID</th>
<th>Employee</th>
<th>Asset</th>
<th>Assign Date</th>
</tr>";

$sql = "SELECT
allocation.id,
employees.name,
assets.asset_name,
allocation.assign_date
FROM allocation
JOIN employees ON allocation.employee_id=employees.id
JOIN assets ON allocation.asset_id=assets.id";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['id']."</td>";

echo "<td>".$row['name']."</td>";

echo "<td>".$row['asset_name']."</td>";

echo "<td>".$row['assign_date']."</td>";

echo "</tr>";

}

echo "</table>";

?>
<a href="export_pdf.php" class="print-btn">📄 Download PDF</a>