// 자바스크립트 코드
// 카테고리 필터링 함수
function filterItems(category) {
    // 모든 항목 숨기기
    $('.row > .col-4').hide();

    if (category === 'all') {
        // 'All' 카테고리를 선택한 경우 모든 항목 보여주기
        $('.row > .col-4').show();
    } else {
        // 선택한 카테고리에 해당하는 항목만 보여주기
        $('.row > .col-4[data-filter="' + category + '"]').show();
    }
}

// 카테고리 버튼 클릭 이벤트 처리
$('#nav ul li a').on('click', function (e) {
    // 기본 이벤트 동작 막기
    e.preventDefault();

    // 선택한 카테고리 값 가져오기
    var category = $(this).data('filter');

    // 카테고리 필터링 함수 호출
    filterItems(category);
});