<?php

namespace Aoc\Tests\Unit;

use Aoc\Day10;
use PHPUnit\Framework\TestCase;

final class Day10Test extends TestCase
{
    public function testPart1ExampleInput1(): void
    {
        $dayPuzzle = new Day10();
        $input = <<<TXT
        .....
        .S-7.
        .|.|.
        .L-J.
        .....
        TXT;
        $map = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(4, $dayPuzzle->solvePart1($map));
    }

    public function testPart1ExampleInput2(): void
    {
        $dayPuzzle = new Day10();
        $input = <<<TXT
        ..F7.
        .FJ|.
        SJ.L7
        |F--J
        LJ...
        TXT;
        $map = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(8, $dayPuzzle->solvePart1($map));
    }

    public function testPart2ExampleInput3(): void
    {
        $dayPuzzle = new Day10();
        $input = <<<TXT
        ...........
        .S-------7.
        .|F-----7|.
        .||OOOOO||.
        .||OOOOO||.
        .|L-7OF-J|.
        .|II|O|II|.
        .L--JOL--J.
        .....O.....
        TXT;
        $map = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(4, $dayPuzzle->solvePart2($map));
    }

    public function testPart2ExampleInput4(): void
    {
        $dayPuzzle = new Day10();
        $input =  <<<TXT
        ..........
        .S------7.
        .|F----7|.
        .||OOOO||.
        .||OOOO||.
        .|L-7F-J|.
        .|II||II|.
        .L--JL--J.
        ..........
        TXT;
        $map = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(4, $dayPuzzle->solvePart2($map));
    }

    public function testPart2ExampleInput5(): void
    {
        $dayPuzzle = new Day10();
        $input = <<<TXT
        .F----7F7F7F7F-7....
        .|F--7||||||||FJ....
        .||.FJ||||||||L7....
        FJL7L7LJLJ||LJ.L-7..
        L--J.L7...LJS7F-7L7.
        ....F-J..F7FJ|L7L7L7
        ....L7.F7||L7|.L7L7|
        .....|FJLJ|FJ|F7|.LJ
        ....FJL-7.||.||||...
        ....L---J.LJ.LJLJ...
        TXT;
        $map = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(8, $dayPuzzle->solvePart2($map));
    }

    public function testPart2ExampleInput6(): void
    {
        $dayPuzzle = new Day10();
        $input = <<<TXT
        FF7FSF7F7F7F7F7F---7
        L|LJ||||||||||||F--J
        FL-7LJLJ||||||LJL-77
        F--JF--7||LJLJ7F7FJ-
        L---JF-JLJ.||-FJLJJ7
        |F|F-JF---7F7-L7L|7|
        |FFJF7L7F-JF7|JL---7
        7-L-JL7||F7|L7F-7F7|
        L.L7LFJ|||||FJL7||LJ
        L7JLJL-JLJLJL--JLJ.L
        TXT;
        $map = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(10, $dayPuzzle->solvePart2($map));
    }
}
