<?php
function fetchDomesticVisitorsData($conn) {
    $sql = "SELECT * FROM domestic_visitors";
    $result = $conn->query($sql);
    $data = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    
    return $data;
}

function fetchDomesticTouristsData($conn) {
    $sql = "SELECT * FROM domestic_tourists";
    $result = $conn->query($sql);
    $data = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    
    return $data;
}

function calculateTotal($data, $column) {
    $total = 0;
    foreach ($data as $row) {
        $total += $row[$column];
    }
    return $total;
}
?>