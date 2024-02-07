<?php

namespace App\Services;

class ScrambleService
{
    /**
     * @var array<string>
     */
    private array $moves = ['U', "U'", 'U2', 'D', "D'", 'D2', 'R', "R'", 'R2', 'L', "L'", 'L2', 'F', "F'", 'F2', 'B', "B'", 'B2'];

    private int $minMoves = 17;

    private int $maxMoves = 20;

    public function generate(): string
    {
        $moves = [];
        $moves[] = $this->moves[array_rand($this->moves)];

        for ($i = 0; $i < rand($this->minMoves - 1, $this->maxMoves - 1); $i++) {
            $movesAccepted = array_filter($this->moves, static fn ($m) => ! str_contains($m, substr($moves[$i], 0, 1)));
            $moves[] = $movesAccepted[array_rand($movesAccepted)];
        }

        return implode(' ', $moves);
    }
}
