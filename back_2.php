<?php
function low_quantity($data) {
    return $data - ($data * 0.5);
}
function medium_quantity() {
    return 0;
}
function high_quantity($data) {
    return $data * 0.5;
}
function handleQuantity($data) {
    if ($data < 7) {
        $result = low_quantity($data);
    } elseif ($data == 10) {
        $result = medium_quantity();
    } elseif ($data > 40) {
        $result = high_quantity($data);
    } else {
        $result = $data;  // главное отличие — остаётся как есть
    }
    return (int) round($result);
}
function countUniqueResults($start, $end) {
    $unique = [];
    for ($i = $start; $i <= $end; $i++) {
        $unique[handleQuantity($i)] = true;
    }
    return count($unique);
}
echo "Диапазон 1-15: " . countUniqueResults(1, 15) . " уникальных результатов\n";
echo "Диапазон 3-55: " . countUniqueResults(3, 55) . " уникальных результатов\n";
echo "Диапазон 9-43: " . countUniqueResults(9, 43) . " уникальных результатов\n";
?>