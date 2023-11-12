<?php
// MySQL 연결
$user_password = $_POST['password']; 
$my_password = "qwer1234"; 

if ($user_password !== $my_password) {
    die("Error: 비밀번호가 일치하지 않습니다.");
}

$conn = mysqli_connect("127.0.0.1", "root", "ww4026287", "capston");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$은행이름 = $conn->real_escape_string($_POST['bank']);
$제목 = $conn->real_escape_string($_POST['title']);
$내용 = $conn->real_escape_string($_POST['content']);
$마감날짜 = $conn->real_escape_string($_POST['deadline']);
$링크 = $conn->real_escape_string($_POST['link']);
$이율 = $conn->real_escape_string($_POST['benefit']);

$sql = "INSERT INTO 적금 (은행이름, 제목, 내용, 마감날짜, 링크, 이율) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $은행이름, $제목, $내용, $마감날짜, $링크, $이율);

if ($stmt->execute()) {
    echo "데이터가 성공적으로 저장되었습니다.";
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}

$stmt->close();

// 오늘 날짜가 지난 데이터 삭제
$sql = "DELETE FROM 적금 WHERE 마감날짜 < CURDATE()";

if ($conn->query($sql) === TRUE) {
    echo "오늘 날짜가 지난 데이터가 성공적으로 삭제되었습니다.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<link rel="stylesheet" type="text/css" href="main.css">

<br>
<br>
<button onclick="goBack()">이전 페이지로 돌아가기</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
