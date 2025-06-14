<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,800;1,400&display=swap"
        rel="stylesheet">


</head>

<body>
    <div id="header">
        <table class="center" style="border-spacing: 0px;">
            <thead>

                <tr>
                    <th><img class="logo" height="50px" src="{{ url('frontend/image/logo.png') }}" alt="">
                    </th>
                    <th style="font-weight: bold;">
                        <th style="border-right: 1px solid black;height:10px;margin-left:20px;padding-left:30px;"></th>
                        <ul style="">
                            <img src="{{ url('frontend/image/location.png') }}" alt="" width="7px"
                                style="position: relative;top:35px;left:-10px">
                            <li class="mb-3">
                                <a href="javascript:void(0)" class="icon-group">
                                    <span class="f-14 " style="margin-left: 1">
                                        C/o. Calcutta Tea Centre, 5, Dattani Shopping Centre, Vasanji Lalji Road,
                                        Kandivali
                                        (West), Mumbai - 400 067.
                                    </span>
                                </a>
                            </li>
                            <li class="mb-3" style="position: relative;left:-9px">
                                <a href="tel:+91-22-2866 0169" class="icon-group">
                                    <img src="{{ url('frontend/image/phone.png') }}" alt="" width="7px">
                                    <span class="contact-link f-14">
                                        +91-22-2866 0169
                                    </span>
                                </a>

                                <a href="mailto:info@jjckandivali.com" class="icon-group" style="margin-left: 30px;">
                                    <img src="{{ url('frontend/image/e-mail.png') }}" alt="" width="7px">
                                    <span class="contact-link f-14">
                                        info@jjckandivali.com
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </th>

                </tr>
            </thead>
        </table>
    </div>
    <div id="footer" class="footer-styles" style="margin-right: 20px;margin-left:20px">
        <p align="right" class="page">Page no. </p>
    </div>
    <div id="content">
        <div style="">
            <h3 class=" mx-auto text-center " style="">Candidate Details</h3>

            <h5 class="mt text-right">Profile Status : <span class="text-green">Approved</span></h5>
            <table class="center">
                <thead>
                    <tr>
                        <th>Full Name*</th>
                        <th>Email ID*</th>
                        <th>DOB*</th>
                        <th rowspan="4">
                            <img src="frontend/image/profile_static.svg" alt="" class="custm-img " width="100px"
                                style="">
                        </th>
                    </tr>
                    <tr>

                        <td>Admin</td>
                        <td>Admon@test.com</td>
                        <td>01/01/2000</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <th>Gender*</th>
                        <th style="margin-left: 40px">Place OF Birth*</th>
                        <th>Native Place*</th>
                    </tr>

                    <tr>
                        <td>Male</td>
                        <td>Mumbai</td>
                        <td>Mumbai</td>
                    </tr>
                </tbody>

            </table>

            <table class="center" style="">
                <thead>
                    <tr>
                        <th>Marital Status*</th>
                        <th>Status Of Children*</th>
                        <th>No. of Children*</th>
                        <th>Caste*</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Married</td>
                        <td>living With Me</td>
                        <td>2</td>
                        <td>Caste D</td>
                        <td style=""></td>
                    </tr>

                </tbody>

            </table>


            <table class="center" style="">
                <thead>

                    <tr>
                        <th>Sub Caste*</th>
                        <th>Mother Tongue*</th>
                        <th>Manglik*</th>
                        <th>Handicap*</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Open</td>
                        <td>English</td>
                        <td>No</td>
                        <td>No</td>
                        <td style=""></td>
                    </tr>

                </tbody>

            </table>

            <h3 class=" mt mx-auto text-center" style="margin-top: 20px">Education & Occupation Details</h3>

            <table class="center" style="margin-top: 20px">
                <thead>

                    <tr>
                        <th>Education*</th>
                        <th>Medium*</th>
                        <th>Education Details*</th>
                        <th>Occupation*</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Graduate</td>
                        <td>English</td>
                        <td>Master</td>
                        <td>Business</td>
                        <td style=""></td>
                    </tr>

                </tbody>

            </table>
            {{-- <br><br><br><br><br><br><br><br> --}}
            <table class="center" style="margin-top: 20px">
                <thead>

                    <tr>
                        <th>Occupation Details*</th>
                        <th>Income (PA) - in Lakhs*</th>
                        <th>Occupation Address*</th>
                        <th>Mobile Number (WhatsApp No.)*</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>No Details </td>
                        <td>1000000</td>
                        <td>UAE</td>
                        <td>8888888888</td>
                        <td style=""></td>
                    </tr>

                </tbody>

            </table>
            <table class="center" style="margin-top: 15px">
                <thead>

                    <tr>
                        <th>No. of Married Sisters (Other than Candidate)*</th>
                        <th>No. of Unmarried Sisters (Other than Candidate)*</th>
                        <th>No. of Married Brothers (Other than Candidate)*</th>
                        <th>No. of Unmarried Brothers (Other than Candidate)*</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>1 </td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td style=""></td>
                    </tr>

                </tbody>

            </table>

            <div class="page_break"></div>

            <h3 class=" text-center mx-auto">Details Of Mosal</h3>

            <table class="" width="50%">
                <thead>

                    <tr>
                        <th>Name of Nana/ Mama's Name</th>

                        <th>Mobile Number (WhatsApp No.)
                        </th>
                        <th>Residential Address</th>


                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Xyz </td>
                        <td>8888888888</td>
                        <td>Mumbai </td>
                        <td style=""></td>
                        <td style=""></td>
                        <td style=""></td>
                    </tr>



                </tbody>
                {{-- <p
                    style="background:white;position:relative;top:-173px;right:-380px;width:250px;height:137px;padding:5px">
                    Mumbai</p> --}}
            </table>

            <div>
                <h3 class="mx-auto text-center" style="">
                    Two References Who Know About You / Your Family
                </h3>
                <table class="" width="50%">
                    <h4 class="mt">Person 1</h4>
                    <thead>

                        <tr>
                            <th>Name of Nana/ Mama's Name</th>

                            <th>Mobile Number (WhatsApp No.)
                            </th>
                            <th>Residential Address</th>


                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>Xyz </td>
                            <td>8888888888</td>
                            <td>Mumbai </td>
                            <td style=""></td>
                            <td style=""></td>
                            <td style=""></td>
                        </tr>



                    </tbody>
                    {{-- <p
                        style="background:white;position:relative;top:-173px;right:-380px;width:250px;height:137px;padding:5px">
                        Mumbai</p> --}}
                </table>
                <table class="" width="50%">
                    <thead>
                        <h4 class="mt">Person 2</h4>

                        <tr>
                            <th>Name of Nana/ Mama's Name</th>

                            <th>Mobile Number (WhatsApp No.)
                            </th>
                            <th>Residential Address</th>


                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>Xyz </td>
                            <td>8888888888</td>
                            <td>Mumbai </td>
                            <td style=""></td>
                            <td style=""></td>
                            <td style=""></td>
                        </tr>



                    </tbody>
                    {{-- <p
                        style="background:white;position:relative;top:-173px;right:-380px;width:250px;height:137px;padding:5px">
                        Mumbai</p> --}}
                </table>

            </div>



            <div style="">
                <h3 class=" mt mx-auto text-center">
                    Family Details
                </h3>
                <table class="center">
                    <thead>

                        <tr>
                            <th>Name Of Father*</th>
                            <th>Occupation*</th>
                            <th>Name Of Mother*</th>
                            <th>Occupation*</th>


                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>Xyz </td>
                            <td>Business</td>
                            <td>Abc</td>
                            <td>Salaried</td>


                        </tr>

                    </tbody>

                </table>
            </div>
            <h3 class=" mt text-center" style="margin-top:20px">
                Candidate's Special Choice
            </h3>
            <table class="center">
                <thead>

                    <tr>
                        <th>Choice Of Life Partner*</th>
                        <th>Willing to Settle abroad*</th>
                        <th>Willing to Marry having Strictly Jain Food habits*</th>



                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Never Married </td>
                        <td style="">
                            <span style="position:relative;top:-5px"> No </span>
                        </td>
                        <td style="">
                            <span style="position:relative;top:-5px"> No </span>
                        </td>




                    </tr>

                </tbody>

            </table>
            <h3 class="p-left mt text-center">
                Mumbai Contact For Outside Candidate
            </h3>
            <table class="center">
                <thead>

                    <tr>
                        <th>Name*</th>
                        <th>Mobile Number*</th>
                        <th>Family Relation*</th>
                        <th>Residential Address*</th>


                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Xyz </td>
                        <td>8888888888</td>
                        <td>Relative</td>
                        <td>Mumbai</td>

                        <td style=""></td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
</body>

<style>
    body {
        background-color: #fff;
        position: relative;
        font-family: "Poppins", sans-serif;
        --bs-body-color: #000;
    }

    @page {
        margin: 150px 40px 70px 40px;
    }

    .page_break {
        page-break-before: always;
    }

    * {
        font-size: 12px;
        font-family: 'Poppins', sans-serif;
    }
    h3{
        font-size: 15px;
    }

    #header {
        position: fixed;
        left: 0px;
        top: -150px;
        right: 0px;
        height: 172px;
        text-align: center;
    }

    #footer {
        position: fixed;
        bottom: -115px;
        right: 0px;
        height: 115px;
        width: 100%;
    }

    #footer .page:after {
        content: counter(page, upper-roman);
    }

    .center {
        /* margin-top: 30px; */
    }

    .text-left {
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    table {
        width: 100%
    }

    .p-left {
        /* padding-left: 25px; */
    }

    .custm-img {
        justify-content: right;
        margin: 10px 0px;
    }

    .mt {
        /* margin-top: 20px; */
    }

    .ml {
        /* margin-left: 30px; */
    }

    td {
        text-align: left;

        /* background: white; */
        border-radius: 5px;
    }

    th {
        text-align: left;

    }

    table {
        /* margin-left: 20px; */
    }

    .text-green {
        color: #40BC05;
    }

    ul li a {
        text-decoration: none;
        color: gray;
    }

    ul {
        list-style: none;
    }

    .f-14 {
        font-size: 12px;
    }

    table,
    th,
    td {

        padding: 5px;
    }

    table {
        border-spacing: 5px;
    }
</style>

</html>
