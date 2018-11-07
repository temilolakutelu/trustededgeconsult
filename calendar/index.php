<?php
include("config.php");

if (isset($_POST['action']) or isset($_GET['view'])) //show all events
{
    if (isset($_GET['view'])) {
        header('Content-Type: application/json');
        $start = mysqli_real_escape_string($conn, $_GET["start"]);
        $end = mysqli_real_escape_string($conn, $_GET["end"]);

        $result = mysqli_query($conn, "SELECT id, start ,end ,title FROM  fc_events_table where (date(start) >= '$start' AND date(start) <= '$end')");
        while ($row = mysqli_fetch_assoc($result)) {
            $events[] = $row;
        }
        echo json_encode($events);
        exit;
    }
}
?>