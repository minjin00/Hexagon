function makeExample(main) {

    let tmp = '';
    for (let m of main) {
        tmp += `<div class='col-4 col-6-medium col-12-small' data-filter='${m.key}'>
                    <section class="box">
                        <a href='#' class='image featured'><img src='${m.imglink}' alt='' /></a>
                        <header><h3>${m.title}</h3></header>
                        <p>${m.content}</p>
                            <footer>
                                <ul class='actions'>
                                    <li>마감 날짜: ${m.deadline}</li>
                                </ul>
                                <ul class='actions'>
                                    <li data-filter='${m.key}'>#${m.key}</li>
                                    <li><a href='#' class='button alt')'>더보기</a></li>
                                </ul>
                            </footer>
                    </section>
                </div>`
    }
    document.getElementById('my-main').innerHTML = tmp;

}
window.onload = function () {
    fetch("/DB/policyinfo.php")
        .then(response => response.json())
        .then(json => {
            //this.list = json.list
            makeExample(json.result)

        })
}