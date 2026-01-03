<?php

namespace App\Components;

class UniqueID
{
    private array $letters;
    private array $numbers;


    public function __construct()
    {
        $this->letters = str_split('abcdefghijklmnopqrstuvwxyz'
            . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $this->numbers = str_split('123456789');
    }

    /**
     * GERANDO UNIQUE NECESSÁRIO PARA GERAR O TOKEN (UNIQUE)
     * @return string
     */
    private function generateUniqueAlphaNumeric(): string
    {
        $unique = '';
        for ($c = 0; $c < 4; $c++) {
            if ($c % 2 == 0) {
                $unique .= $this->letters[(time() * rand(0, 4)) % 48];
            } else {
                $unique .= $this->generateBin();
            }
        }
        return $unique;
    }

    /**
     * GERANDO UNIQUE NECESSÁRIO PARA GERAR O TOKEN (UNIQUE)
     * @return string
     */
    private function generateUniqueNumeric(): string
    {
        $unique = '';
        for ($c = 0; $c < 4; $c++) {
            $unique .= $this->generateBin();
        }
        return $unique;
    }

    /**
     * GERANDO UNIQUE ID COM 16 CARACTERES
     * @param $separate string
     * @return string;
     * */
    private function generateUnique4WithDateAlphaNumeric(string $separate): string
    {
        $unique_array = [];
        for ($d = 0; $d < 2; $d++) {
            $unique = $this->generateUniqueAlphaNumeric();
            $unique_array[] = $unique;
        }
        $year = date('Y');

        return substr($year, -2) . '-' . implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 16 CARACTERES
     * @param $separate string
     * @return string;
     * */
    private function generateUnique16AlphaNumeric(string $separate): string
    {
        $unique_array = [];
        for ($d = 0; $d < 4; $d++) {
            $unique = $this->generateUniqueAlphaNumeric();
            $unique_array[] = $unique;
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 32 CARACTERES
     * @param $separate string
     * @return string;
     * */
    private function generateUnique32AlphaNumeric(string $separate): string
    {
        $unique_array = [];
        for ($d = 0; $d < 8; $d++) {
            $unique = $this->generateUniqueAlphaNumeric();
            $unique_array[] = $unique;
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 4 NUMEROS
     * @param $separate string
     * @return string;
     * */
    private function generateUnique4Numeric(string $separate): string
    {
        $unique_array = [];
        for ($d = 0; $d < 1; $d++) {
            $unique = $this->generateUniqueNumeric();
            $unique_array[] = $unique;
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 8 NUMEROS
     * @param $separate string
     * @return string;
     * */
    private function generateUnique8Numeric(string $separate): string
    {
        $unique_array = [];
        for ($d = 0; $d < 2; $d++) {
            $unique = $this->generateUniqueNumeric();
            $unique_array[] = $unique;
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 16 NUMEROS
     * @param $separate string
     * @return string;
     * */
    private function generateUnique16Numeric(string $separate): string
    {
        $unique_array = [];
        for ($d = 0; $d < 4; $d++) {
            $unique = $this->generateUniqueNumeric();
            $unique_array[] = $unique;
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 32 NUMEROS
     * @param $separate string
     * @return string;
     * */
    private function generateUnique32Numeric(string $separate): string
    {
        $unique_array = [];
        for ($d = 0; $d < 8; $d++) {
            $unique = $this->generateUniqueNumeric();
            $unique_array[] = $unique;
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UM VALOR ALEÁTORIO APARTIR DE BINÁRIO
     */
    private function generateBin(): float|int
    {
        $key = '';
        foreach (array_rand($this->numbers, 4) as $val) {
            $key .= $val % 2;
        }
        if (bindec($key) > 9) {
            return bindec($key) % 5;
        } elseif (bindec($key) == 0) {
            $key = '';
            foreach (array_rand($this->numbers, 4) as $val) {
                $key .= $val % 2;
            }
            return bindec($key);
        } else
            return bindec($key);
    }


    public function uniqueId4Numeric($separate = ''): string
    {
        return $this->generateUnique4Numeric($separate);
    }

    public function uniqueId8Numeric($separate = ''): string
    {
        return $this->generateUnique8Numeric($separate);
    }

    public function uniqueId16Numeric($separate = ''): string
    {
        return $this->generateUnique16Numeric($separate);
    }

    /**
     * GERANDO UNIQUE ID COM 16 CARACTERES
     * @param $separate string
     * @return string;
     * */
    public function uniqueId16AlphaNumeric(string $separate = ''): string
    {
        return $this->generateUnique16AlphaNumeric($separate);
    }

    /**
     * GERANDO UNIQUE ID COM 32 CARACTERES
     * @param $separate string
     * @return string;
     * */
    public function uniqueId32AlphaNumeric(string $separate = ''): string
    {
        return $this->generateUnique32AlphaNumeric($separate);
    }

    /**
     * GERANDO UNIQUE ID COM 32 CARACTERES
     * @param $separate string
     * @return string;
     * */
    public function uniqueId32Numeric(string $separate = ''): string
    {
        return $this->generateUnique32Numeric($separate);
    }
}
