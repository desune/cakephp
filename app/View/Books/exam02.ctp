<html>
<body>
<?php
if($results==NULL){
    echo "<h2>Data Empty</h2>";
}
else{
    echo "<table>
          <tr>
            <td>id</td>
            <td>Title</td>
          </tr>";
    foreach($results as $item){
        echo "<tr>";
        echo "<td>".$item['Book']['id']."</td>";
        echo "<td>".$item['Book']['title']."</td>";
        echo "</tr>";
    }
}
?>
</body>
</html>