<!doctype html>
<html>


<head>
    <meta charset="utf-8">
    <title>LR Print</title>
    <link rel="stylesheet" href="/public/css/app.css">
    <link rel="stylesheet" href="/public/css/print.css">
</head>

<body>
    @foreach ($trips as $trip)
    <br><br>     <div class="text-center">
        <h3 style="margin-bottom:-1px;font-size:10px;text-decoration:underline">SUBJECT TO MUMBAI JURISDICTION</h3>
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
        <br><br><br><br>
        <table style="border:none; border-collapse:collapse; width:100%">
            <tr>
                <td style="width:40%" class="nomarpad">
                    <br><br>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANUAAAAhAQMAAAB0jXzPAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAC5JREFUKJFj+FNn8bj/x/8++8d9Fv/7fzz+Z/EYyP5n8afwB8Oo3KjcqNyAyQEA2TdePc9fbQMAAAAASUVORK5CYII=" alt="barcode" /><br>
                    <br><br>
                    <span style="line-height:2.4em;" class="coname">Lorry Receipt No: </span>
                    <span style="line-height:1.5em;font-family:Courier;font-weight:900;font-size:16px">14315</span><br>
                    <span class="coname">Date:<b>{{ $trip->lr_date}}</b></span><br>
                    <span class="coname">Vehicle No:<b>{{ $trip->regnum}}</b></span><br>
                    <span class="coname">Invoice No:<b>{{ $trip->invoice}} </b></span><br>
                    <span class="coname">PO Number:<b>{{ $trip->ponum}}</b></span><br>
                </td>
                <td style="width:20%" class="nomarpad">
                </td>
                <td style="width:40%" class="nomarpad" style="margin-left:20px;">
                    <br><br>
                    <div style="padding:4px;border:1px solid grey">
                        <span class="coname">Consignor:</span><br>
                        <span class="lconame">{{ $trip->origin_name}}</span><br>
                        <span class="lcodet">{{ $trip->org_add}}</span><br>
                        <span class="lcodet">{{ $trip->org_city}} {{ $trip->org_state}} {{ $trip->org_pin}}</span><br>
                    </div>
                    <br>
                    <div style="padding:4px; border:1px solid grey">
                        <span class="coname">Consignee:</span><br>
                        <span class="lconame">{{ $trip->dest_name}}</span><br>
                        <span class="lcodet">{{ $trip->dest_add}}</span><br>
                        <span class="lcodet">{{ $trip->dest_city}} {{ $trip->dest_state}} {{ $trip->dest_pin}}</span>
                    </div>
                </td>
            </tr>
        </table>
        <article>
            <br>
            <table class="inventory">
                <thead>
                    <tr>
                        <th style="width:34%"><span>Product</span></th>
                        <th style="width:16%;text-align: right"><span>Qty Loaded</span></th>
                        <th style="width:16%;text-align: right"><span>Qty Unloaded</span></th>
                        <th style="width:34%" colspan=3><span>Consignee/Receiver&apos;s Remarks</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $trip->product}}</span>
                        </td>
                        <td style="text-align: right"><span>{{$trip->qtyload}} {{$trip->unit}}</span></td>
                        <td style="text-align: right"><span>{{$trip->qtydel}} {{$trip->unit}}</span></td>
                        <td colspan=3>
                            <table>
                                <thead>
                                    <tr>
                                        <th><span></span></th>
                                        <th><span>Date</span></th>
                                        <th><span> Time</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span>Tanker</span><br><span>Arrival</span></td>
                                        <td><span></span></th>
                                            <td><span> </span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Tanker</span><br><span>Unloaded</span></td>
                                        <td><span></span></td>
                                        <td><span> </span></th>
                                    </tr>
                                    <tr>
                                        <td><span>Shortage</span><br><span>(If Any)</span></td>
                                        <td><span></span></th>
                                            <td><span> </span></td>
                                    </tr>
                                </tbody>
                            </table>
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Driver&apos;s Name: <b>{{ $trip->driver1_name}}</b></span><br>
                            <span>Driver Licence No :<b>{{ $trip->dl_num}}</b></span><br><br><br><br><br><br><br><br>
                        </td>
                        <td colspan=2>
                            <span>Party Liable for GST: </span><br>
                            <span><b>{{ $trip->gstparty}}</b></span>

                        </td>
                        <td>
                            <span><br><br>Signature<br>&amp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Stamp&nbsp;&nbsp;<br><br></span>
                        </td>
                        <td colspan=2>
                            <span></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center" colspan=3>
                            <span>For <b>Countrywide Chemlogistics</b></span><br><br><br><br><br><br>
                            <span><small><i>(Manager/Authorised Signatory)</i></small></span>

                        </td>
                        <td colspan=3><br>
                            <span><input style="height:13px; line-height:1.1em;" type="checkbox"/>&nbsp;Consignor Copy<span><br><br>
                                    <span><input style="height:13px;line-height:1.1em;" type="checkbox" />&nbsp;Consignee Copy<span><br><br>
                                        <span><input style="height:13px;line-height:1.1em;" type="checkbox"/>&nbsp;Shipper Copy<span><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=6>
                            <span>
                                Notes and Special Instructions:
                                </span>
                            <br><br><br><br><br><br><br>
                        </td>
                    </tr>

                </tbody>
            </table>

            
        </article>    
    </div>
        <div class="text-center">
                <h3 style="margin-top:2px;font-size:12px;">Subject to Terms &amp; Conditions Stated Overleaf</h3>
            </div>
            <div class="hidethis" style="position: fixed; left: 600px; top: 90px;"><button class="btn btn-success"  onclick="window.print();">Print L R</button>
            </div>
   @endforeach
</body>


