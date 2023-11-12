<?php
// MySQL 연결
$conn = mysqli_connect("localhost", "root", "a123456789", "capston");
$user_password = $_POST['password']; 
$my_password = "qwer1234"; 

if ($user_password !== $my_password) {
    die("Error: 비밀번호가 일치하지 않습니다.");
}
// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 사용자로부터 받은 데이터 // 정수로 변환
$기관이름 = $conn->real_escape_string($_POST['engine']);
$정책이름 = $conn->real_escape_string($_POST['title']);
$정책내용 = $conn->real_escape_string($_POST['content']);
$지원대상 = $conn->real_escape_string($_POST['object']);
$신청방법 = $conn->real_escape_string($_POST['application']);
$참고사이트 = $conn->real_escape_string($_POST['link']);
$마감날짜 = $conn->real_escape_string($_POST['deadline']);
$키워드 = $conn->real_escape_string($_POST['key']);
$이미지링크 = $conn->real_escape_string($_POST['imglink']);



// SQL 쿼리 (prepared statement)
$sql = "INSERT INTO 정책 (no, 기관이름, 정책이름, 정책내용, 지원대상, 신청방법, 참고사이트 ,마감날짜, 키워드, 이미지링크) VALUES (?, ?, ?, ?, ?, ?, ?, ?,? ,?)";

// prepared statement 생성
$stmt = $conn->prepare($sql);

// 바인딩
$stmt->bind_param("isssssssss", $no, $기관이름, $정책이름, $정책내용, $지원대상, $신청방법, $참고사이트, $마감날짜, $키워드, $이미지링크);

// 쿼리 실행
if ($stmt->execute()) {
    echo "데이터가 성공적으로 저장되었습니다.";
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}

// prepared statement 종료
$stmt->close();



// 연결 닫기
$conn->close();
?>

<!-- PHP 파일 내에서 CSS 파일을 링크 -->
<link rel="stylesheet" type="text/css" href="main.css">

<!-- 이전 페이지로 돌아가는 버튼 -->
<br>
<br>
<button onclick="goBack()">이전 페이지로 돌아가기</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>