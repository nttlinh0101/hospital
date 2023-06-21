<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="border: 1px solid black;" class="box">
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lịch khám </h3>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$thanhtoan}}</p>
        <div class="row">
            <div class="col-1">
                <h4 style="color: brown;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STT: {{$STT}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày : {{$ngaykham}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phòng : {{$phong}} </h4>
                <h5></h5>
            </div>

        </div>
        <div class="row">
            <div class="col-1">
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bệnh nhân: &nbsp;&nbsp;&nbsp;&nbsp;{{$name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày sinh:&nbsp;&nbsp;&nbsp;&nbsp; {{$ngaysinh}}</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-1">
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bác sĩ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$BS}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Khoa : {{$Khoa}}</h4>
                <h5></h5>
            </div>

        </div>
        <div class="row">
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Viện phí :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 150.000 VNĐ</h4>
        </div>
        <div class="row">
            <div class="col-1">
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ca sáng :</h4>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(STT1 : 7 giờ) (STT2 : 7 giờ 15) (STT3 : 8 giờ) (STT4 : 8 giờ 15) (STT5 : 8 giờ 30) </h4>
                <h5></h5>
            </div>


        </div>
        <div class="row">
            <div class="col-1">
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ca chiều :</h4>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(STT1 : 13 giờ) (STT2 : 13 giờ 15) (STT3 : 14 giờ) (STT4 : 14 giờ 15) (STT5 : 14 giờ 30) </h4>
                <h5></h5>
            </div>


        </div>
    </div>
</body>

</html>
<style>
.box {
    border: 1px solid black;
    width: 50rem;
    display: -ms-inline-grid;
    margin-left: 400px;
    padding-bottom: 5rem;


}

h3 {
    text-align: center;
    height: 1rem;
}

h4 {
    text-align: center;
    font-weight: bold;

}

h5 {
    padding-left: 1rem;
    text-align: center;
    color: red;
}

p {
    text-align: center;
    height: 1rem;
}

.row {
    height: 2rem;
    padding-bottom: 1px;
    text-align: center;
    display: flex;
    padding-left: 5rem;

}

.col-2 {
    padding-left: 4rem;
    display: flex;
}

.col-1 {
    display: flex;
}
</style>