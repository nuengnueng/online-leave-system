
<?php include('../connection/connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<?php (include '../inspector/menu.html');?>
<a href="main.php" class="btn btn-success mb-3" >ย้อนกลับ </a>

<head>
    <body>
<div class="container">
<a class="alert alert-primary h5 text-center mt-4" role="alert">รายละเอียดลางาน</a><br><br>
<div class="alert alert-primary" role="alert">

    <h5>พนักงานส่วนตำบล</h5>
<option selected="">ประเภทการลา</option>
<div class="alert alert-secondary" role="alert">    
<p>การลาป่วย</p>
        <tr>
            <td>1. เสนอใบลาต่อผู้บังคับบัญชาจนผู้มีอำนาจอนุญาตก่อน หรือในวันที่ลาเว้นแต่ ในกรณีจำเป็น จะเสนอใบลาในวันแรกที่มาปฏิบัติราชการก็ได้</td><br>
            <td>2. การลาป่วยตั้งแต่ 30 วันขึ้นไป ต้องมีใบรับรองแพทย์ </td><br>
            <td>3. การลาป่วยไม่ถึง 30 วันผู้บังคับบัญชาจะสั่งให้มีใบรับรองแพทย์ประกอบก็ได้</td><br>
            <td>4. ได้รับเงินเดือนระหว่างลาได้60 - 120 วัน</td> 
        </tr>
</div>
<div class="alert alert-secondary" role="alert">
    <p>การลากิจส่วนตัว</p>
        <tr>
            <td>1. เสนอใบลาต่อผู้บังคับบัญชาจนถึงผู้มีอำนาจอนุญาตและเมื่อได้รับอนุญาต จึงจะหยุดราชการได้เว้นแต่มีเหตุจำเป็นไม่สามารถรอได้ให้เสนอใบลา พร้อมเหตุผลความจำเป็น แล้วหยุดราชการไปก่อนได้  </td><br>
            <td>2. ได้รับเงินเดือนระหว่างลาไม่เกิน 45 วัน เว้นแต่ ในปีแรกที่เข้ารับราชการ ได้รับเงินเดือนระหว่างไม่เกิน 15 วัน</td><br>
            <td>3. ลากิจเพื่อเลี้ยงดูบุตรต่อเนื่องจากการลาคลอดบุตรได้ไม่เกิน 150 วัน โดยไม่ได้รับเงินเดือน</td>
        </tr>
</div>
        <div class="alert alert-secondary" role="alert">
    <p>การลาพักผ่อน</p>
        <tr>
            <td>1. เสนอใบลาต่อผู้บังคับบัญชาจนถึงผู้มีอำนาจอนุญาต และเมื่อได้รับอนุญาตจึงจะหยุดราชการได้  </td><br>
            <td>2. มีสิทธิลาพักผ่อนได้ 10 วัน เว้นแต่ บรรจุเข้ารับราชการยังไม่ถึง 6 เดือน</td><br>
                <a>2.1 สะสมวันลาไม่เกิน 20 วัน</a><br>
                <a>2.2 รับราชการไม่น้อยกว่า 10 ปี สะสมวันลาได้ไม่เกิน 30 วัน</a>
            <td>3. พนักงานที่ปฏิบัติงานในสถานศึกษาและมีวันหยุดภาคการเรียนหากได้หยุดราชการตามวันหยุดภาคการเรียนเกินกว่าวันลาพักผ่อน จะไม่มีสิทธิลาพักผ่อน</td>
        </tr>
</div>
        <div class="alert alert-secondary" role="alert">
    <p>การลาคลอดบุตร</p>
        <tr>
            <td>1. เสนอใบลาต่อผู้บังคับบัญชาจนถึงผู้มีอ านาจอนุญาต ก่อนหรือวันที่ลา เว้นแต่ ไม่สามารถลงชื่อในใบลาได้จะให้ผู้อื่นลาแทนก็ได้แต่เมื่อลงชื่อได้แล้ว ให้จัดส่งใบลาโดยเร็ว  </td><br>
            <td>2. ได้รับเงินเดือนครั้งหนึ่งได้90 วัน</td><br>
            <td>3. ไม่ต้องมีใบรับรองแพทย์ </td>
        </tr>
</div>
    <div class="alert alert-secondary" role="alert">
    <p>การลาอุปสมบทหรือประกอบพิธีฮัจย์</p>
        <tr>
            <td>1. ตั้งแต่เริ่มรับราชการ ยังไม่เคยอุปสมบทหรือประกอบพิธีฮัจย์</td><br>
            <td>2. เสนอใบลาต่อผู้บังคับบัญชาจนถึงผู้มีอำนาจอนุญาตก่อนวันอุปสมบท วันเดินทางไปประกอบพิธีฮัจย์ไม่น้อยกว่า 60 วัน </td><br>
            <td>3. ต้องอุปสมบทหรือออกเดินทางไปประกอบพิธีฮัจย์ภายใน 10 วัน </td><br>
            <td>4. ให้รายงานตัวกลับเข้าปฏิบัติราชการภายใน 5 วัน นับแต่วันลาสิกขาหรือ เดินทางกลับจากไปประกอบพิธีฮัจย์ทั้งนี้ จะต้องนับรวมอยู่ภายในระยะเวลาที่ได้รับอนุญาตการลา  </td><br>
            <td>5. รับราชการไม่น้อยกว่า 1 ปี</td><br>
            <td>6. ได้รับเงินเดือนระหว่างลาไม่เกิน 120 วัน</td>
        </tr>
</div>
    <div class="alert alert-secondary" role="alert">
    <p>การลาเข้ารับการตรวจเลือก หรือเข้ารับการเตรียมพล</p>
        <tr>
            <td>1. ด้รับหมายเรียกเข้ารับการตรวจเลือกให้รายงานลาต่อผู้บังคับบัญชาก่อนวันเข้ารับการตรวจเลือก ไม่น้อยกว่า 48 ชั่วโมง ส่วนที่ได้รับหมายเรียกเข้ารับการเตรียมพล ให้รายงานลาต่อผู้บังคับบัญชาภายใน 48 ชั่วโมง นับตั้งแต่ เวลารับหมายเรียก</td><br>
            <td>2. ให้เข้ารับการตรวจเลือก/เข้ารับการเตรียมพล ตามเวลาในหมายเรียกนั้นโดย ไม่ต้องรอรับคำสั่งอนุญาต </td><br>
            <td>3. ต้องอุปสมบทหรือออกเดินทางไปประกอบพิธีฮัจย์ภายใน 10 วัน </td><br>
            <td>4. ได้รับเงินเดือนระหว่างลา </td>
        </tr>
</div>
    <div class="alert alert-secondary" role="alert">
    <p>การลาติดตามคู่สมรส</p>
        <tr>
            <td>1. ให้เสนอใบลาต่อผู้บังคับบัญชาตามลำดับจนถึงปลัดกระทรวงเพื่อพิจารณาอนุญาต </td><br>
            <td>2. ลาได้ไม่เกิน 2 ปีกรณีจำเป็นอาจอนุญาตให้ลาต่อได้อีก 2 ปีเมื่อรวมไม่เกิน 4 ปีถ้าเกิน 4 ปีให้ลาออก</td><br>
            <td>3. ไม่ได้เงินเดือนระหว่างลา</td>
        </tr>
</div>
    <div class="alert alert-secondary" role="alert">
    <p>ลาไปช่วยเหลือภริยาที่คลอดบุตร</p>
        <tr>
            <td>1. ให้เสนอใบลาต่อผู้บังคับบัญชาตามลำดับจนถึงผู้มีอำนาจอนุญาตเพื่อพิจารณาอนุญาต ก่อนหรือในวันที่ลาภายใน 90 วัน นับแต่วันที่คลอดบุตร </td><br>
            <td>2. ลาได้ครั้งหนึ่งติดต่อกันได้ไม่เกิน 15 วันทำการ</td><br>
            <td>3. ได้รับเงินเดือนระหว่างลา โดยต้องลาภายใน 30 วัน นับแต่ภริยาคลอดบุตร</td>
        </tr>
        </div>
</div>
<div class="alert alert-danger" role="alert">
<h5>พนักงานส่วนตำบล</h5>
<option selected="">ประเภทการลา</option>
<div class="alert alert-warning" role="alert">
    <option>การลาป่วย</option>
        <tr>
            <td>1. ลาป่วยกรณีทั่วไป</td><br>
                <td> 1.1 พนักงานจ้างตามภารกิจ ไม่เกิน 60 วัน</td><br> 
                <td> 1.2 พนักงานจ้างทั่วไป</td> <br>
                <td> (1) ระยะเวลาจ้าง 1 ปีไม่เกิน 15 วัน</td> <br>
                <td> (2) ระยะเวลาจ้าง 9 เดือน น้อยกว่า 1 เดือน ไม่เกิน 8 วัน</td> <br>
                <td> (3) ระยะเวลาจ้าง 6 เดือน น้อยกว่า 9 เดือน ไม่เกิน 6 วัน</td> <br>
                <td> (4) น้อยกว่า 6 เดือน ไม่เกิน 4 วัน </td><br>
            <td>2. ลาป่วยกรณีประสบอันตรายเพราะเหตุปฏิบัติงานในหน้าที่</td><br>
                <td>2.1 พนักงานจ้างภารกิจ</td> <br>
                <td>(1) ถ้าลาป่วยครบ 60 วันแล้ว ตามข้อ 1.1 แล้วยังไม่หายอนุญาตให้ลาตามที่เห็นสมควร</td><br>
                <td>-แพทย์ลงความเห็นว่ารักษาหายและรับราชกสนต่อได้ ให้นายก อปท. อนุญาตให้ลาตามที่เห็นสมควร โดยได้รับค่าตอบแทนอัตราปกติ<td><br>
                <td>- ถ้าแพทย์ลงความเห็นว่าไม่มีทางรักษาหาย ก็ให้พิจารณาเลิกจ้าง (2)ตามข้อ (1) และตกเป็นผู้ทุพพลภาพ/พิการ</td><br>
                <td>- หาก นายก อปท. พิจารณาแล้วเห็นว่าพนักงานจ้างยังอาจปฏิบัติหน้าที่อื่นที่เหมาะสมได้ และพนักงานจ้างผู้นั้นสมัครใจ</td><br>
                <td>- ให้สั่งพนักงานจ้างผู้นั้นไปปฏิบัติหน้าที่ในต าแหน่งอื่น โดยไม่ต้องเลิกจ้างโดยให้อยู่ในดุลยพินิจของนายก อปท.</td><br>
                <td>2.2 พนักงานจ้างทั่วไป</td><br>
                <td>ถ้าลาป่วยครบตาม ข้อ 1.2 แล้วไม่หาย</td><br>
                <td>- แพทย์ลงความเห็นว่ารักษาหายและรับราชการต่อได้ให้นายก อปท.</td><br>
                <td>-อนุญาตให้ลาตามที่เห็นสมควร โดยได้รับค่าตอบแทนอัตราปกติแต่ไม่เกิน 60 วัน</td><br>
                <td>- ถ้าแพทย์ลงความเห็นว่าไม่มีทางรักษาหาย ก็ให้พิจารณาเลิกจ้าง</td><br>
                <td>***หมายเหตุการลาป่วยเกิน 3 วัน ต้องมีใบรับรองแพทย์***</td><br>
        </tr>
</div>
<div class="alert alert-warning" role="alert">
    <option>การลากิจส่วนตัว</option>
        <tr>
            <td>-พนักงานจ้างตามภารกิจ มีสิทธิลาไม่เกิน 45 วัน</td><br>
            <td>- ยกเว้น ปีแรกที่ได้รับการจ้าง มีสิทธิลาไม่เกิน 15 วัน</td><br>
            <td>***หมายเหตุพนักงานจ้างทั่วไป ไม่มีสิทธิลากิจ***</td>
        </tr>
</div>
<div class="alert alert-warning" role="alert">
    <option>การลาพักผ่อน</option>
        <tr>
            <td> -พนักงานจ้างตามภารกิจ และพนักงานจ้างทั่วไปมีสิทธิพักผ่อนไม่เกิน 10 วันทำการสำหรับในปีแรก ได้รับการจ้างไม่เกิน 6 เดือน ไม่มีสิทธิลาเว้นแต่ผู้ที่เคยได้รับการจ้างเป็นพนักงานจ้างมาแล้ว ไม่น้อยกว่า 6 เดือนและพ้นจากการเป็นพนักงานจ้างไปแล้วต่อมาเป็นพนักงาน ที่อปท. เดิมอีก </td>
        </tr>
</div>
<div class="alert alert-warning" role="alert">
    <option>การลาคลอดบุตร</option>
        <tr>
            <tb>1.พนักงานจางตามภารกิจ และพนักงานจ้างทั่วไป </td>
            <P>- ลาได้90 วัน (นับวันหยุดรวมด้วย)</P>
            <P>- ได้รับค่าตอบแทนระหว่างลา 45 วัน</P>
            <P>- มีสิทธิได้รับเงินสงเคราะห์การหยุดงานเพื่อการคลอดบุตร จากกองทุน ประกันสังคม ทั้งตามกฎหมายว่าด้วยประกันสังคม</P>  
            <P>***หมายเหตุ แก้ไขตามประกาศ ก.กลาง เรื่อง มาตรฐาน ทั่วไปเกี่ยวกับพนักงานจ้าง***</P>
        </tr>
</div>
        <div class="alert alert-warning" role="alert">
    <option>การลาอุปสมบทหรือประกอบพิธีฮัจย์</option>
        <tr>
            <tb>พนักงานจ้างตามภารกิจ  </tb><br>
                <td>-พนักงานจ้างตามภารกิจ</td><br>
                <td>-ในปีแรกที่จ้างเข้าปฏิบัติลาโดยไม่ได้รับคำตอบแทน</td><br>
                <td>- นายก อปท. เป็นผู้อนุญาตให้ลา</td><br>
                <td>***หมายเหตุพนักงานจ้างทั่วไปไม่มีสิทธิลา***</td><br>
        </tr>
</div>
        <div class="alert alert-warning" role="alert">
    <option>การลาเข้ารับการตรวจเลือก หรือเข้ารับการเตรียมพล</option>
        <tr>
            <td>1. ลาเข้ารับการตรวจเลือก พนักงานจ้างทุกประเภทมีสิทธิลา โดยได้รับค่าตอบแทนอัตราปกติ</td><br>
            <td>2. เข้ารับการเตรียมพล/เข้ารับการฝึกวิชาการทหาร/เข้ารับ การทดลองเตรียมความพรั่งพร้อม(พนักงานจ้างตามภารกิจ มีสิทธิลาโดยได้รับค่าตอบแทนอัตราปกติ)</td>
        </tr>
</div>





</body>
</head>