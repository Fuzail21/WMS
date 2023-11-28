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

        <table class="table border-collapse">
            <thead>
                <tr>
                    <th class="border border-black">Box Name</th>
                    <th class="border border-black">Package ID</th>
                    <th class="border border-black">Package Name</th>
                    <th class="border border-black">PM</th>
                    <th class="border border-black">Purchasing Agent</th>
                    <th class="border border-black">Pkg Ship In</th>
                    <th class="border border-black">Pkg Expected Ship Out</th>
                    <th class="border border-black">Pkg Ship Out</th>
                    <th class="border border-black">Delivery Location</th>
                    <th class="border border-black">Removing Driver</th>
                    <th class="border border-black">Removing Note</th>
                    <th class="border border-black">Packets Job Number</th>
                    <th class="border border-black">Packets Ship In</th>
                    <th class="border border-black">Packet Material Type</th>
                    <th class="border border-black">Packets Material Decs</th>
                    <th class="border border-black">Number Of Bundles</th>
                    <th class="border border-black">Modified Number Of Bundles</th>
                    <th class="border border-black">Modified Date</th>
                    <th class="border border-black">Modified By</th>
                    <th class="border border-black">Truck Number</th>
                    <th class="border border-black">Packet Driver</th>
                    <th class="border border-black">Packet Truck Number</th>
                    <th class="border border-black">Packet Location</th>

                </tr>
            </thead>
            <tbody>
                @if (!is_null($dataForExcel))

                    @foreach ($dataForExcel['boxName'] as $index => $boxName)
                    <tr class="text-center text-sm">
                        <td class="border border-black">{{ $boxName ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['pkgID'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['pkgName'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['pm'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['purchasingAgent'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['pkgShipIn'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['pkgExpShipOut'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['pkgShipOut'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['deliveryLocation'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['removingDriver'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['removingNote'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['packetsJobNumber'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['packetsShipIn'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['packetsMaterialType'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['pktMaterialDesc'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['numOfBundles'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['modifiedNumOfBundles'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['modifiedDate'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['modifiedBy'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['truckNum'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['packetDriver'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['packetTruckNum'][$index] ?? null }}</td>
                        <td class="border border-black">{{ $dataForExcel['packetLocation'][$index] ?? null }}</td>
                    </tr>

                    @endforeach
                @endif

            </tbody>
        </table>


    </div>


</body>
</html>
