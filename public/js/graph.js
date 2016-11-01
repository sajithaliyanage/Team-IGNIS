/**
 * Created by Gothami on 11/1/2016.
 */

google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {

    // <?php
    //     //display no of employees belongs to a particular department
    //     $sql="SELECT * from department where currentStatus=:approve ";
    // $query = $pdo->prepare($sql);
    // $query->execute(array('approve'=>"approved"));
    // $result = $query->fetchAll();
    // $rows = $query->rowCount();
    // $depName=[];
    // $emps=[];
    // $i=0;
    // while ($rows>0) {
    //     $depName[$i]=$result[$rows-1]['dept_name'] . ',';
    //     $emps[$i]=$result[$rows-1]['no_of_emp'] . ',';
    //     $rows=$rows-1;
    //     $i=$i+1;
    // };
    // ?>

    var data = google.visualization.arrayToDataTable([
        ['Department', 'Attendance','Absentees'],
        ['2014', 1000, 400],
        ['2015', 1170, 460],
        ['2016', 660, 1120],
        ['2017', 1030, 540]
    ]);

    var options = {
        chart: {
            title: 'Company Attendance',
            subtitle: 'Performance and the attendance in each department: 2016',
        }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, options);
}

