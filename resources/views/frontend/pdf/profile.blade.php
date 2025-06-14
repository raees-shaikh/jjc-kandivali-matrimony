<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,800;1,400&display=swap"
        rel="stylesheet">


</head>

<body>
    <div id="header" style="margin-top:-14px;background:white">
        <div style="justify-content: space-between;">
            <img class="logo mt-18" height="50px" src="{{ url('frontend/image/logo-icon.png') }}" alt=""
                style="float:left;margin-left:20px">
            <img class="logo mt-18" height="50px" src="{{ url('frontend/image/logo-name.png') }}" alt="">
            <span
                style="float:right;margin-top:17px;color:#0A142F;font-family:Poppins;opacity:0.8;margin-right:20px">Estd
                : 26-1-2019</span>
        </div>

        <small style="color:#0A142F;font-size:10px;font-family:Poppins;opacity:0.8;position:relative;top:-10px">C/o.
            Calcutta Tea Centre,5, Dattani Shopping Centre, Vasanji Lalji Road, Kandivali (West), Mumbai - 400
            067.</small>
        <p
            style="color: #0A142F;font-weight:600;font-family:Poppins;
       font-style: normal;font-size:13px;position:relative;top:-27px">
            COURTESY BY : SHREE KIRTHIBHAI, BHAILALBHAI, SHAH FAMILY</p>
        <h5
            style="color: #0A142F;font-weight:700;font-family:Poppins;
       font-size:18px;position:relative;top:-57px;opacity:0.8;">
            JAIN SAGPAN MAHITI CENTRE </h5>

        <small style="color:#0A142F;font-size:10px;font-family:Poppins;opacity:0.8;position:relative;top:-90px">Shop No
            9, Sai Raj Garden, Opp. Modi Park, Hemu Kalani Road No 3, Irani Vadi, Kandewadi, (west), Mumbai 400067.
        </small>
        <br>
        <small style="color:#0A142F;font-size:10px;font-family:Poppins;opacity:0.8;position:relative;top:-94px;"> <img
                src="{{ url('frontend/image/phone.png') }}" alt="" width="7px"> +91-9869787439 |
            +91-9821050169 | +91-8104597390 <img src="{{ url('frontend/image/e-mail.png') }}" alt=""
                width="7px"> info@jjckandivali.com <img src="{{ url('frontend/image/wolrd.png') }}" alt=""
                width="7px"> www.jainjagruti.com</small>

        {{-- <table class="center" style="border-spacing: 0px;">
            <thead>
                <tr>
                    <th><img class="logo mt-18" height="50px" src="{{ url('frontend/image/logo.png') }}" alt="" >
                    </th>
                    <th style="font-weight: bold;"></th>
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
        </table> --}}
    </div>

    <div id="footer" class="footer-styles"
        style="padding-right: 20px;margin-left:20px;       background-color:rgba(235, 233, 233, 0.6);">
        <p align="right" class="page">Page no. </p>
    </div>

    <div style="margin-top:3px;height:20px;width:100%;background:white;border:white;outline:0ch;"></div>
    <div id="content" style="width:100%;margin:0px;background: rgba(235, 233, 233, 0.6);">
        <div>
            <h3 class=" mx-auto text-center "
                style="background:#D9D9D9;font-weight:600;width:100%;padding-bottom:5px;margin: 0;">
                CANDIDATE DETAILS</h3>
            <div style="padding: 0px 50px;">


                <h5 class="mt custom-align text-right" style="position: relative;top:-10px">
                    @if ($user->status == 'Approved')
                        Profile Status : <span class="text-green">Approved</span>
                    @elseif($user->status == 'Rejected')
                        Profile Status : <span class="text-red">Rejected</span>
                    @else
                        Profile Status : <span class="text-yellow">Pending</span>
                    @endif
                </h5>

                <table class="center" cellspacing="0px " style="position: relative;top:-30px">
                    <thead>
                        <tr>
                            <th style="padding-bottom: 0px">Full Name</th>
                            <th style="padding-bottom: 0px">Email ID</th>
                            <th style="padding-bottom: 0px">DOB</th>
                            <th rowspan="4">
                                @if ($user->profile_image)
                                    <img src="{{ asset('storage/images/profile/' . $user->profile_image) }}"
                                        alt="" class="custm-img " width="100px" style="" height="100px">
                                @else
                                    <img src="frontend/image/profile_static.svg" alt="" class="custm-img "
                                        width="100px" style="" height="100px">
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <td style="">{{ $user->full_name ?? '---' }}</td>
                            <td style="">{{ $user->email ?? '---' }}</td>
                            <td style="">
                                {{ $user->date_of_birth ? dd_format($user->date_of_birth, 'd-m-Y') : '---' }}</td>
                        </tr>
                    </thead>
                    <tbody class="text-center ">
                        <tr>
                            <th>Gender</th>
                            <th style="margin-left: 40px">Place OF Birth</th>
                            <th>Native Place</th>
                        </tr>
                        <tr>
                            <td>{{ ucfirst($user->gender) ?? '---' }}</td>
                            <td>{{ $user->place_of_birth ?? '---' }}</td>
                            <td>{{ $user->native_place ?? '---' }}</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Blood Group</th>
                            <th>Mother Tongue</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td style="padding-top:0px">{{ $user->height ?? '---' }}</td>
                            <td style="padding-top:0px">{{ $user->weight ?? '---' }}</td>
                            <td style="padding-top:0px">{{ $user->blood_group ?? '---' }}</td>
                            <td style="padding-top:0px">{{ $user->mother_tongue ?? '---' }}</td>
                        </tr>

                    </tbody>

                    <thead>
                        <tr>
                            <th>Caste</th>
                            <th>Sub Caste</th>
                            <th>Marital Status</th>
                            <th>Manglik</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td style="padding-top:0px">{{ $user->caste ?? '---' }}</td>
                            <td style="padding-top:0px">{{ $user->sub_caste ?? '---' }}</td>
                            <td style="padding-top:0px">{{ $user->martial_status ?? '---' }}</td>
                            <td style="padding-top:0px">
                                {{ $user->manglik === null ? '---' : ($user->manglik ? 'Yes' : 'No') }}
                            </td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th>No. of Children</th>
                            <th>Status Of Children</th>
                            <th>Handicap</th>
                            <th>Handicap Details</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td class="v-align" style="padding-top:0px">{{ $user->no_of_children ?? '---' }}</td>
                            <td class="v-align" style="padding-top:0px">{{ $user->status_of_children ?? '---' }}</td>
                            <td class="v-align" style="padding-top:0px">
                                {{ $user->handicap === null ? '---' : ($user->handicap == 1 ? 'Yes' : 'No') }}</td>
                            <td class="v-align max-w" style="padding-top:0px">{{ $user->handicap_details ?? '---' }}
                            </td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th>Residental Address</th>
                            <th>Mobile No.</th>
                            <th>Mobile No. (WhatsApp)</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>{{ $user->residential_address ?? '---' }}</td>
                            <td>{{ $user->mobile ?? '---' }}</td>
                            <td>{{ $user->alternative_mobile ?? '---' }}</td>
                        </tr>
                    </tbody>
                </table>


            </div>
            <h3 class=" mt text-center"
                style="background:#D9D9D9;font-weight:600;margin-top: 20px;padding-bottom:5px;width:100%;padding:left-30px;margin: 0;">
                EDUCATION & OCCUPATION DETAILS</h3>

            <div style="padding: 0px 50px;">
                <table class="center" style="margin-top: 10px">
                    <thead>
                        <tr>
                            <th>Qualification</th>
                            <th>Medium</th>
                            <th>Education Details</th>
                            <th>Occupation</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>{{ $user->qualification ?? '---' }}</td>
                            <td>{{ $user->education_medium ?? '---' }}</td>
                            <td>{{ $user->education_details ?? '---' }}</td>
                            <td>{{ $user->occupation ?? '---' }}</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th>Occupation Details</th>
                            <th>Occupation Address</th>
                            <th>Income (PA) - in Lakhs</th>
                            <th>No. of Married Sisters</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>{{ $user->occupation_details ?? '---' }}</td>
                            <td>{{ $user->occupation_address ?? '---' }}</td>
                            <td>{{ $user->income ?? '---' }}</td>
                            <td>{{ $user->married_sisters ?? '---' }}</td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th>No. of Unmarried Sisters</th>
                            <th>No. of Married Brothers</th>
                            <th>No. of Unmarried Brothers</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>{{ $user->unmarried_sisters ?? '---' }}</td>
                            <td>{{ $user->married_brothers ?? '---' }}</td>
                            <td>{{ $user->unmarried_brothers ?? '---' }}</td>
                        </tr>
                    </tbody>


                </table>
            </div>

            <div class="page_break"></div>

            {{-- <h3 class=" text-center mx-auto "
                style="font-weight:600;margin-top: 20px;padding-bottom:5px;width:100%;padding:left-30px; margin:0px">
                DETAILS OF MOSAL
            </h3> --}}

            <h3 class=" text-center mx-auto "
                style="background:#D9D9D9;font-weight:600; margin:0px;margin-top:20px;padding-bottom:5px;width:100%;padding:left-30px;">
                DETAILS OF MOSAL

            </h3>
            <div style="padding: 0px 50px;">
                <table class="center" style="margin-top: 5px">
                    <thead>

                        <tr>
                            <th>Name of Nana/ Mama's Name</th>
                            <th>Mobile Number</th>
                            <th>Residential Address</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>{{ $user->mosal_name ?? '---' }}</td>
                            <td>{{ $user->mosal_mobile ?? '---' }}</td>
                            <td>{{ $user->mosal_residential_address ?? '---' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>

                <h3 class=" text-center mx-auto "
                    style="background:#D9D9D9;font-weight:600;margin-top: 20px;padding-bottom:5px;width:100%;padding:left-30px; margin:0px">
                    TWO REFERENCES WHO KNOW ABOUT YOU / YOUR FAMILY

                </h3>

                <div style="padding: 0px 50px;">
                    <table class="center" style="margin-top: 20px">
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
                                <td>{{ $userReferenceOne ? $userReferenceOne->name : '---' }} </td>
                                <td>{{ $userReferenceOne ? $userReferenceOne->mobile : '---' }} </td>
                                <td>{{ $userReferenceOne && $userReferenceOne->address ? $userReferenceOne->address : '---' }}
                                </td>
                            </tr>
                        </tbody>
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
                                <td>{{ $userReferenceTwo ? $userReferenceTwo->name : '---' }} </td>
                                <td>{{ $userReferenceTwo ? $userReferenceTwo->mobile : '---' }} </td>
                                <td>{{ $userReferenceTwo && $userReferenceTwo->address ? $userReferenceTwo->address : '---' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <h3 class=" text-center mx-auto "
                    style="background:#D9D9D9;font-weight:600;margin-top: 20px;padding-bottom:5px;width:100%;padding:left-30px; margin:0px">
                    FAMILY DETAILS

                </h3>

                <div style="padding: 0px 50px;">
                    <table class="center" style="margin-top: 15px">
                        <table class="center">

                            <thead>
                                <tr>
                                    <th>Name Of Father</th>
                                    <th>Occupation</th>
                                    <th>Name Of Mother</th>
                                    <th>Occupation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>{{ $user->father_name ?? '---' }}</td>
                                    <td>{{ $user->father_occupation ?? '---' }}</td>
                                    <td>{{ $user->mother_name ?? '---' }}</td>
                                    <td>{{ $user->mother_occupation ?? '---' }}</td>
                                </tr>
                            </tbody>
                        </table>

                </div>
                <h3 class=" text-center mx-auto "
                    style="background:#D9D9D9;font-weight:600;margin-top: 20px;padding-bottom:5px;width:100%;padding:left-30px; margin:0px">
                    CANDIDATE'S SPECIAL CHOICE


                </h3>

                <div style="padding:0px 50px;">
                    <table class="center" style="margin-top: 15px">
                        <thead>
                            <tr>
                                <th>Choice Of Life Partner</th>
                                <th>Willing to Settle abroad</th>
                                <th>Willing to Marry having Strictly Jain Food habits</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>{{ $user->choice_of_life_partner ?? '---' }}</td>
                                <td style="">
                                    <span style="">{{ $user->willing_to_settle_abroad ?? '---' }}</span>
                                </td>
                                <td style="">
                                    <span
                                        style="">{{ $user->willing_to_marry_having_strictly_jain_foods ?? '---' }}</span>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <h3 class=" text-center mx-auto "
                    style="background:#D9D9D9;font-weight:600;margin-top: 20px;padding-bottom:5px;width:100%;padding:left-30px; margin:0px">
                    MUMBAI CONTACT FOR OUTSIDE CANDIDATE


                </h3>

                <div style="padding: 0px 50px;">
                    <table class="center" style="margin-top: 15px">
                        <thead>

                            <tr>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th>Family Relation</th>
                                <th>Residential Address</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>{{ $user->mumbai_contact_name ?? '---' }}</td>
                                <td>{{ $user->mumbai_contact_mobile ?? '---' }}</td>
                                <td>{{ $user->mumbai_contact_family_relation ?? '---' }}</td>
                                <td>{{ $user->mumbai_contact_address ?? '---' }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
</body>

<style>
    body {
        background-color: rgba(235, 233, 233, 0.6);
        position: relative;
        font-family: "Poppins", sans-serif;
        --bs-body-color: #000;
    }

    @page {
        margin: 145px 0px 70px 0px;

    }

    .page_break {
        page-break-before: always;
    }

    * {
        font-size: 12px;
        font-family: 'Poppins', sans-serif;
    }

    h3 {
        font-size: 15px;
    }

    #header {
        position: fixed;
        left: 0px;
        top: -145px;
        right: 0px;
        height: 180px !important;
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

    .custom-align {
        padding-right: 53px;
    }

    .text-center {
        text-align: center;
    }

    .mt-18 {
        margin-top: 18px;
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
        font-weight: bold;
        width: 33%;
        border-radius: 5px;
        padding: 10px 0px;
        word-wrap: break-word;

    }

    th {
        text-align: left;
        font-weight: normal;
        word-wrap: break-word;

    }

    table {
        /* margin-left: 20px; */
        table-layout: fixed
    }

    .text-green {
        color: #40BC05;
    }
    .text-red {
        color: red;
    }
    .text-yellow {
        color: rgb(227, 227, 18);
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

    th {
        padding: 5px 4px 1px 4px;
    }

    td {
        padding: 0px 4px 1px 4px;
    }

    table {
        border-spacing: 5px;
        padding: 1px 3px 4px 3px;
    }

    .v-align {
        vertical-align: top;
    }

    .max-w {
        max-width: 60px;
    }

    tr {
        vertical-align: initial;
    }
</style>

</html>
