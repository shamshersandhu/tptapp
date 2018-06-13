<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>LR Print</title>
    <link rel="stylesheet" href="/public/css/app.css">
    <link rel="stylesheet" href="/public/css/print.css">
</head>

<body>
    @foreach ($trucks as $truck)
    <br><br>
    <div class="text-center">
        <h3 style="margin-bottom:-1px;font-size:10px;text-decoration:underline">C O N F I D E N T I A L</h3>
    </div>
    <div style="border:1px solid black;padding:10px">
        <table style="border:none; border-collapse:collapse; width:100%">
            <tr>
                <td class="nomarpad">
                    <br><br><br><br><br><br>
                    <span class="coname"><b>COUNTRYWIDE CHEM-LOGISTICS</b></span><br>
                    <span class="codet">Admin Office: 1728 Dr. C.G. Road,</span><br>
                    <span class="codet">Chembur, Mumbai - 400 074,</span><br>
                    <span class="codet">Tel: 022-2520 1588/2520 1437</span><br>
                    <span class="codet">Fax: 022-2520 3474</span><br>
                    <span class="codet">Email: contact@chemlogistics.in</span>
                </td>
                <td class="nomarpad">
                    <p><img style="display:block;margin-left:auto;max-width:100%;max-height:100%;margin-left:-18px;" alt="Logo"
                            src="/public/assets/images/cw_logo_lg.jpg"></p>
                </td>
                <td class="nomarpad" style="margin-left:20px;">
                    <br><br><br><br><br><br>
                    <span class="lconame">Transport Contractors</span><br>
                    <span class="lcodet">Workshop:</span><br>
                    <span class="lcodet">1942, Steel Warehousing Complex,</span><br>
                    <span class="lcodet">Kalamboli, Dist. Raigad - 410218</span><br>
                    <span class="lcodet">Tel: 022-6060 1099</span><br>
                    <span class="lcodet">Email: workshop@chemlogistics.in</span>
                </td>
            </tr>
        </table>
        <br>
        <article>
            <br>
            <table class="inventory">
                <thead>
                    <tr>
                        <th colspan=2 style="background-color: #ccc;text-align: center;">
                            <span style="font-weight:700;font-size:13px;">
                                            TRUCK INFORMATION
                                    </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Truck No
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                  {{ $truck->regnum }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Owner
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->ownname }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Purch Date
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->purch_date }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Sold Date
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->sold_date }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Status
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->status }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Make/Model
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->make }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Wheels
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->wheels }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Engine Num
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->engine_num }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Chassis Num
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->ch_num }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                GWT
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->GWT }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                NWT
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->NWT }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                5Yr-Permit
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->fyrpermit }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                5Yr-Pmt. Exp.
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->fyrpermitexp }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                NP Number
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->npnum }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                NP Exp
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->npexp }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Fitness Exp.
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->fitexp }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                PUC Exp.
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->pucexp }}
                            </span>
                        </th>
                        <th></th>
                    </tr>
                </thead>
            </table>
            <table class="inventory">
                <thead>
                    <tr>
                        <th colspan=2 style="background-color: #ccc;text-align: center;">
                            <span style="font-weight:700;font-size:13px;">
                                        TANK INFORMATION
                                </span>
                        </th>
                    </tr>
                    <th style="width:50%;text-align: left">
                        <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Tank Number
                            </span>
                        <span>
                                {{ $truck->tanknum }}
                            </span>
                    </th>
                    <th style="width:50%;text-align: left">
                        <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Tank Desc.
                            </span>
                        <span>
                                {{ $truck->tank_desc }}
                            </span>
                    </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Tank Built Date
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->tankconsdate }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Tank Type
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->tanktype }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Tank MOC
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->tankmoc }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                    Rule 43 Desc.
                                </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                    {{ $truck->rule43desc }}
                                </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Water Cap.
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->watercap }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Licence Cap.
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->liccap }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Rule 18 Exp.
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->rule18exp }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Rule 19 Exp.
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->rule19exp }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Rule 44 Exp.
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->rule44exp }}
                            </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Calib. Exp.
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->tankcalexp }}
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                        Disk Thkness
                                    </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                        {{ $truck->diskthk }}
                                    </span>
                        </th>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                            Air Test Date
                                        </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                            {{ $truck->airtestdt }}
                                        </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:50%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Shell Thkness
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->shellthk }}
                            </span>
                        </th>
                        <th></th>
                    </tr>
                </thead>
            </table>
            <table class="inventory">
                <thead>
                    <tr>
                        <th colspan=3 style="background-color: #ccc;text-align: center;">
                            <span style="font-weight:700;font-size:13px;">
                                            INSURANCE INFORMATION
                                    </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:33%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                Ins. Policy #
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                {{ $truck->inspolnum }}
                            </span>
                        </th>
                        <th style="width:34%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                    Ins. Provider
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                    {{ $truck->inspolpro }}
                            </span>
                        </th>
                        <th style="width:33%;text-align: left">
                            <span style="font-weight:500;font-size: 12px;width: 90px;display: inline-block;">
                                    Ins. Exp. Date
                            </span>
                            <span style="font-size: 12px;font-weight: 600;">
                                    {{ $truck->insexp }}
                            </span>
                        </th>
                    </tr>
                </thead>
            </table>
                <table class="inventory">
                <thead>
                    <tr>
                        <th  style="background-color: #ccc;text-align: center;">
                            <span style="font-weight:700;font-size:13px;">
                                    NOTES
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width:100%;text-align: left">
                            <span style="font-size: 12px;font-weight: 600;">
                                    {{ str_replace(Chr(' '),'<br>', $truck->notes) }}<hr><hr><hr><hr><hr><hr><hr>
                            </span>
                        </th>
                    </tr>
                </thead>
            </table>
        </article>
    </div>
    <div class="text-center">
        <h3 style="margin-top:2px;font-size:12px;">Unauthorised Use of this Information is Prohibited</h3>
    </div>
    <div class="hidethis" style="position: fixed;left:600px;top:90px;">
        <button class="btn btn-success" onclick="window.print();">Print Truck Card</button>
    </div>
    @endforeach
</body>