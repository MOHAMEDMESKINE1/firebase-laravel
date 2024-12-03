<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>EXPORT-PDF</title>

    <style>
        * {
            font-family: Verdana !important;

        }

        @page:first {
            margin-top: 0;
        }

        @page {
            margin-top: 5mm;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 10px;
            box-sizing: border-box;


        }

        .content {
            width: 100% !important;
        }

        .text-center {
            text-align: center !important;
            vertical-align: middle !important;
        }

        .head-text {
            font-size: 4pt !important;
            line-height: 1.2em !important;
            text-align: center !important;
        }

        h2 {
            line-height: 1.8em !important;
            font-size: 12pt !important;


        }

        h3 {
            line-height: 1.7em !important;

        }

        table {

            border: 2px dotted #ccc !important;
            border-radius: 10px !important;
            margin-top: 10px !important;
            padding: 13px !important;
            padding-bottom: 0px;
            width: 100%;
            height: auto;
        }

        .page-break {
            page-break-after: always !important;
        }

        p {
            font-size: 18px !important;

            line-height: 1.6em !important;

        }

        .p {
            text-indent: 50px !important;
        }

        small {
            display: block !important;
            width: 100% !important;
            text-align: center !important;
            bottom: 10px !important;
            font-size: 6pt !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            @for ($i = 0; $i < 5; $i++)
                <table width="100%" height="100%">
                    <tr>
                        <td colspan="3" class="text-center" width="30%">

                            المملكة المغربية وزارة الداخلية</br>
                            ولاية جهة سوس ماسة</br>
                            عمالة اكادير إداوتنان جماعة اكادير</br>
                            المديرية العامة للمصالح الجماعية</br>
                            قسم الشؤون الإدارية والقانونية</br>
                            مصلحة شؤون المجلس واللجان والتوثيق</br>
                            </p>
                        </td>
                        <td colspan="2">
                        </td>
                        <td width="30%" colspan="3" class="text-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Logo_de_la_Ville_d'Agadir.svg"
                                style=" height: 150px !important;">
                        </td>


                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6" class="text-center">
                            <h4>من رئيس المجلس الجماعي لاكادير
                                <br />
                                الى
                                <br />السيد MOHAMED MESKINE
                            </h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6" class="text-center" width="40%">
                            <h4><b>STATUS</b></h4>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <h4>
                                الموضوع : إشعار بعقد SESSION TITLE .<br />
                            </h4>

                            <center>
                                <h3>
                                    سلام تام بوجود مولانا الإمام،
                                </h3>
                            </center>
                            <h3>
                                وبعد،
                            </h3>
                            <p>

                            </p>
                            <p class="p">

                                علاقة بالموضوع المشار إليه أعلاه، وبناء على الظهير الشريف رقم 1.15.85 المؤرخ في 20 من
                                رمضان 1436
                                (7) يوليو (2015) بتنفيذ القانون التنظيمي رقم 113.14 المتعلق بالجماعات، ولاسيما المادة 33
                                و 35
                                منه.</p>
                            <p class="p">

                                يشرفني أن أخبركم أن المجلس الجماعي لأكادير سيعقد SESSIONS TITLE حسب جدول
                                الأعمال رفقته ب SESSIONS PLACE بتاريخ
                                SESSIONS DATE
                                .
                            </p>

                        </td>
                    </tr>
                    <tr>
                        <td width="30%" colspan="3"></td>
                        <td colspan="2" width="30%">
                            <p>وتفضلوا بقبول تحياتي . </p>
                            <center>
                                <b>
                                    <p>والسلام</p>
                                </b>
                            </center>
                        </td>
                        <td colspan="3" width="30%"></td>
                        </t>
                    <tr>
                        <td width="30%" colspan="3"></td>
                        <td colspan="2" width="30%">
                        </td>
                        <td width="30%" colspan="3">
                            <h4>
                                <p>الرئيس</p>
                            </h4>

                    </tr>
                    <tr>
                        <td colspan="9" class="  ">
                            <u><b>المرفقات</b></u>
                            <ul style="list-style-type:square ">
                                <li>جدول أعمال الدورة</li>
                                <li>الوثائق ذات الصلة</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align: center; margin-bottom: 20px; ">
                            Tél : +212 528 842 002 / +212 528 841 621 / +212 528 841 419 Fax = +212 528 842 977<br />
                            Adresse : Place Hotel de Ville B.P 4-80000 Agadir - Maroc

                        </td>
                    </tr>

                </table>
                <div class="page-break"></div>
            @endfor


        </div>
    </div>




</body>

</html>
