<?php
$conn = mysqli_connect("127.0.0.1", "root", "ww4026287", "capston");

$page = isset($_GET['page']) ? $_GET['page'] : 0;  // 현재 페이지 번호 (URL의 쿼리 파라미터로 받음)
$itemsPerPage = 6;  // 한 페이지에 표시할 항목의 수

// LIMIT와 OFFSET를 사용하여 필요한 데이터만 가져옴
$query = "SELECT * FROM 정책 LIMIT $itemsPerPage OFFSET " . ($page * $itemsPerPage);
$res = mysqli_query($conn, $query);


$result = array();

while ($row = mysqli_fetch_array($res)) {
    array_push(
        $result,
        array(
            'no' => $row[0],
            'engine' => $row[1],
            'title' => $row[2],
            'content' => $row[3],
            'object' => $row[4],
            'application' => $row[5],
            'link' => $row[6],
            'deadline' => $row[7],
            'key' => $row[8],
            'imglink' => $row[9]
        )
    );
}

echo json_encode(array("result" => $result), JSON_UNESCAPED_UNICODE);

$conn->close();
?>