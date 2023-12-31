<?php

namespace Aoc\Tests\Unit;

use Aoc\Day08;
use PHPUnit\Framework\TestCase;

final class Day08Test extends TestCase
{
    public function testPart1ExampleInput1(): void
    {
        $dayPuzzle = new Day08();
        $input = <<<TXT
        RL

        AAA = (BBB, CCC)
        BBB = (DDD, EEE)
        CCC = (ZZZ, GGG)
        DDD = (DDD, DDD)
        EEE = (EEE, EEE)
        GGG = (GGG, GGG)
        ZZZ = (ZZZ, ZZZ)
        TXT;
        $puzzle = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(2, $dayPuzzle->solvePart1($puzzle));
    }

    public function testPart1ExampleInput2(): void
    {
        $dayPuzzle = new Day08();
        $input = <<<TXT
        LLR

        AAA = (BBB, BBB)
        BBB = (AAA, ZZZ)
        ZZZ = (ZZZ, ZZZ)
        TXT;
        $puzzle = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(6, $dayPuzzle->solvePart1($puzzle));
    }

    public function testPart2ExampleInput2(): void
    {
        $dayPuzzle = new Day08();
        $input = <<<TXT
        LLR

        AAA = (BBB, BBB)
        BBB = (AAA, ZZZ)
        ZZZ = (ZZZ, ZZZ)
        TXT;
        $puzzle = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(6, $dayPuzzle->solvePart2($puzzle));
    }
}
