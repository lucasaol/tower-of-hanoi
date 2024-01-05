<?php

class Tower
{

    private int $disks;
    private array $pins = [];

    public function __construct(int $disks)
    {
        $this->disks = $disks;
        $this->init();
    }

    private function init(): void
    {
        for ($i = $this->disks; $i > 0; $i--) {
            $this->pins[0][] = $i;
        }
        $this->pins[1] = [];
        $this->pins[2] = [];

        echo 'Posição Inicial: <br>';
        $this->printStep();
    }

    private function printStep(): void
    {
        foreach ($this->pins as $key => $pin) {
            echo '<strong>Pino ' . $key . ':</strong> '
                . '(' . implode(' - ', array_filter($pin)) . ')'
                . '<br>';
        }
        echo '<br>';
    }

    private function move(int $from, int $to): void
    {
        $top = array_pop($this->pins[$from]);
        array_push($this->pins[$to], $top);
    }

    public function resolve(int $n, int $a = 0, int $b = 1, int $c = 2): void
    {
        if ($n > 0) {
            $this->resolve($n - 1, $a, $c, $b);
            echo 'Movendo disco "' . $n . '" do pino "' . $a . '" para pino "' . $c . '" <br>';
            $this->move($a, $c);
            $this->printStep();
            $this->resolve($n - 1, $b, $a, $c);
        }
        return;
    }
}
