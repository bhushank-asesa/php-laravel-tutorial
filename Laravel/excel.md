# Excel

## Write Excel

### Package Installation

```bash
composer require phpoffice/phpspreadsheet
```

### Import

```php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
```

### Create File Excel

- Create Spreadsheet Object

```php
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getSheet(0);
$sheet->setTitle("Target Report");
```

- Header

```php
$headers = [
        ["SrNo", "Jan", "", "", "Feb", "", "", "Remark"],
        [
            "",
            "Target",
            "Numbers",
            "%",
            "Target",
            "Numbers",
            "%",
        ],
    ];
$sheet->fromArray($headers, null, 'A1');
```

- Merge Cell if necessary

```php
$sheet->mergeCells('B1:D1'); // Jan
$sheet->mergeCells('E1:G1'); // Feb
$sheet->mergeCells('A1:A2'); // SrNo
$sheet->mergeCells('H1:H2'); // Remark
```

- Style

1. Alignment

```php
// set header center
$sheet->getStyle('A1:H2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:H2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
```

2. Bold etc.

```php
$headerStyle = [
    'font' => ['bold' => true],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FFFF00']]
];

$sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->applyFromArray($headerStyle); // first header row
$sheet->getStyle('A2:' . $sheet->getHighestColumn() . '2')->applyFromArray($headerStyle); // second header row
```

3. Border

```php
// Border Style
$borderStyle = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
        ],
    ],
];
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
$sheet->getStyle('A1:' . $highestColumn . $highestRow)->applyFromArray($borderStyle);
$sheet->getStyle('A2:' . $highestColumn . $highestRow)->applyFromArray($borderStyle);
```

4. Auto Size Column

```php
// auto size column; for AA and so on write separate two foreach loop
foreach (range('A', 'Z') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}
```

### Write File

```php
// Write file in excel and store it
$spreadsheet->setActiveSheetIndex(0);
$writer = new Xlsx($spreadsheet);
$directoryPath = app()->basePath('public/report');

if (!is_dir($directoryPath)) {
    mkdir($directoryPath, 0755, true);
}
$excelFileName = 'Target Report Sheet ' . date("d-m-Y");
$sheetName = "$excelFileName.xlsx";
$sheetFilePath = app()->basePath('public/report/') . $sheetName;
$writer->save($sheetFilePath);
echo asset("report/$excelFileName.xlsx");
```

### Insert Data into it before File write

```php
// insert Data
$data = [
    [1, 5, 2, 40, 6, 3, 50, "↑"],
    [1, 5, 4, 40, 6, 2, 33.33, "↓"],
    [3, 55000, 44000, 80, 60000, 48000, 80, "-"],
    [4, 2500, 400, 16, 600, 90, 15, "↓"]
];
$row = 3;
$index = 1;
// Add data to subsequent rows
foreach ($data as $item) {

    $rowData = array_values($item);
    $sheet->fromArray([$rowData], null, 'A' . $row);
    $row++;
    $index++;
}
```

- Get Highest Row and Column

```php
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
```

### Set Number Format

```php
// set Number Format
for ($row = 1; $row <= $highestRow; $row++) {
    for ($col = 'A'; $col <= $highestColumn; $col++) {
        $cellValue = $sheet->getCell($col . $row)->getValue();
        if (is_numeric($cellValue)) {
            $sheet->getStyle($col . $row)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
        }
    }
}
```

### Set Different Style by single cell

```php
// set Separate Style for remark
for ($row = 3; $row <= $highestRow; $row++) {
    $cellValue = $sheet->getCell("H$row")->getValue();
    $sheet->getStyle("H$row")->applyFromArray([
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::HORIZONTAL_CENTER],
    ]);
    if ($cellValue == "↑") {
        $sheet->getStyle("H$row")->applyFromArray([
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FFD301']]
        ]);
    }
    if ($cellValue == "↓") {
        $sheet->getStyle("H$row")->applyFromArray([
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'D61F1F']]
        ]);
    }
    if ($cellValue == "-") {
        $sheet->getStyle("H$row")->applyFromArray([
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '639754']]
        ]);
    }
}
```

### Create SubSheet

```php
// create another Sheet and same file and follow above same process to Write data
    $newSheet = $spreadsheet->createSheet();
    $newSheet->setTitle("Jan");
```
