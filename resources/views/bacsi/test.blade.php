
<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1">
    <title>Document</title>
    <link rel=stylesheet href=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css integrity=sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh crossorigin=anonymous>
</head>

<body>
    <h1 class=text-center>FETCH API</h1>
    <div class="container text-center"><button class="btn btn-primary" id=btn1>Covid 19 - Global</button></div><br>
    <div class="container text-center"><button class="btn btn-primary" id=btn1-vn>Covid 19 - Viet Nam</button></div>
    <div class="container text-center" id="results"></div>
</body>
<script>
    var btn1 = document.getElementById("btn1");
    var btn1_vn = document.getElementById("btn1-vn");
    btn1_vn.addEventListener('click', () => {

        // fetch request to api

        fetch('https://corona.lmao.ninja/v2/countries/vn')
            .then((response) => {
                return (response.json());
            })
            .then((data) => {

                results.innerHTML = `
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Country: ${data.country}</strong></li>
                <li class="list-group-item"><strong>Cases: </strong> ${data.cases}</li>
                <li class="list-group-item"><strong>Deaths: </strong> ${data.deaths}</li>
            </ul>
        `;
            })
    })
    btn1.addEventListener('click', () => {

        // fetch request to api

        fetch('https://corona.lmao.ninja/v2/countries')
            .then((response) => {
                return (response.json());
            })
            .then((data) => {

                var results = document.getElementById('results');

                var template = `
            <h4 class="mt-4">Covid Cases</h4>
        `
                data.forEach((element) => {
                    template += `
                <ul class="list-group mb-4">
                    <li class="list-group-item"><strong>Country: ${element.country}</strong></li>
                    <li class="list-group-item"><strong>Cases: </strong> ${element.cases}</li>
                    <li class="list-group-item"><strong>Deaths: </strong> ${element.deaths}</li>
                </ul>
            `
                })

                results.innerHTML = template;
            })
    })
</script>

<script>
    function gtag() {
        dataLayer.push(arguments)
    }
    window.dataLayer = window.dataLayer || [], gtag("js", new Date), gtag("config", "UA-111717926-1")
</script>

</html>