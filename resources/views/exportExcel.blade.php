<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Export Excel</title>
</head>
<body>


    <div>


        <button class="bg-[#0A1E61] text-white p-2 flex items-center mt-2 mb-[0.5%] ml-1" onclick="downloadSearchDataCSV()">
            <span class="material-symbols-outlined pb-0 text-lg">description</span>
            <span class="ml-2">EXPORT TO EXCEL</span>
        </button>

        <table class="table border-collapse border border-slate-500 ml-1 mr-1 mb-3" id="searchData">
            <thead>
                <tr>
                    <th class="">Box Name</th>
                    <th class="">Package ID</th>
                    <th class="">Package Name</th>
                    <th class="">PM</th>
                    <th class="">Purchasing Agent</th>
                    <th class="">Pkg Ship In</th>
                    <th class="">Pkg Expected Ship Out</th>
                    <th class="">Pkg Ship Out</th>
                    <th class="">Delivery Location</th>
                    <th class="">Removing Driver</th>
                    <th class="">Removing Note</th>
                    <th class="">Packets Job Number</th>
                    <th class="">Packets Ship In</th>
                    <th class="">Packet Material Type</th>
                    <th class="">Packets Material Decs</th>
                    <th class="">Number Of Bundles</th>
                    <th class="">Modified Number Of Bundles</th>
                    <th class="">Modified Date</th>
                    <th class="">Modified By</th>
                    <th class="">Truck Number</th>
                    <th class="">Packet Driver</th>
                    <th class="">Packet Truck Number</th>
                    <th class="">Packet Location</th>

                </tr>
            </thead>
            <tbody>
                @if (!is_null($dataAll))

                @foreach ($dataAll as $item)
                <tr class="text-center text-sm">
                    <td class="">{{ $item->boxName ?? null }}</td>
                    <td class="">{{ $item->pkgID ?? null }}</td>
                    <td class="">{{ $item->pkgName ?? null }}</td>
                    <td class="">{{ $item->pm ?? null }}</td>
                    <td class="">{{ $item->purchasingAgent ?? null }}</td>
                    <td class="">{{ $item->dateIn ?? null }}</td>
                    <td class="">{{ $item->expectedDateOut ?? null }}</td>
                    <td class="">{{ $item->dateOut ?? null }}</td>
                    <td class="">{{ $item->deliveryLocation ?? null }}</td>
                    <td class="">{{ $item->removingDriver ?? null }}</td>
                    <td class="">{{ $item->removingNote ?? null }}</td>
                    <td class="">{{ $item->pktJobNumber ?? null }}</td>
                    <td class="">{{ $item->pktShipIn ?? null }}</td>
                    <td class="">{{ $item->pktMaterialType ?? null }}</td>
                    <td class="">{{ $item->pktMaterialDesc ?? null }}</td>
                    <td class="">{{ $item->numberOfBundles ?? null }}</td>
                    <td class="">{{ $item->modifiedNumOfBundles ?? null }}</td>
                    <td class="">{{ $item->modifiedDate ?? null }}</td>
                    <td class="">{{ $item->modifiedBy ?? null }}</td>
                    <td class="">{{ $item->truckNumber ?? null }}</td>
                    <td class="">{{ $item->packetDriver ?? null }}</td>
                    <td class="">{{ $item->packetTruckNumber ?? null }}</td>
                    <td class="">{{ $item->packetLocation ?? null }}</td>
                </tr>
                @endforeach
                @endif

            </tbody>
        </table>



    </div>





<!-- Include SheetJS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

<!-- Include FileSaver.js from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>


function downloadSearchDataCSV() {
        // Get the table element by ID
        var table = document.getElementById("searchData");

        // Initialize an empty CSV string
        var csv = [];

        // Iterate over the rows in the table
        var rows = table.querySelectorAll("tr");
        rows.forEach(function (row) {
            // Initialize an empty array for each row
            var rowData = [];

            // Iterate over the cells in the row
            var cells = row.querySelectorAll("td, th");
            cells.forEach(function (cell) {
                // Push the cell's text content into the row data array
                rowData.push(cell.textContent.trim());
            });

            // Push the row data as a comma-separated string into the CSV array
            csv.push(rowData.join(","));
        });

        // Join the CSV array into a single string with line breaks
        var csvContent = csv.join("\n");

        // Create a Blob with the CSV content and UTF-8 encoding
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8' });

        // Save the Blob as a file using FileSaver.js
        saveAs(blob, "UserPackageDetails.csv");
    }


</script>




</body>
</html>
