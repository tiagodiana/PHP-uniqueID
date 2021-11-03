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
    private function generateUnique()
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
     * GERANDO UNIQUE ID COM 16 CARACTERES
     * @param $separate string
     * @return string;
     * */
    private function generateUnique16($separate)
    {
        $unique_array = [];
        for ($d = 0; $d < 4; $d++)
        {
            $unique = $this->generateUnique();
            array_push($unique_array, $unique);
        }

        return implode($separate, $unique_array);
    }

    /**
     * GERANDO UNIQUE ID COM 32 CARACTERES
     * @param $separate string
     * @return string;
     * */
    private function generateUnique32($separate)
    {
        $unique_array = [];
        for ($d = 0; $d < 8; $d++)
        {
            $unique = $this->generateUnique();
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
    public function uniqueId16($separate)
    {
        return $this->generateUnique16($separate);
    }

    /**
     * GERANDO UNIQUE ID COM 32 CARACTERES
     * @param $separate string
     * @return string;
     * */
    public function uniqueId32($separate)
    {
        return $this->generateUnique32($separate);
    }
}

