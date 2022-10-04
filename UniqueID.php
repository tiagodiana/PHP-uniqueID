<?php


class UniqueID
{
    private $letters;
    private $numbers;


    public function __construct()
    {
        $this->letters = str_split('abcdefghijklmnopqrstuvwxyz'
            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $this->numbers = str_split('123456789');
    }

    /**
     * GERANDO UNIQUE NECESSÁRIO PARA GERAR O TOKEN (UNIQUE)
     * @return string
    */
    private function generateUniqueAlphaNumeric()
    {
        $unique = '';
        for ($c = 0 ; $c < 4; $c++)
        {
            if ($c % 2 == 0)
            {
                $unique .= $this->letters[(time() * rand(0, 4)) % 48];
            }
            else
            {
                $unique .= $this->generateBin();
            }
        }
        return $unique;
    }

    /**
     * GERANDO UNIQUE NECESSÁRIO PARA GERAR O TOKEN (UNIQUE)
     * @return string
    */
    private function generateUniqueNumeric()
    {
        $unique = '';
        for ($c = 0 ; $c < 4; $c++)
        {
            $unique .= $this->generateBin();
        }
        return $unique;
    }

    /**
     * GERANDO UNIQUE ID COM 16 CARACTERES
     * @param $separate string
     * @return string;
     * */
    private function generateUnique4WithDateAlphaNumeric($separate)
    {
        $unique_array = [];
        for ($d = 0; $d < 2; $d++)
        {
            $unique = $this->generateUniqueAlphaNumeric();
            array_push($unique_array, $unique);
        }
        $year = date('Y');

        return substr( $year, -2) . '-'. implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 16 CARACTERES
     * @param $separate string
     * @return string;
     * */
    private function generateUnique16AlphaNumeric($separate)
    {
        $unique_array = [];
        for ($d = 0; $d < 4; $d++)
        {
            $unique = $this->generateUniqueAlphaNumeric();
            array_push($unique_array, $unique);
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 32 CARACTERES
     * @param $separate string
     * @return string;
     * */
    private function generateUnique32AlphaNumeric($separate)
    {
        $unique_array = [];
        for ($d = 0; $d < 8; $d++)
        {
            $unique = $this->generateUniqueAlphaNumeric();
            array_push($unique_array, $unique);
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 4 NUMEROS
     * @param $separate string
     * @return string;
     * */
    private function generateUnique4Numeric($separate)
    {
        $unique_array = [];
        for ($d = 0; $d < 1; $d++)
        {
            $unique = $this->generateUniqueNumeric();
            array_push($unique_array, $unique);
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 8 NUMEROS
     * @param $separate string
     * @return string;
     * */
    private function generateUnique8Numeric($separate)
    {
        $unique_array = [];
        for ($d = 0; $d < 2; $d++)
        {
            $unique = $this->generateUniqueNumeric();
            array_push($unique_array, $unique);
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 16 NUMEROS
     * @param $separate string
     * @return string;
     * */
    private function generateUnique16Numeric($separate)
    {
        $unique_array = [];
        for ($d = 0; $d < 4; $d++)
        {
            $unique = $this->generateUniqueNumeric();
            array_push($unique_array, $unique);
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 32 NUMEROS
     * @param $separate string
     * @return string;
     * */
    private function generateUnique32Numeric($separate)
    {
        $unique_array = [];
        for ($d = 0; $d < 8; $d++)
        {
            $unique = $this->generateUniqueNumeric();
            array_push($unique_array, $unique);
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UM VALOR ALEÁTORIO APARTIR DE BINÁRIO
    */
    private function generateBin()
    {
        $key = '';
        foreach (array_rand($this->numbers, 4) as $val)
        {
            $key .= $val % 2;
        }
        if (bindec($key) > 9)
        {
            return bindec($key) % 5;
        }
        elseif (bindec($key) == 0)
        {
            $key = '';
            foreach (array_rand($this->numbers, 4) as $val)
            {
                $key .= $val % 2;
            }
            return bindec($key);
        }
        else
            return bindec($key);
    }

    /**
     * GERANDO UNIQUE ID COM 16 CARACTERES
     * @param $separate string
     * @return string;
     * */
    public function uniqueId16AlphaNumeric($separate = '')
    {
        return $this->generateUnique16AlphaNumeric($separate);
    }

    /**
     * GERANDO UNIQUE ID COM 32 CARACTERES
     * @param $separate string
     * @return string;
     * */
    public function uniqueId32AlphaNumeric($separate = '')
    {
        return $this->generateUnique32AlphaNumeric($separate);
    }

    public function uniqueId4Numeric($separate = '')
    {
        return $this->generateUnique4Numeric($separate);
    }

    public function uniqueId8Numeric($separate = '')
    {
        return $this->generateUnique8Numeric($separate);
    }

    public function uniqueId16Numeric($separate = '')
    {
        return $this->generateUnique16Numeric($separate);
    }

    /**
     * GERANDO UNIQUE ID COM 32 CARACTERES
     * @param $separate string
     * @return string;
     * */
    public function uniqueId32Numeric($separate = '')
    {
        return $this->generateUnique32Numeric($separate);
    }
}
