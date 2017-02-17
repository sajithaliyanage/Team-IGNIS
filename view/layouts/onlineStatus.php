<?php
require_once "../../module/PHPExcel/PHPExcel.php";

    $tempFile = "../../view/site/testing.xlsx";
    $objPHPExcel = PHPExcel_IOFactory::load($tempFile);

    $i=0;
    $id=array();
    $name=array();
    foreach ($objPHPExcel->getActiveSheet()->getRowIterator() as $row) {
        if ($objPHPExcel->getActiveSheet()->getRowDimension($row->getRowIndex())->getVisible() and $row->getRowIndex() !=1 and $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue() !=null) {
            $id[$i]= $objPHPExcel->getActiveSheet()->getCell('A'.$row->getRowIndex())->getValue();
            $i+=1;
        }
    }
    $num=count($id);
    $result0 = array();
?>
<div class="btn-group dropup online-status">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:5px 40px;">
        Online Status (<?php echo $num ?>)
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul id="theList" class="dropdown-menu" style="max-height:70vh; overflow-x: hidden;height: auto; width:260px;">
        <input id="iconified" class="form-control empty" type="text" placeholder="&#xF002; Search" onkeyup="filter(this,'theList')" style="width:260px; background-color:#f4f4f4; height:30px;" />
<?php
    for ($j =0;$j<$num;$j++){
        $sql0 = "SELECT * FROM employee WHERE comp_id ='$id[$j]'";
        $query0 = $pdo->prepare($sql0);
        $query0->execute();
        $result0[$j] = $query0->fetch();
        //print_r($result0[$j]["name"]);
        echo "
               <li>
               <a href='../site/visitProfile.php?empId=".$result0[$j]["comp_id"]."'>
                <i class='fa fa-circle' aria-hidden='true' style='color: #398439; margin-top:12px; font-size:10px; margin-right:10px;'></i>
                <img src='";if($result0[$j]["image"]!='null'){echo "../".$result0[$j]["image"]."'";}else{echo "../../public/images/default.png'";}echo "style='width:30px; height:30px; margin-right:10px;' />".$result0[$j]["name"]."
               </a>
               </li>
        ";
    }

?>
    </ul>
</div>
<script language="javascript" type="text/javascript">
    $('#iconified').on('keyup', function() {
        var input = $(this);
        if(input.val().length === 0) {
            input.addClass('empty');
        } else {
            input.removeClass('empty');
        }
    });

    function filter(element) {
        var value = $(element).val().toLowerCase();;

        $("#theList > li").each(function() {
            var listVal = $(this).text().toLowerCase();
            if (listVal.indexOf(value)>= 0) {
                $(this).show();
            }
            else {
                $(this).hide();
            }
        });
    }
</script>

