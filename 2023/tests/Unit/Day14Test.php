<?php

namespace Aoc\Tests\Unit;

use Aoc\Day14;
use PHPUnit\Framework\TestCase;

final class Day14Test extends TestCase
{
    public function testPart1ExampleInput(): void
    {
        $dayPuzzle = new Day14();
        $input = <<<TXT
        O....#....
        O.OO#....#
        .....##...
        OO.#O....O
        .O.....O#.
        O.#..O.#.#
        ..O..#O..O
        .......O..
        #....###..
        #OO..#....
        TXT;
        $puzzle = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(136, $dayPuzzle->solvePart1($puzzle));
    }

    public function testPart2ExampleInput(): void
    {
        $dayPuzzle = new Day14();
        $input = <<<TXT
        O....#....
        O.OO#....#
        .....##...
        OO.#O....O
        .O.....O#.
        O.#..O.#.#
        ..O..#O..O
        .......O..
        #....###..
        #OO..#....
        TXT;
        $puzzle = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(64, $dayPuzzle->solvePart2($puzzle));
    }
}
