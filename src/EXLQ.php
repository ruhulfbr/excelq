<?php

/**
 *
 * src/EXLQ.php
 *
 * @package ruhulfbr/excelq
 * @author Md Ruhul Amin (ruhul11bd@gmail.com) <https://github.com/ruhulfbr>
 *
 */

namespace Ruhul\ExcelQuery;

use Exception;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Ruhul\ExcelQuery\Exceptions\EmptyExcelFileException;
use Ruhul\ExcelQuery\Exceptions\EmptyExcelHeaderException;
use Ruhul\ExcelQuery\Exceptions\FileTypeNotAllowedException;
use Ruhul\ExcelQuery\Exceptions\InvalidFilePathException;

class EXLQ extends Builder
{
    /**
     * @var string
     */
    private string $_filePath;

    /**
     * @var array
     */
    private array $_fields = [];

    /**
     * @var array
     */
    private array $_data = [];

    /**
     * @var array
     */
    private array $_supported_extensions = ['xlsx', 'xls'];

    /**
     * @var string
     */
    private string $_extension = "";

    /**
     * EXLQ constructor.
     * @param string $filePath The path to the Excel file.
     * @throws Exception
     */
    public function __construct(string $filePath)
    {
        // Set the file path and extract Excel data
        $this->_filePath = $filePath;
        $this->extractExcelData();

        // Check has data for next step
        $this->checkHasData();

        parent::__construct($this->_data, $this->_fields);
    }

    /**
     * Creates a new instance of the class using data from a Excel file.
     *
     * This method initializes the class with data extracted from the specified Excel file.
     * It sets the file path, extracts data from the Excel file, and initializes the class instance
     * with the extracted data and predefined fields.
     *
     * @param string $filePath The path to the Excel file.
     * @return static A new instance of the class initialized with data from the Excel file.
     * @throws Exception
     */
    public static function from(string $filePath): static
    {
        return new static($filePath);
    }

    /**
     * Extracts column names and data rows from the Excel file.
     *
     * @return void True if extraction is successful, false otherwise.
     * @throws Exception
     */
    private function extractExcelData(): void
    {
        $this->validateFile();

        $reader = $this->engine();

        // Tell the reader to only read the data. Ignore formatting etc.
        $reader->setReadDataOnly(true);

        // Read the spreadsheet file.
        $spreadsheet = $reader->load($this->_filePath);

        $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
        $resultArray = $sheet->toArray();

        if( !empty($resultArray) ){
            foreach ($resultArray as $key => $row) {
                if( $key == 0 ){
                    $this->_fields = $row;
                    continue;
                }
                $this->_data[] = $this->prepareDataArray($row);
            }
        }
    }

    private function engine(): object
    {
        if( $this->_extension == "xls" ){
            return new Xls();
        }
        return new Xlsx();
    }

    /**
     * Extracts data from a row based on defined fields.
     *
     * @param array $row Input row to extract data from.
     * @return array Extracted data array.
     */
    private function prepareDataArray(array $row): array
    {
        $array = [];
        if (!empty($this->_fields)) {
            foreach ($this->_fields as $key => $field) {
                $array[$field] = $row[$key] ?? '';
            }
        }

        return $array;
    }

    /**
     * Validates the data source (Excel file path).
     *
     * @return void True if the file is valid, false otherwise.
     * @throws Exception
     */
    private function validateFile(): void
    {
        if (!file_exists($this->_filePath) || !is_file($this->_filePath) || !is_readable($this->_filePath)) {
            throw new InvalidFilePathException("Invalid or unreadable file path: " . $this->_filePath);
        }

        $this->_extension = strtolower(pathinfo($this->_filePath, PATHINFO_EXTENSION));
        if (!in_array($this->_extension , $this->_supported_extensions)  ) {
            throw new FileTypeNotAllowedException("File type not allowed: " . $this->_extension);
        }
    }

    /**
     * Check if the Excel file has data or not.
     * Throws exceptions if the Excel file header is empty or if the file is empty.
     *
     * @throws EmptyExcelHeaderException When the Excel header is empty.
     * @throws EmptyExcelFileException   When the Excel file is empty.
     */
    private function checkHasData(): void
    {
        // Throw exception if the Excel file is empty
        if (empty($this->_fields[0]) && empty($this->_data)) {
            throw new EmptyExcelFileException("No data found in the Excel file. `" . $this->_filePath . "`");
        }

        // Throw exception if the Excel file header is empty
        if (empty($this->_fields[0])) {
            throw new EmptyExcelHeaderException("The Excel header is empty, the first row consider as header/columns. `" . $this->_filePath . "`");
        }
    }
}
