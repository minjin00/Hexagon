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
$상품이름 = $conn->real_escape_string($_POST['name']);
$대출종류 = $conn->real_escape_string($_POST['type']);
$대출대상 = $conn->real_escape_string($_POST['target']);
$대출기간 = $conn->real_escape_string($_POST['deadline']);
$대출한도 = $conn->real_escape_string($_POST['limit']);
$링크 = $conn->real_escape_string($_POST['link']);

$sql = "INSERT INTO 대출 (은행이름, 상품이름, 대출종류, 대출대상, 대출기간, 대출한도, 링크) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $은행이름, $상품이름, $대출종류, $대출대상, $대출기간, $대출한도, $링크);

if ($stmt->execute()) {
    echo "데이터가 성공적으로 저장되었습니다.";
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}

$stmt->close();

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
