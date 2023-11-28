<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>


    <div>

        <table class="table border-separate border border-slate-500">
            <thead>
                <tr class="text=sm">
                    <th>Box Name</th>
                    <th>Package ID</th>
                    <th>Package Name</th>
                    <th>PM</th>
                    <th>Purchasing Agent</th>
                    <th>Pkg Ship In</th>
                    <th>Pkg Expected Ship Out</th>
                    <th>Pkg Ship Out</th>
                    <th>Delivery Location</th>
                    <th>Removing Driver</th>
                    <th>Removing Note</th>
                    <th>Packets Job Number</th>
                    <th>Packets Ship In</th>
                    <th>Packet Material Type</th>
                    <th>Packets Material Decs</th>
                    <th>Number Of Bundles</th>
                    <th>Modified Number Of Bundles</th>
                    <th>Modified Date</th>
                    <th>Modified By</th>
                    <th>Truck Number</th>
                    <th>Packet Driver</th>
                    <th>Packet Truck Number</th>
                    <th>Packet Location</th>

                </tr>
            </thead>
            <tbody>
                @if (!is_null($dataForExcel))

                    @foreach ($dataForExcel['boxName'] as $index => $boxName)
                    <tr class="text-xs">
                        <td>{{ $boxName ?? null }}</td>
                        <td>{{ $dataForExcel['pkgID'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['pkgName'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['pm'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['purchasingAgent'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['pkgShipIn'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['pkgExpShipOut'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['pkgShipOut'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['deliveryLocation'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['removingDriver'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['removingNote'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['packetsJobNumber'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['packetsShipIn'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['packetsMaterialType'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['pktMaterialDesc'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['numOfBundles'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['modifiedNumOfBundles'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['modifiedDate'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['modifiedBy'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['truckNum'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['packetDriver'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['packetTruckNum'][$index] ?? null }}</td>
                        <td>{{ $dataForExcel['packetLocation'][$index] ?? null }}</td>
                    </tr>

                    @endforeach
                @endif

            </tbody>
        </table>


    </div>


</body>
</html>
